<?php
require_once("config.php");
global $base_uri;
?>

<div id="lightbox_chpass" class="lightbox" style="display:none"> 
   <table class="lightbox_table">
   <tr>
   <td class="lightbox_table_cell" align="center">
      <div id="lightbox_content" class="lightbox_content" style="width:800px;">
	      <div class="lightbox_inner" id="lightbox_inner">
					<table width="100%">
					<tr><td align="center">
					<h1><?=tr('Account Settings')?></center></h1><br/><br/>
					<form action="<?=$base_uri?>account.php" method="post">
					<input type="hidden" name="modal" value="true">
					<table>
                        <?php if (isset($_SESSION['social_user']) && $_SESSION['social_user']): ?>                            
                            <tr><td><?=tr('Display Name')?>:</td> <td><input type="text" name="username" value="<?php echo $_SESSION['logged_user']?>" /></td></tr>
                        <?php else: ?>
						    <tr><td><?=tr('Update Password')?>:</td> <td><input type="text" name="new_password"></td></tr>
						    <tr><td><?=tr('Update Email')?>:</td> <td><input type="text" name="new_dmail" value="<?=$r["email"]?>" /></td></tr>
                        <?php endif ?>
					</table><br/><br/>
					<center><input type="submit" value="<?=tr('Submit')?>"></center>
					</form>
					</td></tr>
					</table>     
        </div> 
      </div>
   </td>
   </tr>
   </table>
</div>