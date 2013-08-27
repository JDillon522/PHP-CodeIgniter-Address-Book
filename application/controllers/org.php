<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org extends CI_Controller
{
  //initalization
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('Org_model');
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
    $this->form_validation->set_rules('city', 'City', 'required|alpha');
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
}