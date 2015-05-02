
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
    <li><a href="<?=site_url()?>">Home</a></li>
    <li><a href="">Movies</a></li>      <!-- TODO: where go this link?-->
    <li class="active"><?=$movie['title']?></li>
</ol>

<div class="row">
    <div class="col-md-12">
        <h2><?=$movie['title']?></h2>
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


<?php if ( ! empty($movie['screenshots'])): ?>
    <div class="row">
        <div class="col-md-12">
            <h3>Screenshots</h3>
            <div class="screenshots">
                <?php foreach ($movie['screenshots']as $screen): ?>
                    <a href="<?=$this->config->item('media_url') . $screen['link']?>" data-lightbox="screenshot">
                        <img src="<?=$this->config->item('media_url') . $screen['link']?>" />
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (! empty($movie['related'])) : ?>
    <div class="row">
        <div class="col-md-12">
            <h3>Related Torrents</h3>
            <?php $table_data = $movie['related'] ?>
            <?php include('/../table.php') ?>
        </div>
    </div>
<?php endif ?>


<div class="row">
    <div class="col-md-12">
        <h3>Comments</h3>
    </div>
</div>

<?php include('/../footer_links.php') ?>
   
        

