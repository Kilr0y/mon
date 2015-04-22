<div id="lightbox_feedback" class="lightbox" style="display: none">

    <table class="lightbox_table">
        <tr>
            <td class="lightbox_table_cell" align="center">
                <div id="lightbox_content" class="lightbox_content" style="width:800px;">
                    <div class="lightbox_inner">
                        <div class="text_1">Login</div>

                        <div id="lightbox_login_data" style="display: block; width: 300px;">

                            <form action="<?=site_url('login')?>" method="post" >
                                <div style="text-align: left">
                                    <input type="hidden" name="modal" value="true">
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input type="email" class="form-control" name="login" placeholder="Login">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <button id="login-submit" type="submit" class="btn btn-default">Login</button>
                            </form>

                            <br />

                            <a href="#" onclick="javascript:lightboxAction('lightbox_registration');"><small><u>Create an Account</u></small></a> &nbsp;
                            <a href="#" onclick="javascript:lightboxAction('lightbox_reset');"><small><u>Password Reset</u></small></a> &nbsp;
                        </div>

                        <br /><br />
                        <div class="text_1">Alternatively, you can log in using:</div>
                        <br />
                        <div class="links">
                            <a class="login_fb" href="social_login.php?login_type=facebook"></a>
                            <a class="login_tw" href="social_login.php?login_type=twitter"></a>
                            <a class="login_gg" href="social_login.php?login_type=google"></a>
                            <a class="login_vk" href="social_login.php?login_type=vk"></a>
                        </div>
                        <div class="clearfix"></div>
                        <br /><br /><br />
                        <div class="text_2">If you have any difficulties using social login, please <a href="javascript:void('')" onclick="javascript:lightboxAction('lightbox_contact', true);"><span><u>let us know</u></span></a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
