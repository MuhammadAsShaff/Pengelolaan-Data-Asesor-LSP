<?php

class jadwal_model extends CI_Model
{

  public function __construct()
  {
    //membuat koneksi database
    $this->load->database();
  }

  public function jadwalWNama()
  {
    // Assuming 'barang_masuk' is the name of your table
    $this->db->select('jadwal.*, asesor.nama_asesor,surattugas.no_st');
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

  public function getJadwalByAsesor($nomor_registrasi_asesor)
  {
    $this->db->select('jadwal.*, asesor.nama_asesor, surattugas.no_st,surattugas.tanggal_st');
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

  public function TambahJadwalAsesor($id_jadwal, $tanggal_jadwal, $asesor_id, $no_st)
  {
    $data = array(
      'id_jadwal' => $id_jadwal,
      'tanggal_jadwal' => $tanggal_jadwal,
      'asesor_id' => $asesor_id,
      'no_st' => $no_st
    );

    // Periksa apakah asesor_id ada di tabel asesor
    $this->db->where('asesor_id', $asesor_id);
    $query = $this->db->get('surattugas');

    if ($query->num_rows() > 0) {
      // asesor_id valid, periksa apakah no_st ada di tabel surattugas
      $this->db->where('no_st', $no_st);
      $query2 = $this->db->get('surattugas');

      if ($query2->num_rows() > 0) {
        // no_st valid, tambahkan ke tabel jadwal
        $this->db->insert('jadwal', $data);
        echo "Data jadwal berhasil ditambahkan!";
      } else {
        // no_st tidak ditemukan, berikan pesan kesalahan dan kembalikan ke halaman jadwal
        echo '<script>alert("No. Surat Tugas tidak ditemukan!");</script>';
        redirect('jadwal/jadwal'); // Ubah 'jadwal' dengan URL yang sesuai
      }
    } else {
      // asesor_id tidak ditemukan, berikan pesan kesalahan dan kembalikan ke halaman jadwal
      echo '<script>alert("Asesor dengan ID tersebut tidak ditemukan!");</script>';
      redirect('jadwal/jadwal'); // Ubah 'jadwal' dengan URL yang sesuai
    }
  }

  public function deleteJadwal($id)
  {
    $this->db->where('id_jadwal', $id);
    $this->db->delete('jadwal');
    return $this->db->affected_rows() > 0;
  }

  public function updateJadwal($id_jadwal, $tanggal_jadwal, $asesor_id, $no_st)
  {
    $data = array(
      'tanggal_jadwal' => $tanggal_jadwal,
      'asesor_id' => $asesor_id,
      'no_st' => $no_st
    );

    // Periksa apakah asesor_id ada dalam tabel asesor sebelum melakukan update
    $this->db->where('nomor_registrasi_asesor', $asesor_id);
    $query = $this->db->get('asesor');

    if ($query->num_rows() > 0) {
      // asesor_id valid, update data jadwal
      $this->db->where('id_jadwal', $id_jadwal);
      $this->db->update('jadwal', $data);
      // echo "Data jadwal berhasil diperbarui!";
    } else {
      // asesor_id tidak valid, berikan pesan kesalahan
      echo "Asesor dengan ID tersebut tidak ditemukan!";
    }
  }
}
?>