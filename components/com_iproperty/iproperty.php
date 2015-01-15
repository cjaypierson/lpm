<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
jimport('joomla.application.component.controller');

require_once(JPATH_COMPONENT_ADMINISTRATOR.'/classes/admin.class.php');
require_once(JPATH_COMPONENT.'/helpers/auth.php');
require_once(JPATH_COMPONENT.'/helpers/html.helper.php');
require_once(JPATH_COMPONENT.'/helpers/property.php');
require_once(JPATH_COMPONENT.'/helpers/query.php');
require_once(JPATH_COMPONENT.'/helpers/route.php');

$controller = JControllerLegacy::getInstance('Iproperty');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>