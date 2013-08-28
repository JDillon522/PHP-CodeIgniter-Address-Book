$(document).on('submit', '#register_form', function(){
  $.post
  (
    $(this).attr('action'),
    $(this).serialize(),
    function(data){
      console.log(data);
      $('#add_user_alert_box').html(data);
    },
    "json"
  );
  return false;
});

$(document).on('submit', '#delete_form', function(){ 
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#delete_alert_box').html(data);
      },
      "json"
    );
    return false;
  });

$(document).on('submit', '#edit_user_form', function(){ 
  $.post
  (
    $(this).attr('action'),
    $(this).serialize(),
    function(data){
      console.log(data);
      $('#edit_user_alert_box').html(data);
    },
    "json"
  );
  return false;
});

/* End of file nav.js */
/* Location: ./assets/js/nav.js */