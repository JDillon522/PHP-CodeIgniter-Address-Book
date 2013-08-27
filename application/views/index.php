<!-- Navbar -->
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
        <li><a href="#" data-reveal-id="register_user_modal">Register a User</a></li>
        <li class="divider"></li>   
        <li><a href="#" data-reveal-id="register_org_modal">Register an Organization</a></li>       
        <li class="divider"></li>
      </ul>
  </nav>
</div>

<!-- Search Field -->
<div class="row">
  <div class="large-12 columns">  
    <form method="post" action="../org/display_org"  name="org_search" id="org_search">
      <div class="row">
          <div class="large-4 columns">
            <input type="text" placeholder="Organization " id="org_name_search" name="org_name_search" />  
          </div>
          <div class="large-4 columns">
            <input type="text" placeholder="Email Address" id="org_email_search" name="org_email_search" />
          </div>
          <div class="large-4 columns">
            <input type="text" placeholder="State" id="org_state_search" name="org_state_search">
          </div>
      </div>
    </form>
  </div>
</div>

<!-- Searched Organizations -->
<div class="row">
  <div class="large-12 columns" id="org_results"></div>
</div>


<script type="text/javascript" src="../../assets/js/searchDisplay.js"></script>

