<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
jimport('joomla.application.component.controllerform');

class IpropertyControllerSettings extends JControllerForm
{
	protected $text_prefix = 'COM_IPROPERTY';
    protected $context = 'settings';
    
    public function checkEditId($context, $recordid){
        return true;
    }

    protected function allowEdit($data = array(), $key = 'id')
	{
        $allow  = parent::allowEdit($data, $key);
        
        // Check if the user should be in this editing area
        $auth   = new ipropertyHelperAuth();
        $allow  = $auth->getAdmin();

        return $allow;
	}
    
    public function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_iproperty', false));
	}
}
?>