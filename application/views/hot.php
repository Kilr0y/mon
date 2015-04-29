
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
            <a href="<?=site_url("torrent/{$hot['id']}")?>">
                <img class="hot_img img-thumbnail" src="<?=$this->config->item('media_url').$hot['poster']?>">
                <div class="hot_title">
                    <?=$hot['title']?>
                </div>
            </a>
        </div>
    <?php endforeach?>
</div>

<?php include('footer_links.php') ?>

