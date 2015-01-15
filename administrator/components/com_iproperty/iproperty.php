<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_iproperty')) {
	return JError::raise(E_WARNING, 404, JText::_('JERROR_ALERTNOAUTHOR'));
}

require_once (JPATH_COMPONENT.'/controller.php');
require_once (JPATH_COMPONENT.'/classes/admin.class.php');
require_once (JPATH_COMPONENT.'/classes/icon.class.php');
require_once (JPATH_COMPONENT.'/helpers/iproperty.php');
require_once (JPATH_COMPONENT_SITE.'/helpers/html.helper.php');
require_once (JPATH_COMPONENT_SITE.'/helpers/query.php');
require_once (JPATH_COMPONENT_SITE.'/helpers/auth.php');

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Iproperty');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();