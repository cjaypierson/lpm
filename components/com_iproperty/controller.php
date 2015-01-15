<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined('_JEXEC' ) or die('Restricted access');
jimport('joomla.application.component.controller');
jimport('joomla.error.log');

class ipropertyController extends JControllerLegacy
{
    var $log;
    var $debug;

    public function __construct()
    {
        $this->debug = false;
        if($this->debug) $this->log =JLog::getInstance('iproperty.log.php'); // create the logfile TODO: maybe add a debug switch to the admin to turn this off or on
        if($this->debug) $this->log->addEntry(array('COMMENT' => 'Constructing IProperty'));
        
        parent::__construct();       
    }
    
    public function display($cachable = false, $urlparams = false)
	{
		$app            = JFactory::getApplication();
        $document       = JFactory::getDocument();
        $settings       = ipropertyAdmin::config();
        $ipversion      = ipropertyAdmin::_getversion();
        ipropertyHTML::includeIpScripts();
        
        if( $settings->offline == 1 ){
            echo '
                <div align="center" class="ip-offline">
                    '.JHtml::_('image', 'components/com_iproperty/assets/images/iproperty.png', JText::_('COM_IPROPERTY_NO_ACCESS')).'
                    <div>' . $settings->offmessage . '</div>
                </div>';
        }else{
            // make sure bootstrap framework and css is loaded            
            JHtml::_('bootstrap.framework');
            
            if($settings->bootstrap_css){
                $lang = JFactory::getLanguage();
                $lang_direction = $lang->isRTL() ? 'rtl' : 'ltr';
                JHtml::_('bootstrap.loadCss', true, $lang_direction);
            }
            
            // Set predefined 'get' vars from menu item params
            $pdarray = array('cat', 'stype', 'city', 'locstate', 'province', 'county', 'region', 'country', 'beds', 'baths', 'price_low', 'price_high', 'filter_order', 'filter_order_dir', 'filter_order_Dir', 'hoa', 'reo', 'waterfront');
            foreach($pdarray as $pd){
                if($app->getParams()->get($pd) && !$app->input->getInt('ipquicksearch')){
                    $app->input->set($pd, $app->getParams()->get($pd), 'get');
                }
            }
            // end predefined vars           
        
            $cachable       = true;
            $editid         = $app->input->getUint('id');
            $vName          = $app->input->getCmd('view', 'home');
            
            // add additional models for manage view
            if ($vName == 'manage')
            {
                $vType       = $document->getType();
                $view        = $this->getView($vName, $vType);

                switch($app->input->get('layout'))
                {
                    case 'proplist':
                        default:                            
                        $model = $this->getModel('proplist', 'ipropertymodel');
                        break;
                    case 'agentlist':
                        $model = $this->getModel('agentlist', 'ipropertymodel');
                        break;
                    case 'companylist':
                        $model = $this->getModel('companylist', 'ipropertymodel');
                        break;
                }
                $view->setModel($model, true);
            }
            
            $app->input->set('view', $vName);

            $safeurlparams = array('cat'=>'INT','id'=>'INT','cid'=>'ARRAY','limit'=>'INT','limitstart'=>'INT',
                'showall'=>'INT','return'=>'BASE64','search'=>'STRING','filter_order'=>'CMD','filter_order_dir'=>'CMD','filter_order_Dir'=>'CMD',
                'stype'=>'INT','print'=>'BOOLEAN','city'=>'STRING','locstate'=>'INT','province'=>'STRING','county'=>'STRING',
                'region'=>'STRING','country'=>'INT','beds'=>'INT','baths'=>'INT','price_low'=>'INT','price_high'=>'INT',
                'hoa'=>'INT','reo'=>'INT','waterfront'=>'INT','print'=>'BOOLEAN','lang'=>'CMD');

            if ($vName !== 'feed') echo '<!-- Iproperty v'.$ipversion['iproperty'].' by The Thinkery. http://thethinkery.net -->';
            parent::display($cachable, $safeurlparams);

            return $this;
        }
	}
}
?>