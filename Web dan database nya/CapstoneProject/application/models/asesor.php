<?php

class Asesor extends CI_Model{



  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }

  // public function tampil_data()
  // {
  //   return $this->db->get('asesor');

  // }

  public function TampilAsesor()
  {
    $sql = "SELECT * FROM asesor";
    $data = $this->db->query($sql);
    $isi = $data->result_array();
    return $isi;
  }

  public function TambahAsesor($NoRegistrasi, $namaAsesor, $email, $password, $NoKTP)
  {
    $data = array(
      'nomor_registrasi_asesor' => $NoRegistrasi,
      'nama_asesor ' => $namaAsesor,
      'email' => $email,
      'password' => $password,
      'nomor_ktp' => $NoKTP
    );
    $this->db->insert('asesor', $data);
  }

  public function UpdateData($NoRegistrasi, $namaAsesor, $email, $password, $NoKTP)
  {
    $data = array(
      'nomor_registrasi_asesor' => $NoRegistrasi,
      'nama_asesor ' => $namaAsesor,
      'email' => $email,
      'password' => $password,
      'nomor_ktp ' => $NoKTP
    );
    $this->db->where('nomor_registrasi_asesor', $NoRegistrasi);
    $this->db->update('asesor', $data);
  }

  // public function deleteData($id)
  // {
  //   $this->db->where('nomor_registrasi_asesor', $id);
  //   $this->db->delete('asesor');
  //   return $this->db->affected_rows() > 0;
  // }

  public function deleteData($id)
  {
    // Hapus data asesor
    $this->db->where('nomor_registrasi_asesor', $id);
    $this->db->delete('asesor');
    return $this->db->affected_rows() > 0;
  }

  public function checkDataDependency($id)
  {
    // Periksa ketergantungan data pada tabel lain
    $this->db->where('asesor_id', $id);
    $this->db->from('surattugas');
    $count = $this->db->count_all_results();
    return $count > 0;
  }

  public function portofolio()
  {
    // Assuming 'barang_masuk' is the name of your table
    $this->db->select('jadwal.*, asesor.nama_asesor,asesor.nomor_registrasi_asesor,surattugas.no_st,surattugas.tanggal_st,surattugas.deskripsi');
    $this->db->from('jadwal');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = jadwal.asesor_id');
    $this->db->join('surattugas', 'surattugas.no_st = jadwal.no_st');
    $this->db->order_by('jadwal.tanggal_jadwal', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function getPortofolioByAsesor($nomor_registrasi_asesor)
  {
    $this->db->select('jadwal.*, asesor.nama_asesor,asesor.nomor_registrasi_asesor,surattugas.no_st,surattugas.tanggal_st,surattugas.deskripsi');
    $this->db->from('jadwal');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = jadwal.asesor_id');
    $this->db->join('surattugas', 'surattugas.no_st = jadwal.no_st');
    $this->db->order_by('jadwal.tanggal_jadwal', 'DESC');
    $this->db->where('asesor.nomor_registrasi_asesor', $nomor_registrasi_asesor);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function updateProfileAsesor($NoRegistrasi, $data){
    $this->db->where('nomor_registrasi_asesor', $NoRegistrasi);
    $this->db->update('asesor', $data);
  }

  public function updateSertifikat($nomor_sertifikat, $data){
    $this->db->where('nomor_sertifikat', $nomor_sertifikat);
    $this->db->update('sertifikat', $data);
  }
}
?>