<?php
class sertifikat extends CI_Controller
{
  public function index()
  {
    $data = $this->sertifikat_model->TampilSertifikatWName();
    $isi['sertifikat'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('sertifikat', $isi);
    $this->load->view('source/footer');
  }

  public function tampilSertifikat()
  {
    $this->load->library('session');
    $nomor_registrasi_asesor = $this->session->userdata('nomor_registrasi_asesor');
    $data['sertifikat'] = $this->sertifikat_model->getSertifikatByAsesor($nomor_registrasi_asesor);
    $this->load->view('asesor/header');
    $this->load->view('asesor/sertifikat', $data);
    $this->load->view('asesor/footer');
  }

  public function deleteSertifikatAsesor()
  {
    $id = $this->input->post('nomor_sertifikat');
    $deleted = $this->sertifikat_model->deleteSertifikatAsesor($id);
    if ($deleted) {
      redirect('sertifikat/tampilSertifikat');
    }
  }

  // public function uploadSertifikatAsesor()
  // {
  //   $nomor_sertifikat = $this->input->post('nomor_sertifikat');
  //   $asesor_id = $this->input->post('asesor_id');
  //   $tanggal_aktif = $this->input->post('tanggal_aktif');
  //   $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');

  //   // Cek apakah ada file sertifikat yang diunggah
  //   if ($_FILES['gambar']['size'] > 0) {
  //     // Konfigurasi upload
  //     $config['upload_path'] = './sertifikat/';
  //     $config['allowed_types'] = 'gif|jpg|png';
  //     $config['max_size'] = 2048; // maksimal 2MB
  //     $config['encrypt_name'] = true; // mengenkripsi nama file

  //     $this->load->library('upload', $config);

  //     if (!$this->upload->do_upload('gambar')) {
  //       // Jika upload gagal, tampilkan pesan error
  //       $error = $this->upload->display_errors();
  //       echo $error;
  //       return;
  //     }

  //     // Jika upload berhasil, dapatkan informasi file yang di-upload
  //     $fileData = $this->upload->data();
  //     $sertifikat = $fileData['file_name'];
  //   } else {
  //     // Jika tidak ada file yang diunggah, gunakan sertifikat yang sudah ada sebelumnya
  //     $existingData = $this->db->get_where('sertifikat', ['nomor_sertifikat' => $nomor_sertifikat])->row_array();
  //     if ($existingData) {
  //       $sertifikat = $existingData['sertifikat'];
  //     } else {
  //       $sertifikat = ''; // Set sertifikat ke string kosong jika tidak ada data sebelumnya
  //     }
  //   }

  //   // Cek apakah asesor_id valid sebelum melakukan operasi INSERT
  //   $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
  //   if ($query->num_rows() > 0) {
  //     // Nomor registrasi asesor valid, lanjutkan dengan operasi INSERT di tabel sertifikat
  //     $data = array(
  //       'nomor_sertifikat' => $nomor_sertifikat,
  //       'asesor_id' => $asesor_id,
  //       'tanggal_aktif' => $tanggal_aktif,
  //       'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
  //       'sertifikat' => $sertifikat
  //     );
     
  //     // $this->db->insert('sertifikat', $data);
  //     $this->sertifikat_model->uploadSertifikat($data);
  //     // Redirect atau tampilkan pesan sukses
  //     redirect('sertifikat/tampilSertifikat');
  //   } else {
  //     // Nomor registrasi asesor tidak valid, tampilkan pesan kesalahan menggunakan JavaScript
  //     echo '<script>alert("Nomor registrasi asesor tidak valid.");window.location.href="' . base_url('sertifikat/tampilSertifikat') . '";</script>';
  //     return;
  //   }
  // }

  public function uploadSertifikatAsesor()
  {
    $nomor_sertifikat = $this->input->post('nomor_sertifikat');
    $asesor_id = $this->input->post('nomor_registrasi_asesor');
    $tanggal_aktif = $this->input->post('tanggal_aktif');
    $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');

    // Cek apakah ada file sertifikat yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './sertifikat/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2048; // maksimal 2MB
      $config['encrypt_name'] = true; // mengenkripsi nama file

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
        // Jika upload gagal, tampilkan pesan error
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
        redirect('sertifikat/tampilSertifikat');
        return;
      }

      // Jika upload berhasil, dapatkan informasi file yang di-upload
      $fileData = $this->upload->data();
      $sertifikat = $fileData['file_name'];
    } else {
      // Jika tidak ada file yang diunggah, gunakan sertifikat yang sudah ada sebelumnya
      $existingData = $this->db->get_where('sertifikat', ['nomor_sertifikat' => $nomor_sertifikat])->row_array();
      if ($existingData) {
        $sertifikat = $existingData['sertifikat'];
      } else {
        $sertifikat = ''; // Set sertifikat ke string kosong jika tidak ada data sebelumnya
      }
    }

    // Cek apakah asesor_id valid sebelum melakukan operasi INSERT
    $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
    if ($query->num_rows() > 0) {
      // Nomor registrasi asesor valid, lanjutkan dengan operasi INSERT di tabel sertifikat
      $data = array(
        'nomor_sertifikat' => $nomor_sertifikat,
        'asesor_id' => $asesor_id,
        'tanggal_aktif' => $tanggal_aktif,
        'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
        'sertifikat' => $sertifikat
      );

      $this->sertifikat_model->uploadSertifikat($data, $nomor_sertifikat);
      // Redirect atau tampilkan pesan sukses
      redirect('sertifikat/tampilSertifikat');
    } else {
      // Nomor registrasi asesor tidak valid, set pesan kesalahan menggunakan session flashdata
      $this->session->set_flashdata('error', 'Nomor registrasi asesor tidak valid.');
      redirect('sertifikat/tampilSertifikat');
    }
  }


  public function updateSertifikatAsesor()
  {
    $nomor_sertifikat = $this->input->post('nomor_sertifikat');
    $asesor_id = $this->input->post('asesor_id');
    // $nama_asesor = $this->input->post('nama_asesor');
    $tanggal_aktif = $this->input->post('tanggal_aktif');
    $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');

    // Cek apakah ada file sertifikat yang diunggah
    if ($_FILES['sertifikat']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './sertifikat/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2048; // maksimal 2MB
      $config['encrypt_name'] = true; // mengenkripsi nama file

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('sertifikat')) {
        // Jika upload gagal, tampilkan pesan error
        $error = $this->upload->display_errors();
        echo $error;
        return;
      }

      // Jika upload berhasil, dapatkan informasi file yang di-upload
      $fileData = $this->upload->data();
      $sertifikat = $fileData['file_name'];
    } else {
      // Jika tidak ada file yang diunggah, gunakan sertifikat yang sudah ada sebelumnya
      $existingData = $this->db->get_where('sertifikat', ['nomor_sertifikat' => $nomor_sertifikat])->row_array();
      $sertifikat = $existingData['sertifikat'];
    }

    // Simpan data ke dalam tabel sertifikat
    $data = array(
      'nomor_sertifikat' => $nomor_sertifikat,
      'asesor_id' => $asesor_id,
      // 'nama_asesor' => $nama_asesor,
      'tanggal_aktif' => $tanggal_aktif,
      'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
      'sertifikat' => $sertifikat
    );
    $this->sertifikat_model->updateSertifikat($nomor_sertifikat, $data);
    // $this->db->where('nomor_sertifikat', $nomor_sertifikat);
    // $this->db->update('sertifikat', $data);

    // Redirect atau tampilkan pesan sukses
    redirect('sertifikat/tampilSertifikat');
  }

  public function uploadSertifikat()
  {
    $nomor_sertifikat = $this->input->post('nomor_sertifikat');
    $asesor_id = $this->input->post('asesor_id');
    $tanggal_aktif = $this->input->post('tanggal_aktif');
    $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');

    // Cek apakah ada file sertifikat yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './sertifikat/';
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
      $sertifikat = $fileData['file_name'];
    } else {
      // Jika tidak ada file yang diunggah, gunakan sertifikat yang sudah ada sebelumnya
      $existingData = $this->db->get_where('sertifikat', ['nomor_sertifikat' => $nomor_sertifikat])->row_array();
      if ($existingData) {
        $sertifikat = $existingData['sertifikat'];
      } else {
        $sertifikat = ''; // Set sertifikat ke string kosong jika tidak ada data sebelumnya
      }
    }

    // Cek apakah asesor_id valid sebelum melakukan operasi INSERT
    $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
    if ($query->num_rows() > 0) {
      // Nomor registrasi asesor valid, lanjutkan dengan operasi INSERT di tabel sertifikat
      $data = array(
        'nomor_sertifikat' => $nomor_sertifikat,
        'asesor_id' => $asesor_id,
        'tanggal_aktif' => $tanggal_aktif,
        'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
        'sertifikat' => $sertifikat
      );

      $this->db->insert('sertifikat', $data);

      // Redirect atau tampilkan pesan sukses
      redirect('sertifikat');
    } else {
      // Nomor registrasi asesor tidak valid, tampilkan pesan kesalahan menggunakan JavaScript
      echo '<script>alert("Nomor registrasi asesor tidak valid.");window.location.href="' . base_url('sertifikat/index') . '";</script>';
      return;
    }
  }

  public function updateSertifikat()
  {
    $nomor_sertifikat = $this->input->post('nomor_sertifikat');
    $asesor_id = $this->input->post('asesor_id');
    // $nama_asesor = $this->input->post('nama_asesor');
    $tanggal_aktif = $this->input->post('tanggal_aktif');
    $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');
    $status_sertifikat = $this->input->post('status_sertifikat');
    // Cek apakah ada file sertifikat yang diunggah
    if ($_FILES['sertifikat']['size'] > 0) {
      // Konfigurasi upload
      $config['upload_path'] = './sertifikat/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2048; // maksimal 2MB
      $config['encrypt_name'] = true; // mengenkripsi nama file

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('sertifikat')) {
        // Jika upload gagal, tampilkan pesan error
        $error = $this->upload->display_errors();
        echo $error;
        return;
      }

      // Jika upload berhasil, dapatkan informasi file yang di-upload
      $fileData = $this->upload->data();
      $sertifikat = $fileData['file_name'];
    } else {
      // Jika tidak ada file yang diunggah, gunakan sertifikat yang sudah ada sebelumnya
      $existingData = $this->db->get_where('sertifikat', ['nomor_sertifikat' => $nomor_sertifikat])->row_array();
      $sertifikat = $existingData['sertifikat'];
    }

    // Simpan data ke dalam tabel sertifikat
    $data = array(
      'nomor_sertifikat' => $nomor_sertifikat,
      'asesor_id' => $asesor_id,
      // 'nama_asesor' => $nama_asesor,
      'tanggal_aktif' => $tanggal_aktif,
      'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
      'sertifikat' => $sertifikat,
      'status_sertifikat' => $status_sertifikat
    );
    // $this->db->where('nomor_sertifikat', $nomor_sertifikat);
    // $this->db->update('sertifikat', $data);
    $this->asesor->updateSertifikat($nomor_sertifikat, $data);
    // Redirect atau tampilkan pesan sukses
    redirect('sertifikat');
  }

  public function deleteSertifikat()
  {
    $id = $this->input->post('nomor_sertifikat');
    $deleted = $this->sertifikat_model->deleteSertifikat($id);
    if ($deleted) {
      redirect('sertifikat');
    }
  }

} ?>