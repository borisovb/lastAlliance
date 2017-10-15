// SliderSettings
$(document).ready(function(){
    $('.slider1').bxSlider({
        slideWidth: 230,
        onSliderLoad: function(){
            let sliderDiv = document.querySelector('.slider1');
            sliderDiv.style.visibility = "visible";
        },
        keyboardEnabled: true,
        autoDelay: 0,
        slideHeight: 230,
        minSlides: 2,
        maxSlides: 20,
        slideMargin: 5,
        pager: false
    });
});