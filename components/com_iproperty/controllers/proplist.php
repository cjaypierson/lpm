<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

// Base this controller on the backend version.
require_once JPATH_ADMINISTRATOR.'/components/com_iproperty/controllers/properties.php';

class IpropertyControllerPropList extends IpropertyControllerProperties
{
	protected $view_list = 'manage';
    
    public function __construct($config = array())
	{        
        parent::__construct($config);
        JFactory::getLanguage()->load('com_iproperty', JPATH_ADMINISTRATOR);
	}
		
	public function getModel($name = 'propform', $prefix = '', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	} 
    
    public function checkin()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $model		= $this->getModel();
        $ids        = JFactory::getApplication()->input->post->get('cid', array(), 'array');
        
        //die($model.'===>'.var_dump($ids));
        
        if ($model->checkin($ids) === false) {
            // Check-in failed, go back to the record and display a notice.
            $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError()));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect($this->getReturnPage());

            return false;
        }
                
        $this->setRedirect($this->getReturnPage());
        return true;
    }
      
    protected function getReturnPage()
	{
		$return = JRequest::getVar('return', null, 'default', 'base64');

		if (empty($return) || !JUri::isInternal(base64_decode($return))) {
			return JURI::base();
		}
		else {
			return base64_decode($return);
		}
	}
}
?>