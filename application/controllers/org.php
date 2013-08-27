<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org extends CI_Controller
{
  //initalization
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('Org_model');
    $this->load->model('User_model');
    $this->load->library('form_validation');
    // $this->output->enable_profiler(TRUE);
  } 

  public function process_org_registration()
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
      $success = "<div class='alert-box success' id='success-box'><p>Thank you for submitting your data. You may now refresh the page and register a user in this Organization.</p></div>";

      echo json_encode($success);
    }
  }

  // ***** Display the organization data on the main screen *****
  public function display_org()
  {
    $data = array(
      'org_name' => $this->input->post('org_name_search'),
      'org_email' => $this->input->post('org_email_search'),
      'state' => $this->input->post('org_state_search'),
      );

    $org = $this->Org_model->get_org_search($data);

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
    for ($i=0; $i < count($org) ; $i++) 
    { 
      // adds each return to the data_array up to 10
      $data_array[] = $org[$i];
      // executed if the remaining elements are less than 10
      if ($i == (count($org) - 1)) 
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
    $html .= $this->data_output($pagination_array);

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
    
  public function data_output($array)  
  {
    // outputted table code
    $html = '';
    foreach ($array as $index => $key)
    {
      // each table has a different page index. This matches the index of the pagination links
    
      $html .= "
        <table class=
        'table' id='page{$index}'>
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
          <td>{$key2->org_phone}</td>
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
  //*******************************************************


  // ***** Display the organization output from the search screen ******
  public function display_org_edit()
  {
    $data = array(
      'org_name' => $this->input->post('org_name_search'),
      'org_email' => $this->input->post('org_email_search'),
      'state' => $this->input->post('org_state_search'),
      );

    $org = $this->Org_model->get_org_search($data);

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
    for ($i=0; $i < count($org) ; $i++) 
    { 
      // adds each return to the data_array up to 10
      $data_array[] = $org[$i];
      // executed if the remaining elements are less than 10
      if ($i == (count($org) - 1)) 
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
    $html .= $this->data_output_edit($pagination_array);

    echo json_encode($html);
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
        'table' id='page{$index}'>
          <thead>
            <tr>
              <th width='200'>Organization Name:</th>
              <th width='200'>Phone Number:</th>
              <th width='200'>Email Address:</th>
              <th width='200'>Address:</th>
              <th width='200'>Users</th>
            </tr>
          </thead>
          <tbody>
      ";
      foreach ($key as $key2) 
      {
      $html .= "
        <tr>
          <td>{$key2->org_name}</td>
          <td>{$key2->org_phone}</td>
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
            <button value='{$key2->id}' class='button small' class='viewUsers'>View Users</button>
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
  // ******************************************************

}