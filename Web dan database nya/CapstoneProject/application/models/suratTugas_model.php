<?php
class suratTugas_model extends CI_Model
{
  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }

  public function suratTugasWName()
  {
    // Assuming 'barang_masuk' is the name of your table
    $this->db->select('surattugas.*, asesor.nama_asesor');
    $this->db->from('surattugas');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = surattugas.asesor_id');
    $this->db->order_by('surattugas.tanggal_st', 'DESC');


    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function getSuratTugasByAsesor($nomor_registrasi_asesor)
  {
    $this->db->select('surattugas.*, asesor.nama_asesor');
    $this->db->from('surattugas');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = surattugas.asesor_id');
    $this->db->order_by('surattugas.tanggal_st', 'DESC');
    $this->db->where('asesor.nomor_registrasi_asesor', $nomor_registrasi_asesor);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function TambahSuratTugas($no_st, $tanggal_st, $skema_st, $deskripsi, $asesor_id)
  {
    $data = array(
      'no_st' => $no_st,
      'tanggal_st' => $tanggal_st,
      'skema_st' => $skema_st,
      'deskripsi' => $deskripsi,
      'asesor_id' => $asesor_id
    );

    // Periksa apakah asesor_id ada dalam tabel asesor sebelum menambahkan ke surattugas
    $this->db->where('nomor_registrasi_asesor', $asesor_id);
    $query = $this->db->get('asesor');

    if ($query->num_rows() > 0) {
      // asesor_id valid, tambahkan ke surattugas
      $this->db->insert('surattugas', $data);
      // echo "Data surat tugas berhasil ditambahkan!";
    } else {
      // asesor_id tidak valid, berikan pesan kesalahan
      echo "Asesor dengan ID tersebut tidak ditemukan!";
    }
  }


  public function updateSuratTugas($no_st, $tanggal_st, $skema_st, $deskripsi, $asesor_id)
  {
    $data = array(
      'no_st' => $no_st,
      'tanggal_st' => $tanggal_st,
      'skema_st' => $skema_st,
      'deskripsi' => $deskripsi,
      'asesor_id' => $asesor_id
    );

    // Periksa apakah asesor_id ada dalam tabel asesor sebelum menambahkan ke surattugas
    $this->db->where('nomor_registrasi_asesor', $asesor_id);
    $query = $this->db->get('asesor');

    if ($query->num_rows() > 0) {
      // asesor_id valid, tambahkan ke surattugas
      $this->db->where('no_st', $no_st);
      $this->db->update('surattugas', $data);
      // echo "Data surat tugas berhasil ditambahkan!";
    } else {
      // asesor_id tidak valid, berikan pesan kesalahan
      echo "Asesor dengan ID tersebut tidak ditemukan!";
    }
  }

  // public function deleteSuratTugas($id)
  // {
  //   // Hapus terlebih dahulu entri terkait di tabel jadwal
  //   $this->db->where('no_st', $id);
  //   $this->db->delete('jadwal');

  //   // Hapus data di tabel surattugas
  //   $this->db->where('no_st', $id);
  //   $this->db->delete('surattugas');

  //   return $this->db->affected_rows() > 0;
  // }

  public function deleteData($id)
  {
    // Hapus data asesor
    $this->db->where('no_st', $id);
    $this->db->delete('surattugas');
    return $this->db->affected_rows() > 0;
  }

  public function checkDataSuratTugas($id)
  {
    // Periksa ketergantungan data pada tabel lain
    $this->db->where('no_st', $id);
    $this->db->from('jadwal');
    $count = $this->db->count_all_results();
    return $count > 0;
  }
}
?>