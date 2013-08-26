<div class='large-12'>
  <nav class="top-bar">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1 id='top-bar-title'>Begin: </h1>
      </li>
      <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Left Nav Section -->
      <ul class="left">
        <li class="divider"></li>
        <li><a href="#" data-reveal-id="login-modal">Login</a></li>
        <li class="divider"></li>
        <li><a href="#" data-reveal-id="register-modal">Register</a></li>
        <li class="divider"></li>          
      </ul>
  </nav>
</div>

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
    <div id="alert_box">
    </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<!-- Register Form -->
<div class="reveal-modal small" id="register-modal">  
  
  <h3>Register:</h3>
  <form method="post" action="../user/process_registration" id="register_form">
    <input type="hidden" name="action" value="register">
    <label>First Name:</label>
    <input type="text" id="first_name" name="first_name" placeholder="First Name" />
    <label>Last Name:</label>
    <input type="text" id="last_name" name="last_name" placeholder="Last Name" />
    <label>Email Address:</label>
    <input type="text" id="email" name="email" placeholder="Email" /> 
    <label>Password:</label>
    <input type="password" id="password1" name="password1" placeholder="Password" />
    <label>Confirm Your Password:</label>
    <input type="password" id="password2" name="password2" placeholder="Confirm Password" />
    <br />
    <input type="submit" id="submitbtn" placeholder="Submit" class="button"/> 
  </form>
    <!-- Alert Box -->
  <div id="alert_box2">
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

