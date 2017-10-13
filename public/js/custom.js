
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
function animatedLogo(p1){
  if(p1){
    $(".navbar-brand").addClass("animated");
    $(".navbar-brand").addClass("tada");
  }else{
    $(".navbar-brand").removeClass("animated");
    $(".navbar-brand").removeClass("tada");
  }
}

function validateNav(){
    var uname = $("#email-nav");
    var pword = $("#password-nav");

    if(uname.val() || pword.val()){
        $("#navbar-login").submit();
    }else{
        window.document.location='/login';
    }
}

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
