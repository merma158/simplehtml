<div style="text-align: center;">
 <input type="hidden" name="block_simplehtml_strict" value="0" />
 <input type="checkbox" name="block_simplehtml_strict" value="1" 
   <?php if(!empty($CFG->block_simplehtml_strict)) echo 'checked="checked"'; ?> />
 <?php print_string('donotallowhtml', 'block_simplehtml'); ?>
 <p><input type="submit" value="<?php print_string('savechanges'); ?>" /></p>
 </div>