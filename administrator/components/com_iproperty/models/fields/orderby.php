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

class JFormFieldOrderBy extends JFormFieldList
{
    protected $type = 'Orderby';

    public function getOptions()
	{
        JFactory::getLanguage()->load('com_iproperty', JPATH_ADMINISTRATOR);

        $options = array('ASC'  => JText::_('COM_IPROPERTY_ASCENDING'),
                         'DESC' => JText::_('COM_IPROPERTY_DESCENDING'));
        
        // Merge any additional options in the XML definition.
		if(isset($this->element))
        {            
            $options = array_merge(parent::getOptions(), $options);
            array_unshift($options, JHtml::_('select.option', '', JText::_('COM_IPROPERTY_ORDER')));
        }

		return $options;
    }
}


