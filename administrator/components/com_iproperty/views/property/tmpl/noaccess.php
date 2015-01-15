<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
?>

<table class="admintable" width="100%">
    <tr>
        <td valign="top" width="75%">
            <div style="padding: 10px;">
                <div style="padding: 10px; text-align: center;">
                  <?php
                    echo JHTML::_('image', 'administrator/components/com_iproperty/assets/images/iproperty_admin_logo.gif', 'Intellectual Property :: By The Thinkery' ).'<br />'.
                    JText::_('COM_IPROPERTY_SORRY_NO_ACCESS');

                    if($this->getError()){
                        echo '<br /><br /><div class="invalid" style="padding: 10px;">'.$this->getError().'</div>';
                    }
                  ?>
                </div>
            </div>
        </td>
    </tr>
</table>
<?php echo ipropertyAdmin::footer( ); ?>