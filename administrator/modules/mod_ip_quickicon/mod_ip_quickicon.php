<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access');

// Include the helper functions only once
require_once (dirname(__FILE__).'/helper.php');

// Get module data
$buttons = modIpQuickIconHelper::getButtons();

require JModuleHelper::getLayoutPath('mod_ip_quickicon', $params->get('layout', 'default'));