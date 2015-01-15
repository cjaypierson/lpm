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

require_once (JPATH_ADMINISTRATOR.'/components/com_iproperty/classes/admin.class.php');

class JFormFieldSortBy extends JFormFieldList
{
    protected $type = 'sortby';

    public function getOptions()
	{       
        JFactory::getLanguage()->load('com_iproperty', JPATH_ADMINISTRATOR);
        $options    = array();
        
        $settings   = ipropertyAdmin::config();
        $munits     = (!$settings->measurement_units) ? JText::_( 'COM_IPROPERTY_SQFTDD' ) : JText::_( 'COM_IPROPERTY_SQMDD' );
        
        if($settings->showtitle) $options['p.title'] = JText::_( 'COM_IPROPERTY_TITLE' );
        $options['p.street']    = JText::_( 'COM_IPROPERTY_STREET' );
        $options['p.beds']      = JText::_( 'COM_IPROPERTY_BEDS' );
        //$options['p.baths']     = JText::_( 'COM_IPROPERTY_BATHS' );
        $options['p.sqft']      = $munits;
        $options['p.price']     = JText::_( 'COM_IPROPERTY_PRICE' );
        //$options['p.created']   = JText::_( 'COM_IPROPERTY_LISTED_DATE' );
        //$options['p.modified']  = JText::_( 'COM_IPROPERTY_MODIFIED_DATE' );
        
        // Merge any additional options in the XML definition.
		if(isset($this->element))
        {            
            $options = array_merge(parent::getOptions(), $options);
            array_unshift($options, JHtml::_('select.option', '', JText::_('COM_IPROPERTY_SORT')));
        }

		return $options;
    }
}