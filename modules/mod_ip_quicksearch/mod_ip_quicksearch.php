<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

defined('_JEXEC') or die('Restricted access');
require_once('components/com_iproperty/helpers/route.php');

require(JModuleHelper::getLayoutPath('mod_ip_quicksearch', $params->get('layout', 'default')));