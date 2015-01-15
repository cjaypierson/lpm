<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined('JPATH_BASE') or die;

class JFormFieldAmenity extends JFormField
{
    protected $type = 'Amenity';

	protected function getInput()
	{
		$document = JFactory::getDocument();
        $document->addScript('components/com_iproperty/assets/js/addInput.js');
        
        $amen_language = "
        window.AmenLocale = {
            'general': '".addslashes(JText::_('COM_IPROPERTY_GENERAL_AMENITIES'))."',
            'interior': '".addslashes(JText::_('COM_IPROPERTY_INTERIOR_AMENITIES'))."',
            'exterior': '".addslashes(JText::_('COM_IPROPERTY_EXTERIOR_AMENITIES'))."'
        }";

        JFactory::getDocument()->addScriptDeclaration($amen_language);
        ?>
        <p><?php echo JText::_('COM_IPROPERTY_AMENITY_DESC'); ?></p>
        <div class="btn-group pull-left">
            <button class="btn btn-danger" type="button" onclick="deleteInput();"><i class="icon-minus"></i></button>
            <button class="btn btn-success" type="button" onclick="addInput();"><i class="icon-plus"></i></button>
        </div>
        <div class="clearfix"></div>
        <hr />
        <div class="span12" id="parah" style="text-align: center;"></div>
        <?php
	}
}


