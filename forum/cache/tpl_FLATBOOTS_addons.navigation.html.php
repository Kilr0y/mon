<?php if (!defined('IN_PHPBB')) exit; ?><!-- Main navigation block -->
<nav class="collapse navbar-collapse flat-nav-collapse" role="navigation" aria-label="Primary">
      <ul class="nav navbar-nav navbar-nav-fancy">
        <li class=""><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo ((isset($this->_rootref['L_HOME'])) ? $this->_rootref['L_HOME'] : ((isset($user->lang['HOME'])) ? $user->lang['HOME'] : '{ HOME }')); ?></a></li>
        <li class="dropdown">
             <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo ((isset($this->_rootref['L_MAIN_FORUM'])) ? $this->_rootref['L_MAIN_FORUM'] : ((isset($user->lang['MAIN_FORUM'])) ? $user->lang['MAIN_FORUM'] : '{ MAIN_FORUM }')); ?> <b class="caret"></b></a>
             <span class="dropdown-arrow"></span>
            <ul class="dropdown-menu">
                <?php if ($this->_rootref['S_DISPLAY_SEARCH'] || ( $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['S_IS_BOT'] )) {  ?>

				<li><a href="<?php echo (isset($this->_rootref['U_SEARCH_UNANSWERED'])) ? $this->_rootref['U_SEARCH_UNANSWERED'] : ''; ?>"><i class="fa fa-search"></i><?php echo ((isset($this->_rootref['L_SEARCH_UNANSWERED'])) ? $this->_rootref['L_SEARCH_UNANSWERED'] : ((isset($user->lang['SEARCH_UNANSWERED'])) ? $user->lang['SEARCH_UNANSWERED'] : '{ SEARCH_UNANSWERED }')); ?></a></li>
				<?php if ($this->_rootref['S_LOAD_UNREADS']) {  ?>

				<li><a href="<?php echo (isset($this->_rootref['U_SEARCH_UNREAD'])) ? $this->_rootref['U_SEARCH_UNREAD'] : ''; ?>"><i class="fa fa-comment"></i><?php echo ((isset($this->_rootref['L_SEARCH_UNREAD'])) ? $this->_rootref['L_SEARCH_UNREAD'] : ((isset($user->lang['SEARCH_UNREAD'])) ? $user->lang['SEARCH_UNREAD'] : '{ SEARCH_UNREAD }')); ?></a></li>
				<?php } if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

				<li><a href="<?php echo (isset($this->_rootref['U_SEARCH_NEW'])) ? $this->_rootref['U_SEARCH_NEW'] : ''; ?>"><i class="fa fa-thumbs-up"></i><?php echo ((isset($this->_rootref['L_SEARCH_NEW'])) ? $this->_rootref['L_SEARCH_NEW'] : ((isset($user->lang['SEARCH_NEW'])) ? $user->lang['SEARCH_NEW'] : '{ SEARCH_NEW }')); ?></a></li>
				<?php } ?>

				<li><a href="<?php echo (isset($this->_rootref['U_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['U_SEARCH_ACTIVE_TOPICS'] : ''; ?>"><i class="fa fa-star"></i><?php echo ((isset($this->_rootref['L_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['L_SEARCH_ACTIVE_TOPICS'] : ((isset($user->lang['SEARCH_ACTIVE_TOPICS'])) ? $user->lang['SEARCH_ACTIVE_TOPICS'] : '{ SEARCH_ACTIVE_TOPICS }')); ?></a></li>
				<?php } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_FORUMS']) {  ?>

			   <li><a href="<?php echo (isset($this->_rootref['U_MARK_FORUMS'])) ? $this->_rootref['U_MARK_FORUMS'] : ''; ?>"><i class="fa fa-check"></i><?php echo ((isset($this->_rootref['L_MARK_FORUMS_READ'])) ? $this->_rootref['L_MARK_FORUMS_READ'] : ((isset($user->lang['MARK_FORUMS_READ'])) ? $user->lang['MARK_FORUMS_READ'] : '{ MARK_FORUMS_READ }')); ?></a></li>
	           <?php } ?>

			   <li><a href="<?php echo (isset($this->_rootref['U_FAQ'])) ? $this->_rootref['U_FAQ'] : ''; ?>"><i class="fa fa-question-circle"></i><?php echo ((isset($this->_rootref['L_FAQ'])) ? $this->_rootref['L_FAQ'] : ((isset($user->lang['FAQ'])) ? $user->lang['FAQ'] : '{ FAQ }')); ?></a></li>
			   <?php if ($this->_rootref['S_DISPLAY_MEMBERLIST']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_MEMBERLIST'])) ? $this->_rootref['U_MEMBERLIST'] : ''; ?>"><i class="fa fa-group"></i><?php echo ((isset($this->_rootref['L_MEMBERLIST'])) ? $this->_rootref['L_MEMBERLIST'] : ((isset($user->lang['MEMBERLIST'])) ? $user->lang['MEMBERLIST'] : '{ MEMBERLIST }')); ?></a></li><?php } if ($this->_rootref['U_TEAM']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_TEAM'])) ? $this->_rootref['U_TEAM'] : ''; ?>"><i class="fa fa-trophy"></i><?php echo ((isset($this->_rootref['L_THE_TEAM'])) ? $this->_rootref['L_THE_TEAM'] : ((isset($user->lang['THE_TEAM'])) ? $user->lang['THE_TEAM'] : '{ THE_TEAM }')); ?></a></li><?php } ?>

            </ul>
        </li>
		<li class="dropdown">
             <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?> <b class="caret"></b></a>
             <span class="dropdown-arrow"></span>
            <ul class="dropdown-menu">
                <li><a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><i class="fa fa-search fa"></i><?php echo ((isset($this->_rootref['L_SEARCH_ADV'])) ? $this->_rootref['L_SEARCH_ADV'] : ((isset($user->lang['SEARCH_ADV'])) ? $user->lang['SEARCH_ADV'] : '{ SEARCH_ADV }')); ?></a></li>
                <?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN']) {  if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?> 
				<li><a href="<?php echo (isset($this->_rootref['U_SEARCH_SELF'])) ? $this->_rootref['U_SEARCH_SELF'] : ''; ?>"><i class="fa fa-comments"></i> <?php echo ((isset($this->_rootref['L_SEARCH_SELF'])) ? $this->_rootref['L_SEARCH_SELF'] : ((isset($user->lang['SEARCH_SELF'])) ? $user->lang['SEARCH_SELF'] : '{ SEARCH_SELF }')); ?></a></li>
				<?php } } ?>

                <li class="divider"></li>
                <li class="dropdown-header"><?php echo ((isset($this->_rootref['L_DEMO_HEADER_MENU'])) ? $this->_rootref['L_DEMO_HEADER_MENU'] : ((isset($user->lang['DEMO_HEADER_MENU'])) ? $user->lang['DEMO_HEADER_MENU'] : '{ DEMO_HEADER_MENU }')); ?></li>
                <li><a href="#"><?php echo ((isset($this->_rootref['L_DEMO_LINK'])) ? $this->_rootref['L_DEMO_LINK'] : ((isset($user->lang['DEMO_LINK'])) ? $user->lang['DEMO_LINK'] : '{ DEMO_LINK }')); ?></a></li>
                <li><a href="#"><?php echo ((isset($this->_rootref['L_DEMO_LINK'])) ? $this->_rootref['L_DEMO_LINK'] : ((isset($user->lang['DEMO_LINK'])) ? $user->lang['DEMO_LINK'] : '{ DEMO_LINK }')); ?></a></li>
            </ul>
        </li>
      </ul>
	  
	<?php if (! $this->_rootref['S_USER_LOGGED_IN']) {  ?>

    <ul class="nav navbar-nav navbar-right navbar-nav-fancy">
	    <?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_REGISTER_ENABLED'] && ! ( $this->_rootref['S_SHOW_COPPA'] || $this->_rootref['S_REGISTRATION'] )) {  ?>

		<li><a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT'])) ? $this->_rootref['L_CREATE_ACCOUNT'] : ((isset($user->lang['CREATE_ACCOUNT'])) ? $user->lang['CREATE_ACCOUNT'] : '{ CREATE_ACCOUNT }')); ?></a></li>
	   <?php } ?>

	   <li><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></a></li>
	</ul>
	<?php } if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

	<div class="user-login hidden-lg hidden-md hidden-sm">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown dropdown-avatar">
				<a href="javascript:void(0)" data-toggle="dropdown" class="user-menu"><?php echo (isset($this->_rootref['USER_AVATAR_THUMB'])) ? $this->_rootref['USER_AVATAR_THUMB'] : ''; ?>&nbsp;&nbsp;<span><?php echo ((isset($this->_rootref['L_WELCOME_INDEX'])) ? $this->_rootref['L_WELCOME_INDEX'] : ((isset($user->lang['WELCOME_INDEX'])) ? $user->lang['WELCOME_INDEX'] : '{ WELCOME_INDEX }')); ?>,&nbsp;<?php echo (isset($this->_rootref['CURRENT_USERNAME'])) ? $this->_rootref['CURRENT_USERNAME'] : ''; ?><i class="caret"></i></span></a>
				<ul class="dropdown-menu usermenu">
				   <li><a title="" href="<?php echo (isset($this->_rootref['U_UCP_PROFILE'])) ? $this->_rootref['U_UCP_PROFILE'] : ''; ?>"><i class="fa fa-user"></i>&nbsp;<?php echo ((isset($this->_rootref['L_UCP_PROFILE'])) ? $this->_rootref['L_UCP_PROFILE'] : ((isset($user->lang['UCP_PROFILE'])) ? $user->lang['UCP_PROFILE'] : '{ UCP_PROFILE }')); ?></a></li>
				   <li><a title="" href="<?php echo (isset($this->_rootref['U_UCP_PM'])) ? $this->_rootref['U_UCP_PM'] : ''; ?>"><i class="fa fa-inbox"></i>&nbsp;<?php echo ((isset($this->_rootref['L_UCP_MESSAGES'])) ? $this->_rootref['L_UCP_MESSAGES'] : ((isset($user->lang['UCP_MESSAGES'])) ? $user->lang['UCP_MESSAGES'] : '{ UCP_MESSAGES }')); ?>&nbsp;&nbsp;<span class="badge badge-info"><?php if ($this->_rootref['S_DISPLAY_PM'] && $this->_rootref['S_USER_UNREAD_PRIVMSG']) {  ?>&nbsp;<?php echo (isset($this->_rootref['S_USER_UNREAD_PRIVMSG'])) ? $this->_rootref['S_USER_UNREAD_PRIVMSG'] : ''; } else { echo (isset($this->_rootref['S_USER_NEW_PRIVMSG'])) ? $this->_rootref['S_USER_NEW_PRIVMSG'] : ''; } ?></span></a></li>
				   <li><a title="" href="<?php echo (isset($this->_rootref['U_UCP_PROFILE_SETTINGS'])) ? $this->_rootref['U_UCP_PROFILE_SETTINGS'] : ''; ?>"><i class="fa fa-cog"></i>&nbsp;<?php echo ((isset($this->_rootref['L_UCP_PROFILE_SETTINGS'])) ? $this->_rootref['L_UCP_PROFILE_SETTINGS'] : ((isset($user->lang['UCP_PROFILE_SETTINGS'])) ? $user->lang['UCP_PROFILE_SETTINGS'] : '{ UCP_PROFILE_SETTINGS }')); ?></a></li>
	               <?php if ($this->_rootref['U_ACP']) {  ?><li><a title="" href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>"><i class="fa fa-user-md"></i>&nbsp;<?php echo ((isset($this->_rootref['L_ADMIN_PANEL_GENERAL'])) ? $this->_rootref['L_ADMIN_PANEL_GENERAL'] : ((isset($user->lang['ADMIN_PANEL_GENERAL'])) ? $user->lang['ADMIN_PANEL_GENERAL'] : '{ ADMIN_PANEL_GENERAL }')); ?></a></li><?php } if ($this->_rootref['U_MCP']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>"><i class="fa fa-legal"></i>&nbsp;<?php echo ((isset($this->_rootref['L_MODERATOR_PANEL_GENERAL'])) ? $this->_rootref['L_MODERATOR_PANEL_GENERAL'] : ((isset($user->lang['MODERATOR_PANEL_GENERAL'])) ? $user->lang['MODERATOR_PANEL_GENERAL'] : '{ MODERATOR_PANEL_GENERAL }')); ?></a></li><?php } if ($this->_rootref['S_REGISTERED_USER'] && ! ( $this->_rootref['U_ACP'] || $this->_rootref['U_MCP'] )) {  ?><li><a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><i class="fa fa-user"></i>&nbsp;<?php echo ((isset($this->_rootref['L_USER_PANEL'])) ? $this->_rootref['L_USER_PANEL'] : ((isset($user->lang['USER_PANEL'])) ? $user->lang['USER_PANEL'] : '{ USER_PANEL }')); ?></a></li><?php } if ($this->_rootref['U_RESTORE_PERMISSIONS']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_RESTORE_PERMISSIONS'])) ? $this->_rootref['U_RESTORE_PERMISSIONS'] : ''; ?>"><i class="fa fa-random"></i>&nbsp;<?php echo ((isset($this->_rootref['L_RESTORE_PERMISSIONS'])) ? $this->_rootref['L_RESTORE_PERMISSIONS'] : ((isset($user->lang['RESTORE_PERMISSIONS'])) ? $user->lang['RESTORE_PERMISSIONS'] : '{ RESTORE_PERMISSIONS }')); ?></a></li><?php } ?>

				  <li><a title="" href="<?php echo (isset($this->_rootref['U_LOGOUT'])) ? $this->_rootref['U_LOGOUT'] : ''; ?>"><i class="fa fa-power-off"></i>&nbsp;<?php echo ((isset($this->_rootref['L_LOGOUT'])) ? $this->_rootref['L_LOGOUT'] : ((isset($user->lang['LOGOUT'])) ? $user->lang['LOGOUT'] : '{ LOGOUT }')); ?></a></li>
				</ul>
			</li>
		</ul>
	</div>
	
	<div class="user-login hidden-xs">
		<ul class="nav navbar-nav navbar-right navbar-nav-fancy">
		<li><a class="btn-search" href="javascript:void(0)"><i class="fa fa-lightbulb-o"></i></a></li>
			<li class="dropdown dropdown-avatar">
			  <a href="javascript:void(0)" data-toggle="dropdown" class=""><?php echo (isset($this->_rootref['USER_AVATAR_THUMB'])) ? $this->_rootref['USER_AVATAR_THUMB'] : ''; ?>&nbsp;&nbsp;<span><?php echo ((isset($this->_rootref['L_WELCOME_INDEX'])) ? $this->_rootref['L_WELCOME_INDEX'] : ((isset($user->lang['WELCOME_INDEX'])) ? $user->lang['WELCOME_INDEX'] : '{ WELCOME_INDEX }')); ?>,&nbsp;<?php echo (isset($this->_rootref['CURRENT_USERNAME'])) ? $this->_rootref['CURRENT_USERNAME'] : ''; ?><i class="caret"></i></span></a>
                    <ul class="dropdown-menu user-login-drop arrow-up">
                        <li><a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"> <?php echo ((isset($this->_rootref['L_YOU_HAVE'])) ? $this->_rootref['L_YOU_HAVE'] : ((isset($user->lang['YOU_HAVE'])) ? $user->lang['YOU_HAVE'] : '{ YOU_HAVE }')); ?> <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; if ($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD']) {  ?> <?php echo ((isset($this->_rootref['L_AND'])) ? $this->_rootref['L_AND'] : ((isset($user->lang['AND'])) ? $user->lang['AND'] : '{ AND }')); ?> <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'] : ''; } ?></a></li>
						<li>
							<div class="navbar-wrapper">
                              <div class="navbar-content navbar-avatar">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-7">
                                            <?php echo (isset($this->_rootref['USER_AVATAR_MENU'])) ? $this->_rootref['USER_AVATAR_MENU'] : ''; ?>

                                            <p class="text-center"><a class="" href="<?php echo (isset($this->_rootref['U_UCP_PROFILE_AVATAR'])) ? $this->_rootref['U_UCP_PROFILE_AVATAR'] : ''; ?>">
                                                <small><?php echo ((isset($this->_rootref['L_CHANGE_AVATAR'])) ? $this->_rootref['L_CHANGE_AVATAR'] : ((isset($user->lang['CHANGE_AVATAR'])) ? $user->lang['CHANGE_AVATAR'] : '{ CHANGE_AVATAR }')); ?></small>
                                            </a></p>
                                        </div>
                                        <div class="col-md-7 col-xs-5"><span><?php echo (isset($this->_rootref['CURRENT_USERNAME_FULL'])) ? $this->_rootref['CURRENT_USERNAME_FULL'] : ''; ?></span>

                                            <p class="text-muted small"><?php echo (isset($this->_rootref['USER_EMAIL_MENU'])) ? $this->_rootref['USER_EMAIL_MENU'] : ''; ?></p>
                                            <div class="divider"></div>
                                             <?php if ($this->_rootref['U_ACP']) {  ?><a class="btn btn-info btn-sm btn-block" href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>"><i class="fa fa-user-md"></i>&nbsp;<?php echo ((isset($this->_rootref['L_ADMIN_PANEL_GENERAL'])) ? $this->_rootref['L_ADMIN_PANEL_GENERAL'] : ((isset($user->lang['ADMIN_PANEL_GENERAL'])) ? $user->lang['ADMIN_PANEL_GENERAL'] : '{ ADMIN_PANEL_GENERAL }')); ?></a><?php } if ($this->_rootref['U_MCP']) {  ?><a class="btn btn-warning btn-sm btn-block" href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>"><i class="fa fa-legal"></i>&nbsp;<?php echo ((isset($this->_rootref['L_MODERATOR_PANEL_GENERAL'])) ? $this->_rootref['L_MODERATOR_PANEL_GENERAL'] : ((isset($user->lang['MODERATOR_PANEL_GENERAL'])) ? $user->lang['MODERATOR_PANEL_GENERAL'] : '{ MODERATOR_PANEL_GENERAL }')); ?></a><?php } if ($this->_rootref['S_REGISTERED_USER'] && ! ( $this->_rootref['U_ACP'] || $this->_rootref['U_MCP'] )) {  ?><a class="btn btn-success btn-sm btn-block" href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><i class="fa fa-user"></i>&nbsp;<?php echo ((isset($this->_rootref['L_USER_PANEL'])) ? $this->_rootref['L_USER_PANEL'] : ((isset($user->lang['USER_PANEL'])) ? $user->lang['USER_PANEL'] : '{ USER_PANEL }')); ?></a><?php } ?>

										</div>
                                    </div>
							  </div>
							  <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a class="btn btn-default btn-sm" href="<?php echo (isset($this->_rootref['U_UCP_PROFILE_SETTINGS'])) ? $this->_rootref['U_UCP_PROFILE_SETTINGS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_CHANGE_PASSWORD'])) ? $this->_rootref['L_CHANGE_PASSWORD'] : ((isset($user->lang['CHANGE_PASSWORD'])) ? $user->lang['CHANGE_PASSWORD'] : '{ CHANGE_PASSWORD }')); ?></a></div>
                                            <div class="col-md-6 col-xs-6"><a class="btn btn-default btn-sm pull-right" href="<?php echo (isset($this->_rootref['U_LOGOUT'])) ? $this->_rootref['U_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGOUT'])) ? $this->_rootref['L_LOGOUT'] : ((isset($user->lang['LOGOUT'])) ? $user->lang['LOGOUT'] : '{ LOGOUT }')); ?></a></div>
                                        </div>
                                    </div>
                               </div>
							</div>
                        </li>
                    </ul>
            </li>
		</ul>
	</div>
	<?php } ?>

</nav>