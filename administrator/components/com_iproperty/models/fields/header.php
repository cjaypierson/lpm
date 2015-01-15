<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined('JPATH_BASE') or die;

class JFormFieldHeader extends JFormField
{
	protected $type = 'Header';

	protected function getInput()
    {
		return;
	}

	protected function getLabel()
	{       
        // which type of alert tag should this be?
        $tag = ($this->element['tag']) ? $this->element['tag'] : 'info';

		echo '<div class="clearfix"></div>';
        if ($this->element['default']) {
            echo '<div class="alert alert-'.$tag.'">';
                if($this->element['description'] && $this->element['description'] != ""){
                    echo '<span class="hasTip" title="'.JText::_($this->element['default']).'::'.JText::_($this->element['description']).'"><strong>'. JText::_($this->element['default']) . '</strong></span>';
                }else{
                    echo '<strong>'. JText::_($this->element['default']) . '</strong>';
                }
            echo '</div>';
		} else {
			return parent::getLabel();
		}
		echo '<div class="clearfix"></div>';
    }
}