<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

class IpropertyTableSettings extends JTable
{
	public function __construct(&$_db)
	{
		parent::__construct('#__iproperty_settings', 'id', $_db);
	}
}
?>