

<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>
        
        <ol class="breadcrumb">
          <li><a href="<?=site_url()?>">Home</a></li>
          <li class="active"><?=$category['name']?></li>          
        </ol>
        
        <?php if (count($subcats)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3 style="position: relative;">
                    <?=$category['name']?> Torrents&nbsp;&nbsp;<a target="_blank" href="<?=site_url('rss/category/'.$category['catid'])?>"><i class="fa fa-rss-square fa-lg"></i></a>
                </h3>
                <?php $table_data = $subcats ?>
                <?php include('table_subcats.php') ?>       
            </div>
        </div>
        <?php endif ?>
<div id="side_banners">
</div>
        <?php include('footer_links.php') ?>
   

