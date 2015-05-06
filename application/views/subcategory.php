        
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
                            <option <?php if ($sort == 1) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=1&verified=$verf&page=1")?>">Date</option>
                            <option <?php if ($sort == 2) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=2&verified=$verf&page=1")?>">Name</option>
                            <option <?php if ($sort == 3) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=3&verified=$verf&page=1")?>">Comments</option>
                            <option <?php if ($sort == 4) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=4&verified=$verf&page=1")?>">Rating</option>
                            <option <?php if ($sort == 5) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=5&verified=$verf&page=1")?>">Size</option>
                            <option <?php if ($sort == 6) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=6&verified=$verf&page=1")?>">Seeds</option>
                            <option <?php if ($sort == 7) echo 'selected' ?> value="<?=site_url(strtolower($category['name']) . '/' . $category['segment'] . "?sort=7&verified=$verf&page=1")?>">Peers</option>
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
        
        <?php include('footer_links.php') ?>

