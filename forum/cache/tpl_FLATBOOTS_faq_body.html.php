<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

  <h2><?php echo ((isset($this->_rootref['L_FAQ_TITLE'])) ? $this->_rootref['L_FAQ_TITLE'] : ((isset($user->lang['FAQ_TITLE'])) ? $user->lang['FAQ_TITLE'] : '{ FAQ_TITLE }')); ?></h2>
<div class="panel-group" id="f<?php echo $_faq_block_val['S_ROW_COUNT']; ?>r<?php echo $_faq_row_val['S_ROW_COUNT']; ?>">
<?php $_faq_block_count = (isset($this->_tpldata['faq_block'])) ? sizeof($this->_tpldata['faq_block']) : 0;if ($_faq_block_count) {for ($_faq_block_i = 0; $_faq_block_i < $_faq_block_count; ++$_faq_block_i){$_faq_block_val = &$this->_tpldata['faq_block'][$_faq_block_i]; ?>

<div class="space10"></div>
 <div class="space10"></div>
  <div class="space10"></div>
<div class="side-segment">
<h3> <?php echo $_faq_block_val['BLOCK_TITLE']; ?> </h3>
</div>
<?php $_faq_row_count = (isset($_faq_block_val['faq_row'])) ? sizeof($_faq_block_val['faq_row']) : 0;if ($_faq_row_count) {for ($_faq_row_i = 0; $_faq_row_i < $_faq_row_count; ++$_faq_row_i){$_faq_row_val = &$_faq_block_val['faq_row'][$_faq_row_i]; ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="f<?php echo $_faq_block_val['S_ROW_COUNT']; ?>r<?php echo $_faq_row_val['S_ROW_COUNT']; ?>" href="#f<?php echo $_faq_block_val['S_ROW_COUNT']; ?>r<?php echo $_faq_row_val['S_ROW_COUNT']; ?>">
          <?php echo $_faq_row_val['FAQ_QUESTION']; ?>

        </a>
      </h4>
    </div>
    <div id="f<?php echo $_faq_block_val['S_ROW_COUNT']; ?>r<?php echo $_faq_row_val['S_ROW_COUNT']; ?>" class="panel-collapse collapse">
      <div class="panel-body">
        <?php echo $_faq_row_val['FAQ_ANSWER']; ?>

      </div>
    </div>
  </div>
  <?php }} }} ?>

</div>
<div class="row">
<?php $this->_tpl_include('jumpbox.html'); ?>

</div>

<?php $this->_tpl_include('jump_links.html'); $this->_tpl_include('overall_footer.html'); ?>