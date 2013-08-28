<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
  var $userID;

  //initalization
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('User_model');
    $this->load->library('form_validation');
    $this->userID =  $this->session->userdata("user_session");
  } 
  
  public function process_login()
  {
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('password0', 'Password', 'min_length[6]|required');
    if ($this->form_validation->run() == FALSE) 
    {
      $errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";

      echo json_encode($errors);
    }
    else
    {
      $this->load->library('encrypt');
      
      $data = array();
      $data['email'] = $this->input->post('email');
      $user = $this->User_model->get_user($data);

      if (count($user) > 0) 
      {
        $decrypted_password = $this->encrypt->decode($user->password);

        if ($decrypted_password == $this->input->post('password0')) 
        {
          $this->session->set_userdata('user_session', $user);
          echo json_encode("success");
        }
        else
        {
          $errors = "<div class='alert-box alert' id='error-box'><p>Your login information did not match our reccords. Try again</p></div>";
          echo json_encode($errors);
        }
      }
      else
      {
        $errors = "<div class='alert-box alert' id='error-box'><p>Your login information did not match our reccords. Try again</p></div>";
        echo json_encode($errors);
      }          
    }
  }

  public function process_user_registration()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', "First Name", 'alpha|required');
    $this->form_validation->set_rules('last_name', "Last Name", 'alpha|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('phone', 'Phone', 'is_natural|required');
    $this->form_validation->set_rules('street1', 'Street 1', 'required');
    $this->form_validation->set_rules('street2', 'Street 2', '');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('state', 'State', 'required|alpha|max_length[3]');
    $this->form_validation->set_rules('zip', 'Zip Code', 'required|numeric');
    $this->form_validation->set_rules('password1', 'Password', 'min_length[6]|required');
    $this->form_validation->set_rules('password2', 'Password', 'matches[password1]|required');

    if ($this->form_validation->run() == FALSE) 
    {
      $errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";
      echo json_encode($errors);
    }
    else
    {
      $this->load->library('encrypt');
      $encrypted_password = $this->encrypt->encode($this->input->post('password1'));
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'street1' => $this->input->post('street1'),
        'street2' => $this->input->post('street2'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'zip' => $this->input->post('zip'),
        'password' => $encrypted_password,
        'organizations_id' => $this->input->post('org_select')
        );
      
      $user = $this->User_model->register_user($data);
      $success = "<div class='alert-box success' id='success-box'><p>Thank you for submitting your data. You may now log in.</p></div>";
        echo json_encode($success);
    }
  }

  // ****** Display Users On Dashboard ********
  public function display_user_edit()
  {
    $data = array(
      'first_name' => $this->input->post('user_Fname_search'),
      'last_name' => $this->input->post('user_Lname_search'),
      'email' => $this->input->post('user_email_search'),
      'state' => $this->input->post('user_state_search'),
      );

    $user = $this->User_model->get_user_search($data);
    $this->format_data($user, 'edit');
  }

  public function showUsers()
  {
    $data = array(
      'organization_id' => $this->input->post('usersId'),
      );
        
    $user = $this->User_model->get_user_select($data);
    $this->format_data($user, 'edit');
  }

  public function selectedUsers()
  {
    $data = array(
      'first_name' => $this->input->post('user_Fname_search'),
      'last_name' => $this->input->post('user_Lname_search'),
      'email' => $this->input->post('user_email_search'),
      'state' => $this->input->post('user_state_search'),
      );

    $user = $this->User_model->get_user_search($data);
    $this->format_data($user, 'edit');
  }

  public function edit_user()
  {
    header('Content-type: application/json');
    $data = array(
    'id' => $this->input->post('user_id'),
    );
        
    $user = $this->User_model->get_user_edit($data);
    $userData = array();
    foreach ($user[0] as $key => $value) {
      $userData[$key] = $value;
    }
    echo json_encode($userData);
  }

  // formatting functions 
  public function format_data($data, $output)
  {
    // Pagination code below... Beware all ye who enter here

    // the number of pagination tabs
    $page_num = 0;
    
    // $page_num_array will be used to index pagination links to correspond and connect them with indexes in pagination_array
    $page_num_array = array ();

    // $data array will contain the results to be displayed
    $data_array = array ();

    // $pagination_array will be the combined output of page_num_array and data_array
    $pagination_array = array ();


    // iterates through $user's data
    for ($i=0; $i < count($data) ; $i++) 
    { 
      // adds each return to the data_array up to 10
      $data_array[] = $data[$i];
      // executed if the remaining elements are less than 10
      if ($i == (count($data) - 1)) 
      {
        $j = $i;
        while ( $j % 4 == 0) 
        {
          $j++;
        }
        $page_num ++;
        $page_num_array[] = $page_num;
        $pagination_array[$page_num] = $data_array;
        $data_array = array ();
      }

      if ($i != 0 AND ($i + 1) % 4 == 0) 
      {
        $page_num ++;
        $page_num_array[] = $page_num;
        $pagination_array[$page_num] = $data_array;
        $data_array = array ();
      }
    }
    $html = NULL;
    // creates the pagination display
    $html = $this->display_pagination($page_num_array);
    // adds the data tables to the display
    
    if ($output == 'edit') 
    {
     $html .= $this->data_output_edit($pagination_array);
    }
    echo json_encode($html);
  }

  public function display_pagination($array)
  {
    $html ="<div class='pagination-centered'>
        <ul class='pagination'>";
    foreach ($array as $key) 
    {
      // each pagination link's id corresponds to the key number. this will correspond to the index number of the different tables
      $html .="
        <li><a href='#' id='{$key}'>{$key}</a></li>";
    }
    $html .= "
          </ul>
        </div>";
    return $html;
  }

  public function data_output_edit($array)  
  { 
    // outputted table code   
    $html = '';
    foreach ($array as $index => $key)
    {
      
      // each table has a different page index. This matches the index of the pagination links
    
      $html .= "
        <table class=
        'table usersTable' id='usersPage{$index}'>
          <thead>
            <tr>
              <th width='150'>First Name:</th>
              <th width='150'>Last Name:</th>
              <th width='150'>Phone Number:</th>
              <th width='180'>Email Address:</th>
              <th width='150'>Address:</th>
              <th width='125'>Organization:</th>
              <th width='125'>Edit:</th>
            </tr>
          </thead>
          <tbody>
      ";
      foreach ($key as $key2) 
      {
        $html .= "
          <tr>
            <td>{$key2->first_name}</td>
            <td>{$key2->last_name}</td>
            <td>{$key2->phone}</td>
            <td>{$key2->email}</td>
            <td>
              {$key2->street1}
              <br>
              {$key2->street2}
              <br>
              {$key2->city}  {$key2->state}
              <br>
              {$key2->zip}
            </td>
            <td>
              <form id='viewOrgs' method='post' action='../org/showOrg'>
                <input type='hidden' value='{$key2->organizations_id}' name='orgId'>
                <input type='hidden' value='{$key2->id}' name='user_id'>
                <input type='submit' class='button small viewButton' class='viewOrg' value='View'>
              </form>
            </td>
            <td>";

        if ($this->userID->organizations_id == $key2->organizations_id) {
          $html .= "
          <form class='edit_user' method='post' action='../user/edit_user'>
            <input type='hidden' value='{$key2->id}' name='user_id'>  
            <input type='submit' class='button success small' value='Edit'>
          </form>
          ";
        }
        else
        {
          $html .= "<button class='button success disabled small'>Edit</button>";
        }
        $html .= "
            </td>
          </tr>
        ";
      }
    $html .= "
        </tbody>
      </table>
    ";
    }
    return $html;
  }
  // ******************************************


  public function logout()
  {
    $this->session->sess_destroy();
    header('location:/main/index');
  }

  public function edit_user_validate()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', "First Name", 'alpha|required');
    $this->form_validation->set_rules('last_name', "Last Name", 'alpha|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('phone', 'Phone', 'is_natural|required');
    $this->form_validation->set_rules('user', 'useranization', 'required');
    $this->form_validation->set_rules('street1', 'Street 1', 'required');
    $this->form_validation->set_rules('street2', 'Street 2', 'required');
    $this->form_validation->set_rules('city', 'City', 'required|alpha');
    $this->form_validation->set_rules('state', 'State', 'required|alpha|less_than[2]');
    $this->form_validation->set_rules('zip', 'Zip Code', 'required|numeric');
    $this->form_validation->set_rules('password1', 'Password', 'min_length[6]|required');
    $this->form_validation->set_rules('password2', 'Password', 'matches[password1]|required');

    if ($this->form_validation->run() == FALSE) 
    {
      $errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";
      echo json_encode($errors);
    }
    else
    {
      $this->load->library('encrypt');
      $encrypted_password = $this->encrypt->encode($this->input->post('password1'));
      $user_id = $this->input->post('user_id');
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'password' => $encrypted_password
        );
      $user = $this->User_model->edit_user($data, $user_id);
      $success = "<div class='alert-box success' id='success-box'><p>The account info has been updated.</p></div>";
      echo json_encode($success);
    }
  }
}
