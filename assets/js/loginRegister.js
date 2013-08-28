$(document).ready(function(){
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
          $('#alert_box1').html(data);
        };
      },
      "json"
    );
    return false;
  });

  $('#register_user_form').submit(function(){
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
    this.reset();
    return false;
  });

  $('#register_org_form').submit(function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#alert_box3').html(data);
      },
      "json"
    );
    this.reset();
    return false;
  });
});