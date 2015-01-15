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
        <div class="span<?php echo $colspan; ?> pull-left ip-desc-wrapper">
            <?php
                echo JHTML::_('content.prepare', $this->p->description );
                echo '<hr />';
                if($this->amenities)
                {
                    $amenities = array(
                        'general' => array(),
                        'interior' => array(),
                        'exterior' => array()
                    );
                    foreach ($this->amenities as $amen)
                    {
                        switch ($amen->cat)
                        {
                            case 0:
                                $amenities['general'][] = $amen;
                                break;
                            case 1:
                                $amenities['interior'][] = $amen;
                                break;
                            case 2:
                                $amenities['exterior'][] = $amen;
                                break;
                            default:
                                $amenities['general'][] = $amen;
                                break;
                        }
                    }

                    foreach($amenities as $k => $a)
                    {
                        $amen_n     = (count($a));
                        if($amen_n > 0) 
                        {
                            switch($k)
                            {
                                case 'general':
                                    $amen_label = JText::_('COM_IPROPERTY_GENERAL_AMENITIES');
                                    break;
                                case 'interior':
                                    $amen_label = JText::_('COM_IPROPERTY_INTERIOR_AMENITIES');
                                    break;
                                case 'exterior':
                                    $amen_label = JText::_('COM_IPROPERTY_EXTERIOR_AMENITIES');
                                    break;
                            }
                            $amen_left  = '';
                            $amen_right = '';

                            for ($i = 0; $i < $amen_n; $i++)
                            {
                                if ($i < ($amen_n/2))
                                {
                                    $amen_left  = $amen_left.'<li class="ip_checklist"><span class="icon-ok"></span> '.$a[$i]->title.'</li>';
                                }
                                elseif ($i >= ($amen_n/2))
                                {
                                    $amen_right = $amen_right.'<li class="ip_checklist"><span class="icon-ok"></span> '.$a[$i]->title.'</li>';
                                }
                            }


                            echo '
                                <div class="row-fluid">
                                    <h5><strong>'.$amen_label.'</strong></h5>
                                    <div class="span12">                                        
                                        <div class="span6">
                                            <ul class="nav nav-stacked ip-amen-left">'.$amen_left.'</ul>
                                        </div>
                                        <div class="span6">
                                            <ul class="nav ip-amen-right">'.$amen_right.'</ul>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                }
                if($this->p->terms) echo '<div class="ip-terms">'.$this->p->terms.'</div>';
            ?>
        </div>
        <?php if(!$this->print): ?>
        <div class="span4 ip-summary-sidecol">
            <?php echo $this->loadTemplate('sidebar'); ?>
        </div>
        <?php endif; ?>
    </div>
</div>