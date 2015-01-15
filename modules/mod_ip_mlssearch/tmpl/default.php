<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

//no direct access
defined('_JEXEC') or die('Restricted access');
$uri 		= JFactory::getURI();
$action     = str_replace('&', '&amp;', $uri->toString());

$tooltip_text       = $params->get('dsearch',   JText::_('MOD_IP_MLSSEARCH_ENTER_REF'));
$search_text        = $params->get('dkeyword',  JText::_('MOD_IP_MLSSEARCH_DREF'));
$moduleclass_sfx    = ($params->get('moduleclass_sfx')) ? ' '.htmlspecialchars($params->get('moduleclass_sfx')) : '';
?>

<div class="ip-mlssearch-holder<?php echo $moduleclass_sfx; ?>">
    <form action="<?php echo $action; ?>" method="post" id="ip-mlssearch-form" class="form-inline">
        <?php if ($params->get('pretext')): ?>
            <div class="pretext">
                <p><?php echo $params->get('pretext'); ?></p>
            </div>
        <?php endif; ?>
        <div class="mlsdata">
            <div id="form-ip-mlssearch" class="control-group">
                <div class="controls">
                    <div class="input-prepend input-append">
                        <span class="add-on">
                            <i class="icon-home"></i>
                        </span>
                        <input id="ip_mls_search" type="text" name="ip_mls_search" class="input-small" size="18" placeholder="<?php echo JText::_($search_text) ?>" />
                        <button class="btn hasTooltip" title="<?php echo JText::_($tooltip_text); ?>" onclick="submit()">
                            <i class="icon-question-sign"></i>
                        </button>
                    </div>            
                </div>
            </div>
        </div>
        <?php if ($params->get('posttext')): ?>
            <div class="pretext">
                <p><?php echo $params->get('posttext'); ?></p>
            </div>
        <?php endif; ?>
        <input type="hidden" name="task" value="ip_mls_search" />
    </form>
</div>