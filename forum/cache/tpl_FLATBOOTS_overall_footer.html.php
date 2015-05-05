<?php if (!defined('IN_PHPBB')) exit; ?></main>
	</div> <!-- page-body id in header -->
  </div> <!-- content-forum in header -->
 </div> <!-- container  in header -->
</div> <!-- wrap  in header --><?php if (! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['S_IS_BOT'] && $this->_rootref['SCRIPT_NAME'] == ("index")) {  $this->_tpl_include('addons/sitesplat_login_body.html'); } ?>


	<section class="page-section">
		<div id="rtblock" class="container">
		<!--
			<div class="text-center">
			   <h1><?php echo ((isset($this->_rootref['L_FANCY_TOPICS_TITLE'])) ? $this->_rootref['L_FANCY_TOPICS_TITLE'] : ((isset($user->lang['FANCY_TOPICS_TITLE'])) ? $user->lang['FANCY_TOPICS_TITLE'] : '{ FANCY_TOPICS_TITLE }')); ?></h1>
			</div>
		-->
		   <?php $this->_tpl_include('addons/recent_topics_body.html'); ?>

	   </div>
	</section>

	<?php $this->_tpl_include('addons/call_to_action_body.html'); ?>


    <section class="section-pre-footer">
		<div class="center">
			<div class="row">
				<div class="col-sm-5 twitter">
					<div class="thumb"><i class="fa fa-paw"></i></div>
					<div class="text">
						<h3><?php echo ((isset($this->_rootref['L_FLATBOOTS_ABOUT_TITLE'])) ? $this->_rootref['L_FLATBOOTS_ABOUT_TITLE'] : ((isset($user->lang['FLATBOOTS_ABOUT_TITLE'])) ? $user->lang['FLATBOOTS_ABOUT_TITLE'] : '{ FLATBOOTS_ABOUT_TITLE }')); ?></h3>
						<p><?php echo ((isset($this->_rootref['L_FLATBOOTS_ABOUT_PART_ONE'])) ? $this->_rootref['L_FLATBOOTS_ABOUT_PART_ONE'] : ((isset($user->lang['FLATBOOTS_ABOUT_PART_ONE'])) ? $user->lang['FLATBOOTS_ABOUT_PART_ONE'] : '{ FLATBOOTS_ABOUT_PART_ONE }')); ?></p>
						<a href="#"><strong><?php echo ((isset($this->_rootref['L_READ_MORE'])) ? $this->_rootref['L_READ_MORE'] : ((isset($user->lang['READ_MORE'])) ? $user->lang['READ_MORE'] : '{ READ_MORE }')); ?></strong></a>
					</div>
				</div>
				<div class="col-sm-5 col-sm-offset-2 twitter">
					<div class="thumb"><i class="fa fa-twitter"></i></div>
					<div class="text">
						<h3><a href="https://twitter.com/SiteSplat"><?php echo ((isset($this->_rootref['L_JOIN_US_TWITTER'])) ? $this->_rootref['L_JOIN_US_TWITTER'] : ((isset($user->lang['JOIN_US_TWITTER'])) ? $user->lang['JOIN_US_TWITTER'] : '{ JOIN_US_TWITTER }')); ?>&nbsp;<small>@SiteSplat</small></a></h3>
						 <div id="twitter-feed"></div>
					</div>
				</div>
			</div>
		</div>
		 <div class="section-bg"></div>
	</section>
    
	<footer class="burned-asphalt" role="contentinfo"> <!-- Footer block -->
		<div class="midnight-" id="sub-footer">
			<div class="container">
				<div class="row bottomLinks">
				
					<div class="col-sm-6 sm-direction">
					 <nav role="navigation" aria-label="Secondary">
						<ul class="list-inline footer-nav">
						 <li><a href="<?php echo (isset($this->_rootref['U_ADVERTISE'])) ? $this->_rootref['U_ADVERTISE'] : ''; ?>" title=""><?php echo ((isset($this->_rootref['L_ADVERTISE'])) ? $this->_rootref['L_ADVERTISE'] : ((isset($user->lang['ADVERTISE'])) ? $user->lang['ADVERTISE'] : '{ ADVERTISE }')); ?></a></li>
						 <li><a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>" title=""><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></li>
						 <li><a href="<?php echo (isset($this->_rootref['U_DMCA'])) ? $this->_rootref['U_DMCA'] : ''; ?>" title=""><?php echo ((isset($this->_rootref['L_DMCA'])) ? $this->_rootref['L_DMCA'] : ((isset($user->lang['DMCA'])) ? $user->lang['DMCA'] : '{ DMCA }')); ?></a></li>
						 <li><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>" title=""><?php echo ((isset($this->_rootref['L_TERMS'])) ? $this->_rootref['L_TERMS'] : ((isset($user->lang['TERMS'])) ? $user->lang['TERMS'] : '{ TERMS }')); ?></a></li>
						 <li><a href="<?php echo (isset($this->_rootref['U_CONTACT'])) ? $this->_rootref['U_CONTACT'] : ''; ?>" title=""><?php echo ((isset($this->_rootref['L_CONTACT'])) ? $this->_rootref['L_CONTACT'] : ((isset($user->lang['CONTACT'])) ? $user->lang['CONTACT'] : '{ CONTACT }')); ?></a></li>
						</ul>
					 </nav>
					</div>
						
					<div class="col-sm-6 sm-direction">	
						<div class="clearfix socialbar">
							<div class="social-network">
								<a class="google-plus-color" title="Google+" data-original-title="" href="#1"><i class="fa fa-google-plus"></i></a>
								<a class="github-color" title="Github" data-original-title="" href="#2"><i class="fa fa-github"></i></a>
								<a class="behance-color" title="Behance" data-original-title="" href="#3"><i class="fa fa-behance"></i></a>
								<!-- <a class="dropbox-color" title="Dropbox" data-original-title="" href="#4"><i class="fa fa-dropbox"></i></a> -->
								<!-- <a class="pinterest-color" title="Pinterest" data-original-title="" href="#5"><i class="fa fa-pinterest"></i></a> -->
								<a class="facebook-color" title="Facebook" data-original-title="" href="#6"><i class="fa fa-facebook"></i></a>
								<a class="twitter-color" title="Twitter" data-original-title="" href="#7"><i class="fa fa-twitter"></i></a>
								<!-- <a class="bitbucket-color" title="Bitbucket" data-original-title="" href="#8"><i class="fa fa-bitbucket"></i></a> -->
								<a class="envato-color" title="Envato" data-original-title="" href="http://themeforest.net/user/ThemeSplat/portfolio?ref=ThemeSplat"><i class="icon-moon-envato1"></i></a>
								<a class="rss-color hidden-xs" title="rss" data-original-title="" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>"><i class="fa fa-rss"></i></a>
							</div>
						</div>
					</div>	
					
					<div class="col-sm-6 sm-direction">
					 <p class="copyrights"><small><?php echo ((isset($this->_rootref['L_HANDCRAFTED'])) ? $this->_rootref['L_HANDCRAFTED'] : ((isset($user->lang['HANDCRAFTED'])) ? $user->lang['HANDCRAFTED'] : '{ HANDCRAFTED }')); ?></small>&nbsp;<i class="fa fa-heart text-flatboots-red"></i>&nbsp;<small><?php echo ((isset($this->_rootref['L_AND'])) ? $this->_rootref['L_AND'] : ((isset($user->lang['AND'])) ? $user->lang['AND'] : '{ AND }')); ?></small>&nbsp;<i class="fa fa-coffee"></i>&nbsp;<small><?php echo ((isset($this->_rootref['L_BY'])) ? $this->_rootref['L_BY'] : ((isset($user->lang['BY'])) ? $user->lang['BY'] : '{ BY }')); ?><a href="http://www.sitesplat.com/" title="SiteSplat.com" target="_blank">&nbsp;<?php echo ((isset($this->_rootref['L_SITESPLAT'])) ? $this->_rootref['L_SITESPLAT'] : ((isset($user->lang['SITESPLAT'])) ? $user->lang['SITESPLAT'] : '{ SITESPLAT }')); ?></a></small></p>
					</div>
					
					<div class="col-sm-6 sm-direction">
					  <p class="debug-output"><small>
						<?php echo (isset($this->_rootref['S_TIMEZONE'])) ? $this->_rootref['S_TIMEZONE'] : ''; ?>&#45;
						<?php if ($this->_rootref['TRANSLATION_INFO']) {  echo (isset($this->_rootref['TRANSLATION_INFO'])) ? $this->_rootref['TRANSLATION_INFO'] : ''; } if ($this->_rootref['DEBUG_OUTPUT']) {  echo (isset($this->_rootref['DEBUG_OUTPUT'])) ? $this->_rootref['DEBUG_OUTPUT'] : ''; } ?><!-- <?php echo ((isset($this->_rootref['L_FLATBOOTS_VERSION'])) ? $this->_rootref['L_FLATBOOTS_VERSION'] : ((isset($user->lang['FLATBOOTS_VERSION'])) ? $user->lang['FLATBOOTS_VERSION'] : '{ FLATBOOTS_VERSION }')); ?> -->
					  </small></p>
					</div>
					
				</div>
			</div>
		</div>
	</footer>

<a id="totop" class="top-flat" href="" onclick="return false;" style="display:none;"></a>

<div class="hidden"><?php if (! $this->_rootref['S_IS_BOT']) {  echo (isset($this->_rootref['RUN_CRON_TASK'])) ? $this->_rootref['RUN_CRON_TASK'] : ''; } ?></div> 

<!-- injected via a module or an include -->
<script>
// some function that depends on bootstrap and jquery
head.ready(function () {
	$('.footable').footable();$(".selectpicker").selectpicker();$(".selectpicker, .mchat-ttp").tooltip("disable");$(".btn-group [title]").tooltip({container:"body"});twitterFetcher.fetch("391407906655965184","twitter-feed",1,true,false);var totop=$("#totop");totop.click(function(){$("html, body").stop(true,true).animate({scrollTop:0},500);return false});$(window).scroll(function(){if($(this).scrollTop()>600){totop.fadeIn()}else{totop.fadeOut()}});$("button[data-loading-text]").click(function(){var e=$(this);e.button("loading");setTimeout(function(){e.button("reset")},3e3)});jQuery(function(e){e("a").tooltip({html:true,container:"body"})});
	$("input").iCheck({checkboxClass:"icheckbox_flat-aero",radioClass:"iradio_flat-aero"});$(".btn-search").click(function(){$(".search-input").toggleClass("open").find("input").focus()});$(".close").click(function(){$(this).prev("input").val("").parents(".search-input").removeClass("open")});$(".nav-tog").click(function(){if($(this).hasClass("neutro")){$(this).removeClass("neutro").addClass("open")}else{$(this).removeClass("open").addClass("neutro")}});
});
</script>
<!-- Google Analytics: change UA-XXXXXXXX-X to be your site's ID. -->

</body>
</html>