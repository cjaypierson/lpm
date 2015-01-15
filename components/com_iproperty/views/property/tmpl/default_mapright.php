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

$details_array = array( "beds"         => JText::_('COM_IPROPERTY_BEDS' ),
                 "baths"        => JText::_('COM_IPROPERTY_BATHS' ),
                 "formattedsqft"         => (!$this->settings->measurement_units) ? JText::_('Square Footage' ) : JText::_('COM_IPROPERTY_SQM' ),
                 "lotsize"      => JText::_('Stories' ),
                 //"lot_acres"    => JText::_('COM_IPROPERTY_LOT_ACRES' ),
                 "yearbuilt"    => JText::_('COM_IPROPERTY_YEAR_BUILT' ),
                 "heat"         => JText::_('COM_IPROPERTY_HEAT' ),
                 "garage_type"  => JText::_('Garage:' ),
                 "call_for_price"         => JText::_('COM_IPROPERTY_CALL_FOR_PRICE' ));

foreach ($details_array as $key=>$value)
{
    if ($this->p->$key AND $this->p->$key != '0.0')
    {
        if ($value == 'Pets Allowed') {
            if ($this->p->$key == '2') {
                echo '
                <dl class="clearfix ip-mapright-'.$key.'">
                    <dt class="pull-left">'.$value.'</dt>
                    <dd class="pull-right">Subject to Approval</dd>
                </dl>';
            }
            elseif ($this->p->$key == '1') {
                echo '
                <dl class="clearfix ip-mapright-'.$key.'">
                    <dt class="pull-left">'.$value.'</dt>
                    <dd class="pull-right">Yes</dd>
                </dl>';
            }
            elseif ($this->p->$key == '0') {
                echo '
                <dl class="clearfix ip-mapright-'.$key.'">
                    <dt class="pull-left">'.$value.'</dt>
                    <dd class="pull-right">No</dd>
                </dl>';    
            }
        } else {
        echo '
        <dl class="clearfix ip-mapright-'.$key.'">
            <dt class="pull-left">'.$value.'</dt>
            <dd class="pull-right">'.$this->p->$key.'</dd>
        </dl>';
        }
    }
}
?>
