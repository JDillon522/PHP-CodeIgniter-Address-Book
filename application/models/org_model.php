<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org_model extends CI_Model
{

  public function get_org()
  {
    $result_arr = null;

    $query = $this->db->get('organizations');
    if ($query == NULL) 
    {
      return NULL;
    }
    else
    {
      foreach ($query->result() as $row) 
      {
        $result_arr[] = $row;
      }
      return $result_arr;  
    }
  }

  public function register_org($org)
  {
    $this->db->set('created_at', 'NOW()', FALSE);
    $this->db->set('updated_at', 'NOW()', FALSE);
    return $this->db->insert("organizations", $org);
  }
} 