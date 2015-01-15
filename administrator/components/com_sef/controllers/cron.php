<?php
/**
 * SEF component for Joomla!
 * 
 * @package   JoomSEF
 * @version   4.4.4
 * @author    ARTIO s.r.o., http://www.artio.net
 * @copyright Copyright (C) 2013 ARTIO s.r.o. 
 * @license   GNU/GPLv3 http://www.artio.net/license/gnu-general-public-license
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

class SEFControllerCron extends SEFController
{
    function display()
    {
        JRequest::setVar('view', 'cron');
        
        parent::display();
    }
    
    /**
     * constructor (registers additional tasks to methods)
     * @return void
     */
    function __construct()
    {
        parent::__construct();
        
        $this->registerTask('apply', 'save');
    }
    
    function save()
    {
        $model = $this->getModel('cron');
        
        if ($model->store())
        {
            $task = JRequest::getCmd('task');
            if( $task == 'save' ) {
                $link = 'index.php?option=com_sef';
            }
            elseif( $task == 'apply' ) {
                $link = 'index.php?option=com_sef&controller=cron';
            }
            $this->setRedirect($link, JText::_('COM_SEF_CRON_SAVE_SUCCESS'));
        }
        else
        {
            $this->setRedirect('index.php?option=com_sef&controller=cron', JText::_('COM_SEF_CRON_SAVE_FAIL'));
        }
    }
    
    function getfile()
    {
        $model = $this->getModel('cron');
        $file = $model->generateFile();
        
        if ($file === false)
        {
            $this->setRedirect('index.php?option=com_sef&controller=cron', JText::_('COM_SEF_CRON_SAVE_FAIL'));
            return;
        }
        
        // Output file
        if (!headers_sent()) {
            header ('Expires: 0');
            header ('Last-Modified: '.gmdate ('D, d M Y H:i:s', time()) . ' GMT');
            header ('Pragma: public');
            header ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header ('Accept-Ranges: bytes');
            header ('Content-Length: ' . strlen($data));
            header ('Content-Type: text/plain');
            header ('Content-Disposition: attachment; filename="joomsef_crontab"');
            header ('Connection: close');
            ob_end_clean(); //flush the mambo stuff from the ouput buffer
            echo $file;
            jexit();
        }
        else {
            $this->setRedirect('index.php?option=com_sef&controller=cron', JText::_('COM_SEF_ERROR_HEADERS'));
        }
    }
}