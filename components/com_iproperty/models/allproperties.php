<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
jimport('joomla.application.component.model');

class IpropertyModelAllProperties extends JModelList
{    
    protected $ipsettings;
    protected $hotsheet;
    
    public function __construct($config = array())
	{
        $app = JFactory::getApplication();
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
                'keyword'           => 'property',
                'country'           => 'property',
                'locstate'          => 'property', 
                'province'          => 'property',
                'county'            => 'property',
                'region'            => 'property',
                'city'              => 'property',
                'listing_office'    => 'property', 
                'stype'             => 'property',                 
                'beds'              => 'sliders', 
                'baths'             => 'sliders', 
                'approved'          => 'property',
                'price_low'         => 'sliders',
                'price_high'        => 'sliders',
                'cat'               => 'categories', 
                'agent_id'          => 'agents');
		}
        
        $this->ipsettings   = ipropertyAdmin::config();
        $this->hotsheet 	= $app->input->get('hotsheet', '', 'uint');

		parent::__construct($config);
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
        foreach ($this->filter_fields as $k => $v){
            $id	.= ':'.$this->getState('filter.'.$k);
        }

		return parent::getStoreId($id);
	}
    
    protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.        
        $app        = JFactory::getApplication();
        $params     = $app->getParams();
        
        // Adjust the context to support unique and multiple quick search results
        $uri            = JFactory::getURI();
        $query_string   = $uri->getQuery();
		if ($app->input->get('ipquicksearch') && !$app->input->get('limitstart') && !strpos($query_string, 'limitstart'))
		{
            $app->setUserState('ipqs', '.ipqs:'.rand());            
		}
        if(JRequest::getVar('ipquicksearch', '', 'get', 'int')) $this->context .= $app->getUserState('ipqs');
        if($this->hotsheet) $this->context .= '.iphs:'.$this->hotsheet;
        $this->context .= '.ipItemid:'.$app->input->get('Itemid', '', 'unint');
        
        $this->setState('params', $params);

		// List state information
		$value = $app->input->get('limit', $this->ipsettings->perpage, 'uint');
		$this->setState('list.limit', $value);

		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);
        
        $prop_sort_fields = array('p.title', 'p.street', 'p.beds', 'p.baths', 'p.sqft', 'p.price', 'p.created', 'p.modified');
        $orderCol = $app->input->get('filter_order', $this->ipsettings->default_p_sort);
        if (!in_array($orderCol, $prop_sort_fields)) {
			$orderCol = 'p.price';
		}
		$this->setState('list.ordering', $orderCol);

		$listOrder = $app->input->get('filter_order_Dir', $this->ipsettings->default_p_order);
		if (!in_array(strtoupper($listOrder), array('ASC', 'DESC'))) {
			$listOrder = 'DESC';
		}
		$this->setState('list.direction', $listOrder);

		// Load the filter state.
        foreach ($this->filter_fields as $k => $v){
            if($params->get($k)){ // pre-set menu parameter filter 
                $search = $params->get($k);
            }else{ // filter submitted by form or request
                $search = $app->getUserStateFromRequest($this->context.'.filter.'.$k, 'filter_'.$k);
            }
            $this->setState('filter.'.$k, $search);
        }

		$this->setState('layout', $app->input->get('layout'));
	}
    
    protected function getListQuery($featured = false)
	{
        $where  = $this->getWhere();          
        $sort   = ($featured) ? 'RAND()' : $this->getState('list.ordering');
        $order  = ($featured) ? '' : $this->getState('list.direction');
        if($featured) $where['property']['featured'] = 1;
        
        $pquery = new IpropertyHelperQuery($this->_db, $sort, $order);
        $query  = $pquery->buildPropertyQuery($where, 'properties'); 

		return $query;
	}

	public function getItems($items = null)
	{
		$items	= ($items) ? $items : parent::getItems();
        $items = ipropertyHelperProperty::getPropertyItems($items);
        return $items;
    }
            
    
    protected function getWhere()
    {
        $where                  = array();
        $where['searchfields']  = array('title','street','street2','short_description','description','mls_id');
        $where['hotsheet']		= $this->hotsheet;
        
        foreach($this->filter_fields as $field => $type)
        {
            if($type == 'property')
            {
                $where[$type][$field]  = $this->getState('filter.'.$field);
            }else if($type == 'sliders'){
                // handle min and max values
                $queryfield     = explode('_', $field);
                
                if($queryfield[0] == 'price'){
                    if($queryfield[1] == 'low'){
                        $where[$type][$queryfield[0]]['min'] = $this->getState('filter.'.$field);
                    }else if($queryfield[1] == 'high'){
                        $where[$type][$queryfield[0]]['max'] = $this->getState('filter.'.$field);
                    }
                }else{ // only need minimum beds/baths
                    $where[$type][$queryfield[0]]['min'] = $this->getState('filter.'.$field);
                    $where[$type][$queryfield[0]]['max'] = '';
                }                
            }else if($type == 'categories'){
                $child_query    = $this->_db->setQuery(IpropertyHelperQuery::getCategories($this->getState('filter.cat')));
                $children       = $this->_db->loadObjectList();
                if($children){
                    $cat_array = array($this->getState('filter.cat'));
                    foreach( $children as $c ){
                        $cat_array[] = $c->id;
                    }
                    $where[$type] = $cat_array;
                }else{
                    $where[$type] = $this->getState('filter.cat');
                }               
            }else{
                $where[$type]          = $this->getState('filter.'.$field);
            }
        }
        return $where;
    }
    
    public function getFeatured()
    {
        if(!$this->ipsettings->show_featured) return false;
        
        $query      = self::getListQuery(true);        
        $featured   = $this->_getList($query, 0, $this->ipsettings->num_featured);
        
        if($featured) return $this->getItems($featured);
    }
    
    public function getStart()
	{
		return $this->getState('list.start');
	}
}

?>
