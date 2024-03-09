<?php

class sertifikat_model extends CI_Model
{
  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }
  // public function TampilSertifikat()
  // {
  //   $sql = "SELECT * FROM sertifikat";
  //   $data = $this->db->query($sql);
  //   $isi = $data->result_array();
  //   return $isi;
  // }


  public function TampilSertifikatWName()
  {
    // Assuming 'barang_masuk' is the name of your table
    $this->db->select('sertifikat.*, asesor.nomor_registrasi_asesor,asesor.nama_asesor');
    $this->db->from('sertifikat');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = sertifikat.asesor_id');
    $this->db->order_by('sertifikat.tanggal_aktif', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function getSertifikatByAsesor($nomor_registrasi_asesor)
  {
    $this->db->select('sertifikat.*, asesor.nomor_registrasi_asesor,asesor.nama_asesor');
    $this->db->from('sertifikat');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = sertifikat.asesor_id');
    $this->db->order_by('sertifikat.tanggal_aktif', 'DESC');
    $this->db->where('asesor.nomor_registrasi_asesor', $nomor_registrasi_asesor);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function deleteSertifikatAsesor($id)
  {
    $this->db->where('nomor_sertifikat ', $id);
    $this->db->delete('sertifikat');
    return $this->db->affected_rows() > 0;
  }

  public function deleteSertifikat($id)
  {
    $this->db->where('nomor_sertifikat ', $id);
    $this->db->delete('sertifikat');
    return $this->db->affected_rows() > 0;
  }


  public function uploadSertifikat($data, $nomor_sertifikat)
  {
    $this->db->where('nomor_sertifikat', $nomor_sertifikat);
    $this->db->insert('sertifikat', $data);
  }


  public function updateSertifikat($nomor_sertifikat, $data)
  {
    $this->db->where('nomor_sertifikat', $nomor_sertifikat);
    $this->db->update('sertifikat', $data);
  }

}

?>