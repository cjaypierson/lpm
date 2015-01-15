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

if($app->input->get('task') == 'ip_mls_search')
{
    if ($mlsid = $app->input->get('ip_mls_search')){
        $propid = modMlsSearchHelper::getPropId($mlsid);

        if (!$propid) {
            JError::raiseNotice('SOME ERROR CODE', JText::_('MOD_IP_MLSSEARCH_NO_RESULTS'));
        } else {
            $available_cats = ipropertyHTML::getAvailableCats((int)$propid);
            $first_cat      = $available_cats[0];
            $app->redirect(JRoute::_(ipropertyHelperRoute::getPropertyRoute($propid, $first_cat, true), false));
        }
    } else {
        JError::raiseNotice('SOME ERROR CODE', JText::_('MOD_IP_MLSSEARCH_ENTER_REF'));
    }
}
require(JModuleHelper::getLayoutPath('mod_ip_mlssearch', $params->get('layout', 'default')));