
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>


<ol class="breadcrumb">
    <li ><a href="<?=site_url()?>">Home</a></li>
    <li class="active">My Bookmarks</li>
</ol>

<div class="row margin-bottom-10">
    <div class="col-md-12">
        <h3 style="position: relative;">
            <?=$this->session->userdata('user_login')?> Bookmarks <?=$cat ? $this->config->item('maincat_name')[$cat] : ''?>
        </h3>
        <ul class="nav nav-tabs" style="float: right;">
            <li role="presentation" <?php if (!$cat) echo 'class="active"'?>><a href="<?=site_url("bookmarks")?>">All</a></li>
            <li role="presentation" <?php if ($cat == CAT_MOVIES) echo 'class="active"'?>><a href="<?=site_url("bookmarks/movies")?>">Movies</a></li>
            <li role="presentation" <?php if ($cat == CAT_TV) echo 'class="active"'?>><a href="<?=site_url('bookmarks/tv')?>">TV</a></li>
            <li role="presentation" <?php if ($cat == CAT_ANIME) echo 'class="active"'?>><a href="<?=site_url('bookmarks/anime')?>">Anime</a></li>
            <li role="presentation" <?php if ($cat == CAT_MUSIC) echo 'class="active"'?> ><a href="<?=site_url('bookmarks/music')?>">Music</a></li>
            <li role="presentation" <?php if ($cat == CAT_BOOKS) echo 'class="active"'?> ><a href="<?=site_url('bookmarks/books')?>">Books</a></li>
            <li role="presentation" <?php if ($cat == CAT_GAMES) echo 'class="active"'?> ><a href="<?=site_url('bookmarks/games')?>">Games</a></li>
            <li role="presentation" <?php if ($cat == CAT_SOFTWARE) echo 'class="active"'?> ><a href="<?=site_url('bookmarks/software')?>">Apps</a></li>
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

<nav class="text-center">
    <ul class="pagination pagination-lg">
        <?=$pagination?>
    </ul>
</nav>

<div id="side_banners">
</div>

<?php include('footer_links.php') ?>


