var send_ga_events = false;

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
    $('#show_description').click(function(e){
        e.stopPropagation();
        $('#description_container').css('max-height', 'auto');
        $(this).hide();
        if (send_ga_events) ga('send', 'event', 'button', 'click', 'open full description');
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
    
    
});

$(window).load(function(){
    //IF DESCRIPTION IS SMALL, HIDING "SHOW DESCRIPTION" BUTTON
    if (parseInt($('#description_container').height()) <= 499){
        $('#show_description').click();
    }
});

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
        $('#' + ele).css('display', 'inline');
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

