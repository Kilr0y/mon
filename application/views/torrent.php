
        <div data-cm="4" style="margin-top: 20px;">
 
            <div id="MarketGidScriptRootC14177">
                <div id="MarketGidPreloadC14177">
                    <a id="mg_add14177" href="//mgid.com/advertisers/?utm_source=widget&utm_medium=text&utm_campaign=add" target="_blank">Place your ad here</a><br> <a href="//mgid.com/" target="_blank">Loading...</a>
                </div>
                <script>
                (function(){
                    var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
                    var i=d[ce]('iframe');i[st][ds]=n;d[gi]("MarketGidScriptRootC14177")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
                    catch(e){var iw=d;var c=d[gi]("MarketGidScriptRootC14177");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=14177;c[ac](dv);
                    var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/m/o/monova.org.14177.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
                </script>
            </div>
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
                <h5 class="torrent_added">added on <span><?=date('M j, Y', strtotime($torrent['added']))?></span> by <a href="#"><?=$torrent['verified_by']?></a><?=$torrent['verified']?' <i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified user"></i>':''?></h5>                           
            </div>
            <div class="col-md-6">
                <div class="pull-right page-buttons">
                    <?php if ($torrent['torrent_file']): ?>                    
                        <a href="<?=site_url('torrent/download/'.$torrent['id'])?>" class="btn btn-success"><?php if ($torrent['verified']) echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified torrent"></i> '?>Download torrent</a>
                    <?php else: ?>
                        <a href="<?=$magnet?>" class="btn btn-success"><?php if ($torrent['verified']) echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Verified torrent"></i> '?>Download via magnet</a>
                    <?php endif ?>
                    <a href="<?=$magnet?>" class="btn btn-success w40" data-toggle="tooltip" data-placement="bottom" title="Magnet link"><i class="fa fa-magnet"></i></a>
                    <a href="#" class="btn btn-warning w40" data-toggle="tooltip" data-placement="bottom" title="Report"><i class="fa fa-exclamation"></i></a>
                </div> 
            </div>
            <div class="clearfix"></div>
            
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
                <h3>Screenshots</h3>
                <div class="screenshots">
                    <?php foreach ($screenshots as $screen): ?>
                    <a href="<?=$this->config->item('media_url') . $screen['link']?>" data-lightbox="screenshot">
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
                <h3>Description</h3>
                <div id="description_container" class="description" style="max-height: 500px; overflow: hidden;">
                    <?=$torrent['descr']?>
                </div>
                <div id="show_description" class="full_description_button transition_05">▼ View Full Description ▼</div>
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
        
        <?php include('footer_links.php') ?>
   
        

