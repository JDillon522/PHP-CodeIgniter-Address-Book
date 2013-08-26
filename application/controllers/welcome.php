<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function index()
  {
    $data = array(
      'title' => 'Willow Tree Address Book',
      'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/styleAll.css">',
      'scripts' => '<script src="../../assets/js/loginRegister.js" />'
      );

    $this->load->view('head', $data);
    $this->load->view('index');
    $this->load->view('bottom', $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */