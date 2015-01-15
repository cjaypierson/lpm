<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the helper functions only once
require_once (dirname(__FILE__).'/helper.php');

$items = modIPSlideshowGalleriaHelper::getList($params);

if (!$items && $params->get('hide_mod', 1)){
    return false;
}else if(!$items){
    $params->def('layout', 'default_nodata');
}else{
    modIPSlideshowGalleriaHelper::loadScripts($params, $items);
}
require(JModuleHelper::getLayoutPath('mod_ip_slideshow_galleria', $params->get('layout', 'default')));
