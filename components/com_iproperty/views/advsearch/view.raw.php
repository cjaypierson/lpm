<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
jimport('joomla.application.component.view');

class IpropertyViewAdvsearch extends JViewLegacy
{
	function display()
	{        
        $document       = JFactory::getDocument();
		$model          = $this->getModel();
		$properties		= $this->get('data');
        
		$this->assignRef('properties', $properties);        
        return $this->properties;
	}
}
?>