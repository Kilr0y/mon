  
        
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
          <li class="active"><?=$category['name']?></li>          
        </ol>
        
        <?php if (count($subcats)): ?>
        <div class="row">
            <div class="col-md-12">
                <h3 style="position: relative;">
                    <?=$category['name']?> Torrents&nbsp;&nbsp;<a target="_blank" href="<?=site_url('rss/category/'.$category['catid'])?>"><i class="fa fa-rss-square fa-lg"></i></a>
                </h3>
                <?php $table_data = $subcats ?>
                <?php include('table_subcats.php') ?>       
            </div>
        </div>
        <?php endif ?>
                        
        <?php include('footer_links.php') ?>
   

