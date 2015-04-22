<?php if ($cloud_tags_visible && $this->config->item('show_cloud_tags')): ?>
    <div id="cloud-header" class="hidden-xs hidden-sm" style="<?=$cloud_tags_state == 'closed' ? 'height:10px;overflow:visible;' : 'height:110px;overflow:hidden;'?>">
            <div id="hide_cloud" class="transition_05 hide_cloud_icon <?=$cloud_tags_state?>" data-toggle="tooltip" title="" data-original-title="Show/Hide Tags">
                <?=$cloud_tags_state == 'closed' ? '▼' : '▲'?>
            </div>
            <div class="cloud-wrap" style="display:<?=$cloud_tags_state == 'closed' ? 'none' : 'block'?>"> 
                <div class="cloud-text">
                    <a class="size_1" href="//wdev.monova.org/search.php?term=another&amp;verified=1">another</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=maybe+mersedes+s550&amp;verified=1">maybe mersedes s550</a>
                    <a class="size_9" href="//wdev.monova.org/search.php?term=fifa&amp;verified=1">fifa</a>
                    <a class="size_4" href="//wdev.monova.org/search.php?term=two&amp;verified=1">two</a>
                    <a class="size_5" href="//wdev.monova.org/search.php?term=home&amp;verified=1">home</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=car&amp;verified=1">car</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=can+&amp;verified=1">can </a>
                    <a class="size_5" href="//wdev.monova.org/search.php?term=home&amp;verified=1">home</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=car&amp;verified=1">car</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=can+&amp;verified=1">can </a>
                    <a class="size_1" href="//wdev.monova.org/search.php?term=sting&amp;verified=1">sting</a>
                    <a class="size_4" href="//wdev.monova.org/search.php?term=age+of+empires&amp;verified=1">age of empires</a>
                    <a class="size_8" href="//wdev.monova.org/search.php?term=two+lines&amp;verified=1">two lines</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=Fifa+2014&amp;verified=1">Fifa 2014</a>
                    <a class="size_1" href="//wdev.monova.org/search.php?term=sting&amp;verified=1">sting</a>
                    <a class="size_4" href="//wdev.monova.org/search.php?term=age+of+empires&amp;verified=1">age of empires</a>
                    <a class="size_8" href="//wdev.monova.org/search.php?term=two+lines&amp;verified=1">two lines</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=Fifa+2014&amp;verified=1">Fifa 2014</a>                    
                    <a class="size_1" href="//wdev.monova.org/search.php?term=here&amp;verified=1">here</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=Something&amp;verified=1">Something</a>
                    <a class="size_1" href="//wdev.monova.org/search.php?term=another&amp;verified=1">another</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=maybe+mersedes+s550&amp;verified=1">maybe mersedes s550</a>
                    <a class="size_9" href="//wdev.monova.org/search.php?term=fifa&amp;verified=1">fifa</a>
                    <a class="size_4" href="//wdev.monova.org/search.php?term=two&amp;verified=1">two</a>
                    <a class="size_5" href="//wdev.monova.org/search.php?term=home&amp;verified=1">home</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=car&amp;verified=1">car</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=can+&amp;verified=1">can </a>
                    <a class="size_1" href="//wdev.monova.org/search.php?term=sting&amp;verified=1">sting</a>
                    <a class="size_4" href="//wdev.monova.org/search.php?term=age+of+empires&amp;verified=1">age of empires</a>
                    <a class="size_8" href="//wdev.monova.org/search.php?term=two+lines&amp;verified=1">two lines</a>
                    <a class="size_2" href="//wdev.monova.org/search.php?term=Fifa+2014&amp;verified=1">Fifa 2014</a>
                    <a class="size_1" href="//wdev.monova.org/search.php?term=here&amp;verified=1">here</a>
                    <a class="size_3" href="//wdev.monova.org/search.php?term=Something&amp;verified=1">Something</a>
                </div>    
            </div>
        </div>
<?php endif ?>