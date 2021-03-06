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

class IpropertyModelAdvsearch extends JModelList
{
    protected $ipsettings;
    protected $where;
    protected $limit;
    protected $limitstart;
    protected $orderby;
    protected $direction;

    public function __construct($config = array())
    {
        $this->ipsettings   =  ipropertyAdmin::config();
        $this->where        = (isset($config['where'])) ? $config['where'] : null;
        $this->limit        = (isset($config['limit'])) ? $config['limit'] : null;
        $this->limitstart   = (isset($config['limitstart'])) ? $config['limitstart'] : null;
        $this->orderby      = (isset($config['orderby'])) ? $config['orderby'] : null;
        $this->direction    = (isset($config['direction'])) ? $config['direction'] : null;

        // hackish check to replace pid with mls_id since pid is not valid column name
        // TODO: probably want to rename all pid instances to mls_id in adv search scripts
        if ($this->orderby == 'p.pid') $this->orderby = 'p.mls_id';

        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        // List state information
        $this->setState('list.limit', $this->limit);
        $this->setState('list.start', $this->limitstart);
        $this->setState('list.ordering', $this->orderby);
        $this->setState('list.direction', $this->direction);
    }

    protected function getListQuery($featured = false)
    {
        $where  = $this->getWhere();        
        $sort   = $this->getState('list.ordering');
        $order  = $this->getState('list.direction');

        $pquery = new IpropertyHelperQuery($this->_db, $sort, $order);
        $query  = $pquery->buildPropertyQuery($where, 'advsearch');
        return $query;
    }

    public function getItems($items = null)
    {
        $items  = ($items) ? $items : parent::getItems();
        $items  = ipropertyHelperProperty::getPropertyItems($items, true, true);
        if(count($items) >= 1) {
            $returndata = array (
                'total' => $this->getTotal(),
                'listings' => $items                
            );
            return ipropertyHTML::createReturnObject('ok', $this->getTotal().' results found', $returndata);
        } else {
            return ipropertyHTML::createReturnObject('ok', 'no results', $this->where);
        }
    }

    protected function getWhere()
    {
        $this->where['searchfields']  = array();
        return $this->where;
    }

    public function getStart()
    {
        return $this->getState('list.start');
    }
}
?>