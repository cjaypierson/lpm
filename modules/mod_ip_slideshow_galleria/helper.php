<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_SITE.'/components/com_iproperty/helpers/html.helper.php');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/property.php');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/route.php');
require_once(JPATH_SITE.'/components/com_iproperty/helpers/query.php');
require_once(JPATH_ADMINISTRATOR.'/components/com_iproperty/classes/admin.class.php');

class modIPSlideshowGalleriaHelper
{
    public static function loadScripts($params, $items)
    {
        switch ($params->get('slideshow_type', 0)){
            case 0:
            default:
                self::_loadGalleria($params, $items);
                break;
            case 1:
                self::_loadOriginal($params, $items);
                break;
        }       
    }

    public static function getList(&$params)
    {
        $db     = JFactory::getDbo();
		$count  = (int) $params->get('count', 5);

        // Ordering
		switch ($params->get( 'ordering' ))
		{
			case '1':
				$sort           = 'price';
                $order          = 'ASC';
				break;
            case '2':
                $sort           = 'price';
                $order          = 'DESC';
                break;
			case '3':
				$sort           = 'p.street';
                $order		    = 'ASC';
				break;
            case '4':
				$sort           = 'p.street';
                $order		    = 'DESC';
				break;
            case '5':
            default:
                $sort           = 'RAND()';
                $order          = '';
                break;
            case '6':
                $sort           = 'p.created';
                $order          = 'DESC';
                break;
		}

        $where  = array();        
        
        // pull sale types if specified
        if ($params->get('prop_stype')) $where['property']['stype'] = $params->get('prop_stype');
        
        // update 2.0.1 - new option to select subcategories as well
        if ($params->get('cat_id') && $params->get('cat_subcats'))
        {            
            $cats_array = array( $params->get('cat_id') );
            $squery     = $db->setQuery(IpropertyHelperQuery::getCategories($params->get('cat_id')));
            $subcats    = $db->loadObjectList();
            
            foreach ($subcats as $s)
            {
                $cats_array[] = (int)$s->id;
            }
            $where['categories'] = $cats_array;
        } elseif ($params->get('cat_id')){
            $where['categories'] = $params->get('cat_id');
        }
        if( $params->get('featured') ) $where['property']['featured'] = 1;
        $where['searchfields']  = array('title','street','street2','short_description','description');
        
        // get items using query helper
        $pquery = new IpropertyHelperQuery($db, $sort, $order);
        $query  = $pquery->buildPropertyQuery($where, 'properties');
        $db->setQuery($query, 0, $count);      
        
        $items = ipropertyHelperProperty::getPropertyItems($db->loadObjectList(), true);

		return $items;
    }
    
    protected static function _loadGalleria($params, $items)
    {
        $doc = JFactory::getDocument();
        
        $showPrice          = $params->get( 'price', 1 );
        $showCaption        = ($params->get( 'showCaption', 1 )) ? 'true' : 'false';
        $imageDuration      = $params->get( 'imageDuration', 5000 );
		$transDuration      = $params->get( 'transDuration', 2000 );
        
        $transType          = $params->get( 'galleria_transType', 'slide' );
        $showCount          = ($params->get( 'galleria_showCount', 0 )) ? 'true' : 'false';         
        $thumbDisplay       = ($params->get( 'galleria_thumbDisplay' )) ? ', thumbnails: "'.$params->get('galleria_thumbDisplay').'"' : '';
        
        JHtml::_('bootstrap.framework');

        if(!defined('_IPGALLERIA')){
            define('_IPGALLERIA', true);
            $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/galleria/galleria-1.2.9.min.js');
        }

        $theme = JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/galleria/galleria.classic.min.js';

        $galleriaScript = '(function($) {'."\n";
        $galleriaScript .= '  ipGalleriadata = [';

        // add image array
        $galleriaImages = '';
        foreach ($items as $item) 
        {
            $item->proplink = JRoute::_(ipropertyHelperRoute::getPropertyRoute($item->id.':'.$item->alias, '', true));
            // remove any line breaks in text strings
            $title      = str_replace(array('.', "\n", "\t", "\r"), ' ', $item->street_address);
            $desc       = str_replace(array('.', "\n", "\t", "\r"), ' ', strip_tags($item->short_description));
            
            $thumb      = ipropertyHTML::getThumbnail($item->id, '', '', '', '', '', true, false);
            $fullsize   = ipropertyHTML::getThumbnail($item->id, '', '', '', '', '', false, false);
            $price      = ($showPrice) ? ' - '.$item->formattedprice : '';
            $galleriaImages .= "{thumb: '".$fullsize."', image: '".$fullsize."', title: '".addslashes($title).$price."', description: '".addslashes($desc)."', link: '".$item->proplink."'},";
        }
        $galleriaScript .= substr($galleriaImages, 0, -1);
        $galleriaScript .= '  ]'."\n";
        $galleriaScript .= '  Galleria.loadTheme("'.$theme.'");'."\n";
        $galleriaScript .= '  Galleria.run("#ip-galleria", {dataSource: ipGalleriadata, transition: "'.$transType.'", autoplay: '.(int)$imageDuration.', transitionSpeed: '.$transDuration.', showCounter: '.$showCount.', showInfo: '.$showCaption.$thumbDisplay.'});'."\n";
        $galleriaScript .= '})(jQuery);'."\n";

        $doc->addScriptDeclaration($galleriaScript);
    }
    
    protected static function _loadOriginal($params, $items)
    {
        $doc = JFactory::getDocument();

        if(!defined('_IPSLIDESCRIPTS')){
            define('_IPSLIDESCRIPTS', true);
            $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/js/slideshow.js');
            $doc->addStyleSheet(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/css/slideshow.css');
        }
		
		$showPrice          = $params->get( 'price', 1 );
        $showCaption        = $params->get( 'showCaption', 1 );
        $imageDuration      = $params->get( 'imageDuration', 5000 );
		$transDuration      = $params->get( 'transDuration', 2000 );        
                		
		$transType          = $params->get( 'orig_transType', 'kenburns' );
        $controller         = $params->get( 'orig_showController', true );
        $loop               = $params->get( 'orig_loopShow', true );
        $thumbnails         = $params->get( 'orig_showThumbnails', true );
        $suffix             = htmlspecialchars( $params->get('moduleclass_sfx') );
        $cleansuffix        = str_replace(' ', '_', $suffix); 
        
        // depending on which transition type selected, load proper script
        $sstype = '';
        switch ($transType){
            case 'none':
            default:
                //no special effects
            break;
            case 'flash':
                if(!defined('_IPSLIDESCRIPTS_FLASH')){
                    define('_IPSLIDESCRIPTS_FLASH', true);
                    $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/js/slideshow.flash.js');
                }
                $sstype = ".Flash";
            break;
            case 'kenburns':
                if(!defined('_IPSLIDESCRIPTS_KB')){
                    define('_IPSLIDESCRIPTS_KB', true);
                    $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/js/slideshow.kenburns.js');
                }
                $sstype = ".KenBurns";
            break;
            case 'push':
                if(!defined('_IPSLIDESCRIPTS_PUSH')){
                    define('_IPSLIDESCRIPTS_PUSH', true);
                    $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/js/slideshow.push.js');
                }
                $sstype = ".Push";
            break;
            case 'fold':
                if(!defined('_IPSLIDESCRIPTS_FOLD')){
                    define('_IPSLIDESCRIPTS_FOLD', true);
                    $doc->addScript(JURI::root(true).'/modules/mod_ip_slideshow_galleria/assets/themes/original/js/slideshow.fold.js');
                }
                $sstype = ".Fold";
            break;
        }
		
		$origScript           = '//<![CDATA['."\n";
        $origScript            .= "window.addEvent('domready', function() {\n";
		$origScript            .= "	var imgs".$cleansuffix." = {"."\r\n";
		
		$i = 0;
        foreach($items as $item) 
        {
            $item->proplink = JRoute::_(ipropertyHelperRoute::getPropertyRoute($item->id.':'.$item->alias, '', true));
            $slideimage     = ipropertyHTML::getThumbnail($item->id, '', '', '', '', '', false, false);
            
            // new img object format for the new slideshow script:
			// var data = {'1.jpg': { caption: 'Caption', href: 'link.html' }, etc.};

            if(!strpos($slideimage, 'nopic')){
                $origScript .= "		'" . $slideimage . "':{ ";                
                if ($showCaption == 1) {
                    $title      = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $item->street_address);
                    $desc       = str_replace(array('.', ' ', "\n", "\t", "\r"), '', strip_tags($item->short_description));
                    
                    $slidecaption   = ($showPrice) ? trim($title).' - '.$item->formattedprice : trim($title);
                    $slidecaption   .= ' - '.trim(preg_replace( '/\s+/', ' ', ipropertyHTML::snippet($desc, $params->get('preview_count', 200))));
                    
                    $origScript        .= "caption: '".addslashes($slidecaption)."', href: '".trim($item->proplink)."'";
                } else {
                    $origScript .= "href: '".trim($item->proplink)."'";
                }
                $origScript .= "}";
				
				$i++;
				if($i != count($items)){
					$origScript .= ","."\r\n";
				}else{
					$origScript .= "\r\n";
				}
			}
		}

		// trim off trailing comma
		//$imgPush = rtrim(',', $origScript);
		
		$origScript	.= "	};"."\r\n";

        $origScript    .= "	var myshow".$cleansuffix." = new Slideshow".$sstype."( 'ip_slideshow".$cleansuffix."', imgs".$cleansuffix.", {"."\r\n";
        // options array
        $origScript    .= "        delay: $imageDuration,"."\r\n"
                    .  "        duration: $transDuration,"."\r\n"
                    .  "        controller: $controller,"."\r\n"
                    .  "        loop: $loop,"."\r\n"
                    .  "        thumbnails: $thumbnails,"."\r\n"
                    .  "        captions: $showCaption,"."\r\n"
                    .  "        replace:[/(\.[^\.]+)$/, '_thumb$1']"."\r\n" // this line will append the normal IP thumb suffix
                    .  "    });"."\r\n";
        
        // any classes need to be added to "classes" array in options
        //$origScript .= "myshow.h2.setStyles({color: '$titleColor', fontSize: '$titleSize'});";
        //        myshow.caps.p.setStyles({color: '$descColor', fontSize: '$descSize'});
        $origScript .= "	});"."\r\n";
        $origScript .= "//]]>"."\r\n";
					
		$doc->addScriptDeclaration($origScript);
    }
}