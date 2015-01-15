<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// No direct access.
defined('_JEXEC') or die;
?>
<a class="btn" href="<?php echo $button['link']; ?>" style="margin-bottom: 5px;">
    <?php echo JHtml::_('image', $button['image'], NULL, NULL, false); ?>
    <span><?php echo $button['text']; ?></span>
</a>
