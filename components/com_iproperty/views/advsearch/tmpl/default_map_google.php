<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */
defined( '_JEXEC' ) or die( 'Restricted access');

$mapsurl = 'https://maps.googleapis.com/maps/api/js?sensor=false';
// set locale
$mapsurl .= $this->settings->map_locale ? '&language='.$this->settings->map_locale : '';
if ($this->params->get('adv_show_shapetools', $this->settings->adv_show_shapetools)) $mapsurl .= '&libraries=drawing';

// include map scripts
$this->document->addScript($mapsurl);
$this->document->addScript(JURI::root(true).'/components/com_iproperty/assets/advsearch/gmap.js');
if ($this->params->get('adv_show_shapetools', $this->settings->adv_show_shapetools)) $this->document->addScript(JURI::root(true).'/components/com_iproperty/assets/advsearch/gmaptools.js');

echo '<div id="ip-map-canvas" class=""></div>';
?>
