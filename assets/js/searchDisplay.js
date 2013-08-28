$(document).ready(function(){       
// Control the change between searching for Users and Organizations 
  // Page load
  $('#organizationSearch').hide();
  $('#selectedUsersDiv').hide();
  $('#selectedOrgDiv').hide();
  $('#userSearch').show();
  // Search User
  $('#searchUsers').click(function(){
    $('#selectedUsersDiv').hide();
    $('#selectedOrgDiv').hide();
    $('#organizationSearch').hide();
    $('#userSearch').show('slow');
    $('#user_search').submit();
  });
  // Search Orgs
  $('#searchOrgs').click(function(){
    $('#selectedUsersDiv').hide();
    $('#selectedOrgDiv').hide();
    $('#userSearch').hide();
    $('#organizationSearch').show('slow');
    $('#org_search').submit();
  });

// Org Search Functions
  // Main search function
  $('#org_search').keyup(function(){
    $('#org_search').submit();
  });
  $(document).on('submit', '#org_search', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        $('#org_results').html(data);
        $('.orgTable').hide();
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 
  $("#org_search").submit();
  $(document).on('click', 'a', function(e){
    $('.orgTable').hide();
    $('#orgPage'+$(this).attr('id')).show();
  return false;
  });
  // selected Organization. No pagination because a user only only belongs to one org.
  $(document).on('submit', '#viewOrgs', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        $('#userSearch').hide();
        $('#selectedUsersDiv').hide();
        $('#selectedOrg').html(data);
        $('#selectedOrgDiv').show('slow');
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 

// User Search Functions 
  // Main User Search Function
  $('#user_search').keyup(function(){
    $('#user_search').submit();
  });
  $(document).on('submit', '#user_search', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        $('#user_results').html(data);
        $('.usersTable').hide();
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 
  $('#user_search').submit();
  $(document).on('click', 'a', function(e){
    $('.usersTable').hide();
    $('#usersPage'+$(this).attr('id')).show();
  return false;
  });

  // Selected User Search Function 
  $(document).on('submit', '#viewUsers', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        $('#organizationSearch').hide();
        $('#selectedOrgDiv').hide();
        $('#selectedUsers').html(data);
        $('#selectedUsersDiv').show('slow');
        $('.usersTable').hide();
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 
  $(document).on('click', 'a', function(e){
    $('.usersTable').hide();
    $('#usersPage'+$(this).attr('id')).show();
  return false;
  });

// Edit User 
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

});

