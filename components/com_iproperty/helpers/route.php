<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.helper');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/html.helper.php');

abstract class IpropertyHelperRoute
{
    protected static $lookup;
    
	//advanced search
    public static function getAdvsearchRoute()
	{
		$needles = array(
            'advsearch' => array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=advsearch';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //agent properties
    public static function getAgentPropertyRoute($agentid)
	{
		$needles = array(
            'agentproperties' =>  array((int)$agentid),
            'agents' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
        $agentid = (self::_sef()) ? $agentid : (int)$agentid;        
		$link = 'index.php?option=com_iproperty&view=agentproperties&id='.$agentid;

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //agents
    public static function getAgentsRoute()
	{
		$needles = array(
            'agents' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=agents';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //all properties
    public static function getAllPropertiesRoute()
	{
		$needles = array(
            'allproperties' =>  array(),
            'home' =>  array()
        );

		$link = 'index.php?option=com_iproperty&view=allproperties';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //category
    public static function getCatRoute($catid = 0, $propid = false)
	{
		$catid = (self::_sef()) ? $catid : (int)$catid;
		$link = 'index.php?option=com_iproperty&view=cat&id='.$catid;
        
        if(JRequest::getCmd('option') == 'com_iproperty' && JRequest::getWord('view') == 'cat' && JRequest::getInt('id') == (int)$catid){
            $link .= '&Itemid='.JRequest::getInt('Itemid');
        }else{        
            $needles = array(
                'cat' =>  array((int)$catid)
            );

            if ($item = self::_findItem($needles)) {
                $link .= '&Itemid='.$item;
            }elseif(JRequest::getCmd('option') == 'com_iproperty' && JRequest::getWord('view') == 'cat' && self::_isSubCat(JRequest::getInt('id'), (int)$catid)){
                $link .= '&Itemid='.JRequest::getInt('Itemid');
            }else{
                $needles = array(
                    'home' =>  array(),
                    'allproperties' =>  array()
                );

                if ($item = self::_findItem($needles)) {
                    $link .= '&Itemid='.$item;
                }
                elseif ($item = self::_findItem()) {
                    $link .= '&Itemid='.$item;
                }
            }
        }
		return $link;
	}

    //companies
    public static function getCompaniesRoute()
	{
		$needles = array(
            'companies' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=companies';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //company agents
    public static function getCompanyAgentRoute($coid)
	{
		$needles = array(
            'companyagents' =>  array((int)$coid),
            'agents' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$coid = (self::_sef()) ? $coid : (int)$coid;
        $link = 'index.php?option=com_iproperty&view=companyagents&id='.$coid;

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //company properties
    public static function getCompanyPropertyRoute($coid)
	{
		$needles = array(
            'companyproperties' =>  array((int)$coid),
            'companies' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
        $coid = (self::_sef()) ? $coid : (int)$coid;        
		$link = 'index.php?option=com_iproperty&view=companyproperties&id='.$coid;

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}        

    //contact
    public static function getContactRoute($ctype, $id)
	{
		if($ctype == 'agent'){
            $second_router  = 'agentproperties';
            $third_router   = 'agents';
        }else{
            $second_router  = 'companyproperties';
            $third_router   = 'companies';
        }
        
        $needles = array(
            'contact' =>  array((int)$id),
            $second_router =>  array($id),
            $third_router =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
        $coid = (self::_sef()) ? $id : (int)$id;        
		$link = 'index.php?option=com_iproperty&view=contact&id='.$id.'&layout='.$ctype;

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //home
    public static function getHomeRoute()
	{
		$needles = array(
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=home';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //user favorites
    public static function getIpuserRoute()
	{
		$needles = array(
            'ipuser' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=ipuser';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}
    
    //front-end manager
    public static function getManageRoute()
	{
		$needles = array(
            'manage' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );
        
		$link = 'index.php?option=com_iproperty&view=manage';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}

    //open houses
    public static function getOpenHousesRoute()
	{
		$needles = array(
            'openhouses' =>  array(),
            'home' =>  array(),
            'allproperties' =>  array()
        );

		$link = 'index.php?option=com_iproperty&view=openhouses';

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}
		elseif ($item = self::_findItem()) {
			$link .= '&Itemid='.$item;
		}
		return $link;
	}
    
    //property - external means the link is coming from a module or plugin so handle differently
    public static function getPropertyRoute($id, $cat = null, $external = false)
	{
		//Create the link
        $id = (self::_sef()) ? $id : (int)$id;
		$link = 'index.php?option=com_iproperty&view=property&id='.$id;
        
        //If the link is from one of these views, we want to stay on the current page
        $stay_array = array('allproperties', 'cat', 'openhouses');
        
        //If page is an IP view from above stay_array list and not from a module link, check for current Itemid and use that
        if(JRequest::getCmd('option') == 'com_iproperty' && in_array(JRequest::getWord('view'), $stay_array) && JRequest::getInt('Itemid') && !$external){
            $link .= '&Itemid='.JRequest::getInt('Itemid');
        }else{
            if($cat){
                $cats = (int)$cat;
            }else if(JRequest::getCmd('option') == 'com_iproperty' && JRequest::getVar('view') == 'cat'){
                $cats = JRequest::getInt('id');
            }else{
                $cats = ipropertyHTML::getAvailableCats($id);
                if(is_array($cats) && !empty($cats)){
                    $cats = implode(',', $cats);
                }else{
                    $cats = '';
                }
            }
            //var_dump($cats);
            $needles = array(
                'property' => array((int)$id),
                'cat' => array($cats),
                'allproperties' => array(),
                'home' => array()            
            );

            if ($item = self::_findItem($needles)) {
                $link .= '&Itemid='.$item;
            }
            elseif ($item = self::_findItem()) {
                $link .= '&Itemid='.$item;
            }
        }
		return $link;
	}

	protected static function _findItem($needles = null)
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu('site');

		// Prepare the reverse lookup array.
		if (self::$lookup === null)
		{
			self::$lookup = array();

			$component	= JComponentHelper::getComponent('com_iproperty');
			$items		= $menus->getItems('component_id', $component->id);
			foreach ($items as $item)
			{
				if (isset($item->query) && isset($item->query['view']))
				{
					$view = $item->query['view'];
					if (!isset(self::$lookup[$view])) {
						self::$lookup[$view] = array();
					}
					if (isset($item->query['id'])) {
						self::$lookup[$view][$item->query['id']] = $item->id;
					}else{
                        self::$lookup[$view] = $item->id;
                    }
				}
			}
		}

		if ($needles)
		{
			foreach ($needles as $view => $ids)
			{
				if (isset(self::$lookup[$view]))
				{
					if(empty($ids)){
                        return self::_getBasic(self::$lookup[$view], $view);
                    }else{
                        foreach($ids as $id)
                        {
                            //echo '----------->'.$id;
                            if (isset(self::$lookup[$view][(int)$id])) {
                                //echo '======>'.self::$lookup[$view][(int)$id];
                                return self::_getBasic(self::$lookup[$view][(int)$id], $view, $id);
                            }
                        }
                    }
				}
			}
		}
		else
		{
			$active = $menus->getActive();
			if ($active) {
				return $active->id;
			}
		}

		return null;
	}
    
    protected static function _sef()
    {
        $config      = JFactory::getConfig();
        return $config->get('sef');
    }
    
    protected static function _getBasic($itemid, $view, $id = null)
    {
        $db         = JFactory::getDbo();
        $user       = JFactory::getUser();
        $groups     = $user->getAuthorisedViewLevels();
        $app		= JFactory::getApplication();
		$menus		= $app->getMenu('site');
        $lang       = JFactory::getLanguage();
        
        //looking for links containing:
        $link = 'index.php?option=com_iproperty&view='.$view;
        if($id) $link .= '&id='.$id;
        
        //search menu table for duplicate menu item types
        $query = $db->getQuery(true);
        $query->select('id')
                ->from('#__menu')
                ->where('link LIKE '.$db->Quote('%'.$db->escape($link, true).'%', false))
                ->where('published = 1');
                //->where('language = '.$lang->getTag());
        if(is_array($groups) && !empty($groups)){
            $query->where('access IN ('.implode(",", $groups).')');
        }
        
        $db->setQuery($query);

        if($result = $db->loadObjectList()){
            if(count($result) > 1){
                $parray = array('stype','city','locstate','province','county','region',
                    'country','beds','baths','price_low','price_high');
                    
                //found duplicates, so compare the params and return the one with 
                //the least number of custom params (most basic item found)
                $basic = array();                
                foreach($result as $r){
                    $x = 0;
                    $mitem   = $menus->getItem($r->id);
                    $mparams = $menus->getParams($r->id);
                    
                    //if advanced search - return the default search if found
                    if($view == 'advsearch' && $mparams->get('advsearch_default', '')) return $r->id;
                    
                    if(isset($mitem->query['hotsheet']) && $mitem->query['hotsheet'] >= 1) $x++;
                    for($i = 0; $i <= count($parray) - 1; $i++){
                        if($mparams->get($parray[$i], '')) $x++;                        
                    }
                    $basic[$r->id] = $x;                    
                }    
                //if(!empty(self::$lookup['propid'])) echo self::$lookup['propid'].'=======';
                
                $basic = array_keys($basic, min($basic));
                //echo min($basic).'---->'.$basic[0];
                return $basic[0];
            }else{
                return $itemid;
            }
        }
        
        //return the originally looked up itemid
        return $itemid;
    }
    
    protected static function _isSubCat($parent, $child)
    {
        if(!$parent || !$child) return false;
        
        $db = JFactory::getDbo();
        
        $query = $db->getQuery(true);
        $query->select('id')
            ->from('#__iproperty_categories')
            ->where('parent = '.(int)$parent)
            ->where('id = '.(int)$child);
        
        $db->setQuery($query);
        if($db->loadResult()){
            return true;
        }else{
            return false;
        }
    }
}
?>
