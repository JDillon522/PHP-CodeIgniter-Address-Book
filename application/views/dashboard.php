
<!-- Search Org Field -->
<div id="organizationSearch">
  <div class="row">
    <div class="large-12 columns">  
      <form method="post" action="../org/display_org_edit"  name="org_search" id="org_search">
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
</div>


<!-- Search Users Field -->
<div id="userSearch">
  <div class="row">
    <div class="large-12 columns">  
      <form method="post" action="../user/display_user_edit"  name="user_search" id="user_search">
        <div class="row">
            <div class="large-3 columns">
              <input type="text" placeholder="First Name" id="user_Fname_search" name="user_Fname_search" />  
            </div>
            <div class="large-3 columns">
              <input type="text" placeholder="Last Name" id="user_Lname_search" name="user_Lname_search" />  
            </div>
            <div class="large-3 columns">
              <input type="text" placeholder="Email Address" id="user_email_search" name="user_email_search" />
            </div>
            <div class="large-3 columns">
              <input type="text" placeholder="State" id="user_state_search" name="user_state_search">
            </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Searched Organizations -->
  <div class="row">
    <div class="large-12 columns" id="user_results"></div>
  </div>
</div>

<script type="text/javascript" src="../../assets/js/searchDisplay.js"></script>

