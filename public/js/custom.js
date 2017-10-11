
$(document).ready(function() {
    // Check if body height is higher than window height :)
    $('#sponsSubmit').attr('disabled', 'disabled');
    $('#student_id').change(function(){
        if($("#myselect option:selected").val()!=''){
            $('#sponsSubmit').removeAttr('disabled');
        }else{
            $('#sponsSubmit').attr('disabled', 'disabled');
            console.log("Disabled");
        }
    });


});

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
