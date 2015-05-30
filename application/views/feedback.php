
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>


<ol class="breadcrumb">
    <li ><a href="<?=site_url()?>">Home</a></li>
    <li class="active">Feedback</li>
</ol>

    <div class="row">
        <div class="col-md-12">
            <h3>Feedback</h3>
            <?php $table_data = $torrents ?>
            <?php include('table_feedback.php') ?>
        </div>
    </div>

<nav class="text-center">
    <ul class="pagination pagination-lg">
        <?=$pagination?>
    </ul>
</nav>


<div id="side_banners">
</div>

<?php include('footer_links.php') ?>


