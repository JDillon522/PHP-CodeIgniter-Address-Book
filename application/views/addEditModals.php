<!-- Remove User -->
<div class="reveal-modal medium" id="remove_user">
  <h3>Remove a User:</h3>
  
      <table>
    <thead>
      <tr>
        <th width="50">ID</th>
        <th width="180">Name</th>
        <th width="280">Email</th>
        <th width="110">Delete</th>
      </tr> 
    </thead>
    <tbody>
      <?php  
      foreach ($user_data as $key)
      {
        $html = "
        <tr>
          <td>#{$key['id']}</td>
          <td>{$key['first_name']} {$key['last_name']}</td>
          <td>{$key['email']}</td>
          <td><form method='post' action='/user/delete_user/' id='delete_form'>
              <input type='hidden' name='user_id' value='{$key['id']}'>
              <input type='submit' name='submit' class='button alert' value='Delete'>
            </form></td>
        </tr>";
        echo $html;
      } ?>
    </tbody>
  </table>
  <!-- Alert Boxs -->
  <div id="delete_alert_box">
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit User -->
<div class="reveal-modal medium" id="edit_user">
  <h3>Edit a User:</h3>
    <div class="row">
      <table>
        <thead>
          <tr>
            <th width="50">ID</th>
            <th width="180">Name</th>
            <th width="280">Email</th>
            <th width="110">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          foreach ($user_data as $key)
          {
            $html = "
            <tr>
              <td>#{$key['id']}</td>
              <td>{$key['first_name']} {$key['last_name']}</td>
              <td>{$key['email']}</td>
              <td><button class='button' data-reveal-id='edit_user_{$key['id']}'>Edit</button></td>       
            </tr>"; 

            echo $html;
          } ?>
        </tbody>
      </table>
    </div>
  <a class="close-reveal-modal">&#215;</a>
</div>



<!-- Pofile -->
<div class="reveal-modal small" id="profile">
  <?php $temp_session = $this->session->userdata('user_session'); ?>
  <h3>Personal Profile</h3>
  <p>Name: <?php echo $temp_session->first_name . " " . $temp_session->last_name ?></p>
  <p>Eamil: <?php echo $temp_session->email ?></p>
  <p>ID #: <?php echo $temp_session->id?></p>
  <p>Status: <?php if ($temp_session->id == 1) 
            {
            echo "Admin";
            }
            else{ echo "User"; } ?></p>
  <button class='button' data-reveal-id='profile_edit'>Edit Your Information</button>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit profile -->
<div class="reveal-modal small" id="profile_edit">
  <?php $temp_session = $this->session->userdata('user_session'); ?>

  <form method='post' action='../user/edit_user' id='edit_user_form'>
    <input type='hidden' name='user_id' value='<?php echo $temp_session->id?>'>
    <label>First Name:</label>
    <input type='text' id='first_name' name='first_name' placeholder='<?php echo $temp_session->first_name ?>' />
    <label>Last Name:</label>
    <input type='text' id='last_name' name='last_name' placeholder='<?php echo $temp_session->last_name ?>' />
    <label>Email Address:</label>
    <input type='text' id='email' name='email' placeholder='<?php echo $temp_session->email ?>' />  
    <label>Password:</label>
    <input type='password' id='password1' name='password1' placeholder='New Password' />
    <label>Confirm Your Password:</label>
    <input type='password' id='password2' name='password2' placeholder='Confirm New Password' />
    <div class='row'>
    <input type='submit' id='submitbtn' placeholder='Submit' class='button'/> 
  </form> 
  <button class='button alert' data-reveal-id='profile'>Cancle</button>
    </div>
    <div id='edit_user_alert_box'>
    </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
