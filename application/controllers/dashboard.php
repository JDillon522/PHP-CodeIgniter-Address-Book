<?php

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent:: __construct();
    $this->load->model('User_model');
    $this->check_session();
    // $this->output->enable_profiler(TRUE);

  }

  private function check_session()
  {
    if ($this->session->userdata('user_session') == '') 
    {
      header('location: /welcome/index');
    }
  }

  public function index()
  { 
    $data = array(
      'title' => 'Willow Tree Address Book - Dashboard',
      'addons' => '
      <link rel="stylesheet" type="text/css" href="../../assets/CSS/base.css">',
      );

    $this->load->view('head', $data);
    $this->load->view('navbar');
    $this->load->view('dashboard', $data);
    $this->load->view('loginRegisterModals');
    $this->load->view('addEditModals');
    $this->load->view('bottom', $data);

  }

}