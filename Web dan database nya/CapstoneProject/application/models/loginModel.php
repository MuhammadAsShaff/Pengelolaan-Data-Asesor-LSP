<?php

class loginModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function checkAdmin($email, $password)
  {
    $query = $this->db->get_where('admin', array('email' => $email, 'password' => $password));

    if ($query !== false && $query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function userAdmin($email, $password)
  {
    $query = $this->db->get_where('admin', array('email' => $email, 'password' => $password));
    $data = $query->result();
    return $data;
  }


  public function checkAsesor($email, $password)
  {
    $query = $this->db->get_where('asesor', array('email' => $email, 'password' => $password));

    if ($query !== false && $query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function userAsesor($email, $password)
  {
    $query = $this->db->get_where('asesor', array('email' => $email, 'password' => $password));
    $data = $query->result();
    return $data;
  }
}
?>