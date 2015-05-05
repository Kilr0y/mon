<?php if (!defined('IN_PHPBB')) exit; ?><div class="clearfix">
  <div class="pull-right" id="review">
	<a href="#review" onclick="viewableArea(getElementById('topicreview'), true); var rev_text = getElementById('review').getElementsByTagName('a').item(0).firstChild; if (rev_text.data == '<?php echo ((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'){rev_text.data = '<?php echo ((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'; } else if (rev_text.data == '<?php echo ((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'){rev_text.data = '<?php echo ((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'};"><?php echo ((isset($this->_rootref['L_EXPAND_VIEW'])) ? $this->_rootref['L_EXPAND_VIEW'] : ((isset($user->lang['EXPAND_VIEW'])) ? $user->lang['EXPAND_VIEW'] : '{ EXPAND_VIEW }')); ?></a>
  </div>
<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_TOPIC_REVIEW'])) ? $this->_rootref['L_TOPIC_REVIEW'] : ((isset($user->lang['TOPIC_REVIEW'])) ? $user->lang['TOPIC_REVIEW'] : '{ TOPIC_REVIEW }')); ?>: <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?></h3></div>
</div>

<div id="topicreview">
<script>
// <![CDATA[
	bbcodeEnabled = <?php echo (isset($this->_rootref['S_BBCODE_ALLOWED'])) ? $this->_rootref['S_BBCODE_ALLOWED'] : ''; ?>;
// ]]>
</script>
	<?php $_topic_review_row_count = (isset($this->_tpldata['topic_review_row'])) ? sizeof($this->_tpldata['topic_review_row']) : 0;if ($_topic_review_row_count) {for ($_topic_review_row_i = 0; $_topic_review_row_i < $_topic_review_row_count; ++$_topic_review_row_i){$_topic_review_row_val = &$this->_tpldata['topic_review_row'][$_topic_review_row_i]; if ($_topic_review_row_val['S_IGNORE_POST']) {  ?>

	<div class="well post-ignore">
		<div class="inner">
			<?php echo $_topic_review_row_val['L_IGNORE_POST']; ?>

	<?php } else { ?>

<div class="post text-muted">
	<?php } ?>

	<div class="well" id="pr<?php echo $_topic_review_row_val['POST_ID']; ?>">
		<h3><a href="#pr<?php echo $_topic_review_row_val['POST_ID']; ?>"><?php echo $_topic_review_row_val['POST_SUBJECT']; ?></a> <?php if ($this->_rootref['S_IS_BOT']) {  ?><span class="pull-right post-id hidden-xs"><i class="fa fa-file"></i></span><?php } else { ?><span class="pull-right post-id hidden-xs"><a href="<?php echo $_topic_review_row_val['U_MINI_POST']; ?>" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_POST'])) ? $this->_rootref['L_JUMP_TO_POST'] : ((isset($user->lang['JUMP_TO_POST'])) ? $user->lang['JUMP_TO_POST'] : '{ JUMP_TO_POST }')); ?>"><i class="fa fa-file"></i></a></span><?php } ?></h3>
	<div class="clearfix">
		<div class="text-muted pull-left">
		  <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?><strong> <?php echo $_topic_review_row_val['POST_AUTHOR_FULL']; ?></strong> &raquo; <?php echo $_topic_review_row_val['POST_DATE']; ?>

		 </div>
			
		<div class="pull-right">
			<?php if ($_topic_review_row_val['POSTER_QUOTE'] && $_topic_review_row_val['DECODED_MESSAGE']) {  ?>

			<a class="btn btn-sm btn-default" href="#postingbox" onclick="addquote(<?php echo $_topic_review_row_val['POST_ID']; ?>, '<?php echo $_topic_review_row_val['POSTER_QUOTE']; ?>', '<?php echo ((isset($this->_rootref['LA_WROTE'])) ? $this->_rootref['LA_WROTE'] : ((isset($this->_rootref['L_WROTE'])) ? addslashes($this->_rootref['L_WROTE']) : ((isset($user->lang['WROTE'])) ? addslashes($user->lang['WROTE']) : '{ WROTE }'))); ?>');" title="<?php echo ((isset($this->_rootref['L_QUOTE'])) ? $this->_rootref['L_QUOTE'] : ((isset($user->lang['QUOTE'])) ? $user->lang['QUOTE'] : '{ QUOTE }')); ?> <?php echo $_topic_review_row_val['POST_AUTHOR']; ?>"><i class="fa fa-comment"></i></a>
			<?php } if ($_topic_review_row_val['U_MCP_DETAILS']) {  ?>

			<a class="btn btn-sm btn-default" href="<?php echo $_topic_review_row_val['U_MCP_DETAILS']; ?>" title="<?php echo ((isset($this->_rootref['L_POST_DETAILS'])) ? $this->_rootref['L_POST_DETAILS'] : ((isset($user->lang['POST_DETAILS'])) ? $user->lang['POST_DETAILS'] : '{ POST_DETAILS }')); ?>"><i class="fa fa-question-circle"></i></a>
			<?php } ?>

		</div>
	</div>
			<div class="content clearfix"><?php echo $_topic_review_row_val['MESSAGE']; ?></div>

			<?php if ($_topic_review_row_val['S_HAS_ATTACHMENTS']) {  ?>

				<div class="attachbox">
					<h5><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></h5>
					<?php $_attachment_count = (isset($_topic_review_row_val['attachment'])) ? sizeof($_topic_review_row_val['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$_topic_review_row_val['attachment'][$_attachment_i]; ?>

						<span><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></span>
					<?php }} ?>

				</div>
			<?php } if ($_topic_review_row_val['POSTER_QUOTE'] && $_topic_review_row_val['DECODED_MESSAGE']) {  ?>

				<div id="message_<?php echo $_topic_review_row_val['POST_ID']; ?>" style="display: none;"><?php echo $_topic_review_row_val['DECODED_MESSAGE']; ?></div>
			<?php } ?>

	</div>
</div>
	<?php }} ?>

</div>