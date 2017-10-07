$(document).ready(function() {
    // Check if body height is higher than window height :)

    if (!($("body").height() > $(window).height())) {
        $("footer").addClass("absolute");
    }
});
