<!-- Edit User -->
<div class="reveal-modal medium" id="edit_user">
  <h3>Edit a User:</h3>
    <div class="row">
      <form method="post" action="../user/process_edit_user" id="edit_user_form">
      <input type='hidden' name='edit_user_id' id='edit_user_id'>
        <div class="row">
          <div class="large-6 columns">
            <label>First Name:</label>
            <input type="text" id="edit_first_name" name="first_name" placeholder="First Name"/>
          </div>
          <div class="large-6 columns">
            <label>Last Name:</label>
            <input type="text" id="edit_last_name" name="last_name" placeholder="Last Name" />
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            <label>Email Address:</label>
            <input type="text" id="edit_email" name="email" placeholder="Email" /> 
          </div>
          <div class="large-6 columns">
            <label>Organization:</label>
            <select id="org_select" name="org_select">
                <?php echo $options; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            <label>Phone Number:</label>
            <input type="text" id="edit_phone" name="phone" placeholder="Format: 1234567890" />
            <label>Password:</label>
            <input type="password" id="password1" name="password1" placeholder="Password" />
            <label>Confirm Your Password:</label>
            <input type="password" id="password2" name="password2" placeholder="Confirm Password" />
          </div>
          <div class="large-6 columns">  
            <label>Address:</label>
            <input type="text" id="edit_street1" name="street1" placeholder="Street 1" />
            <input type="text" id="edit_street2" name="street2" placeholder="Street 2" />
            <label>City / State / Zip Code</label>
            <input type="text" id="edit_city" name="city" placeholder="City"  />
            <div class="row">
              <div class="large-9 columns">
                <input type="text" id="edit_state" name="state" placeholder="State" />
              </div>
              <div class="large-3 columns">
                <input type="text" id="edit_zip" name="zip" placeholder="Zip" />
              </div>  
            </div>
          </div>
        </div> 
        <input type="submit" id="submitbtn" placeholder="Submit" class="button"/> 
    </form>
    <!-- Alert Box -->
    <div id="alert_box4"></div>
    </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit Organization Form -->
<div class="reveal-modal medium" id="edit_org">  
  <h3>Register An Organization:</h3>
  <div class="row">
    <form method="post" action="../org/process_org_edit" id="edit_org_form">
      <input type='hidden' name='edit_org_id'>
        <div class="row">
          <div class="row">
            <div class="large-12 columns">
              <label>Organization Name:</label>
              <input type="text" id="edit_org_name" name="org_name" placeholder="Orginization Name" class='org_input'/>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label>Email Address:</label>
              <input type="text" id="edit_org_email" name="email" placeholder="Email"  class='org_input'/> 
            </div>
            <div class="large-6 columns">
              <label>Phone Number:</label>
              <input type="text" id="edit_org_phone" name="phone" placeholder="Format: 1234567890"  class='org_input'/>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">  
              <label>Address:</label>
              <input type="text" id="edit_org_street1" name="street1" placeholder="Street 1"  class='org_input'/>
              <input type="text" id="edit_org_street2" name="street2" placeholder="Street 2"  class='org_input'/>
            </div>
            <div class="large-6 columns">
              <label>City / State / Zip Code</label>
              <input type="text" id="edit_org_city" name="city" placeholder="City"   class='org_input'/>
              <div class="row">
                <div class="large-9 columns">
                  <input type="text" id="edit_org_state" name="state" placeholder="State"  class='org_input'/>
                </div>
                <div class="large-3 columns">
                  <input type="text" id="edit_org_zip" name="zip" placeholder="Zip"  class='org_input'/>
                </div>  
              </div>
            </div>
          </div> 
          <input type="submit" id="submitbtn" placeholder="Submit" class="button org_input"/> 
        </div>
    </form>
  </div>
      <!-- Alert Box -->
  <div id="alert_box5"></div>
  <a class="close-reveal-modal">&#215;</a>
</div>
