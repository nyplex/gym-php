$(document).ready(function() {
    $('#menu-mobile-icon').click(function() {
        if ($('.image-5').hasClass("open-menu-mobile")) {
            $('.image-5').removeClass("open-menu-mobile");
            $('#nav-bar-mobile').removeClass("list");
        } else {
            $('.image-5').addClass("open-menu-mobile");
            $('#nav-bar-mobile').addClass("list");
        }
    })
})

/*$(window).scroll(function() {
    sessionStorage.scrollTop = $(this).scrollTop();
});
$(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
        document.getElementById("all-videos-divider").scrollIntoView();
    } else {
        document.getElementById("top-view").scrollIntoView();
    }
});*/

$(document).ready(function() {
    $('#sort_training').on('change', function(e) {
        $('#form_sort_training').submit();
    })
})

$(document).ready(function() {
    $('#form_sort_training').on('submit', function() {})
})