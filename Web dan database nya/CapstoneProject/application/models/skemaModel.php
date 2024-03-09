<?php
class skemaModel extends CI_Model
{
  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }


  public function TampilSkema()
  {
    $sql = "SELECT * FROM skema";
    $data = $this->db->query($sql);
    $isi = $data->result_array();
    return $isi;
  }

  public function skemaWNama()
  {
    // Assuming 'barang_masuk' is the name of your table
    $this->db->select('skema.*, asesor.nama_asesor');
    $this->db->from('skema');
    $this->db->join('asesor', 'asesor.nomor_registrasi_asesor = skema.asesor_id');
    // $this->db->order_by('surattugas.tanggal_st', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return array();
    }
  }

  public function TambahSkema($id_skema, $nama_skema, $asesor_id)
  {
    $data = array(
      'id_skema' => $id_skema,
      'nama_skema' => $nama_skema,
      'asesor_id' => $asesor_id,
    );

    // Periksa apakah asesor_id ada dalam tabel asesor sebelum menambahkan ke skema
    $this->db->where('nomor_registrasi_asesor', $asesor_id);
    $query = $this->db->get('asesor');

    if ($query->num_rows() > 0) {
      // asesor_id valid, tambahkan ke skema
      $this->db->insert('skema', $data);
      // echo "Data skema berhasil ditambahkan!";
    } else {
      // asesor_id tidak valid, berikan pesan kesalahan
      echo "Asesor dengan ID tersebut tidak ditemukan!";
    }
  }

  public function updateSkema($id_skema, $nama_skema, $asesor_id)
  {
    $data = array(
      'id_skema' => $id_skema,
      'nama_skema' => $nama_skema,

      'asesor_id' => $asesor_id
    );

    // Periksa apakah asesor_id ada dalam tabel asesor sebelum menambahkan ke surattugas
    $this->db->where('nomor_registrasi_asesor', $asesor_id);
    $query = $this->db->get('asesor');

    if ($query->num_rows() > 0) {
      // asesor_id valid, tambahkan ke surattugas
      $this->db->where('id_skema', $id_skema);
      $this->db->update('skema', $data);
      // echo "Data surat tugas berhasil ditambahkan!";
    } else {
      // asesor_id tidak valid, berikan pesan kesalahan
      echo "Asesor dengan ID tersebut tidak ditemukan!";
    }
  }

  public function deleteSkema($id)
  {
    $this->db->where('id_skema', $id);
    $this->db->delete('skema');
    return $this->db->affected_rows() > 0;
  }
}
?>