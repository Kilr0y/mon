<div id="lightbox_socials" class="modal fade" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?=tr('Follow Us')?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div id="fb-root"></div>
                <div class="fb-like-box" data-href="https://www.facebook.com/monovatorrents" data-hide-cover="true" data-show-facepile="true" data-show-posts="false" data-width="auto" data-height="300">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/monovatorrents">
                            <a href="https://www.facebook.com/monovatorrents">Monova</a>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a class="twitter-timeline"  href="https://twitter.com/MONOVA_ORG" data-widget-id="602639783601504256">Твиты от @MONOVA_ORG</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="vk_groups_wrapper" class="col-md-4">
                <div id="vk_groups"></div>                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    
    VK.init({apiId: 20003922});
    doneResize();
    var globalTimer = null;
    
    window.onresize = function () {  
        
        clearTimeout(globalTimer);
        globalTimer = setTimeout(doneResize, 300);
    };
    
    function doneResize(){ 
        if ($('#vk_groups').html() != ''){
            var width = 'auto';
        } else {
            var width = '280';
        }
        $('#vk_groups').html('');
        VK.Widgets.Group("vk_groups", {mode: 0, width: width, height: "300", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 20003922);
    }
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1562255800717807";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

