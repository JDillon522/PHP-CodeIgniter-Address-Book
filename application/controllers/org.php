<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org extends CI_Controller
{
  var $userID;

  //initialization
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('Org_model');
    $this->load->model('User_model');
    $this->load->library('form_validation');
    $this->userID =  $this->session->userdata("user_session");
  } 

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('org_name', "Organization Name", 'required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('phone', 'Phone', 'is_natural|required');
    $this->form_validation->set_rules('street1', 'Street 1', 'required');
    $this->form_validation->set_rules('street2', 'Street 2', '');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('state', 'State', 'required|alpha|max_length[3]');
    $this->form_validation->set_rules('zip', 'Zip Code', 'required|numeric');

    if ($this->form_validation->run() == FALSE) 
    {
      $errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";
      echo json_encode($errors);
    }
    else
    {
      return TRUE;
    }
  }

  public function edit_org()
  {
    header('Content-type: application/json');
    $data = array(
    'id' => $this->input->post('org_id'),
    );
        
    $org = $this->Org_model->get_org_edit($data);
    $orgData = array();
    foreach ($org[0] as $key => $value) {
      $orgData[$key] = $value;
    }
    echo json_encode($orgData);
  }

  public function process_org_registration()
  {
    $this->validation();
    if ($this->validation()) 
    {
      $data = array(
        'org_name' => $this->input->post('org_name'),
        'org_email' => $this->input->post('email'),
        'org_phone' => $this->input->post('phone'),
        'street1' => $this->input->post('street1'),
        'street2' => $this->input->post('street2'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'zip' => $this->input->post('zip'),
        );

      $org = $this->Org_model->register_org($data);
      $success = "<div class='alert-box success' id='success-box'><p>Thank you for submitting your data.</p></div>";

      echo json_encode($success);
    }
  }

  public function process_org_edit()
  {
    
    $this->validation();
    if ($this->validation()) 
    {
      $org_id = $this->input->post('edit_org_id');

      $data = array(
        'org_name' => $this->input->post('org_name'),
        'org_email' => $this->input->post('email'),
        'org_phone' => $this->input->post('phone'),
        'street1' => $this->input->post('street1'),
        'street2' => $this->input->post('street2'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'zip' => $this->input->post('zip'),
        );

      $org = $this->Org_model->edit_org($data, $org_id);
      $success = "<div class='alert-box success' id='success-box'><p>Thank you for submitting your data.</p></div>";

      echo json_encode($success);
    }
  }

// ***** Display the organization data *****
  public function display_org()
  {
    $data = array(
      'org_name' => $this->input->post('org_name_search'),
      'org_email' => $this->input->post('org_email_search'),
      'state' => $this->input->post('org_state_search'),
      );

    $org = $this->Org_model->get_org_search($data);
    $this->format_data($org, 'show');
  }

  public function display_org_edit()
  {
    $data = array(
      'org_name' => $this->input->post('org_name_search'),
      'org_email' => $this->input->post('org_email_search'),
      'state' => $this->input->post('org_state_search'),
      );

    $org = $this->Org_model->get_org_search($data);
    $this->format_data($org, 'edit');
  }

  public function display_selected_org()
  {
    $data = array(
      'id' => $this->input->post('orgId'),
      );

    $org = $this->Org_model->get_org_select($data);
    $this->format_data($org, 'edit');
  }
  
  // Formatting paths for the display
  public function display_pagination($array)
  {
    $html ="<div class='pagination-centered'>
        <ul class='pagination'>";
    foreach ($array as $key) 
    {
      // each pagination link's id corresponds to the key number. this will correspond to the index number of the different tables
      $html .="
        <li><a href='#' id='{$key}' class='pageAnchor'>{$key}</a></li>";
    }
    $html .= "
          </ul>
        </div>";
    return $html;
  }  

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


    // iterates through $org's data
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
    if ($output == 'show') 
    {
      $html .= $this->data_output($pagination_array);
    }
    if ($output == 'edit') 
    {
      $html .= $this->data_output_edit($pagination_array);
    }

    echo json_encode($html);
  }

  // the main page display
  public function data_output($array)  
  {
    // outputted data on the main page
    $html = '';
    foreach ($array as $index => $key)
    {
      // each table has a different page index. This matches the index of the pagination links
    
      $html .= "
        <table class=
        'table orgTable' id='orgPage{$index}'>
          <thead>
            <tr>
              <th width='300'>Organization Name:</th>
              <th width='300'>Phone Number:</th>
              <th width='300'>Email Address:</th>
              <th width='300'>Address:</th>
            </tr>
          </thead>
          <tbody>
      ";
      foreach ($key as $key2) 
      {
      $html .= "
        <tr>
          <td>{$key2->org_name}</td>
          <td>";

            $phoneNum = $key2->org_phone;
            $phoneNumArray = str_split($phoneNum);
            for ($i = 0; $i < count($phoneNumArray); $i++ )
            {
              switch ($i) {
                case '0':
                  $html .= "({$phoneNumArray[$i]}";
                  break;
                case '2':
                  $html .= "{$phoneNumArray[$i]}) ";
                  break;
                case '5':
                  $html .= "{$phoneNumArray[$i]}-";
                  break;
                default:
                  $html .= "{$phoneNumArray[$i]}";
                  break;
              }
            }

          $html .= "</td>
          <td>{$key2->org_email}</td>
          <td>
            {$key2->street1}
            <br>
            {$key2->street2}
            <br>
            {$key2->city}  {$key2->state}
            <br>
            {$key2->zip}
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
  // the dashboard display 
  public function data_output_edit($array)  
  {
    // outputted table code
    $html = '';
    foreach ($array as $index => $key)
    {
      
      // each table has a different page index. This matches the index of the pagination links
    
      $html .= "
        <table class=
        'table  orgTable' id='orgPage{$index}'>
          <thead>
            <tr>
              <th width='175'>Organization Name:</th>
              <th width='175'>Phone Number:</th>
              <th width='175'>Email Address:</th>
              <th width='175'>Address:</th>
              <th width='150'>Members:</th>
              <th width='150'>Edit:</th>
            </tr>
          </thead>
          <tbody>
      ";
      foreach ($key as $key2) 
      {
      $html .= "
        <tr>
          <td>{$key2->org_name}</td>
          <td>";

            $phoneNum = $key2->org_phone;
            $phoneNumArray = str_split($phoneNum);
            for ($i = 0; $i < count($phoneNumArray); $i++ )
            {
              switch ($i) {
                case '0':
                  $html .= "({$phoneNumArray[$i]}";
                  break;
                case '2':
                  $html .= "{$phoneNumArray[$i]}) ";
                  break;
                case '5':
                  $html .= "{$phoneNumArray[$i]}-";
                  break;
                default:
                  $html .= "{$phoneNumArray[$i]}";
                  break;
              }
            }

          $html .= "</td>
          <td>{$key2->org_email}</td>
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
            <form id='viewUsers' method='post' action='../user/display_users_of_org'>
              <input type='hidden' value='{$key2->id}' name='usersId'>
              <input type='submit' class='button small' class='viewUsers' value='View'>
            </form>
          </td>
          <td>";

        if ($this->userID->organizations_id == $key2->id) {
        $html .= "
          <form class='edit_org' method='post' action='../org/edit_org'>
            <input type='hidden' value='{$key2->id}' name='org_id'>  
            <input type='submit' class='button success small' value='Edit'>
          </form>";
        }
        else
        {
          $html .= "<button class='button success disabled small'>Edit</button>";
        }

        $html .= "
        </td>
        </tr>";
      }
    $html .= "
        </tbody>
      </table>
    ";
    }
    return $html;
  }
}