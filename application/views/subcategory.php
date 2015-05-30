
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>
        
        <ol class="breadcrumb">
          <li><a href="<?=site_url()?>">Home</a></li>
          <li><a href="<?=site_url(strtolower($category['name']))?>"><?=$category['name']?></a></li> 
          <li class="active"><?=$category['subname']?></li>          
        </ol>
        
        <?php if (count($torrents)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3 style="position: relative;">
                    <?=$category['subname']?> <?=$category['name']?> Torrents
                    <div style="position: absolute; right: 0; bottom: 0; font-size: 14px;">
                        Show  
                        <select id="verified_subcat">
                            <option <?php if ($verf) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=$sort&verified=1&page=1")?>">Verified</option>
                            <option <?php if (!$verf) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=$sort&verified=0&page=1")?>">All</option>
                        </select>
                        Sort by:
                        <select id="sort">
                            <option <?php if ($sort == 1) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=1&verified=$verf&page=1")?>">Date▼</option>
                            <option <?php if ($sort == 8) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=8&verified=$verf&page=1")?>">Date▲</option>
                            <option <?php if ($sort == 2) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=2&verified=$verf&page=1")?>">Name▼</option>
                            <option <?php if ($sort == 9) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=9&verified=$verf&page=1")?>">Name▲</option>
                            <option <?php if ($sort == 3) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=3&verified=$verf&page=1")?>">Comments▼</option>
                            <option <?php if ($sort == 10) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=10&verified=$verf&page=1")?>">Comments▲</option>
                            <option <?php if ($sort == 4) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=4&verified=$verf&page=1")?>">Rating▼</option>
                            <option <?php if ($sort == 11) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=11&verified=$verf&page=1")?>">Rating▲</option>
                            <option <?php if ($sort == 5) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=5&verified=$verf&page=1")?>">Size▼</option>
                            <option <?php if ($sort == 12) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=12&verified=$verf&page=1")?>">Size▲</option>
                            <option <?php if ($sort == 6) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=6&verified=$verf&page=1")?>">Seeds▼</option>
                            <option <?php if ($sort == 13) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=13&verified=$verf&page=1")?>">Seeds▲</option>
                            <option <?php if ($sort == 7) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=7&verified=$verf&page=1")?>">Peers▼</option>
                            <option <?php if ($sort == 14) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=14&verified=$verf&page=1")?>">Peers▲</option>
                        </select>
                    </div>
                </h3>
                <?php $table_data = $torrents ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-md-12">
                <br />
                <h3 style="text-align: center;">
                    No torrents found in "<?=$category['subname']?>" category
                </h3>
                <br />
                <?php $table_data = $torrents ?>
                <?php include('table.php') ?>       
            </div>
        </div>
        <?php endif ?>
        
                
        
        <nav class="text-center">
          <ul class="pagination pagination-lg">   
            <?=$pagination?>
          </ul>
        </nav>

<div id="side_banners">
</div>
        
        <?php include('footer_links.php') ?>

