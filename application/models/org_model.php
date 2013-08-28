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

  public function get_org_edit($data)
  {
    $result_arr = null;
    
    $query = $this->db
                  ->where('id', $data['id'])
                  ->get('organizations');                  

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

  public function get_org_search($data)
  {
    $result_arr = null;
    $this->db->like('org_name', $data['org_name'], 'after');
    $this->db->like('org_email', $data['org_email'], 'after');
    $this->db->like('state', $data['state'], 'after');
    
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

  public function get_org_select($data)
  {
    $result_arr = null;
    
    $query = $this->db
                  ->where('id', $data['id'])
                  ->get('organizations');                  

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

  public function edit_org($data, $org_id)
  {
    $this->db->set('updated_at', 'NOW()', FALSE);
    return $this->db->where('id', $org_id)
            ->update('organizations', $data);
  }
} 

/* End of file org_model.php */
/* Location: ./application/models/org_model.php */