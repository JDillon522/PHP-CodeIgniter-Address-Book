$(document).ready(function(){
  $('#register_form').submit(function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#alert_box2').html(data);
      },
      "json"
    );
    return false;
  });
  $('#login_form').submit(function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        if (data == "success") {
          window.location.href = "/dashboard/index";

        }
        else{
          console.log(data);
          $('#alert_box').html(data);
        };
      },
      "json"
    );
    return false;
  });
});