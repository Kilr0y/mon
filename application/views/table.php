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
    </thead>
    <tbody>
        <?php foreach($table_data as $k=>$v) : ?>
            <tr>                            
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
            </tr>
        <?php endforeach ?>                    
    </tbody>
</table>
<?php endif ?>