<?php
class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->database();

  }

  public function index()
  {
    $this->load->view('login');
  }

  public function checking()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // Cek login untuk tabel Asesor
    $cekAsesor = $this->loginModel->checkAsesor($email, $password);
    if ($cekAsesor) {
      $userAsesor = $this->loginModel->userAsesor($email, $password);
      if (!empty($userAsesor)) {
        $u = $userAsesor[0]; // Mengambil data pertama dari array $userAsesor
        $this->session->set_userdata('nomor_registrasi_asesor', $u->nomor_registrasi_asesor);
        $this->session->set_userdata('username', $u->username);
        $this->session->set_userdata('email', $u->email);
        $this->session->set_userdata('alamat', $u->alamat);
        $this->session->set_userdata('nama_asesor', $u->nama_asesor);
        $this->session->set_userdata('nomor_ktp', $u->nomor_ktp);
        $this->session->set_userdata('password ', $u->password);
        $this->session->set_userdata('tanggal_lahir', $u->tanggal_lahir);
        $this->session->set_userdata('gambar', $u->gambar);
        $this->session->set_userdata('tingkatan', $u->tingkatan);
        redirect('asesor_control'); // Redirect ke halaman Asesor setelah login berhasil
      } else {
        // echo "Data pengguna tidak ditemukan";
        redirect('login');
      }
    } else {
      // Cek login untuk tabel Admin
      $cekAdmin = $this->loginModel->checkAdmin($email, $password);
      if ($cekAdmin) {
        $userAdmin = $this->loginModel->userAdmin($email, $password);
        if (!empty($userAdmin)) {
          $u = $userAdmin[0]; // Mengambil data pertama dari array $userAdmin
          $this->session->set_userdata('no_induk_pegawai', $u->no_induk_pegawai);
          // $this->session->set_userdata('no_induk_pegawai', $u->no_induk_pegawai);
          $this->session->set_userdata('nama_admin', $u->nama_admin);
          $this->session->set_userdata('email', $u->email);
          $this->session->set_userdata('password', $u->password);
          $this->session->set_userdata('no_hp', $u->no_hp);
          $this->session->set_userdata('alamat', $u->alamat);
          $this->session->set_userdata('tanggal_lahir', $u->tanggal_lahir);
          $this->session->set_userdata('username', $u->username);
          $this->session->set_userdata('gambar', $u->gambar);


          redirect('admin'); // Redirect ke halaman Admin setelah login berhasil
        } else {
          echo "Data pengguna tidak ditemukan";
          redirect('login');
        }
      } else {
        echo "Login Gagal";
        redirect('login');
      }
    }
  }

  public function logoutAdmin()
  {
    $this->session->unset_userdata('admin');
    redirect('login/?i=logout');
  }

  public function logoutAsesor()
  {
    $this->session->unset_userdata('asesor');
    redirect('login/?i=logout');
  }
}