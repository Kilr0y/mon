<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");

$fupdate = file_exists('./torrentz.gz') ? './torrentz.gz' : './torrentz.d.gz';
$hupdate = './torrentz.h.gz';

global $base_url;
?>

<div id="lightbox_feed" class="lightbox" style="display:block;"> 
    <table class="lightbox_table">
        <tr>
            <td class="lightbox_table_cell" align="center">
                <div id="lightbox_content" class="lightbox_content" style="width:730px;">
                    <div class="lightbox_inner" id="lightbox_inner" >
                        <table width="60%">
                            <tr>
                                <td colspan="3">
                                    <h1 style="text-align: center;">Developers</h1>
                                </td>
                            </tr>
                            <tr>
                                <td id="tab_api" class="tab" data-name="api" onselectstart="return false">
                                    API
                                </td>
                                <td></td>
                                <td id="tab_export" class="tab" data-name="export" onselectstart="return false">
                                    Data Export
                                </td>
                            </tr>
                        </table>

                        <br />

                        <div id="content_api" class="tab_content" style="width: 100%;">
                            <section class="card endpoint" id="get_search">
                                <header>
                                    <h2>
                                        <span class="ep-type">GET</span>
                                        <code>/search.php</code>
                                    </h2>
                                </header>
                                <div class="card-info">
                                    <code><?=$base_uri?>api/search.php?term=test&limit=10&offset=0&verified=1&adult=0</code>
                                </div>
                                <div class="card-description ep-description">
                                    <p>
                                        Search for torrents by term.
                                    </p>
                                    <table>
                                        <caption><strong>Parameters</strong><i></i></caption>
                                        <tbody>
                                            <tr>
                                                <th>term</th>
                                                <td>Search term. Valid characters a-Z, 0-9 and space.</td>
                                            </tr>
                                            <tr>
                                                <th>limit</th>
                                                <td>Limit count of torrents in result. Default value <b>50</b>, max value: <b>200</b></td>
                                            </tr>
                                            <tr>
                                                <th>offset</th>
                                                <td>Offset in results list. Default value <b>0</b></td>
                                            </tr>
                                            <tr>
                                                <th>verified</th>
                                                <td>Return only verified results. Can be 1 or 0. Default value <b>1</b></td>
                                            </tr>
                                            <tr>
                                                <th>adult</th>
                                                <td>Search only in adult folder. Can be 1 or 0. Default value <b>0</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <section class="card endpoint" id="get_latest" >
                                <header>
                                    <h2>
                                        <span class="ep-type">GET</span>
                                        <code>/latest.php</code>
                                    </h2>
                                </header>
                                <div class="card-info">
                                    <code><?=$base_uri?>api/latest.php?limit=10&offset=0&verified=1&adult=0</code>
                                </div>
                                <div class="card-description ep-description">
                                    <p>
                                        Get latest submited torrents.
                                    </p>
                                    <table>
                                        <caption><strong>Parameters</strong><i></i></caption>
                                        <tbody>
                                            <tr>
                                                <th>limit</th>
                                                <td>Limit count of torrents in result. Default value <b>50</b>, max value: <b>200</b></td>
                                            </tr>
                                            <tr>
                                                <th>offset</th>
                                                <td>Offset in results list. Default value <b>0</b></td>
                                            </tr>
                                            <tr>
                                                <th>verified</th>
                                                <td>Return only verified results. Can be 1 or 0. Default value <b>1</b></td>
                                            </tr>
                                            <tr>
                                                <th>adult</th>
                                                <td>Search only in adult folder. Can be 1 or 0. Default value <b>0</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <div id="content_export" class="tab_content">
                            <center>
                                The following feeds provide torrentname, hash, date and links for every listed torrent.  There are two files to choose from:<br />
                                <br />
                                Full Database -- updated daily<br />
                                - <u><a href="<?=$base_uri?>torrentz.gz">torrentz.gz</a></u> &nbsp;<small><i>(<?=torsize_dec(filesize($fupdate))?>)</i> &nbsp;<i>(Last update: <?=date("F d, Y H:i:s", filemtime($fupdate))?>)</i></small><br />
                                <br />
                                Last 24 hours -- updated hourly<br />
                                - <u><a href="<?=$base_uri?>torrentz.h.gz">torrentz.h.gz</a></u> &nbsp;<small><i>(<?=torsize_dec(filesize($hupdate))?>)</i> &nbsp;<i>(Last update: <?=date("F d, Y H:i:s", filemtime($hupdate))?>)</i></small><br />

                            </center>
                            <br /><br />
                        </div>

                        <center>Please contact us <a href="javascript:void(0)" onclick="javascript:lightboxAction('lightbox_contact', true);"><b><u><i> here</i></u></b></a> for additional parameters, assistance and or IP whitelisting requests.</center>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<script>

$('#lightbox_feed .tab').click(function(){
    var name = $(this).attr('data-name');
    $('#lightbox_feed .tab_content').hide();
    $('#lightbox_feed #content_' + name).show();
    $('#lightbox_feed .tab').removeClass('tab_active');
    $('#lightbox_feed #tab_' + name).addClass('tab_active');
});
                
$('#lightbox_feed .tab').first().click();

</script>