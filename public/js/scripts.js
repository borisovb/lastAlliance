(function(yourcode) {
    yourcode(window.jQuery, window, document);

}(function($, window, document) {

    $(function() {
        //The DOM is ready!
    });

    let downloadButton = $('.download-button');
    let downloadOptions = $('.download-options');

    downloadButton.click(function() {
        $(this).toggleClass('active');
        $(this).next(downloadOptions).slideToggle();
    });

}));