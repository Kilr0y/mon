
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>


<ol class="breadcrumb">
    <li ><a href="<?=site_url()?>">Home</a></li>
    <li class="active">Favorites</li>
</ol>

<div class="row margin-bottom-10">
    <div class="col-md-12">
        <h3 style="position: relative;">
            Favorites <?=$cat ? $this->config->item('maincat_name')[$cat] : ''?>
        </h3>
        <ul class="nav nav-tabs" style="float: right;">
            <li role="presentation" <?php if (!$cat) echo 'class="active"'?>><a href="<?=site_url("favorites")?>">All</a></li>
            <li role="presentation" <?php if ($cat == CAT_MOVIES) echo 'class="active"'?>><a href="<?=site_url("favorites/movies")?>">Movies</a></li>
            <li role="presentation" <?php if ($cat == CAT_TV) echo 'class="active"'?>><a href="<?=site_url('favorites/tv')?>">TV</a></li>
            <li role="presentation" <?php if ($cat == CAT_ANIME) echo 'class="active"'?>><a href="<?=site_url('favorites/anime')?>">Anime</a></li>
            <li role="presentation" <?php if ($cat == CAT_MUSIC) echo 'class="active"'?> ><a href="<?=site_url('favorites/music')?>">Music</a></li>
            <li role="presentation" <?php if ($cat == CAT_BOOKS) echo 'class="active"'?> ><a href="<?=site_url('favorites/books')?>">Books</a></li>
            <li role="presentation" <?php if ($cat == CAT_GAMES) echo 'class="active"'?> ><a href="<?=site_url('favorites/games')?>">Games</a></li>
            <li role="presentation" <?php if ($cat == CAT_SOFTWARE) echo 'class="active"'?> ><a href="<?=site_url('favorites/software')?>">Apps</a></li>
        </ul>
    </div>
</div>

<?php foreach ($favorites as $k => $favorite):?>

<?php if (count($favorite)): ?>
    <div class="row">
        <div class="col-md-12">
            <h3><?=$this->config->item('maincat_name')[$k]?></h3>
            <?php $table_data = $favorite ?>
            <?php include('table_favorites.php') ?>
        </div>
    </div>
<?php endif ?>
<?php endforeach?>


<div id="side_banners">
</div>

<?php include('footer_links.php') ?>


