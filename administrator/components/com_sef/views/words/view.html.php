<?php
/**
 * SEF component for Joomla!
 * 
 * @package   JoomSEF
 * @version   4.4.4
 * @author    ARTIO s.r.o., http://www.artio.net
 * @copyright Copyright (C) 2013 ARTIO s.r.o. 
 * @license   GNU/GPLv3 http://www.artio.net/license/gnu-general-public-license
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class SefViewWords extends SefView
{
	function display($tpl = null)
	{
	    $icon = 'manage-words.png';
		JToolBarHelper::title(JText::_('COM_SEF_JOOMSEF_WORDS_MANAGER'), $icon);
		
        $this->assign($this->getModel());
        
        JToolBarHelper::addNew();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList(JText::_('COM_SEF_REALLY_DELETE'));
        JToolBarHelper::spacer();
        JToolBarHelper::back('Back', 'index.php?option=com_sef');
        
		// Get data from the model
        $this->assignRef('items', $this->get('Data'));
        $this->assignRef('total', $this->get('Total'));
        $this->assignRef('lists', $this->get('Lists'));
        $this->assignRef('pagination', $this->get('Pagination'));
        
        JHTML::_('behavior.tooltip');
        
		parent::display($tpl);
	}

}
