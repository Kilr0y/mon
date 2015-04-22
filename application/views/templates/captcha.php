<?php
include_once("./config.php");

if (isset($_SESSION['captcha_validated']) && $_SESSION['captcha_validated']){
    
    $response = array(
        'status' => 'validated'
    );
    echo json_encode($response);
    die();
    
}


global $base_uri;

//generating random array from images
$other_images = array(
    "{$base_uri}images/captcha/nature_1.jpg",
    "{$base_uri}images/captcha/nature_2.jpg"
);


$images = array();
$images[] = "{$base_uri}images/captcha/car.png";
$images[] = "{$base_uri}images/captcha/car.png";

$image1_arr = explode('/', $images[0]);
$image2_arr = explode('/', $images[1]);

$captcha = array();
$captcha['image1'] = end($image1_arr);
$captcha['image2'] = end($image2_arr);
$_SESSION['captcha'] = $captcha; 

for ($i = 0; $i < 7; $i++){   
    $key = array_rand($other_images);
    $images[] = $other_images[$key];
}
shuffle($images);

?>

<div id="lightbox_captcha" class="lightbox" style="display:none"> 
   <table class="lightbox_table">
   <tr>
   <td class="lightbox_table_cell" align="center">
      <div id="lightbox_content" class="lightbox_content" style="width:800px;">
	      <div class="lightbox_inner" id="lightbox_inner">
					<table width="100%">
					<tr><td align="center">
						<h1><?=tr('Please select two images with car')?></h1><br />
						<div class="error"></div>
						<form id="captcha_form" action="bot.php" method="post">
    					    <input id="captcha_1" type="hidden" name="image1" />
                            <input id="captcha_2" type="hidden" name="image2" />	   						
						</form>
                        <div class="images">
                            <?php for ($i = 0; $i < 9; $i++): ?>
                                <?php if ($i == 0 || $i == 3 || $i == 6): ?> 
                                    <div class="row">
                                <?php endif ?>
                                <img src="<?php echo $images[$i]?>" />
                                <?php if ($i == 2 || $i == 5 || $i == 8): ?>
                                    </div>
                                <?php endif ?>  
                                                              
                            <?php endfor ?>                           
                        </div>
                        <br />
                        <span><input id="captcha_submit" type="Submit" value="<?=tr('Check')?>"></span>
					</td></tr>
					</table>        
        </div> 
      </div>
   </td>
   </tr>
   </table>
   
   <script>
    $(document).ready(function(){
        $('#lightbox_captcha .row img').click(function(){
            if ($(this).hasClass('selected')){
                $(this).removeClass('selected');
            } else {
                if ($('#lightbox_captcha .row img.selected').length < 2){
                    $(this).addClass('selected');
                }                
            }            
        });
        $('#captcha_submit').click(function(e){
            e.preventDefault();
            if ($('#lightbox_captcha .row img.selected').length == 2){
                var image1 = $('#lightbox_captcha .row img.selected').eq(0).attr('src');
                var image2 = $('#lightbox_captcha .row img.selected').eq(1).attr('src');
                $.post('<?=$base_uri?>captcha.php', {image1: image1, image2: image2}, function(data){
                    if (data.status == 'ok'){
                        $('#lightbox_captcha').remove();
                        lightboxAction('lightbox_upload');
                    } else {
                        $('#lightbox_captcha').remove();
                        $('#upload_captcha').click();
                    }
                }, 'json');
            } else {
                alert('<?php echo tr('Please select TWO images with car')?>');
            }
        });
    });
    </script>
</div>

