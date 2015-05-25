var send_ga_events = false;
var min_sidebanners_width_show =1540;

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

    $('#favorite_button').click(function(){
        if ($(this).attr('data-name') == 'login'){
            lightboxAction('lightbox_login');
        } else if ($(this).attr('data-name') == 'favorite'){
            $.post(base_uri + 'ajax/trigger_favorites', {'torrent_id': $(this).attr('data-torrent_id')}, function(data){
                if (data == 'added')
                    $('#favorite_button').removeClass('off');
                else if (data = 'deleted')
                    $('#favorite_button').addClass('off');
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

