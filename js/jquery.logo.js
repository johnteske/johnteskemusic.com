$(window).scroll(function() {
    if ($(document).scrollTop() > 1 && !(skel.isActive('medium')))
    {
        // $('video').get(0).pause();

        // $('#header').addClass("min");
        $('#logo').addClass("min").addClass("anim");
        // eventually just add classes to nav
        $('.site-title').addClass("min").addClass("anim");
        $('.main-nav').addClass("min").addClass("anim");
    }
    else {
        // $('video').get(0).play();
        
        // $('#header').removeClass("min");            
        $('#logo').removeClass("min");            
        $('.site-title').removeClass("min");
        $('.main-nav').removeClass("min");
    }
});