<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

$moduleclass_sfx    = ($params->get('moduleclass_sfx')) ? ' '.htmlspecialchars($params->get('moduleclass_sfx')) : '';
?>
<div class="ip-openhouse-mod<?php echo $moduleclass_sfx; ?>">
    <ul class="ip-openhouse-list<?php echo ($params->get('ul_class')) ? ' '.$params->get('ul_class') : ''; ?>">
        <?php
        foreach($items as $item)
        {
            $available_cats = ipropertyHTML::getAvailableCats($item->prop_id);
            $first_cat      = $available_cats[0];

            $item->name     = ($item->name) ? $item->name : ipropertyHTML::getPropertyTitle($item->prop_id);
            $item->link     = JRoute::_(ipropertyHelperRoute::getPropertyRoute($item->prop_id.':'.$item->alias, $first_cat, true));
            $item->start    = JFactory::getDate($item->openhouse_start)->format($params->get('date_format', 'l, d F Y g:ia'));
            $item->end      = JFactory::getDate($item->openhouse_end)->format($params->get('date_format', 'l, d F Y g:ia'));
            ?>
                
            <li>
                <a href="<?php echo $item->link; ?>" class="ip-openhouse-title">
                    <?php echo htmlspecialchars($item->name); ?>
                </a>
                <br /><?php echo $item->start; ?>
                <br /><span class="small"><em><?php echo JText::_('MOD_IP_OPENHOUSES_THROUGH'); ?></em></span>
                <br /><?php echo $item->end; ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>