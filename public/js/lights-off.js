let per = 0;
$(document).ready(function(){
    $("#persoff").css("height", $(document).height()).hide();
    $(document).click(function(e) {
        if(!$(e.target).hasClass('switch') && per === 1) {
            $("#persoff").toggle();
            per = 0;
            $('nav').show(500);
            $('aside').show(500);
        }
    });
    $(".switch").click(function(){
        $("#persoff").toggle();
        per += 1;
        if (per === 2) {
            per = 0;

        } else {
            $('nav').hide(1000);
            $('aside').hide(1000);
        }
        // $('aside').slideToggle();
        // $('footer').slideToggle();

    });
x
});