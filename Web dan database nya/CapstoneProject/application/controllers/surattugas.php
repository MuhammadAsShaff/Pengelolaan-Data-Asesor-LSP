<?php 
class surattugas extends CI_Controller{

  public function __construct() //Construktor
  {
    parent::__construct();
    $this->load->database();
  }

  public function index()
  {
    $this->session->userdata('nomor_registrasi_asesor');
    // $this->load->view('asesor/dashboard');
    $this->load->view('asesor/header');
    $this->load->view('asesor/suratTugas');
    $this->load->view('asesor/footer');
    
  }

  public function SuratTugas()
  {
    $data = $this->suratTugas_model->suratTugasWName();
    $isi['surattugas'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('SuratTugas', $isi);
    $this->load->view('source/footer');
  }

  public function TambahSuratTugas()
  {
    // Mendapatkan data dari form
    $no_st = $this->input->post('no_st');
    $tanggal_st = $this->input->post('tanggal_st');
    $skema_st = $this->input->post('skema_st');
    $deskripsi = $this->input->post('deskripsi');
    $asesor_id = $this->input->post('asesor_id');

    // Cek apakah asesor_id valid sebelum memanggil fungsi TambahSuratTugas()
    $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
    if ($query->num_rows() > 0) {
      // Asesor_id valid, panggil fungsi TambahSuratTugas() dari model suratTugas_model
      $this->suratTugas_model->TambahSuratTugas($no_st, $tanggal_st, $skema_st, $deskripsi, $asesor_id);
      redirect('surattugas/SuratTugas');
    } else {
      // Asesor_id tidak valid, tampilkan pesan kesalahan menggunakan JavaScript alert
      echo '<script>alert("Nomor registrasi asesor tidak valid."); window.location.href="' . base_url('surattugas/SuratTugas') . '";</script>';
      return;
    }
  }

  public function updateSuratTugas()
  {
    // Mendapatkan data dari form
    $no_st = $this->input->post('no_st');
    $tanggal_st = $this->input->post('tanggal_st');
    $skema_st = $this->input->post('skema_st');
    $deskripsi = $this->input->post('deskripsi');
    $asesor_id = $this->input->post('asesor_id');

    // Memanggil fungsi updateSuratTugas() dari model adminAs
    $this->suratTugas_model->updateSuratTugas($no_st, $tanggal_st, $skema_st, $deskripsi, $asesor_id);


    redirect('surattugas/SuratTugas');
  }

  // public function deleteSuratTugas()
  // {
  //   $id = $this->input->post('no_st');
  //   $deleted = $this->suratTugas_model->deleteSuratTugas($id);
  //   if ($deleted) {
  //     // Jika data berhasil dihapus, redirect kembali ke halaman Surat Tugas
  //     redirect('surattugas/SuratTugas');
  //   } else {
  //     // Jika data tidak berhasil dihapus, set pesan kesalahan menggunakan flashdata
  //     $this->session->set_flashdata('error', 'Data tidak dapat dihapus');
  //     redirect('surattugas/SuratTugas');
  //   }
  // }


  public function deleteSuratTugas()
  {
    $id = $this->input->post('NoRegistrasi');

    // Periksa ketergantungan data sebelum menghapus
    $isDependent = $this->suratTugas_model->checkDataSuratTugas($id);

    if ($isDependent) {
      // Tampilkan pesan peringatan jika ada ketergantungan
      $this->session->set_flashdata('error', 'Tidak dapat menghapus surat tugas karena ada ketergantungan data dengan jadwal, tolong hapus jadwal terlebih dahulu.');
    } else {
      // Lanjutkan menghapus jika tidak ada ketergantungan
      $deleted = $this->suratTugas_model->deleteData($id);
      if ($deleted) {
        $this->session->set_flashdata('success', 'Data Surat Tugas berhasil dihapus.');
      } else {
        $this->session->set_flashdata('error', 'Gagal Dalam Menghapus Surat Tugas, Di Karenakan Data Surat Tugas Masih Terkait dengan Jadwal <b> Tolong Hapus Jadwal terlebih dahulu</b>.');
      }
    }

    redirect('suratTugas/SuratTugas');
  }



  public function tampilSuratTugas()
  {
    $this->load->library('session');
    $this->load->model('surattugas_model'); // Ubah sesuai dengan model yang digunakan
    $nomor_registrasi_asesor = $this->session->userdata('nomor_registrasi_asesor');
    $data['surattugas'] = $this->surattugas_model->getSuratTugasByAsesor($nomor_registrasi_asesor);
    $this->load->view('asesor/header');
    $this->load->view('asesor/suratTugas', $data);
    $this->load->view('asesor/footer');
  } 
}
?>