<?php

class adminAs extends CI_Model
{
  //  koneksi ke database
  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }

  public function updateProfilAdmin ($no_induk_pegawai, $data){
    $this->db->where('no_induk_pegawai', $no_induk_pegawai);
    $this->db->update('admin', $data);
  }
}
?>