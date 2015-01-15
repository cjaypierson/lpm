<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

defined('_JEXEC') or die('Restricted access');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/html.helper.php');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/route.php');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/query.php');

class modIPAgentHelper
{
    public static function getList(&$params)
    {
        $db     = JFactory::getDbo();
        $count  = (int)$params->get('count', 5); 
        $where 	= array();       

        // Filter by featured
        if($params->get('featured')){
            $where[] = 'a.featured = 1';
        }

        // Filter by city
        if($params->get('city')){
            $where[] = 'a.city = '.$db->Quote($params->get('city'));
        }

        // Filter by company.
		$companyId = $params->get('company');
		if ($companyId && is_numeric($companyId)) {
			$where[] = 'a.company = '.(int) $companyId;
		}
        
        $query  = IpropertyHelperQuery::buildAgentsQuery($db, $where);
        $query->order('RAND()');        
        $db->setQuery($query, 0, $count);
        
        return $db->loadObjectList();
    }    
}
