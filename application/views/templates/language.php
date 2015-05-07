<div id="lightbox_language" class="lightbox" style="display: none">

    <table class="lightbox_table">
        <tr>
            <td class="lightbox_table_cell" align="center">
                <div id="lightbox_content" class="lightbox_content" style="width:800px;">
                    <div class="lightbox_inner">
                        <div class="text_1">Select language</div>

                        

                        <br /><br />
                        <button class="lang_button" data-lang="en">English</button>
                        <button class="lang_button" data-lang="it">Italy</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

<script>
    $(".lang_button").click(function(){

        var lang = $(this).data('lang');
        $.post("<?=site_url('ajax/set_lang')?>", {lang: lang}, function(data){
            if (data = 'ok'){
                location.reload();
            }
        });
    });
</script>