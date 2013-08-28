<!-- Modals -->
<div class="reveal-modal small" id="login-modal">
  <h3>Login:</h3>
    <form method="post" action="../user/process_login" id="login_form">
      <input type="hidden" name="action" value="login">
        <label>Email Address:</label>
        <input type="text" id="email" name="email" placeholder="Email" />
        <label>Password:</label>
        <input type="password" id="password1" name="password0" placeholder="Password" />
      <input type="submit" id="submitbtn" placeholder="Submit" class="button"/>
    </form>
    <!-- Alert Box -->
    <div id="alert_box1">
    </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Register User Form -->
<div class="reveal-modal medium" id="register_user_modal">  
  <h3>Register A User:</h3>
  <div class="row">
    <form method="post" action="../user/process_user_registration" id="register_user_form">
      <input type="hidden" name="action" value="register">
        <div class="row">
          <div class="large-6 columns">
            <label>First Name:</label>
            <input type="text" id="first_name" name="first_name" placeholder="First Name"/>
          </div>
          <div class="large-6 columns">
            <label>Last Name:</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last Name" />
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            <label>Email Address:</label>
            <input type="text" id="email" name="email" placeholder="Email" /> 
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
            <input type="text" id="phone" name="phone" placeholder="Format: 1234567890" />
            <label>Password:</label>
            <input type="password" id="password1" name="password1" placeholder="Password" />
            <label>Confirm Your Password:</label>
            <input type="password" id="password2" name="password2" placeholder="Confirm Password" />
          </div>
          <div class="large-6 columns">  
            <label>Address:</label>
            <input type="text" id="street1" name="street1" placeholder="Street 1" />
            <input type="text" id="street2" name="street2" placeholder="Street 2" />
            <label>City / State / Zip Code</label>
            <input type="text" id="city" name="city" placeholder="City"  />
            <div class="row">
              <div class="large-9 columns">
                <input type="text" id="state" name="state" placeholder="State" />
              </div>
              <div class="large-3 columns">
                <input type="text" id="zip" name="zip" placeholder="Zip" />
              </div>  
            </div>
          </div>
        </div> 
        <input type="submit" id="submitbtn" placeholder="Submit" class="button"/> 
    </form>
  </div>
      <!-- Alert Box -->
  <div id="alert_box2"></div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Register Organization Form -->
<div class="reveal-modal medium" id="register_org_modal">  
  <h3>Register An Organization:</h3>
  <div class="row">
    <form method="post" action="../org/process_org_registration" id="register_org_form">
        <div class="row">
          <div class="row">
            <div class="large-12 columns">
              <label>Organization Name:</label>
              <input type="text" id="org_name" name="org_name" placeholder="Orginization Name" class='org_input'/>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label>Email Address:</label>
              <input type="text" id="email" name="email" placeholder="Email"  class='org_input'/> 
            </div>
            <div class="large-6 columns">
              <label>Phone Number:</label>
              <input type="text" id="phone" name="phone" placeholder="Format: 1234567890"  class='org_input'/>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">  
              <label>Address:</label>
              <input type="text" id="street1" name="street1" placeholder="Street 1"  class='org_input'/>
              <input type="text" id="street2" name="street2" placeholder="Street 2"  class='org_input'/>
            </div>
            <div class="large-6 columns">
              <label>City / State / Zip Code</label>
              <input type="text" id="city" name="city" placeholder="City"   class='org_input'/>
              <div class="row">
                <div class="large-9 columns">
                  <input type="text" id="state" name="state" placeholder="State"  class='org_input'/>
                </div>
                <div class="large-3 columns">
                  <input type="text" id="zip" name="zip" placeholder="Zip"  class='org_input'/>
                </div>  
              </div>
            </div>
          </div> 
          <input type="submit" id="submitbtn" placeholder="Submit" class="button org_input"/> 
        </div>
    </form>
  </div>
      <!-- Alert Box -->
  <div id="alert_box3"></div>
  <a class="close-reveal-modal">&#215;</a>
</div>