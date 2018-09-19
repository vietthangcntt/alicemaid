jQuery(document).ready(function() {
    var pull = jQuery('.icon'),
     menu = jQuery('.primary-menu');

    jQuery(pull).on('click', function() {
        menu.slideToggle();
    });
    
    jQuery(window).resize(function() {
        var w = jQuery(window).width();
        if (w > 960 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});