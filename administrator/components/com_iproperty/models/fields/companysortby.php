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

class JFormFieldCompanySortBy extends JFormFieldList
{
    protected $type = 'CompanySortby';

    public function getOptions()
	{
        JFactory::getLanguage()->load('com_iproperty', JPATH_ADMINISTRATOR);
        
        $options = array('name' => JText::_('COM_IPROPERTY_NAME'),
                         'city' => JText::_('COM_IPROPERTY_CITY'));
        
        // Merge any additional options in the XML definition.
		if(isset($this->element))
        {            
            $options = array_merge(parent::getOptions(), $options);
            array_unshift($options, JHtml::_('select.option', '', JText::_('COM_IPROPERTY_SORT')));
        }

		return $options;
    }
}


