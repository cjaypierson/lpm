<?php
/**
 * SEF component for Joomla!
 * 
 * @package   JoomSEF
 * @version   4.4.4
 * @author    ARTIO s.r.o., http://www.artio.net
 * @copyright Copyright (C) 2013 ARTIO s.r.o. 
 * @license   GNU/GPLv3 http://www.artio.net/license/gnu-general-public-license
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

?>
<form action="index.php" method="post" name="adminForm" id="adminForm">

<label for="filetext"><?php echo JText::_('COM_SEF_EDIT_YOUR_HTACCESS_FILE'); ?></label>
<br />
<textarea name="filetext" id="filetext" class="inputbox" cols="120" rows="40" style="width: 800px;"><?php echo $this->file; ?></textarea>

<input type="hidden" name="option" value="com_sef" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="htaccess" />
</form>