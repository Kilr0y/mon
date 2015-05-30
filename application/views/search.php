
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>
        
        <ol class="breadcrumb">
            <li ><a href="<?=site_url()?>">Home</a></li> 
            <li class="active">"<?=$term?>" results</li>          
        </ol>
        
        
        
        <div class="row">
            <div class="col-md-12">
                <h3 style="position: relative;">
                    Search Results
                    <div style="position: absolute; right: 0; bottom: 0; font-size: 14px;">
                        Show:
                        <select id="verified_subcat">
                            <option <?php if ( $verf) echo 'selected' ?> value="<?=$links['search-verf']?>">Verified</option>
                            <option <?php if (!$verf) echo 'selected' ?> value="<?=$links['search-not-verf']?>">All</option>
                        </select>
                        Sort by:
                        <select id="sort">
                            <option <?php if ($sort == 1) echo 'selected' ?> value="<?=$links['sort_by_date_desc']?>">Date▼</option>
                            <option <?php if ($sort == 8) echo 'selected' ?> value="<?=$links['sort_by_date_asc']?>">Date▲</option>
                            <option <?php if ($sort == 2) echo 'selected' ?> value="<?=$links['sort_by_name_asc']?>">Name▼</option>
                            <option <?php if ($sort == 9) echo 'selected' ?> value="<?=$links['sort_by_name_desc']?>">Name▲</option>
                            <option <?php if ($sort == 3) echo 'selected' ?> value="<?=$links['sort_by_comments_desc']?>">Comments▼</option>
                            <option <?php if ($sort == 10) echo 'selected' ?> value="<?=$links['sort_by_comments_asc']?>">Comments▲</option>
                            <option <?php if ($sort == 4) echo 'selected' ?> value="<?=$links['sort_by_rating_desc']?>">Rating▼</option>
                            <option <?php if ($sort == 11) echo 'selected' ?> value="<?=$links['sort_by_rating_asc']?>">Rating▲</option>
                            <option <?php if ($sort == 5) echo 'selected' ?> value="<?=$links['sort_by_size_desc']?>">Size▼</option>
                            <option <?php if ($sort == 12) echo 'selected' ?> value="<?=$links['sort_by_size_asc']?>">Size▲</option>
                            <option <?php if ($sort == 6) echo 'selected' ?> value="<?=$links['sort_by_seeds_desc']?>">Seeds▼</option>
                            <option <?php if ($sort == 13) echo 'selected' ?> value="<?=$links['sort_by_seeds_asc']?>">Seeds▲</option>
                            <option <?php if ($sort == 7) echo 'selected' ?> value="<?=$links['sort_by_peers_desc']?>">Peers▼</option>
                            <option <?php if ($sort == 14) echo 'selected' ?> value="<?=$links['sort_by_peers_asc']?>">Peers▲</option>
                        </select>
                    </div>
                </h3>
                <ul class="nav nav-tabs" style="float: right;">
                    <li role="presentation" <?php if (empty($cat)) echo 'class="active"'?>><a href="<?=$links['search-all']?>">All</a></li>
                    <li role="presentation" <?php if ($cat == '1') echo 'class="active"'?>><a href="<?=$links['search-movies']?>">Movies</a></li>
                    <li role="presentation" <?php if ($cat == '8') echo 'class="active"'?>><a href="<?=$links['search-tv']?>">TV</a></li>
                    <li role="presentation" <?php if ($cat == '6') echo 'class="active"'?>><a href="<?=$links['search-anime']?>">Anime</a></li>
                    <li role="presentation" <?php if ($cat == '3') echo 'class="active"'?>><a href="<?=$links['search-music']?>">Music</a></li>
                    <li role="presentation" <?php if ($cat == '7') echo 'class="active"'?>><a href="<?=$links['search-books']?>">Books</a></li>
                    <li role="presentation" <?php if ($cat == '4') echo 'class="active"'?>><a href="<?=$links['search-games']?>">Games</a></li>
                    <li role="presentation" <?php if ($cat == '5') echo 'class="active"'?>><a href="<?=$links['search-soft']?>">Apps</a></li>
                </ul>
                <?php if (count($torrents)): ?>
                    <?php $table_data = $torrents ?>
                    <?php include('table.php') ?>  
                <?php else: ?>
                    <br /><br /><br />
                    <h3 style="text-align: center;">
                        No torrents found for "<?=$term?>"
                    </h3>
                <?php endif ?>     
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

