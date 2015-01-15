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

$document   = JFactory::getDocument();
$url        = '//maps.google.com/maps/api/js?sensor=false';

// set locale
$url .= $this->settings->map_locale ? '&language='.$this->settings->map_locale : '';

if(JPluginHelper::isEnabled('iproperty', 'googleplaces')) {
	$url .= '&libraries=places';
}

// add the Google API script
$this->document->addScript($url);
$document->addScript($this->ipbaseurl.'/components/com_iproperty/assets/js/property_gmap.js');

$map_script  = "jQuery(window).load(function($){    
                    ipPropertyMap.buildMap();
                });";
$document->addScriptDeclaration($map_script);

echo '<div class="tab-pane" id="propmap"><div id="ip-map-canvas"></div></div>';
?>
