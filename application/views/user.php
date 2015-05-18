<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>
    <h2><?=$user['login']?></h2>

<?php if (count($torrents)): ?>
    <div class="row">
        <div class="col-md-12">
            <?php $table_data = $torrents?>
            <?php include('table.php') ?>
        </div>
    </div>
<?php endif?>

    <div id="side_banners">
    </div>

<?php include('footer_links.php') ?>