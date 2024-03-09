<?php

class Asesor_control extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url', 'form');
    $this->load->library('form_validation');

  }
  // dasboard asesor
  public function index()
  {
    $this->load->view('asesor/header');
    $this->load->view('asesor/dashboard');
    $this->load->view('asesor/footer');

  }
  public function dataAsesor()
  {

    $data = $this->asesor->TampilAsesor();
    $isi['asesor'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('tambahUserAsesor', $isi);
    $this->load->view('source/footer');

  }

  public function TambahAsesor()
  {
    // Mendapatkan data dari form
    $NoRegistrasi = $this->input->post('NoRegistrasi');
    $namaAsesor = $this->input->post('namaAsesor');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $NoKTP = $this->input->post('NoKTP');

    // Memanggil fungsi TambahAsesor() dari model barang_model
    $this->asesor->TambahAsesor($NoRegistrasi, $namaAsesor, $email, $password, $NoKTP);

    // Redirect kembali ke halaman admin setelah berhasil menambahkan data
    redirect('asesor_control/dataAsesor');
  }
  // public function deleteDataAsesor()
  // {
  //   $id = $this->input->post('NoRegistrasi');
  //   $deleted = $this->asesor->deleteData($id);
  //   if ($deleted) {
  //     redirect('asesor_control/dataAsesor');
  //   }
  // }

  public function deleteDataAsesor()
  {
    $id = $this->input->post('NoRegistrasi');

    // Periksa ketergantungan data sebelum menghapus
    $isDependent = $this->asesor->checkDataDependency($id);

    if ($isDependent) {
      // Tampilkan pesan peringatan jika ada ketergantungan
      $this->session->set_flashdata('error', 'Tidak dapat menghapus asesor karena Data Asesor masih berkaitan dengan Surat Tugas,
      Jadwal,Skema Dan Sertifikat. <br><b>Bila Anda Ingin Menghapus Data Asrsor Mohon Hapus Terlebih dahulu Hal Yang berkaitan Dengan Data Asesor</b>.');
    } else {
      // Lanjutkan menghapus jika tidak ada ketergantungan
      $deleted = $this->asesor->deleteData($id);
      if ($deleted) {
        $this->session->set_flashdata('success', 'Data asesor berhasil dihapus.');
      } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data asesor.');
      }
    }

    redirect('asesor_control/dataAsesor');
  }


  public function updateDataAsesor()
  {
    // Mendapatkan data dari form
    $NoRegistrasi = $this->input->post('NoRegistrasi');
    $namaAsesor = $this->input->post('namaAsesor');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $NoKTP = $this->input->post('NoKTP');

    $this->asesor->UpdateData($NoRegistrasi, $namaAsesor, $email, $password, $NoKTP);

    // Redirect to Admin/Tampil
    redirect('asesor_control/dataAsesor');
  }



  public function tampilPortofolio()
  {
    $this->load->library('session');
    $nomor_registrasi_asesor = $this->session->userdata('nomor_registrasi_asesor');
    $data['portofolio'] = $this->asesor->getPortofolioByAsesor($nomor_registrasi_asesor);
    $this->load->view('asesor/header');
    $this->load->view('asesor/portopolio', $data);
    $this->load->view('asesor/footer');
  }

  // Menambahkan Data Asesor
  public function Tambah()
  {
    // Mendapatkan data dari form
    $NoRegistrasi = $this->input->post('NoRegistrasi');
    $namaAsesor = $this->input->post('namaAsesor');
    $email = $this->input->post('email');
    $userName = $this->input->post('userName');
    $NoKTP = $this->input->post('NoKTP');

    // Memanggil fungsi TambahBarang() dari model barang_model
    $this->adminAs->TambahAsesor($NoRegistrasi, $namaAsesor, $email, $userName, $NoKTP);

    // Redirect kembali ke halaman admin setelah berhasil menambahkan data
    redirect('admin');
  }


  public function uploadGambar()
  {
    $NoRegistrasi = $this->input->post('NoRegistrasi');
    $namaAsesor = $this->input->post('namaAsesor');
    $email = $this->input->post('email');
   
    $NoKTP = $this->input->post('NoKTP');
    $alamat = $this->input->post('alamat');
    $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
    $password = $this->input->post('password');
    $tanggal_lahir = $this->input->post('tanggal_lahir');

    // Cek apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './gambar/';
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
      $existingData = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $NoRegistrasi])->row_array();
      $gambar = $existingData['gambar'];
    }

    // Simpan data ke dalam tabel asesor
    $data = array(
      'nama_asesor' => $namaAsesor,
      'email' => $email,
      
      'nomor_ktp' => $NoKTP,
      'alamat' => $alamat,
      'pendidikan_terakhir' => $pendidikan_terakhir,
      'password' => $password,
      'tanggal_lahir' => $tanggal_lahir,
      'gambar' => $gambar
      
    );
    $this->asesor->updateProfileAsesor($NoRegistrasi, $data);
   

    // Redirect atau tampilkan pesan sukses
    redirect('asesor_control/dataAsesor');
  }

  public function profileAsesor()
  {
    $nomor_registrasi_asesor = $this->input->post('nomor_registrasi_asesor');
    $nama_asesor = $this->input->post('nama_asesor');
   
    $password = $this->input->post('password');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $nomor_ktp = $this->input->post('nomor_ktp');
    $gambar = $this->input->post('gambar');

    // Cek apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './gambar/';
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
      $existingData = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $nomor_registrasi_asesor])->row_array();
      $gambar = $existingData['gambar'];
    }

    // Simpan data ke dalam tabel asesor
    $data = array(
      'nomor_registrasi_asesor' => $nomor_registrasi_asesor,
      'nama_asesor' => $nama_asesor,
      
      'password' => $password,
      'email' => $email,
      'alamat' => $alamat,
      'tanggal_lahir' => $tanggal_lahir,
      'nomor_ktp' => $nomor_ktp,
      'gambar' => $gambar
    );
    

    // Update session dengan data yang baru
    $this->session->set_userdata('nama_asesor', $nama_asesor);
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('password', $password);
    $this->session->set_userdata('nomor_ktp', $nomor_ktp);
    $this->session->set_userdata('alamat', $alamat);
    $this->session->set_userdata('tanggal_lahir', $tanggal_lahir);
  
    $this->session->set_userdata('gambar', $gambar);

    // Redirect atau tampilkan pesan sukses
    redirect('asesor_control');
  }

}
?>