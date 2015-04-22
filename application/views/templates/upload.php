<?php
require_once('./config.php');

global $base_uri;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$dstyle9 = (isset($modal['id']) && $modal['id'] == 'upload' && $modal['show'] == 'inline') ? 'inline' : 'none';

//get categories for upload form
$result = do_query("SELECT * FROM categories ORDER BY name, subname ASC");  
$options = '<option value="">('.tr('Choose').')</option>';  
while ($row = mysql_fetch_assoc($result))
{
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

<div id="lightbox_upload" class="lightbox" style="display:<?=$dstyle9?>"> 
    <table class="lightbox_table">
    <tr>
    <td class="lightbox_table_cell" align="center">
        <div id="lightbox_content" class="lightbox_content" style="width:800px;">
            <div class="lightbox_inner" id="lightbox_inner">
	            <form id="upload_form" name="descform" action="<?=$base_uri?>bot.php" method="post" enctype="multipart/form-data">
			    <input type="hidden" name="modal" value="true">
                <input type="hidden" name="username" value="" />
                <input type="hidden" name="hash" value="<?=$unique?>" />
                <h1>Torrent Upload</h1>      
                <br />          
			    <table class="small_table">			        
				    <tr>
                        <td width="35%"><b><?=tr('Select Torrent File')?>:</b></td> 
                        <td><input class="hidden" type="file" name="torrent">                            
                            <div class="upload_torrent_button"><input disabled /><div>Browse</div></div>                            
                        </td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Select Category')?>:</b></td> 
                        <td><select class="select" name="type"><?=$options?></select></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Enter Upload Name')?>:</b></td> 
                        <td><input class="input" name="filename"></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><b><?=tr('Private Tracker')?>?:</b></td> 
                        <td><input name="reg" type="radio" value="1" /><?=tr('yes')?> <input name="reg" type="radio" value="0" checked /><?=tr('no')?></td>                        
                    </tr>
                    <tr>
                        <td width="35%"><?=tr('Password (optional)')?>:</td> 
                        <td><input class="input" id="password" name="password" /></td>
                    </tr>
                </table>
                <div class="info">
                    <center><b>DO NOT UPLOAD:</b></center>
					<br/>
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
                            <div class="toolbar_small"><?=show_toolbar('descform', 'info', true)?></div>
                            <textarea name="info" rows="15" cols="50" ></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td width="25%"><?=tr('NFO File (optional)')?>:</td> 
                        <td>
                            <input class="hidden" id="tfile" type="file" name="nfo" size="40"/>
                            <div class="upload_torrent_button"><input disabled /><div>Browse</div></div>
                        </td>
                    </tr>
			    </table>
                <br />
                <div class="center"> 
			        <input id="upload_submit" type="submit" value="<?=tr('Submit')?>">
                </div>
			    </form>
            </div> 
        </div>
    </td>
    </tr>
    </table>
</div>
<script>
    $('#upload_submit').click(function(e){         
        if ($('html').is('.ie, .ie7, .ie8, .ie9') || (Function('/*@cc_on return document.documentMode===10@*/')())){  
            $('#upload_form').attr('action', base_uri + 'upload.php');  
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
                url: base_uri + 'upload.php',
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
        $(this).closest('td').find('.hidden').click();        
    });
    
    
    $('.hidden').change(function(){
        $(this).closest('td').find('.upload_torrent_button input').val($(this).val());
    });
</script>