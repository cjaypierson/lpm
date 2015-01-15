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

foreach ($buttons as $button):
    echo modIpQuickIconHelper::button($button);
endforeach;
?>
