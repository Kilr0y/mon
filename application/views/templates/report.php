<div id="lightbox_report" class="lightbox" style="display: none">

    <table class="lightbox_table">
        <tr>
            <td class="lightbox_table_cell" align="center">
                <div id="lightbox_content" class="lightbox_content" style="width:600px;">
                    <div class="lightbox_inner">
                        <div class="text_1">The reason to REPORT this torrent?</div>

                        <div id="lightbox_login_data" style="display: block; width: 400px;">


                            <form id="report_form" >
                                <div style="text-align: left">
                                    <div class="description">
                                        This feature is for reporting Fake torrents only if:<br/>
                                        <br/>
                                        Torrents that are not released yet<br/>
                                        Torrents that ask you to d/l codecs from different sites<br/>
                                        Torrents that are password protected and the password is not in a text file with the torrent<br/>
                                        Torrents that have no trackers listed<br/>
                                        <br/>
                                        <br/>
                                        Please do not use this button for:<br/>
                                        <br/>
                                        Reporting torrents that are dead<br/>
                                        Reporting torrents with no seeds<br/>
                                        Reporting software torrents that give false readings when using a/v scans<br/>
                                        Reporting torrents that you cant get to work, ie games that wont run or software that wont load properly,<br/>
                                        movies that have sound but no picture or vice versa<br/>
                                        Reporting torrent that have trackers listed even if they are dead<br/>
                                    </div>
                                    <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
                                    <div class="form-group">
                                        <textarea class="form-control report_reason_textarea" name="reason"></textarea>
                                    </div>
                                </div>
                                <button id="report-submit" type="button" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

<script>
    $('#report-submit').click(function(){
        data = $('#report_form').serialize();
        data += '&torrent_id=' + $('#report_button').data('torrent_id');
        $.post("<?=site_url('ajax/report')?>", data, function(data){
            if (data == 'ok') {
                $('#lightbox_report textarea[name=reason]').val('');
                $('#lightbox_report').hide();
            } else
                alert('Some report error. Pleas try later');
        });
    });
</script>
