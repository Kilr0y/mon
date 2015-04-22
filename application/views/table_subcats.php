<?php if (count($table_data) > 0): ?>
<table class="table table-bordered main-table">
    <thead>                        
        <th class="torrent_name">Category</th>        
        <th class="px100">Count</th>
        <th class="px50">RSS</th>
    </thead>
    <tbody>
        <?php foreach($table_data as $k=>$v) : ?>
            <tr>                            
                <td class="torrent_name">
                    <a href="<?=site_url(strtolower($v['name']) .'/'. $v['segment'] )?>" style="font-weight: normal;">
                        <?=trim($v['name'])?> > <b><?=trim($v['subname'])?></b>
                    </a>
                </td>                
                <td><?=trim($v['torrents'])?></td>
                <td><a href="<?=site_url('rss/subcategory/' . $v['subid'])?>" target="_blank"><i class="fa fa-rss-square fa-2x" data-toggle="tooltip" data-placement="left" title="<?=trim($v['subname'])?> RSS"></i></a></td>
            </tr>
        <?php endforeach ?>                    
    </tbody>
</table>
<?php endif ?>