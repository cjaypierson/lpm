<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');
jimport('joomla.application.component.controller');

// temporary
require_once(JPATH_COMPONENT_SITE.'/helpers/data.php');

class IpropertyControllerAjax extends JControllerLegacy
{
    protected $text_prefix = 'COM_IPROPERTY';

    public function ajaxSearch()
    {
        JSession::checkToken('get') or jexit('Invalid Token');

        $jinput         = JFactory::getApplication()->input;

        $config                 = array();
        $config['where']        = $jinput->get('searchvars' , ''        , 'ARRAY');
        $config['limitstart']   = $jinput->get('limitstart' , '0'       , 'INT');
        $config['limit']        = $jinput->get('limit'      , '25'      , 'INT');
        $config['orderby']      = $jinput->get('sort'       , 'p.price' , 'STRING');
        $config['direction']    = $jinput->get('order'      , 'DESC'    , 'STRING');
        $itemid                 = $jinput->get('itemid'     , ''        , 'INT');
        
        $model          = $this->getModel('advsearch', '', $config);
        $properties     = $model->getItems();

        if (!$properties){
            echo json_encode(ipropertyHTML::createReturnObject('error', 'FAILED TO RETURN DATA FROM ADV SEARCH MODEL'));
            die();
        }

        echo json_encode($properties);
        return;
    }

    public function deleteSaved()
    {
        JSession::checkToken() or die( 'Invalid Token!');

        $app    = JFactory::getApplication();
        $id     = $app->input->post->getUint('editid');

        if (!$id) {
            echo JText::_('COM_IPROPERTY_INVALID_ID_OR_TYPE_PASSED');
            return false;
        }

        $model = $this->getModel('ipuser');
        if($model->deleteSaved($id)){
            echo json_encode('true');
        }else{
            return false;
        }
    }

    public function checkUserAgent()
    {
        // Check for request forgeries
        JSession::checkToken() or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $user_id    = $app->input->getInt('user_id');
        $agent_id   = $app->input->getInt('agent_id', 0);

        if(!$user_id) return false;

        $db     = JFactory::getDbo();
        $query  = $db->getQuery(true);

        $query->select('id');
        $query->from('#__iproperty_agents');
        $query->where('user_id = '.(int)$user_id);
        $query->where('id != '.(int)$agent_id);
        $db->setQuery($query);

        echo $db->loadResult();
    }

    public function checkUserEmail()
    {
        JSession::checkToken() or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $email      = $app->input->getString('email');
        $agent_id   = $app->input->getInt('agent_id', 0);
        if(!$email) return false;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('id');
        $query->from('#__iproperty_agents');
        $query->where('email = '.$db->Quote($email));
        $query->where('id != '.(int)$agent_id);
        $db->setQuery($query);

        echo $db->loadResult();
    }

    /**********************
     * Gallery functions
     **********************/

    public function ajaxLoadGallery()
    {
        /**
        * Pulls images from IP images table
        *
        * @param integer $propid ID of property
        * @param integer $own Whether we want only our own images or all avail
        * @param integer $limitstart Starting record id
        * @param integer $limit Max rows to return
        * @param string $token Joomla token
        * @return JSON encoded image data
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app    = JFactory::getApplication();
        $model  = $this->getModel('gallery');

        $propid     = $app->input->getInt('propid');
        $own        = $app->input->getInt('own');
        $limitstart = $app->input->getInt('limitstart');
        $limit      = $app->input->getInt('limit');
        $filter     = $app->input->getString('filter');
        $type       = $app->input->getBool('type', 0); // 0 for image, 1 for doc

        if (!$propid ){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO PROPERTY ID INCLUDED')));
            die();
        }

        echo json_encode($model->loadGallery($propid, $own, $limitstart, $limit, $type, $filter));
    }

    public function ajaxDelete()
    {
        /**
        * Deleted image from IP images table, and deleted image file if it's not in use with other listing
        *
        * @param integer $rowid ID of image
        * @param string $token Joomla token
        * @return true or false
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app    = JFactory::getApplication();
        $model  = $this->getModel('gallery');
        $rowid  = $app->input->getInt('img');

        if (!$rowid ){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO IMAGE ID INCLUDED')));
            die();
        }
        echo json_encode($model->delete($rowid));
    }

    public function ajaxAdd()
    {
        /**
        * Add existing image to IP listing
        *
        * @param integer $propid ID of property
        * @param integer $rowid ID of image
        * @param string $token Joomla token
        * @return true or false
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app    = JFactory::getApplication();
        $model  = $this->getModel('gallery');

        $propid     = $app->input->getInt('propid');
        $rowid      = $app->input->getInt('imgid');

        if (!$propid ){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO LISTING ID INCLUDED')));
            die();
        }

        echo json_encode($model->ajaxAddImage($propid, $rowid));
    }

    public function ajaxSort()
    {
        /**
        * Save image order
        *
        * @param string $order JSON encoded sort data for property
        * @param string $token Joomla token
        * @return true or false
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $jinput = JFactory::getApplication()->input;
        $model  = $this->getModel('gallery');

        $order      = $jinput->get('order', false, 'STRING');
        $order      = json_decode($order);

        if(!is_array($order)){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO SORT ARRAY INCLUDED'), $order));
            jexit();
        }
        echo json_encode($model->ajaxSort($order));
    }

    public function ajaxSaveImageTags()
    {
        /**
        * Save image title/desc for listing
        *
        * @param string $title JSON encoded title for property
        * @param string $descr JSON encoded description for property
        * @param string $token Joomla token
        * @return true or false
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app    = JFactory::getApplication();
        $model  = $this->getModel('gallery');

        $id         = $app->input->getInt('imgid');
        $title      = $app->input->getString('title');
        $descr      = $app->input->getString('descr');

        echo json_encode($model->ajaxSaveImageTags($id, $title, $descr));
    }

    public function ajaxUploadRemote()
    {
        /**
        * Save remote image for listing
        *
        * @param int $propid ID of property
        * @param string $path Remote file location
        * @param string $token Joomla token
        * @return true or false
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app    = JFactory::getApplication();
        $model  = $this->getModel('gallery');

        $propid     = $app->input->getInt('propid');
        $path       = $app->input->getString('path');

        if (!$propid ){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO PROPID INCLUDED')));
            die();
        }
        echo json_encode($model->uploadRemote($propid, $path));
    }


    public function ajaxUpload()
    {
        /**
        * Upload image for listing, resize, rename, move
        *
        * @param int $propid ID of property
        * @param string $file Local file info array
        * @param string $token Joomla token
        * @return success or failure message
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $model      = $this->getModel('gallery');

        $propid     = $app->input->getInt('propid');
        $files      = JRequest::get('FILES'); // this should be an array
        //$files      = $app->input->get('FILES'); // new get->input doesn't work with FILES
        $status     = array();

        if (!isset($_FILES['file']['tmp_name']) && !is_uploaded_file($_FILES['file']['tmp_name'])) {
            $status[] = $model->createReturnObject('error', JText::_('INVALID UPLOAD'));
            echo json_encode($status);
            die();
        }

        if (!$propid || (count($files) < 1)){
            $status[] = ipropertyHTML::createReturnObject('error', JText::_('NO ID INCLUDED OR NO FILE ARRAY FOUND'));
            echo json_encode($status);
            die();
        }

        foreach($files as $file){
            $status[]     = $model->uploadIMG($file, $propid);
        }
        echo json_encode($status);
    }

    public function ajaxIconUpload()
    {
        /**
        * Upload image for listing, resize, rename, move
        *
        * @param int $propid ID of property
        * @param string $file Local file info array
        * @param string $folder (agents or companies) 
        * @param string $token Joomla token
        * @return success or failure message
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $model      = $this->getModel('gallery');

        $folder     = $app->input->get('target');
        $files      = JRequest::get('FILES'); // this should be an array
        //$files      = $app->input->get('FILES'); // this should be an array
        $id         = $app->input->getInt('id');
        $status     = array();

        if (!isset($_FILES['file']['tmp_name']) && !is_uploaded_file($_FILES['file']['tmp_name'])) {
            $status[] = ipropertyHTML::createReturnObject('error', JText::_('INVALID UPLOAD'));
            echo json_encode($status);
            die();
        }

        if (!$id || (count($files) < 1)){
            $status[] = ipropertyHTML::createReturnObject('error', JText::_('NO ID INCLUDED OR NO FILE ARRAY FOUND'));
            echo json_encode($status);
            die();
        }

        foreach($files as $file){
            $status[]     = $model->iconUpload($file, $id, $folder);
        }

        echo json_encode($status);
    }
    
    public function ajaxIconReset()
    {
        /**
        * Reset image for agent or company
        *
        * @param int $propid ID of property
        * @param string $folder (agents or companies)
        * @param string $token Joomla token
        * @return success or failure message
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $model      = $this->getModel('gallery');

        $folder     = $app->input->get('target');
        $id         = $app->input->getInt('id');

        if (!$id ){
            echo json_encode(ipropertyHTML::createReturnObject('error', JText::_('NO ID INCLUDED OR NO FILE ARRAY FOUND')));
            die();
        }   
        echo json_encode($model->iconReset($id, $folder));
    }

    public function ajaxAutocomplete()
    {
        /**
        * Get json encoded list of DB values
        * @param string $field BD field to filter
        * @param string $token Joomla token
        * @return json_encoded list of values
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $app        = JFactory::getApplication();
        $field      = $app->input->getString('field');
        $db         = JFactory::getDbo();

        $query      = $db->getQuery(true);
        $query->select('DISTINCT '.$db->quoteName($field))
            ->from('#__iproperty')
            ->groupby($db->quoteName($field));

        $db->setQuery($query);
        $data = $db->loadColumn();

        echo json_encode($data);
    }

    public function ajaxGetInputs()
    {
        /**
        * Get inputs for drop downs in adv search and quick search
        *
        * @param string $input Name of input to build
        * @param array $currentvals Array of current selected property options 
        * @param string $token Joomla token
        * @return json object of inputs a or failure message
        */
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');

        $input          = JRequest::getVar('input');
        $currentvals    = json_decode(JRequest::getVar('currentvals'), true);
        $return         = ipropertyHelperData::getInputs($input, $currentvals);

        echo json_encode($return);
    }
    
    public function changeUpdateStatus()
    {
        JSession::checkToken() or die( 'Invalid Token!');
        
        $app    = JFactory::getApplication();
        
        $id     = $app->input->getInt('editid');
        $model  = $this->getModel('ipuser');

        // update email status in saved row
        echo json_encode($model->updateEmailSubscribe($id));
    }
    
    public function getLocOptions()
    {
        // Check for request forgeries
        JSession::checkToken('get') or die( 'Invalid Token');
        
        $callback   = JRequest::getVar('callback');
        $loctype    = JRequest::getVar('loctype');
        $parent     = JRequest::getVar('parent');
        $parent_id  = JRequest::getVar('id');
        $predefines = JRequest::getVar('pdvals');
        
        // Pass this the parent value and field
        //$currentvals = array('locstate'=>48);
        $currentvals = array();
        if($predefines){
            $pdarray = json_decode($predefines);
            foreach($pdarray as $key => $value){
                $currentvals[$key] = $value;
            }
        }
        if($parent && $parent_id){
            $currentvals[$parent] = $parent_id;
        }
        
        $return         = ipropertyHelperData::getInputs($loctype, $currentvals);

        if($return['data'] && !empty($return['data'])){
            $response = json_encode($return['data']);
            if(isset($callback)) { //json padding
                echo $callback."(".$response.")";
            } else {
                echo $response;	
            }
        }else{
            // no response,  kill it
            die();
        }
    }
}
?>
