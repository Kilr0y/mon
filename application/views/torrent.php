
<?php $is_mobile ? include('templates/mobile_top_banner_bar.php') : include('templates/top_banner_bar.php') ?>

<div id="floating_bar">
    <h4><?=$torrent['torrentname']?></h4>
</div>

        <ol class="breadcrumb">
            <li ><a href="<?=site_url()?>">Home</a></li> 
            <li ><a href="<?=site_url(strtolower($category['name']))?>"><?=$category['name']?></a></li>
            <li ><a href="<?=site_url(strtolower($category['name'] . '/' . $category['subname']))?>"><?=$category['subname']?></a></li>
            <li class="active"><?=$torrent['torrentname']?></li>          
        </ol>
        
        <div class="row">
            <div class="col-md-12">
                <h2><?=$torrent['torrentname']?></h2>                
            </div>
            <div class="col-md-6 torrent_stats">
                <h5 class="torrent_added">added on <span><?=date('M j, Y', strtotime($torrent['added']))?></span> by <a href="<?=site_url('users/'.$torrent['verified_by'])?>"><?=$torrent['verified_by']?></a><?=$torrent['verified']?' <i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified user"></i>':''?></h5>
            </div>
            <div class="col-md-6">
                <div class="pull-right page-buttons">
                    <?php if ($torrent['torrent_file']): ?>                    
                        <a href="<?=site_url('torrent/download/'.$torrent['id'])?>" class="btn btn-success"><?php if ($torrent['verified']) echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified torrent"></i> '?>Download torrent</a>
                    <?php else: ?>
                        <a href="<?=$magnet?>" class="btn btn-success"><?php if ($torrent['verified']) echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified torrent"></i> '?>Download via magnet</a>
                    <?php endif ?>
                    <a href="<?=$magnet?>" class="btn btn-success w40" data-toggle="tooltip" data-placement="bottom" title="Magnet link"><i class="fa fa-magnet"></i></a>
                    <span id="favorite_button" class="btn btn-success w40 <?=$favorite ? '' : 'off'?>" data-torrent_id="<?=$torrent['id']?>" data-name="<?=$this->session->userdata('user_id') ? 'favorite' : 'login'?>" data-toggle="tooltip" data-placement="bottom" title="Favorite"><i class="fa fa-star"></i></span>
                    <a href="#" id="report_button" class="btn btn-warning w40 lightbox_button" data-torrent_id="<?=$torrent['id']?>" data-name="<?=$this->session->userdata('user_id') ? 'report' : 'login'?>" data-toggle="tooltip" data-placement="bottom" title="Report"><i class="fa fa-exclamation"></i></a>
                </div> 
            </div>
            <div class="clearfix"></div>
            <div id="scroll_float"></div>

            <?php if (isset($movie)): ?>
                <?php if (! empty($movie['poster_large'])): ?>
                <div class="col-md-2 margin-bottom-10">
                    <a href="<?=$this->config->item('media_url') . $movie['poster_large']?>" data-lightbox="poster">
                        <img class="poster" src="<?=$this->config->item('media_url') . $movie['poster_large']?>"  />
                    </a>
                </div>
                <?php endif ?>
                <div class="col-md-5 torrent_info margin-bottom-10">
                    <div><span>Movie:</span><a href="#"><?=$movie['title']?></a></div>                    
                    <div><span>IMDb link:</span><a target="_blank" href="http://blankrefer.com/?http://www.imdb.com/title/<?=$movie['imdb_id']?>/"><?=$movie['imdb_id']?></a></div>
                    <?php if (! empty($movie['rating'])): ?>
                        <div><span>IMDb rating:</span><?=$movie['rating']?> (<?=number_format($movie['votes'])?> votes)</div>
                    <?php endif ?>
                    <div><span>Genres:</span><?=$movie['genres']?></div>                
                    <div>
                        <span>Summary:</span><br />
                        <?=$movie['story']?>
                    </div>
                    
                </div>
                <div class="col-md-5 torrent_info margin-bottom-10"> 
                    <div><span>Directors:</span><?=$movie['directors']?></div>
                    <div><span>Writers:</span><?=$movie['writers']?></div>
                    <div><span>Cast:</span><?=$movie['cast']?></div>
                </div>
            <?php endif ?>
        </div>
        
        <div class="row big-download">
            <div class="col-md-12">
                <div>
                    <a href="#" class="btn btn-primary btn-lg">Download</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h3>General Information</h3>
                <div class="row">
                    <div class="col-md-4 general-info">
                        <div>
                            <span style="float: left;">Rating:</span>
                            <form action="https://www.monova.org/star_rating.php" class="rating-form">
                                <input type="hidden" name="q" value="<?=$torrent['id']?>" />
                                <input type="hidden" name="c" value="10" />
                                <input type="hidden" name="t" value="<?=$ip?>" />                            
                                <input type="hidden" name="action" value="set_torrent_rating" />
                                <input id="star_rating" data-show-clear="false" name="j" data-max="10" data-star-captions="{}" data-default-caption="{rating} <?=$rating['caption']?>"  data-stars="10" data-size="xs" data-step="1" value="<?=$rating['value']?>" class="rating" <?=$rating['disabled']?> />
                            </form> 
                        </div>
                        <div>
                            <span>Added:</span><?=$this->general->ago(strtotime($torrent['added']))?> ago
                        </div>
                        <div>
                            <span>Last Update:</span><?=(strtotime($torrent['updated'])) ? $this->general->ago(strtotime($torrent['updated'])) : $this->general->ago(strtotime($torrent['added']))?> ago
                        </div>
                        <div>
                            <span>High Speed:</span><a href="http://centertrust.xyz/monomi?q=(Colette)_Alina_(Standing_Still)(1080p)_(.mp4)" onclick="window.open(this.href,'_blank');return false;">Download Now</a>
                        </div>                      
                    </div>
                    <div class="col-md-8 general-info">
                        <div>
                            <span>Peers:</span><?=$torrent['seeds']?> seeders, <?=$torrent['peers']?> leechers 
                        </div> 
                        <div>
                            <span>Hash:</span><?=$torrent['hash']?>
                        </div> 
                        
                        <div>
                            <span>Total size:</span><?=$this->general->torsize($torrent['size'])?>
                        </div>
                        <div>
                            <span>Alternate:</span><a href="http://centertrust.xyz/monomi?q=(Colette)_Alina_(Standing_Still)(1080p)_(.mp4)" onclick="window.open(this.href,'_blank');return false;">Download Now</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <?php if ( ! empty($screenshots)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Media</h3>
                <div class="media">
                    <?php if (!empty($movie['trailer_imdb'])):?>

                    <a href="<?=$movie['trailer_imdb']?>/imdb/embed?autoplay=true&width=640" data-fancybox-type="iframe" class="trailer">
                        <img src="<?=site_url()?>img/imdb-icon.png" />
                    </a>
                    <?php endif?>
                    <?php foreach ($screenshots as $screen): ?>
                    <a href="<?=$this->config->item('media_url') . $screen['link']?>" class="screenshot" rel="screens">
                        <img src="<?=$this->config->item('media_url') . $screen['link']?>" />
                    </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <?php endif ?>
        
        <?php if (! empty($torrent['descr'])): ?>
        <div class="row">
            <div class="col-md-12">
                <div id="description_container" class="description truncated" style="max-height: 500px; overflow: hidden;">
                    <div class="description_header">
                        <h3>Description<span class="truncator">+</span></h3>
                    </div>
                    <?=$torrent['descr']?>
                </div>
                <div id="description_buttom">Show more +</div>
            </div>
        </div>
        <?php endif ?>
        
        <?php if (! empty($related)) : ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Related Torrents</h3>
                <?php $table_data = $related ?>
                <?php include('table.php') ?> 
            </div>
        </div>
        <?php endif ?>
        
        <div class="row">
            <div class="col-md-12">
                <h3>Comments</h3>
                
            </div>
        </div>

<div id="side_banners">
</div>
        
        <?php include('footer_links.php') ?>
   
        

