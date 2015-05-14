

<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>
        
        <?php if (count($movies)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?=site_url('movies')?>">Movies Torrents</a>&nbsp;&nbsp;<a href="<?=site_url('rss/category/1')?>" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h3>
                <?php $table_data = $movies ?>
                <?php include('table.php') ?>        
            </div>
        </div>
        <?php endif ?>
        
        <?php if (count($tv)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?=site_url('tv')?>">TV Shows Torrents</a>&nbsp;&nbsp;<a href="<?=site_url('rss/category/8')?>" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h3>
                <?php $table_data = $tv ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php endif ?>
        
        <?php if (count($music)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?=site_url('music')?>">Music Torrents</a>&nbsp;&nbsp;<a href="<?=site_url('rss/category/3')?>" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h3>
                <?php $table_data = $music ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php endif ?>
        
        <?php if (count($soft)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?=site_url('software')?>">Software Torrents</a>&nbsp;&nbsp;<a href="<?=site_url('rss/category/5')?>" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h3>
                <?php $table_data = $soft ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php endif ?>
        
        
        <?php if (count($games)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?=site_url('games')?>">Games Torrents</a>&nbsp;&nbsp;<a href="<?=site_url('rss/category/4')?>" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h3>
                <?php $table_data = $games ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php endif ?>

<div id="side_banners">
</div>
        
        <?php include('footer_links.php') ?>
        


