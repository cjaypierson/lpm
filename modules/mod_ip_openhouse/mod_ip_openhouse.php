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

// Get module data
$items = modIPOpenhouseHelper::getList($params);

if (!$items && $params->get('hide_mod')){
    return false;
}else if(!$items){
    $params->def('layout', 'default_nodata');
}
require(JModuleHelper::getLayoutPath('mod_ip_openhouse', $params->get('layout', 'default')));