AOS.init();

var $ = jQuery.noConflict(); // Add this to resolve $ undefined issue.

$(document).ready(function() {
    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
            $('#frh-main-nav').addClass('bg-dark');
            $('#frh-main-nav').removeClass('bg-trans');
        } else if ($(this).scrollTop() < 50) {
            $('#frh-main-nav').removeClass('bg-dark');
            $('#frh-main-nav').addClass('bg-trans');
        }
    });
});