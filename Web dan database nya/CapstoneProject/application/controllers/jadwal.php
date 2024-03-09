<?php
class jadwal extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url', 'form');
    $this->load->library('form_validation');

  }
  public function index ()
  {
    $this->session->userdata('nomor_registrasi_asesor');
    // $this->load->view('asesor/dashboard');
    $this->load->view('asesor/header');
    $this->load->view('asesor/jadwal');
    $this->load->view('asesor/footer');
  }

  public function Jadwal()
  {
    $data = $this->jadwal_model->jadwalWNama();
    $isi['jadwal'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('jadwal', $isi);
    $this->load->view('source/footer');
  }

  public function tampilJadwal()
  {
    $this->load->library('session');
    $nomor_registrasi_asesor = $this->session->userdata('nomor_registrasi_asesor');
    $data['jadwal'] = $this->jadwal_model->getJadwalByAsesor($nomor_registrasi_asesor);
    $this->load->view('asesor/header');
    $this->load->view('asesor/jadwal', $data);
    $this->load->view('asesor/footer');
  }

  public function TambahJadwal()
  {
    // Mendapatkan data dari form
    $no_st = $this->input->post('no_st');
    $id_jadwal = $this->input->post('id_jadwal');
    $tanggal_jadwal = $this->input->post('tanggal_jadwal');
    $asesor_id = $this->input->post('asesor_id');

    // Cek apakah asesor_id valid sebelum memanggil fungsi TambahJadwalAsesor()
    $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
    if ($query->num_rows() > 0) {
      // Asesor_id valid, panggil fungsi TambahJadwalAsesor() dari model adminAs
      $this->jadwal_model->TambahJadwalAsesor($id_jadwal, $tanggal_jadwal, $asesor_id, $no_st);
      redirect('jadwal/Jadwal');
    } else {
      // Asesor_id tidak valid, tampilkan pesan kesalahan menggunakan JavaScript alert
      echo '<script>alert("Nomor registrasi asesor tidak valid."); window.location.href="' . base_url('jadwal/Jadwal') . '";</script>';
      return;
    }
  }

  public function updateJadwal()
  {
    // Mendapatkan data dari form
    $id_jadwal = $this->input->post('id_jadwal');
    $tanggal_jadwal = $this->input->post('tanggal_jadwal');
    $asesor_id = $this->input->post('asesor_id');
    $no_st = $this->input->post('no_st');
    // Memanggil fungsi updateJadwal() dari model adminAs
    $this->jadwal_model->updateJadwal($id_jadwal, $tanggal_jadwal, $asesor_id, $no_st);


    redirect('jadwal/Jadwal');
  }


  public function deleteJadwal()
  {
    $id = $this->input->post('id_jadwal');
    $deleted = $this->jadwal_model->deleteJadwal($id);
    if ($deleted) {
      // Jika data berhasil dihapus, redirect kembali ke halaman Jadwal
      redirect('jadwal/Jadwal');
    } else {
      // Jika data tidak berhasil dihapus, lakukan penanganan kesalahan
      // ...
    }
  }
} ?>