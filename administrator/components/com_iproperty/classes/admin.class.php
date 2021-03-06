<?php
/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access');

class ipropertyAdmin 
{
    public static function _getversion()
    {
        $versions = array();
        $versions['iproperty']  = self::getParam();
        $versions['ipreserve']  = self::getParam('com_ipreserve');
        $versions['ireport']    = self::getParam('com_ireport');

        return $versions;
    }

    public static function footer( )
    {
        $versions = ipropertyAdmin::_getversion();
        
        $footer_display = '<p class="center small">';

        if($versions['iproperty']){
            $footer_display .= '<span style="color: #377391;">Intellectual Property v.'.$versions['iproperty'].'</span>';
        }

        if($versions['ipreserve']){
            $footer_display .= ' | <span style="color: #66A736;">IPreserve v.'.$versions['ipreserve'].'</span>';
        }

        if($versions['ireport']){
            $footer_display .= ' | <span style="color: #72597C;">IReport v.'.$versions['ireport'].'</span>';
        }
        $footer_display .= '<br /><a href="http://www.thethinkery.net" target="_blank">By The Thinkery LLC</a>';
        $footer_display .= '</p>';
        return $footer_display;
    }

    public static function config($globals = true)
    {
        $db     = JFactory::getDbo();
        $query	= $db->getQuery(true);
            
        if($globals == true)
        {
            global $ipsettings;
            if (!$ipsettings)
            {
                $query->select('*');
                $query->from('#__iproperty_settings');
                $query->where('id = 1');

                $db->setQuery($query);
                $ipsettings = $db->loadObject();

                $GLOBALS['ipsettings'] = $ipsettings;
            }
            return $ipsettings;
        }
        else
        {
            $query->select('*');
            $query->from('#__iproperty_settings');
            $query->where('id = 1');

            $db->setQuery($query);
            $config = $db->loadObject();
            return $config;
        }
    }

    public static function buildAdminToolbar()
    {
        $user       = JFactory::getUser();
        $settings   = ipropertyAdmin::config();

        JPluginHelper::importPlugin( 'iproperty');
        $dispatcher = JDispatcher::getInstance();       

        echo '
            <div class="pull-left">
                '.JHTML::_('image', 'administrator/components/com_iproperty/assets/images/iproperty_admin_logo.gif', 'Intellectual Property :: By The Thinkery' ).'
            </div>';

            if($user->authorise('core.admin'))
            {               
                echo '
                <div class="pull-right">
                    <div class="btn-group">
                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            '.JText::_('JADMINISTRATION').'&#160;
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">';
                            ipropertyAdmin::quickiconButton('index.php?option=com_iproperty&amp;view=backup', JText::_('COM_IPROPERTY_BACKUP' ));
                            ipropertyAdmin::quickiconButton('index.php?option=com_iproperty&amp;view=restore', JText::_('COM_IPROPERTY_RESTORE' ));
                            ipropertyAdmin::quickiconButton('index.php?option=com_iproperty&amp;view=bulkimport', JText::_('COM_IPROPERTY_BULKIMPORT_FILE' ));
                            ipropertyAdmin::quickiconButton('index.php?option=com_iproperty&amp;view=editcss', JText::_('COM_IPROPERTY_EDIT_CSS' ));
                echo '
                        </ul>
                    </div>                    
                </div>';
            }
            $dispatcher->trigger( 'onAfterRenderAdmin', array( &$user, &$settings ) );
        echo '<div class="clearfix"></div>';        
        echo '<hr />';
    }

    public static function quickiconButton( $link, $text )
    {
        $button = '
            <li>
                <a href="'.$link.'">'.$text.'</a>
            </li>';
        echo $button;
    }
    
    public static function getParam( $ext_name = 'com_iproperty', $ext_type = 'component', $field_name = 'version' ) 
    {
        $db = JFactory::getDbo();
        
        $query = $db->getQuery(true);        
        $query->select('manifest_cache')
                ->from('#__extensions')
                ->where('name = '.$db->Quote($ext_name))
                ->where('type='.$db->Quote($ext_type));
        
        $db->setQuery($query);
        $manifest = json_decode( $db->loadResult(), true );
        
        return $manifest[$field_name];
    }
}

?>
