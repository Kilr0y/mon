<?php if (!defined('IN_PHPBB')) exit; ?><div class="panel-body tab-pane" id="posting-attach-body-html">
	<p><?php echo ((isset($this->_rootref['L_ADD_ATTACHMENT_EXPLAIN'])) ? $this->_rootref['L_ADD_ATTACHMENT_EXPLAIN'] : ((isset($user->lang['ADD_ATTACHMENT_EXPLAIN'])) ? $user->lang['ADD_ATTACHMENT_EXPLAIN'] : '{ ADD_ATTACHMENT_EXPLAIN }')); ?></p>
<style>
.btn-file{position:relative;overflow:hidden;vertical-align:middle}.btn-file>input{position:absolute;top:0;right:0;width:100%;height:100%;margin:0;font-size:23px;cursor:pointer;filter:alpha(opacity=0);opacity:0;direction:ltr}.fileinput{display:inline-block;margin-bottom:9px}.fileinput .form-control{display:inline-block;padding-top:7px;padding-bottom:5px;margin-bottom:0;vertical-align:middle;cursor:text}.fileinput .thumbnail{display:inline-block;margin-bottom:5px;overflow:hidden;text-align:center;vertical-align:middle}.fileinput .thumbnail>img{max-height:100%}.fileinput .btn{vertical-align:middle}.fileinput-exists .fileinput-new,.fileinput-new .fileinput-exists{display:none}.fileinput-inline .fileinput-controls{display:inline}.fileinput-filename{display:inline-block;overflow:hidden;vertical-align:middle}.form-control .fileinput-filename{vertical-align:bottom}.fileinput.input-group{display:table}.fileinput.input-group>*{position:relative;z-index:2}.fileinput.input-group>.btn-file{z-index:1}.fileinput-new.input-group .btn-file,.fileinput-new .input-group .btn-file{border-radius:0 4px 4px 0}.fileinput-new.input-group .btn-file.btn-xs,.fileinput-new .input-group .btn-file.btn-xs,.fileinput-new.input-group .btn-file.btn-sm,.fileinput-new .input-group .btn-file.btn-sm{border-radius:0 3px 3px 0}.fileinput-new.input-group .btn-file.btn-lg,.fileinput-new .input-group .btn-file.btn-lg{border-radius:0 6px 6px 0}.form-group.has-warning .fileinput .fileinput-preview{color:#8a6d3b}.form-group.has-warning .fileinput .thumbnail{border-color:#faebcc}.form-group.has-error .fileinput .fileinput-preview{color:#a94442}.form-group.has-error .fileinput .thumbnail{border-color:#ebccd1}.form-group.has-success .fileinput .fileinput-preview{color:#3c763d}.form-group.has-success .fileinput .thumbnail{border-color:#d6e9c6}.input-group-addon:not(:first-child){border-left:0}
</style> 
<fieldset>
  <div class="fileinput fileinput-new" data-provides="fileinput">
   <button type="submit" name="add_file" value="<?php echo ((isset($this->_rootref['L_ADD_FILE'])) ? $this->_rootref['L_ADD_FILE'] : ((isset($user->lang['ADD_FILE'])) ? $user->lang['ADD_FILE'] : '{ ADD_FILE }')); ?>" class="btn btn-default fileinput-exists" onclick="upload = true;" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_FILE_UPLOADING'])) ? $this->_rootref['L_FILE_UPLOADING'] : ((isset($user->lang['FILE_UPLOADING'])) ? $user->lang['FILE_UPLOADING'] : '{ FILE_UPLOADING }')); ?><i class='fa-spin fa fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_ADD_FILE'])) ? $this->_rootref['L_ADD_FILE'] : ((isset($user->lang['ADD_FILE'])) ? $user->lang['ADD_FILE'] : '{ ADD_FILE }')); ?></button>
    <span class="btn btn-default btn-file">
    <span class="fileinput-new"><?php echo ((isset($this->_rootref['L_FILE_SELECT'])) ? $this->_rootref['L_FILE_SELECT'] : ((isset($user->lang['FILE_SELECT'])) ? $user->lang['FILE_SELECT'] : '{ FILE_SELECT }')); ?></span>
    <span class="fileinput-exists"><?php echo ((isset($this->_rootref['L_FILE_CHANGE'])) ? $this->_rootref['L_FILE_CHANGE'] : ((isset($user->lang['FILE_CHANGE'])) ? $user->lang['FILE_CHANGE'] : '{ FILE_CHANGE }')); ?></span>
      <input type="file" name="fileupload" id="fileupload" maxlength="<?php echo (isset($this->_rootref['FILESIZE'])) ? $this->_rootref['FILESIZE'] : ''; ?>" value="" />
    </span>
    <i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span>
    <a href="#" class="close close-file-upload fileinput-exists" data-dismiss="fileinput" style="float: none"><i class="fa fa-times"></i></a>
  </div>
	
<div class="control-group"> 
	<label class="control-label" for="filecomment"><?php echo ((isset($this->_rootref['L_FILE_COMMENT'])) ? $this->_rootref['L_FILE_COMMENT'] : ((isset($user->lang['FILE_COMMENT'])) ? $user->lang['FILE_COMMENT'] : '{ FILE_COMMENT }')); ?>:</label>
	<div class="controls controls-row"> 
	 <textarea placeholder="<?php echo ((isset($this->_rootref['L_FILE_COMMENT_PLACEHOLDER'])) ? $this->_rootref['L_FILE_COMMENT_PLACEHOLDER'] : ((isset($user->lang['FILE_COMMENT_PLACEHOLDER'])) ? $user->lang['FILE_COMMENT_PLACEHOLDER'] : '{ FILE_COMMENT_PLACEHOLDER }')); ?>" rows="1" name="filecomment" id="filecomment" class="form-control"><?php echo (isset($this->_rootref['FILE_COMMENT'])) ? $this->_rootref['FILE_COMMENT'] : ''; ?></textarea>
    </div> 
</div>
</fieldset>
<script>
head.load("<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/jupload.min.js");
</script>
</div>