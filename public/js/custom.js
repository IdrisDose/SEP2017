$(document).ready(function() {
    // Check if body height is higher than window height :)

    if (($("body").hasScrollBar())) {
        $("footer").addClass("static");
    }
});

(function($) {
    $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.height();
    }
})(jQuery);
