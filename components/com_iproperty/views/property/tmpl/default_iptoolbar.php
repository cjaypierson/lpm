<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('bootstrap.modal');
?>

<ul class="nav nav-tabs ip-actions hidden-tablet hidden-phone pull-right">
    <?php if ($this->ipauth->canEditProp($this->p->id)): ?>           
        <li> <?php echo JHtml::_('icon.edit', $this->p, 'property', true,  array('class'=>'btn hasTooltip')); ?></li>
    <?php endif; ?>
    <?php if ($this->settings->show_print): ?> 
        <li> <?php echo JHtml::_('icon.print_popup', $this->p, array('class'=>'btn hasTooltip'), 820, 480); ?></li>
    <?php endif; ?>
    <?php if ($this->p->price AND $this->p->price != '0.00' AND $this->settings->show_mtgcalc): ?>
        <li> <?php echo JHtml::_('icon.generic_button', '#calcModal', 'icon-search', array('title'=>JText::_('COM_IPROPERTY_MTG_CALCULATOR'), 'role'=>'button', 'data-toggle'=>'modal', 'class'=>'btn hasTooltip btn-fade')); ?></li>
    <?php endif; ?>
    <?php if ($this->settings->show_saveproperty): ?>
        <li> <?php echo JHtml::_('icon.generic_button', '#saveModal', 'icon-save', array('title'=>JText::_('COM_IPROPERTY_SAVE'), 'role'=>'button', 'data-toggle'=>'modal', 'class'=>'btn hasTooltip btn-fade')); ?></li>
        <li> <?php echo JHtml::_('icon.generic_button', JRoute::_(ipropertyHelperRoute::getIpuserRoute()), 'icon-list', array('title'=>JText::_('COM_IPROPERTY_MY_FAVORITES').'::'.JText::_( 'COM_IPROPERTY_MY_FAVORITES_TIP'), 'class'=>'btn hasTooltip')); ?></li>
    <?php endif; ?>
</ul>
<?php echo $this->loadTemplate('calculator'); ?>
<?php echo $this->loadTemplate('usersave'); ?> 
<div class="clearfix"></div>