<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

abstract class IpropertyHelperProperty
{
    public static function getPropertyItems($items = array(), $extras = false, $advsearch = false)
    {
        $settings	= ipropertyAdmin::config();
        $hide_round = 3; // TODO: hardcoded, maybe should be option
		$nformat	= $settings->nformat;

        foreach ($items as $item)
        {
            // common object properties
            $item->available            = ($item->available && $item->available != '0000-00-00') ? $item->available : '';
            $item->street_address       = ipropertyHTML::getStreetAddress($settings, $item);
            $item->short_description    = ($item->short_description) ? $item->short_description : strip_tags($item->description);
            
            // format the baths
            if (!$settings->baths_fraction) {
				$item->baths = round ($item->baths);
			} else {
				$item->baths = ($nformat == 1) ? $item->baths : number_format($item->baths, 2, ',', '.');
			}
            
            // check if latitude and longitude are not blank values. 
            // if blank, set them as false to return no marker or preview icon. 
            // if not, continue processing
            $item->lat_pos          = ($item->latitude && $item->latitude == '0.000000') ? false : (($item->hide_address) ? round($item->latitude, $hide_round) : $item->latitude);
            $item->long_pos         = ($item->latitude && $item->latitude == '0.000000') ? false : ($item->hide_address) ? round($item->longitude, $hide_round) : $item->longitude;

            // Get the thumbnail
            $item->thumb            = ipropertyHTML::getThumbnail($item->id, '', '', $settings->thumbwidth, 'class="thumbnail"');

            // Formatted 
			$item->formattedprice   = ipropertyHTML::getFormattedPrice($item->price, false, $item->call_for_price);           
			$item->formattedsqft	= ($nformat == 1) ? number_format($item->sqft) : number_format($item->sqft,  0, ',', '.');

            // Check if new or updated
            $item->new              = ipropertyHTML::isNew($item->publish_up, $settings->new_days);
            $item->updated          = ipropertyHTML::isNew($item->modified, $settings->updated_days);

            // Get last modified date if available
            $item->last_updated     = ($item->modified != '0000-00-00 00:00:00') ? JHTML::_('date', htmlspecialchars($item->modified),JText::_('DATE_FORMAT_LC2')) : '';                        

            // Get common values for non-advanced search queries            
            if (!$advsearch)
            {
                $item->lotsize 			= ($item->lotsize && is_numeric($item->lotsize)) ? ($nformat == 1) ? number_format($item->lotsize) : number_format($item->lotsize,  0, ',', '.') : $item->lotsize;
                $item->lot_acres		= ($item->lot_acres && is_numeric($item->lot_acres)) ? ($nformat == 1) ? number_format($item->lot_acres) : number_format($item->lot_acres,  0, ',', '.') : $item->lot_acres;
                $item->tax				= ($item->tax && is_numeric($item->tax)) ? ipropertyHTML::getFormattedPrice($item->tax) : '';
                $item->income			= ($item->income && is_numeric($item->income)) ? ipropertyHTML::getFormattedPrice($item->income) : '';
                $item->countryname      = ipropertyHTML::getcountryname($item->country);
                $item->stypename        = ipropertyHTML::get_stype($item->stype);
            }
            
            // Get extras and add to property objects for use in advanced search and modules
            if ($extras) 
            {
                $item->banner           = ipropertyHTML::displayBanners($item->stype, $item->new, JURI::root(), $settings, $item->updated);
                // Get category icons
                $item->available_cats   = ipropertyHTML::getAvailableCats($item->id);
                $item->caticons         = array();
                if($item->available_cats)
                {
                    foreach( $item->available_cats as $c ){
                        $item->caticons[]  = ipropertyHTML::getCatIcon($c, 20);
                    }
                }
            }

            // get property link
            $item->proplink         = JRoute::_(ipropertyHelperRoute::getPropertyRoute($item->id.':'.$item->prop_alias));
        }

        return $items;
    }
}
?>
