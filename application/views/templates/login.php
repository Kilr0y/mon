<?php
$base_uri = site_url();

$modal = array(
    'enabled' => true,
    'show' => true,
    'id' => md5(uniqid()),
    'message' => ''
);
?>

<div id="lightbox_login" class="modal fade bs-example-modal-sm" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?=tr('Login')?></h4>
      </div>
      <div class="modal-body">
        <form action="<?=site_url('login')?>" method="post" >
          <div style="text-align: left">
            <input type="hidden" name="modal" value="true">
            <div class="form-group">
                <label><?=tr('Login')?></label>
                <input type="email" class="form-control" name="login" placeholder="<?=tr('Login')?>">
            </div>
            <div class="form-group">
                <label><?=tr('Password')?></label>
                <input type="password" class="form-control" name="password" placeholder="<?=tr('Password')?>">
            </div>
          </div>
          <button id="login-submit" type="submit" class="btn btn-default"><?=tr('Login')?></button>
        </form>
        <br /><br />
        <div class="text_1"><?=tr('Alternatively, you can log in using:')?></div>
        <br />
        <div class="links">
            <a class="login_fb" href="<?php echo $base_uri ?>login/social_login?login_type=facebook"></a>
            <a class="login_tw" href="<?php echo $base_uri ?>login/social_login?login_type=twitter"></a>
            <a class="login_gg" href="<?php echo $base_uri ?>login/social_login?login_type=google"></a>
            <a class="login_vk" href="<?php echo $base_uri ?>login/social_login?login_type=vk"></a>
        </div>
        <div class="clearfix"></div>  
        <br />
        <div class="text_2"><?=tr('If you have any difficulties using social login, please')?> <a href="javascript:void('')" onclick="javascript:lightboxAction('lightbox_contact', true);"><span><u><?=tr('let us know')?></u></span></a></div>
      </div>
    </div>
  </div>
</div>

<script>
    $.each($('#lightbox_login .links a'), function(){
        if (send_ga_events != undefined && send_ga_events) ga('send', 'event', 'button', 'click', 'social login');
        var href = $(this).attr('href') + '&from=' + document.location;
        $(this).attr('href', href);
    });
    $('#login-submit').unbind('click').click(function(e){
        e.preventDefault();
        var elem = $(this);
        elem.html('<i class="fa fa-spinner fa-pulse"></i>').attr('disabled', 'disabled');
        var data = $(this).closest('form').serializeArray();
        $.post(base_uri + 'ajax/login', data, function(data){
            elem.html('Login').removeAttr('disabled');
            if (data.status == 'ok'){
                location.reload();
            } else if (data.status == 'error'){
                showNotification(data.message, 'error');
            }
        }, 'json');
    });
</script>