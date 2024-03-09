<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
  public function index ()
  {
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('dashboard');
    $this->load->view('source/footer');
  }
  public function profilAsesor()
  {
    $data = $this->asesor->TampilAsesor();
    $isi['asesor'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('profileAsesor', $isi);
    $this->load->view('source/footer');
  }
  public function portofolio()
  {

    $data = $this->asesor->portofolio();
    $isi['asesor'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('portofolio', $isi);
    $this->load->view('source/footer');

  }
  
public function profileAdmin()
  {
    $no_induk_pegawai = $this->input->post('no_induk_pegawai');
    $nama_admin = $this->input->post('nama_admin');
    $email = $this->input->post('email');
    $password  = $this->input->post('password');
    $no_hp  = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    
    $gambar = $this->input->post('gambar');
    

    // Cek apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './gambarAdmin/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2048; // maksimal 2MB
      $config['encrypt_name'] = true; // mengenkripsi nama file

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
        // Jika upload gagal, tampilkan pesan error
        $error = $this->upload->display_errors();
        echo $error;
        return;
      }

      // Jika upload berhasil, dapatkan informasi file yang di-upload
      $fileData = $this->upload->data();
      $gambar = $fileData['file_name'];
    } else {
      // Jika tidak ada file yang diunggah, gunakan gambar yang sudah ada sebelumnya
      $existingData = $this->db->get_where('admin', ['no_induk_pegawai' => $no_induk_pegawai])->row_array();
      $gambar = $existingData['gambar'];
    }

    // Simpan data ke dalam tabel asesor
    $data = array(
      'no_induk_pegawai' => $no_induk_pegawai,
      'nama_admin' => $nama_admin,
      'email' => $email,
      'password' => $password,
      'no_hp' => $no_hp,
      'alamat' => $alamat,
      
      'tanggal_lahir' => $tanggal_lahir,
      'gambar' => $gambar
    );
    $this->adminAs->updateProfilAdmin ($no_induk_pegawai, $data);
  

   
    $this->session->set_userdata('nama_admin', $nama_admin);
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('password', $password);
    $this->session->set_userdata('no_hp', $no_hp);
    $this->session->set_userdata('alamat', $alamat);
    $this->session->set_userdata('tanggal_lahir', $tanggal_lahir);
  
    $this->session->set_userdata('gambar', $gambar);
    // Redirect atau tampilkan pesan sukses
    redirect('Admin');
  }

}