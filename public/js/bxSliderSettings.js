// SliderSettings
$(document).ready(function(){
    $('.slider1').bxSlider({
        slideWidth: 230,
        onSliderLoad: function(){
            $(".slider1").css("visibility", "visible");
        },
        autoStart: true,
        keyboardEnabled: true,
        autoDelay: 0,
        slideHeight: 230,
        minSlides: 2,
        maxSlides: 20,
        slideMargin: 5,
        pager: true
    });
});