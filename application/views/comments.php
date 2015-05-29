<?php 
global $user_likes;
$user_likes = ! empty($likes) ? $likes : array();
function output($arr){
    global $user_likes;
    ob_start();
    ?>
    
    <?php foreach ($arr as $k=>$v): ?>
    <?php $v['points'] = $v['likes'] - $v['dislikes'] ?>    
    <div class="media">
        <input class="comment_id" type="hidden" value="<?php echo $v['id'] ?>" />
        <div class="media-left">
            <a href="<?=base_url('user/'.$v['added_by'])?>" class="hidden-xs hidden-sm">
                <img class="media-object" style="width: 64px; height: 64px;" src="data:image/png;base64,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" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <p class="media-heading" id="media-heading"><a href="<?=base_url('user/'.$v['added_by'])?>">@<?=$v['added_by']?></a> | points: <span class="points"><?=$v['points']?></span> | added 2 hours ago</p>
            <?php echo $v['post'] ?>
            <!-- Nested media object -->
                          
            <p class="comment-buttons" style="color: #D7D7D7;">
                <a href="#" class="button-like <?php if (isset($user_likes[$v['id']]) && $user_likes[$v['id']]['type_id'] == 1) echo 'active' ?>"><i class="fa fa-angle-up fa-lg"></i></a>
                &nbsp;|&nbsp;
                <a href="#" class="button-dislike <?php if (isset($user_likes[$v['id']]) && $user_likes[$v['id']]['type_id'] == 2) echo 'active' ?>"><i class="fa fa-angle-down fa-lg"></i></a>
                &nbsp;|&nbsp;
                <a href="#" class="button-reply">Reply</a>
                &nbsp;|&nbsp;
                <a href="#">Share</a> 
            </p>   
            
            <?php if ( ! empty($v['children'])): ?>
                <?php echo output($v['children']) ?>
            <?php endif ?>
            
        </div>
    </div>
    
    <?php endforeach ?>
    
    
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
?>
<div id="comments-wrapper">
    <input id="torrent_id" type="hidden" value="<?=$torrent['id']?>" />
    <div class="reply" style="margin-bottom: 20px;">
        <input class="comment_id" type="hidden" value="0" />
        <textarea id="reply-textarea" class="form-control" placeholder="Submit a comment"></textarea>
        <div class="clearfix"></div>
        <div id="reply-buttons" style="-webkit-align-items: center; align-items: center; display: none;">
            <span class="btn btn-success submit" style="margin-top: 10px;">Save</span>                        
            <span class="char-count" style="font-size: 20px; margin: 10px 0 0 10px;">200</span>
        </div>
    </div>
                
                
    <div id="comments-container" class="media-list">
        <?php if (! empty($comments)): ?>
            <?php foreach ($comments as $k=>$parent): ?>
                <?php $parent[0]['points'] = $parent[0]['likes'] - $parent[0]['dislikes'] ?>
                <div class="media">
                    <input class="comment_id" type="hidden" value="<?php echo $parent[0]['id'] ?>" />
                    <div class="media-left hidden-xs hidden-sm">
                        <a href="<?=base_url('user/'.$parent[0]['added_by'])?>" >
                            <img class="media-object" style="width: 64px; height: 64px;" src="data:image/png;base64,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" data-holder-rendered="true">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading" id="media-heading"><a href="<?=base_url('user/'.$parent[0]['added_by'])?>">@<?=$parent[0]['added_by']?></a> | points: <span class="points"><?=$parent[0]['points']?></span> | added 2 hours ago</p>
                        <p><?php echo $parent[0]['post'] ?></p>
                              
                        <p class="comment-buttons" style="color: #D7D7D7;">
                            <a href="#" class="button-like <?php if (isset($likes[$parent[0]['id']]) && $likes[$parent[0]['id']]['type_id'] == 1) echo 'active' ?>"><i class="fa fa-angle-up fa-lg"></i></a>
                            &nbsp;|&nbsp;
                            <a href="#" class="button-dislike <?php if (isset($likes[$parent[0]['id']]) && $likes[$parent[0]['id']]['type_id'] == 2) echo 'active' ?>"><i class="fa fa-angle-down fa-lg"></i></a>
                            &nbsp;|&nbsp;
                            <a href="#" class="button-reply">Reply</a>
                            &nbsp;|&nbsp;
                            <a href="#">Share</a> 
                        </p>
                        <?php if ( ! empty($parent[0]['children'])): ?>
                            <?php echo output($parent[0]['children']) ?>
                        <?php endif ?>
                        
                    </div>
                </div>            
            <?php endforeach ?>
        <?php else: ?>
            
            <h3><?=tr('There is no comments')?></h3>
            
        <?php endif ?>    
     </div>

</div>