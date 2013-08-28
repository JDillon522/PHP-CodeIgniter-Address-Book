<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function get_user($data)
  {
    return $this->db
          ->where('email', $data['email'])
          ->select('first_name, last_name, email, password, id, organizations_id')
          ->get('users')
          ->row();
  }

  public function register_user($user)
  {
    $this->db->set('created_at', 'NOW()', FALSE);
    $this->db->set('updated_at', 'NOW()', FALSE);
    return $this->db->insert("users", $user);
  }

  public function get_user_search($data)
  {
    $result_arr = null;
    $this->db->like('first_name', $data['first_name'], 'after');
    $this->db->like('last_name', $data['last_name'], 'after');
    $this->db->like('email', $data['email'], 'after');
    $this->db->like('state', $data['state'], 'after');
    
    $query = $this->db->get('users');

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

  public function get_user_select($data)
  {
    $result_arr = null;
    
    $query = $this->db
                  ->where('organizations_id', $data['organization_id'])
                  ->get('users');                  

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
  
  public function get_user_edit($data)
  {
    $result_arr = null;
    
    $query = $this->db
                  ->where('id', $data['id'])
                  ->get('users');                  

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
      var_dump($result_arr);
    return $result_arr;  
    }
  }

  public function edit_user($data, $users_id)
  {
    return $this->db->where('id', $users_id)
            ->update('users', $data);
  }

}

//end of class User