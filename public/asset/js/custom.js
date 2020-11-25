(function ($) {
    
    // Add smooth scrolling to all links in navbar
    $(".navbar_scroll").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        if(!$(hash).length) return;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });
       
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".navbar-default").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });
    
})(jQuery);