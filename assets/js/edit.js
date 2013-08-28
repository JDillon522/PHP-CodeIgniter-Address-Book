$(document).ready(function(){ 
  // Edit User 
  $('#edit_user_form').submit(function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#alert_box4').html(data);
      },
      "json"
    );
    this.reset();
    return false;
  });

  // Edit Org 
  $('#edit_org_form').submit(function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#alert_box5').html(data);
      },
      "json"
    );
    this.reset();
    return false;
  });

  // Populates the Edit User form
  $(document).on('submit', '.edit_user', function(){
    console.log('submit');
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log("data");
        console.log(data);
        $('#edit_user').foundation('reveal', 'open');
        $('#edit_user_id').val(data['id']);
        $('#edit_first_name').val(data['first_name']);
        $('#edit_last_name').val(data['last_name']);
        $('#edit_email').val(data['email']);
        $('#edit_phone').val(data['phone']);
        $('#edit_street1').val(data['street1']);
        $('#edit_street2').val(data['street2']);
        $('#edit_city').val(data['city']);
        $('#edit_state').val(data['state']);
        $('#edit_zip').val(data['zip']);
      },
      "json"
    );
    console.log("return");
    return false;
  });

  // Populates the Edit Organization form  
  $(document).on('submit', '.edit_org', function(){
    console.log('submit');
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log("data");
        console.log(data);
        $('#edit_org').foundation('reveal', 'open');
        $('#edit_org_id').val(data['id']);
        $('#edit_org_name').val(data['org_name']);
        $('#edit_org_email').val(data['org_email']);
        $('#edit_org_phone').val(data['org_phone']);
        $('#edit_org_street1').val(data['street1']);
        $('#edit_org_street2').val(data['street2']);
        $('#edit_org_city').val(data['city']);
        $('#edit_org_state').val(data['state']);
        $('#edit_org_zip').val(data['zip']);
      },
      "json"
    );
    console.log("return");
    return false;
  });
})

/* End of file edit.js */
/* Location: ./assets/js/edit.js */