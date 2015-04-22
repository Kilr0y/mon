<?php
require_once("config.php");

global $modal, $base_uri;

$sd3 = ($modal['message']) ? 'none' : 'block';

?>


<div id="lightbox_registration" class="lightbox" style="display: none">
   
    <input type="hidden" name="modal_enabled" value="<?=$modal['enabled']?>"/>
    <input type="hidden" name="modal_show" value="<?=$modal['show']?>"/>
    <input type="hidden" name="modal_id" value="<?=$modal['id']?>"/>
    <input type="hidden" name="modal_message" value="<?=$modal['message']?>"/>
   
    <table class="lightbox_table">
    <tr>
        <td class="lightbox_table_cell" align="center">
            <div id="lightbox_content" class="lightbox_content" style="width:600px;">
                <div class="lightbox_inner">
                    <div id="lightbox_registration_message" ><?=$modal['message']?></div>
                    <div id="lightbox_registration_data" style="display:<?=$sd3?>">
                        <div class="text_1">You can register using:</div>
                        <br /><br />
                        <div class="links">
                            <a class="login_fb" href="<?php echo $base_uri ?>social_login.php?login_type=facebook"></a>
                            <a class="login_tw" href="<?php echo $base_uri ?>social_login.php?login_type=twitter"></a>
                            <a class="login_gg" href="<?php echo $base_uri ?>social_login.php?login_type=google"></a>
                            <a class="login_vk" href="<?php echo $base_uri ?>social_login.php?login_type=vk"></a>
                        </div>
                        <br /><br />
                        <div class="clearfix"></div>
                        <br /><br /><br />
                        <div class="text_2">If you have any difficulties using social login, please <a href="javascript:void('')" onclick="javascript:lightboxAction('lightbox_contact', true);"><span><u>let us know</u></span></a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </td>
   </tr>
   </table>
</div>
<script>
$.each($('#lightbox_registration .links a'), function(){
    if (send_ga_events != undefined && send_ga_events) ga('send', 'event', 'button', 'click', 'social login');
    var href = $(this).attr('href') + '&from=' + document.location;
    $(this).attr('href', href);
})
</script>