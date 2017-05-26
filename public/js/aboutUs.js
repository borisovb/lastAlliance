(function(yourcode) {
    yourcode(window.jQuery, window, document);

}(function($, window, document) {

    $(function() {
        //The DOM is ready!
    });

    let infoButton = $('.show-info');

    infoButton.click(function () {
        $(this).prev('.member-description').slideToggle();
        $(this).text( $(this).text() === 'СКРИЙ' ? "ПОКАЖИ" : "СКРИЙ");
    });

}));