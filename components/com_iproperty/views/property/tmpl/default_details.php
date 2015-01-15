<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
$colspan    = ($this->print) ? 12 : 8;
?>

<div class="row-fluid">
    <div class="span12">
        <div class="span<?php echo $colspan; ?> pull-left ip_details_wrapper">
            <div class="row-fluid">
                <div class="span6">
                    <?php if ($this->p->beds): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('COM_IPROPERTY_BEDS'); ?></strong></dt>
                        <dd><?php echo $this->p->beds; ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php if ($this->p->baths && $this->p->baths != '0.00'): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('COM_IPROPERTY_BATHS'); ?></strong></dt>
                        <dd><?php echo $this->p->baths; ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php if ($this->p->sqft): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo (!$this->settings->measurement_units) ? JText::_('Square Footage' ) : JText::_('COM_IPROPERTY_SQM'); ?></strong></dt>
                        <dd><?php echo $this->p->formattedsqft; ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php if ($this->p->lotsize): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('Stories' ); ?></strong></dt>
                        <dd><?php echo $this->p->lotsize; ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php 
                    
                    $misc_details_left = array('lot_type','heat','cool','fuel','siding','roof','reception','tax','income','call_for_price');
                    
                    foreach ($misc_details_left as $mdl)
                    {
                        if ($this->p->$mdl)
                        {
                            if($mdl == 'call_for_price'){
                                if($this->p->$mdl == 0){
                                    $mdv = "No";
                                } elseif($this->p->$mdl == 1){
                                    $mdv = "Yes";
                                } elseif($this->p->$mdl == 2){
                                    $mdv = "Subject to Approval";
                                }
                            } else {
                                $mdv = $this->p->$mdl;
                            }
                            ?>
                            <dl class="dl-horizontal">
                                <dt><strong><?php echo JText::_('COM_IPROPERTY_'.strtoupper($mdl)); ?></strong></dt>
                                <dd><?php echo $mdv; ?></dd>
                            </dl>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="span6">
                    <?php 
                    $misc_details_right = array('yearbuilt','zoning','propview','school_district','style','garage_type','garage_size');
                    foreach ($misc_details_right as $mdr)
                    {
                        if ($this->p->$mdr)
                        {
							if($mdr == 'yearbuilt'){
								$tag = 'year_built';
							} else {
								$tag = $mdr;
							}
                            ?>
                            <dl class="dl-horizontal">
                                <dt><strong><?php echo JText::_('COM_IPROPERTY_'.strtoupper($tag)); ?></strong></dt>
                                <dd><?php echo $this->p->$mdr; ?></dd>
                            </dl>
                            <?php
                        }
                    }
                    ?>
                    <?php if($this->settings->adv_show_wf && $this->p->frontage): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('COM_IPROPERTY_FRONTAGE'); ?></strong></dt>
                        <dd><?php echo JText::_('COM_IPROPERTY_YES'); ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php if($this->settings->adv_show_reo && $this->p->reo): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('COM_IPROPERTY_REO'); ?></strong></dt>
                        <dd><?php echo JText::_('COM_IPROPERTY_YES'); ?></dd>
                    </dl>
                    <?php endif; ?>
                    <?php if($this->settings->adv_show_hoa && $this->p->hoa): ?>
                    <dl class="dl-horizontal">
                        <dt><strong><?php echo JText::_('COM_IPROPERTY_HOA'); ?></strong></dt>
                        <dd><?php echo JText::_('COM_IPROPERTY_YES'); ?></dd>
                    </dl>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(!$this->print): ?>
        <div class="span4 ip-summary-sidecol">
            <?php echo $this->loadTemplate('sidebar'); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
