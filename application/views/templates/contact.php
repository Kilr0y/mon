<?php
require_once("config.php");
?>

<div id="lightbox_contact" class="lightbox" style="display:none"> 
   <table class="lightbox_table">
   <tr>
   <td class="lightbox_table_cell" align="center">
      <div id="lightbox_content" class="lightbox_content" style="width:800px;">
	      <div class="lightbox_inner" id="lightbox_inner">
					<table width="100%">
					<tr><td align="center">
						<h1><?=tr('Please feel free to send us a message.')?></h1><?=tr('E-Mail and message fields are required')?>!<br /><br /><br />
						<div class="error"></div>
						<form id="contact_form" action="bot.php" method="post">
    						<input type="hidden" name="ref" value="<?=$_SERVER["HTTP_REFERER"]?>">
    						<input type="hidden" name="type" value="<?=$_GET["type"]?>">
    						<input type="hidden" name="modal" value="true" />     
                            <input type="hidden" name="username" />                   
    						<table>
    							<tr><td><?=tr('Email')?>:</td><td> <input id="contact_email" name="mail" size="50"></td></tr>
    							<tr><td><?=tr('Subject')?>:</td><td> <input name="subject" size="50" value="<?=$subject?>" <?=$sub_disabled?> ></td></tr>
    							<tr><td><?=tr('Username')?>:</td><td> <input name="user" value="<?=$_SESSION["logged_user"]?>" size="50" <?=$user_disabled?> ></td></tr>
    						</table>
    						<?=tr('Message')?>:<br>
    						<textarea name="message" cols="80" rows="15"></textarea><br>    						
						</form>
                        <span id="good"><input id="contact_submit" type="Submit" value="<?=tr('Send Mail')?>" disabled></span>
					</td></tr>
					</table>        
        </div> 
      </div>
   </td>
   </tr>
   </table>
</div>

<script>
    //email validation
    $('#contact_email, #contact_form textarea').bind('keyup blur click', function(){
        var submit = $('#contact_submit');
        if (ContactCheckEmail($('#contact_email').val()) && $.trim($('#contact_form textarea').val()) != ''){
            submit.removeAttr('disabled');
        } else {
            submit.attr('disabled', 'disabled');
        }              
    });
    $('#contact_submit').click(function(e){
        e.preventDefault();
        var post_data = $('#contact_form').serialize();
        lightboxAction('lightbox_loading');
        $.post('contact.php', post_data, function(data){
            if (data.status == 'ok'){
                if (data.message != undefined)
                    set_lightbox_message(data.message);
                lightboxAction('lightbox_message');
            } else if (data.status == 'error'){                
                $('#lightbox_contact .error').text(data.error);
                lightboxAction('lightbox_contact');
            }
        }, 'json');        
    });    
</script>