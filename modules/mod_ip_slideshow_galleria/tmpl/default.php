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
JHtml::_('behavior.framework', true);

$moduleclass_sfx    = ($params->get('moduleclass_sfx')) ? ' '.htmlspecialchars($params->get('moduleclass_sfx')) : '';
$slideshow_type     = ($params->get('slideshow_type', 0));
?>

<?php if($slideshow_type): //original IP2 slideshow ?>
<div class="ipslidemod<?php echo str_replace(' ', '_', $moduleclass_sfx); ?>">
    <div id="ip_slideshow<?php echo str_replace(' ', '_', $moduleclass_sfx); ?>" class="slideshow">
        <div class="slideshow-images">
            <div class="slideshow-loader"></div>
        </div>
        <?php if ($params->get( 'showCaption', false )) echo '<div class="slideshow-captions"></div>'; ?>
        <?php if ($params->get( 'showController', false )) echo '<div class="slideshow-controller"></div>'; ?>
        <?php if ($params->get( 'showThumbnails', false )) echo '<div class="slideshow-thumbnails"></div>'; ?>
    </div>
</div>
<?php else: ?>
<div class="ip-slideshow-galleria-mod<?php echo $moduleclass_sfx; ?>">
    <div class="ip-slide-mod<?php echo $moduleclass_sfx; ?>">
        <div id="ip-galleria" style="width: 100%; height: <?php echo $params->get('galleria_height', 450); ?>px;"></div>
    </div>
</div>
<?php endif; ?>