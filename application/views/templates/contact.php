<div id="lightbox_contact" class="lightbox" style="display:none"> 
    <table class="lightbox_table">
        <tr>
            <td class="lightbox_table_cell" align="center">
                <div id="lightbox_content" class="lightbox_content" style="width:800px;">
                    <div class="lightbox_inner" id="lightbox_inner">
                        <table width="100%">
                            <tr><td align="center">
                                <div class="text_1"><?=tr('Feel free to send us a message')?></div>
                                <?=tr('E-Mail and message fields are required')?>!<br /><br />
                                <div class="error"></div>
						        <form id="contact_form" action="bot.php" method="post">
    						        <input type="hidden" name="ref" value="<?=$_SERVER["HTTP_REFERER"]?>">    						        
    						        <input type="hidden" name="modal" value="true" />     
                                    <input type="hidden" name="type" value="contact" />
                                    <input type="hidden" name="username" />  
                                    <div style="text-align: left; width: 600px;">
                                        <input type="hidden" name="modal" value="true">
                                        <div class="form-group">
                                            <label><?=tr('Email')?></label>
                                            <input id="contact_email" class="form-control" name="mail" size="50" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: normal;"><?=tr('Subject')?></label>
                                            <input name="subject" class="form-control" size="50" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label><?=tr('Message')?></label>
                                            <textarea name="message" class="form-control" cols="60" rows="10"></textarea>
                                        </div> 
                                    </div>					                						
				                </form>
                            <span id="good"><input id="contact_submit" class="btn btn-default" type="Submit" value="<?=tr('Send Mail')?>" disabled></span></td></tr>
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
        $.post('<?=base_url('ajax/contact')?>', post_data, function(data){
            if (data.status == 'ok'){
                if (data.message != undefined)
                    set_lightbox_message(data.message);
                lightboxAction('lightbox_message');
            } else if (data.status == 'error'){  
                showNotification(data.error, 'error');                
                lightboxAction('lightbox_contact');
            }
        }, 'json');        
    });    
</script>