<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

require(JPATH_SITE.'/components/com_contact/models/rules/contactemailsubject.php');

/**
 * JFormRule for com_iproperty to make sure the subject contains no banned word.
 * Uses banned subject list from the com_contact configuration - extend here if needed
 *
 * @package     Joomla.Site
 * @subpackage  com_iproperty
 */
class JFormRuleIpropertyEmailSubject extends JFormRuleContactEmailSubject
{
}
