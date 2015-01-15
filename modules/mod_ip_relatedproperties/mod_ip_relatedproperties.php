<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

defined('_JEXEC') or die('Restricted access');

// Include the helper functions only once
require_once (dirname(__FILE__).'/helper.php');

$app = JFactory::getApplication();

// check if a user is currently viewing a property
if(($app->input->get('option') == 'com_iproperty') && ($app->input->get('view') == 'property') && ($app->input->getInt('id') != 0))
{  
    // Get module data
    $items = modIPRelatedHelper::getList($params, $app->input->getInt('id'));
    
    if (!$items && $params->get('hide_mod', 1)){
        return false;
    }else if(!$items){
        $params->def('layout', 'default_nodata');
    }   
}else{
    return false;
}
require(JModuleHelper::getLayoutPath('mod_ip_relatedproperties', $params->get('layout', 'default')));