$(document).ready(function(){       
  // Control the change between searching for Users and Organizations 
  $('#userSearch').hide();
  $('#searchUsers').click(function(){
    $('#organizationSearch').hide();
    $('#userSearch').toggle('slow');
    $('#user_search').submit();
  });
  $('#searchOrgs').click(function(){
    $('#userSearch').hide();
    $('#organizationSearch').toggle('slow');
    $('#org_search').submit();
  });


  // Org Search Functions
  $('#org_search').keyup(function(){
    $('#org_search').submit();
  });
  $(document).on('submit', '#org_search', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#org_results').html(data);
        $('table').hide();
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 
  $("#org_search").submit();
  $(document).on('click', 'a', function(e){
    $('table').hide();
    $('#page'+$(this).attr('id')).show();
  return false;
  });

  // User Search Functions 
  $('#user_search').keyup(function(){
    $('#user_search').submit();
  });
  $(document).on('submit', '#user_search', function(){
    $.post
    (
      $(this).attr('action'),
      $(this).serialize(),
      function(data){
        console.log(data);
        $('#user_results').html(data);
        $('table').hide();
        $('table:first-of-type').show();
      },
      "json"
    );
    return false;
  }); 
  $(document).on('click', 'a', function(e){
    $('table').hide();
    $('#page'+$(this).attr('id')).show();
  return false;
  });
});

