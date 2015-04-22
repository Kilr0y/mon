        
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
            <li class="active">"<?=$term?>" results</li>          
        </ol>
        
        
        
        <div class="row">
            <div class="col-md-12">
                <h3 style="position: relative;">
                    Search Results
                    <div style="position: absolute; right: 0; bottom: 0; font-size: 14px;">
                        Show  
                        <select id="verified_subcat">
                            <option <?php if ( $verf) echo 'selected' ?> value="<?=$links['search-verf']?>">Verified</option>
                            <option <?php if (!$verf) echo 'selected' ?> value="<?=$links['search-not-verf']?>">All</option>
                        </select>
                        torrents                        
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
        
        <?php include('footer_links.php') ?>

