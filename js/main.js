var send_ga_events = false;
var min_sidebanners_width_show =1540;


var no_poster = 'data:image/png;base64,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'

$(document).ready(function(){
    //USER CLICK ON CLOUD TAGS ARROW
    $('#hide_cloud').click(function(e){        
        e.stopPropagation();
        if ($(this).hasClass('closed')){
            //open action
            if (send_ga_events) ga('send', 'event', 'button', 'click', 'open cloud tags');
            $('#cloud-header .cloud-wrap').show();
            $('#cloud-header').css('height', '110px').css('overflow', 'hidden');  
            $('#hide_cloud').html('▲');          
            $.cookie('topCloudState', 'open', { expires: 180, path: '/' });          
        } else {
            //close action
            if (send_ga_events) ga('send', 'event', 'button', 'click', 'close cloud tags');
            $('#cloud-header .cloud-wrap').hide();
            $('#cloud-header').css('height', '10px').css('overflow', 'visible');;
            $('#hide_cloud').html('▼');            
            $.cookie('topCloudState', 'closed', { expires: 180, path: '/' }); 
        }
        
        $(this).toggleClass('closed');
    });
    
    $('#hide_cloud').tooltip({        
        placement: function(tip, element){            
            return ($(element).hasClass('closed')) ? 'bottom' : 'top';
        }
    });
    
    $('[data-toggle="tooltip"]').not('#hide_cloud').tooltip();
    
    //Autocomplete for google-like index page
    if ($('.autocomplete').length > 0){
        $('.autocomplete').autocomplete({
            serviceUrl: base_uri + 'ajax/get_autocomplete',
        	minChars:3,
        	//delimiter: /(,|;)\s*/, // regex or character
        	maxHeight:400,
        	width: $('.autocomplete').outerWidth(),
        	zIndex: 9999,
            params: {verified: '1'},
        	deferRequestBy: 500, //miliseconds,
            //tabDisabled: true, 
            autoSelectFirst: false,
            onSelect: function(value){
                //$('#autocomplete').closest('form').submit();
            }
        });
    }
    
    if ($('#autocomplete').length > 0){
        $('#autocomplete').focus();
    }
    
    $('#verified_subcat').change(function(){
        window.location.href = $(this).val();
    });

    $('#sort').change(function(){
        window.location.href = $(this).val();
    });
    
    //USER CLICK ON RATING STARS
    $('#star_rating').on("rating.change", function(event, value, caption) {
        var parent = $('#star_rating').closest('form');
        var rating_values = parent.serializeArray();
        $.post(base_uri + 'ajax/set_torrent_rating', rating_values, function(){}, 'json');
        $('#star_rating').rating("refresh", {disabled: true});
        if (send_ga_events) ga('send', 'event', 'button', 'click', 'vote torrent');
        
        showNotification('Thank you for vote!');        
    });
    
    //USER CLICK ON VIEW FULL DESCRIPTION
    $('#description_container .description_header, #description_buttom').click(function(e){
        e.stopPropagation();
        var $container = $('#description_container');
        if ($container.hasClass('truncated')) {
            $container.css('max-height', 'auto').removeClass('truncated');
            $('.truncator', $container).text('-');
            $('#description_buttom').text('Show less -');
        } else {
            $container.css('max-height', '500px').addClass('truncated');
            $('.truncator', $container).text('+');
            $('#description_buttom').text('Show more +');
        }
        //if (send_ga_events) ga('send', 'event', 'button', 'click', 'open full description');
    });
    
    //USER CLICK ON FAVORITE BUTTON (BOOKMARK)
    $('#favorite_button').click(function(){
        if ($(this).attr('data-name') == 'login'){
            lightboxAction('lightbox_login');
        } else if ($(this).attr('data-name') == 'favorite'){
            $.post(base_uri + 'ajax/trigger_favorites', {'torrent_id': $(this).attr('data-torrent_id')}, function(data){
                if (data == 'added'){
                    $('#favorite_button').addClass('on');
                    showNotification('Torrent added to your bookmarks');
                }                    
                else if (data = 'deleted'){
                    $('#favorite_button').removeClass('on');
                    showNotification('Torrent was removed from your bookmarks');
                }
                    
            });
        }
    });

    $('.remove_favorite_button').click(function(){
        var $row = $(this).closest('tr');
        var $table_row =  $row.closest('.row');
        $.post(base_uri + 'ajax/trigger_favorites', {'torrent_id': $(this).attr('data-torrent_id')}, function(data){
            if (data = 'deleted'){
                $row.remove();
                if ($('tbody tr', $table_row).length==0)
                    $table_row.remove();
            }
        });
    });
    
    //USER FOCUS TEXTAREA, TO WRITE COMMENT
    $('#reply-textarea').focus(function(){
        if (user_login){
            $('#reply-buttons').css('display', 'flex');
        } else {
            lightboxAction('login');
            showNotification('You should be logged in to post comment', 'error');
        }        
    });

    $('.lightbox_button').click(function(e){
        e.preventDefault();
        var name = $(this).attr('data-name');
        lightboxAction('lightbox_'+name);
    });
    
    $('#contact_message_close').click(function(){
        var lightbox = $(this).attr('data-lightbox');
        if (lightbox != undefined){
            $(this).removeAttr('data-lightbox');
            lightboxAction(lightbox);
        } else         
            closeAllLightbox();
    });
    
    $('#logout-submit').click(function(e){
        e.preventDefault();        
        $.post(base_uri + 'ajax/logout', {}, function(data){            
            if (data.status == 'ok'){
                location.reload();
            } else if (data.status == 'error'){
                showNotification(data.message, 'error');
            }
        }, 'json');
    });
    
    //INIT BASIC RULES 
    init_comments();
    
    
});



$(window).load(function(){
    //IF DESCRIPTION IS SMALL, HIDING "SHOW DESCRIPTION" BUTTON
    if (parseInt($('#description_container').height()) <= 499){
        $('#show_description').click();
    }

    $(".media .screenshot").fancybox();
    $(".media .trailer").fancybox({
        width: 640,
        height: 400,
        preload: true
    });
    $(window).resize();
});

$(window).resize(function(){
    if ($(window).width() > min_sidebanners_width_show){
        load_banners("side_banners");
        $('#side_banners').show();
    } else{
        $('#side_banners').hide();
    }

});

$(window).scroll(function(){
var $scroll_float = $('#scroll_float');
    if ($scroll_float.length > 0){
        var scroll_pos = $scroll_float.offset().top - $(window).scrollTop();
        if (scroll_pos > 0)
            $('#floating_bar').removeClass('show');
        else
            $('#floating_bar').addClass('show');
    }
});

function init_comments(){
    //USER CLICK REPLY COMMENT BUTTON
    $('.button-reply').unbind('click').click(function(e){
        e.preventDefault();
        
        if ( ! user_login){
            lightboxAction('login');
            showNotification('You should be logged in to post comment', 'error');
            return;
        }
                
        $('#comments-container .reply').remove();
        
        $(this).closest('p').after('\
            <div class="reply">\
                <textarea class="form-control" placeholder="Submit a comment"></textarea>\
                <div class="clearfix"></div>\
                <div style="-webkit-align-items: center; align-items: center; display: flex;">\
                    <span class="btn btn-success submit" style="margin-top: 10px;">Save</span>\
                    <span class="btn btn-default cancel" style="margin: 10px 0 0 10px;">Cancel</span>\
                    <span class="char-count" style="font-size: 20px; margin: 10px 0 0 10px;">200</span> \
                </div>\
            </div>\
        ');
        
        init_comments();        
        
    });
    
    $('.reply textarea').unbind('keyup').keyup(function(e){        
        var chars_count = 200 - $(this).val().length;
        $(this).closest('.reply').find('.char-count').html(chars_count);
    });
        
    $('.reply .cancel').unbind('click').click(function(){
        $(this).closest('.reply').remove();            
    });
        
    $('.reply .submit').unbind('click').click(function(){        
        var comment_id = $(this).closest('.media').find('.comment_id').val();
        if (comment_id == undefined || ! comment_id) comment_id = 0;
        var torrent_id = $('#torrent_id').val();
        var text = $(this).closest('.reply').find('textarea').val();
        var post = {comment_id: comment_id, torrent_id: torrent_id, text: text};
        
        $(this).attr('disabled', 'disabled');
        
        var submit_button = $(this);        
        
        $.post(base_uri + 'ajax/add_comment', post, function(data){            
            var insert_text = '\
                <div class="media">\
                    <input class="comment_id" type="hidden" value="'+data.comment_id+'" />\
                    <div class="media-left hidden-xs hidden-sm">\
                        <a href="' + base_uri + 'user/' + user_login + '" >\
                            <img class="media-object" style="width: 64px; height: 64px;" src="'+no_poster+'" data-holder-rendered="true">\
                        </a>\
                    </div>\
                    <div class="media-body">\
                        <p class="media-heading" id="media-heading"><a href="' + base_uri + 'user/' + user_login + '">@'+user_login+'</a> | points: <span class="points">0</span> | added just now</p>\
                        <p>'+text+'</p>\
                              \
                        <p class="comment-buttons" style="color: #D7D7D7;">\
                            <a href="#" class="button-like"><i class="fa fa-angle-up fa-lg"></i></a>\
                            &nbsp;|&nbsp;\
                            <a href="#" class="button-dislike"><i class="fa fa-angle-down fa-lg"></i></a>\
                            &nbsp;|&nbsp;\
                            <a href="#" class="button-reply">Reply</a>\
                            &nbsp;|&nbsp;\
                            <a href="#">Share</a> \
                        </p>\
                    </div>\
                </div>\
            ';
            if ( ! comment_id){
                $('#comments-container').prepend(insert_text);
                $('#reply-textarea').val('');
                $('#reply-buttons').hide();
                $('#reply-buttons .submit').removeAttr('disabled');
            } else {
                submit_button.closest('.media').find('.comment-buttons').first().after(insert_text);
            }
            
            submit_button.closest('.media').find('.cancel').click();
            
            init_comments();
            
        }, 'json');           
    });
    
    $('.button-like, .button-dislike').unbind('click').click(function(e){
        e.preventDefault();
        if ( ! user_login){
            lightboxAction('login');
            showNotification('You should be logged in to rate comment', 'error');
            return;
        }        
        
        var comment_id = $(this).closest('.media').find('.comment_id').val();
        var torrent_id = $('#torrent_id').val();
        var type = $(this).hasClass('button-like') ? 1 : 2;
        var post = {comment_id: comment_id, torrent_id: torrent_id, type: type};
        $.post(base_uri + 'ajax/like_comment', post, function(data){}, 'json');
        
        var media = $(this).closest('.media');
        
        var points = parseInt(media.find('.points').first().html());
        
        //lets change number of points
        if (type == 1 && media.find('.button-like').first().hasClass('active')){
            points--;
        } else if (type == 1 && media.find('.button-dislike').first().hasClass('active')){
            points = points + 2;
        } else if (type == 1 && ! media.find('.button-like').first().hasClass('active')){
            points++;
        } else if (type == 2 && media.find('.button-dislike').first().hasClass('active')){
            points++;
        } else if (type == 2 && media.find('.button-like').first().hasClass('active')){
            points = points - 2;
        } else if (type == 2 && ! media.find('.button-dislike').first().hasClass('active')){
            points--;
        }
        
        media.find('.points').first().html(points);
        
        if (type == 1){
            media.find('.button-dislike').first().removeClass('active');
        } else {
            media.find('.button-like').first().removeClass('active');
        }
        
        $(this).toggleClass('active');
    });
}

function load_banners(banner_name){
    var banner_id = '#' + banner_name;
    if ($(banner_id).length>0 && $(banner_id).attr('data-loaded') != 'true'){
        $.post(base_uri + 'ajax/get_banner_content', {name: banner_name}, function(data){
            $(banner_id).html(data);
            $(banner_id).attr('data-loaded', 'true')
        });
    }
}

function init_lightbox(){
    $('.lightbox_table_cell').click(function(e){
        closeAllLightbox();
    });
    $('.lightbox_content').click(function(e){
        e.stopPropagation();
    });
}

// Open LightBox Buttons Clicks
function lightboxAction(ele, first){
    closeAllLightbox();
    init_lightbox();    
    
    if ($('#' + ele).length > 0){
        if ($('#' + ele).hasClass('modal')){
            $('#' + ele).modal();
        } else {
            $('#' + ele).css('display', 'inline');
        }       
        
    } else {
        $('#lightbox_loading').show();
        var name = ele.replace('lightbox_', '');
        $.post(base_uri + 'ajax/get_lightbox_content', {name: name}, function(data){
            if (data.status == 'validated'){
                $('#lightbox_captcha').remove();
                lightboxAction('lightbox_upload');
            } else if (data.status == 'ok'){
                $('body').append(data.data);                
                lightboxAction('lightbox_' + name);
            }
        }, 'json');
    }
    if (first != undefined)
        $('#' + ele + ' .error').text('');
} 

function closeAllLightbox(){
    $('.lightbox').hide();
}

function set_lightbox_message(text, lightbox_name){    
    if (lightbox_name != undefined){
        $('#contact_message_close').val('Back');
        $('#contact_message_close').attr('data-lightbox', lightbox_name);
    } else {
        $('#contact_message_close').val('Close');
    }
    $('#lightbox_message h1').html(text);
}

function get_hidden_height(elem){
    //getting scroll height of top and bottom clouds
    var temp_height = $('#cloud-header').height();
    $('#cloud-header').css('height', 'auto');
    var height = $('#cloud-header').height();
    $('#cloud-header').height(temp_height);
    return height;
}

function showNotification(text, type){
    if (type == undefined) type = 'success';
    var n = noty({
        text: text,
        timeout: '5000',
        layout: 'topCenter',
        type: type,
        animation: {
            open: 'animated fadeInDown', // jQuery animate function property object
            close: 'animated fadeOutUp', // jQuery animate function property object
            easing: 'swing', // easing
            speed: 500 // opening & closing animation speed
        }
    });
}

function ContactCheckEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);    
}

