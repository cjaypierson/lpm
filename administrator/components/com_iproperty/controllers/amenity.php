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

class IpropertyControllerAmenity extends JControllerForm
{
	protected $text_prefix = 'COM_IPROPERTY';
    
    protected function allowAdd($data = array())
	{
        $allow  = parent::allowAdd($data);
        
        // Check if the user should be in this editing area
        $auth   = new ipropertyHelperAuth();
        $allow  = $auth->getAdmin();
        
        return $allow;
	}

    protected function allowEdit($data = array(), $key = 'id')
	{
        $allow  = parent::allowEdit($data, $key);
        
        // Check if the user should be in this editing area
        $auth   = new ipropertyHelperAuth();
        $allow  = $auth->getAdmin();

        return $allow;
	}

    public function add()
    {
        $this->setRedirect('index.php?option=com_iproperty&view=amenity&layout=add', false);
        return;
    }
}
?>
