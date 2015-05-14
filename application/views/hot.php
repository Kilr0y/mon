
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>

<ol class="breadcrumb">
    <li ><a href="<?=site_url()?>">Home</a></li>
    <li class="active">Hot</li>
</ol>

<div class="row margin-bottom-10">
    <div class="col-md-12">
        <h3 style="position: relative;">
            Hot <?=$this->config->item('maincat_name')[$cat]?>
        </h3>
        <ul class="nav nav-tabs" style="float: right;">
            <li role="presentation" <?php if ($cat == CAT_MOVIES) echo 'class="active"'?>><a href="<?=site_url("hot/movies")?>">Movies</a></li>
            <li role="presentation" <?php if ($cat == CAT_TV) echo 'class="active"'?>><a href="<?=site_url('hot/tv')?>">TV</a></li>
            <li role="presentation" <?php if ($cat == CAT_ANIME) echo 'class="active"'?>><a href="<?=site_url('hot/anime')?>">Anime</a></li>
<!--            <li role="presentation" --><?php //if ($cat == CAT_MUSIC) echo 'class="active"'?><!-- ><a href="--><?//=site_url('hot/music')?><!--">Music</a></li>-->
<!--            <li role="presentation" --><?php //if ($cat == CAT_BOOKS) echo 'class="active"'?><!-- ><a href="--><?//=site_url('hot/books')?><!--">Books</a></li>-->
<!--            <li role="presentation" --><?php //if ($cat == CAT_GAMES) echo 'class="active"'?><!-- ><a href="--><?//=site_url('hot/games')?><!--">Games</a></li>-->
<!--            <li role="presentation" --><?php //if ($cat == CAT_SOFTWARE) echo 'class="active"'?><!-- ><a href="--><?//=site_url('hot/software')?><!--">Apps</a></li>-->
        </ul>
    </div>
</div>
<div class="container -bottom-10">
    <?php foreach ($hots as $hot):?>
        <div class="hot_box col-xs-6 col-md-2 col-sm-3 text-center">
            <a href="<?=site_url("item/$catname/{$hot['id']}/".$this->general->urltitle($hot['title']))?>">
                <img class="hot_img img-thumbnail" src="<?=$this->config->item('media_url').$hot['poster']?>">
                <div class="hot_title">
                    <?=$hot['title']?>
                </div>
            </a>
        </div>
    <?php endforeach?>
</div>

<nav class="text-center">
    <ul class="pagination pagination-lg">
        <?=$pagination?>
    </ul>
</nav>

<div id="side_banners">
</div>

<?php include('footer_links.php') ?>
