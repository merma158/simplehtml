<table cellpadding="9" cellspacing="0">
 <tr valign="top">
     <td align="right">
         <?php print_string('configcontent', 'block_simplehtml'); ?>:
     </td>
     <td>
         <?php print_textarea(true, 10, 50, 0, 0, 'text', $this->config->text); ?>
     </td>
 </tr>
 <tr>
     <td colspan="2" align="center">
         <input type="submit" value="<?php print_string('savechanges') ?>" />
     </td>
 </tr>
 </table>
 <?php use_html_editor(); ?>