<?php if (count($table_data) > 0): ?>
    <table class="table table-bordered main-table">
        <thead>
        <th class="torrent_name">Torrent Names</th>
        <th class="px50"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Verified"></th>
        <th class="px50"><i class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="Comments"></i></th>
        <th class="px50"><i class="glyphicon glyphicon-star" data-toggle="tooltip" data-placement="top" title="Rating"></i></th>
        <th class="hidden-xs hidden-sm px80">Size</th>
        <th class="hidden-xs hidden-sm px75">Age</th>
        <th class="px50">Seed</th>
        <th class="px50">Leech</th>
        <th class="px50"><i class="fa fa-remove"></i></th>
        </thead>
        <tbody>
        <?php foreach($table_data as $k=>$v) : ?>
            <tr class="feedback_torrent_row">
                <td class="torrent_name">
                    <a href="<?=site_url('torrent/'.$v['id'].'/'.$this->general->urltitle($v['torrentname']).'.html')?>">
                        <?=trim($v['torrentname'])?>
                    </a>
                </td>
                <td><?=$v['verified'] ? '<i class="fa fa-check">' : ''?></td>
                <td><?=$v['comments'] ?></td>
                <td><?=$v['rating'] ?></td>
                <td class="hidden-xs hidden-sm"><?=$this->general->torsize($v['size'])?></td>
                <td class="hidden-xs hidden-sm"><?=$this->general->ago($v['added_time'])?></td>
                <td><?=$v['seeds']?></td>
                <td><?=$v['peers']?></td>
                <td><i class="remove_feedback_button fa fa-remove" data-torrent_id="<?=$v['id']?>"></i></td>
            </tr>
            <tr class="feedback_comment_row">
               <td colspan="9">
                   <div class="reply" style="margin-bottom: 20px;">
                       <input class="comment_id" type="hidden" value="0" />
                       <textarea class="form-control" placeholder="Submit a comment"></textarea>
                       <div class="clearfix"></div>
                       <div id="reply-buttons" style="-webkit-align-items: center; align-items: center; display: flex;">
                           <span class="btn btn-success feedback" data-torrent_id="<?=$v['id']?>" style="margin-top: 10px;">Save</span>
                           <span class="char-count" style="font-size: 20px; margin: 10px 0 0 10px;">200</span>
                       </div>
                   </div>
               </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>