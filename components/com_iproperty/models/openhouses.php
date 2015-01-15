<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

// Base this model on the allproperties model.
require_once __DIR__ . '/allproperties.php';

class IpropertyModelOpenhouses extends IpropertyModelAllProperties
{
	protected function getListQuery($featured = false)
	{
        $where  = $this->getWhere();         
        $sort   = ($featured) ? 'RAND()' : $this->getState('list.ordering');
        $order  = ($featured) ? '' : $this->getState('list.direction');
        if($featured) $where['property']['featured'] = 1;
        
        $pquery = new IpropertyHelperQuery($this->_db, $sort, $order);
        $query  = $pquery->buildPropertyQuery($where, 'openhouse');       
        
		return $query;
	}
}

?>