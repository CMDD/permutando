$(document).on("click", ".mobile-menu", function() {
    $('.sidebar').addClass('opened');
});

$(document).on("click", ".sidebar .close-menu", function() {
    $('.sidebar').removeClass('opened');
});
