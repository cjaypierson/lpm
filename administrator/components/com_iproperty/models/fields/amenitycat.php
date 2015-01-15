<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined('JPATH_BASE') or die;
JFormHelper::loadFieldClass('list');

class JFormFieldAmenityCat extends JFormFieldList
{
    protected $type = 'AmenityCat';

	public function getOptions()
	{
		$options = array( 0 => JText::_('COM_IPROPERTY_GENERAL_AMENITIES'), 
                          1 => JText::_('COM_IPROPERTY_INTERIOR_AMENITIES'), 
                          2 => JText::_('COM_IPROPERTY_EXTERIOR_AMENITIES'));
        
        return $options;
	}
}