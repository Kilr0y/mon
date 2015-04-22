<?php
require_once("config.php");
global $base_uri;

?>
<div id="lightbox_reset" class="lightbox" style="display: none"> 
   <table class="lightbox_table">
   <tr>
   <td class="lightbox_table_cell" align="center">
      <div id="lightbox_content" class="lightbox_content" style="width:600px;">
	      <div class="lightbox_inner">
				  <table width="100%">
				  <tr><td align="center">	
				  <h1><?=tr('Password Reset')?></h1>
				  <br />
				  <form action="<?=$base_uri?>reminder.php" method="post">
				  <input type="hidden" name="modal" value="true">
                  <input type="hidden" name="type" value="act" />
				  <table>
					  <tr><td width="30%"><?=tr('Username')?>:</td> <td><input type="text" name="user"></td></tr>
				  </table>
				  <input type="submit" value="<?=tr('Submit')?>">
				  </form>
				  </td></tr>
				  </table>
        </div> 
      </div>
   </td>
   </tr>
   </table>
</div>