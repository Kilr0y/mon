<?php

$base_uri = base_url();

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

get_instance()->load->model('category');
$result = get_instance()->category->get_all_categories();

//get categories for upload form
//$result = do_query("SELECT * FROM categories ORDER BY name, subname ASC");  
$options = '<option value="">('.tr('Choose').')</option>';  
foreach ($result as $row){
    $options .=  "<option value=\"";
    $options .=  $row['subid'];
    $options .=  "\">";
    $options .=  htmlentities (tr($row['name']));
    $options .=  " &raquo; ";
    $options .=  htmlentities (tr($row['subname']));
    $options .=  "</option>";
}
//small bot protection

$unique = generateRandomString();
$_SESSION['upload_unique_str'] = $unique;

?>

<div id="lightbox_upload" class="modal fade" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?=tr('Torrent Upload')?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <form id="upload_form" name="descform" action="<?=$base_uri?>bot.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="modal" value="true">
            <input type="hidden" name="username" value="" />
            <input type="hidden" name="hash" value="<?=$unique?>" />
            
            <div class="col-md-6">
            
                <div class="form-group">
                    <label><?=tr('Select Torrent File')?>:</label>
                    <input class="hidden" type="file" name="torrent" />
                    
                    <input type="email" class="form-control upload_torrent_button" placeholder="<?=tr('Browse')?>" />
                </div>
                
                <div class="form-group ">
                    <label><?=tr('Select Category')?>:</label>
                    <select class="form-control" name="type"><?=$options?></select>
                </div>
                
                <div class="form-group ">
                    <label><?=tr('Enter Upload Name')?>:</label>
                    <input class="form-control" name="filename">
                </div>
                
                
                
                <div class="form-group">
                    <label><?=tr('Private Tracker')?>?:</label><br />
                    <label style="font-weight: normal;">
                        <input name="reg" type="radio" value="1" />&nbsp;<?=tr('Yes')?>
                    </label>&nbsp;&nbsp;&nbsp;
                    <label style="font-weight: normal;">
                        <input name="reg" type="radio" value="0" checked />&nbsp;<?=tr('No')?>
                    </label>
                </div>
                
                <div class="form-group">
                    <label><?=tr('Password (optional)')?>:</label>
                    <input class="form-control" id="password" name="password" />
                </div>
                
                <div class="form-group">
                    <label><?=tr('NFO File (optional)')?>:</label>
                    <input class="hidden" type="file" name="nfo" />
                    
                    <input type="email" class="form-control upload_torrent_button" placeholder="<?=tr('Browse')?>" />
                </div>
                
                <input id="upload_submit" class="btn btn-success" type="submit" value="<?=tr('Submit')?>">
                
            </div>
            
            
            
            <div class="col-md-6">
            
                <div class="form-group">
                    <label><?=tr('Description')?> (<?=tr('optional')?>):</label>                
                    <div class="toolbar_small"><?=show_toolbar('descform', 'info', true)?></div>
                    <textarea class="form-control" name="info" rows="15" cols="50" style="margin-bottom: 7px;"></textarea>                
                </div>
            
            </div>
            
            <div class="clearfix"></div>
            
            
               
        </form>
        </div>
        <br /><br />
        <div class="text_2"><?=tr('If you have any difficulties with upload, please')?> <a href="javascript:void('')" onclick="javascript:lightboxAction('lightbox_contact', true);"><span><u><?=tr('let us know')?></u></span></a></div>
      </div>
    </div>
  </div>
</div>

<!--div id="lightbox_upload" class="lightbox" style="display: none;"> 
    <table class="lightbox_table">
    <tr>
    <td class="lightbox_table_cell" align="center">
        <div id="lightbox_content" class="lightbox_content" style="width:800px;">
            <div class="lightbox_inner" id="lightbox_inner">
	            <form id="upload_form" name="descform" action="<?=$base_uri?>bot.php" method="post" enctype="multipart/form-data">
			    <input type="hidden" name="modal" value="true">
                <input type="hidden" name="username" value="" />
                <input type="hidden" name="hash" value="<?=$unique?>" />
                <div class="text_1" style="text-align: center;">Torrent Upload</div>      
                <br />          
			    <table class="small_table">			        
				    <tr>
                        
                        <td width="35%"><b><?=tr('Select Torrent File')?>:</b></td> 
                        <td>
                            <input class="hidden" type="file" name="torrent" />                                       
                            <div class="input-group upload_torrent_button">
                                <input type="text" class="form-control" /> 
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><?=tr('Browse')?></button>
                                </span>
                            </div>                
                        </td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Select Category')?>:</b></td> 
                        <td><select class="form-control" name="type"><?=$options?></select></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Enter Upload Name')?>:</b></td> 
                        <td><input class="form-control" name="filename"></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Private Tracker')?>?:</b></td> 
                        <td><input name="reg" type="radio" value="1" /><?=tr('yes')?> <input name="reg" type="radio" value="0" checked /><?=tr('no')?></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><?=tr('Password (optional)')?>:</td> 
                        <td><input class="form-control" id="password" name="password" /></td>
                    </tr>
                </table>
                <div class="info">
                    <center><b>DO NOT UPLOAD:</b></center>					
                    <ul>
                        <li>spam or fake content</li>
                        <li>illegal or offensive content</li>
                        <li>password protected content</li>
                        <li>virus infected or malicious content</li>
                    </ul>                    
                </div>
                <div class="clearfix"></div>
                <table class="big_table">
                    <tr>
                        <td width="25%"><?=tr('Description')?> (<?=tr('optional')?>):</td> 
                        <td>
                            <div class="toolbar_small" style="margin-top: 10px;"><?=show_toolbar('descform', 'info', true)?></div>
                            <textarea class="form-control" name="info" rows="15" cols="50" style="margin-bottom: 7px;"></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td width="25%"><?=tr('NFO File (optional)')?>:</td> 
                        <td>
                            <input class="hidden" id="tfile" type="file" name="nfo" size="40"/>                                     
                            <div class="input-group upload_torrent_button">
                                <input type="text" class="form-control" /> 
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><?=tr('Browse')?></button>
                                </span>
                            </div>
                        </td>
                    </tr>
			    </table>
                <br />
                <div class="center"> 
			        <input id="upload_submit" class="btn btn-success" type="submit" value="<?=tr('Submit')?>">
                </div>
			    </form>
            </div> 
        </div>
    </td>
    </tr>
    </table>
</div-->
<script>
    $('#upload_submit').click(function(e){         
        if ($('html').is('.ie, .ie7, .ie8, .ie9') || (Function('/*@cc_on return document.documentMode===10@*/')())){  
            $('#upload_form').attr('action', "<?=base_url('ajax/upload')?>");  
            $('#upload_form').append('<input name="ie" value="1" type="hidden" /><input name="redirect_to" value="'+window.location.href+'" type="hidden" />');
            setTimeout(function(){
                $('#upload_form').submit(); 
            }, 250);
            //         
        } else {   
            e.preventDefault();
            var fdata = new FormData($('#upload_form')[0]);
            lightboxAction('lightbox_loading');     
            $.ajax({
                url: "<?=base_url('ajax/upload')?>",
                type: 'POST',
                success: function(data){
                    if (data.status == 'ok'){
                        set_lightbox_message(data.message);
                        lightboxAction('lightbox_message'); 
                    } else {
                        set_lightbox_message(data.error, 'lightbox_upload');
                        lightboxAction('lightbox_message'); 
                    }
                },                           
                data: fdata,
                dataType: 'json',            
                cache: false,
                contentType: false,
                processData: false
            });
        }        
    });
    
    $('.upload_torrent_button').click(function(e){        
        e.preventDefault();        
        $(this).siblings('.hidden').click();        
    });
    
    
    $('.hidden').change(function(){
        $(this).siblings('.upload_torrent_button').val($(this).val());
    });
</script>