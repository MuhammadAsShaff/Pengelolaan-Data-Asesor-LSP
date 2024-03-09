<?php
class skema extends CI_Controller
{

  public function Skema()
  {
    $data = $this->skemaModel->skemaWNama();
    $isi['skema'] = $data;
    $this->load->view('source/sidebar');
    $this->load->view('source/header');
    $this->load->view('skema', $isi);
    $this->load->view('source/footer');
  }
     public function TambahSkema()
  {
    // Mendapatkan data dari form
    $id_skema = $this->input->post('id_skema');
    $nama_skema = $this->input->post('nama_skema');
    $asesor_id = $this->input->post('asesor_id');

    // Cek apakah asesor_id valid sebelum memanggil fungsi TambahSkema() dari model adminAs
    $query = $this->db->get_where('asesor', ['nomor_registrasi_asesor' => $asesor_id]);
    if ($query->num_rows() > 0) {
      // Asesor_id valid, panggil fungsi TambahSkema() dari model adminAs
      $this->skemaModel->TambahSkema($id_skema, $nama_skema, $asesor_id);
      redirect('skema/skema');
    } else {
      // Asesor_id tidak valid, tampilkan pesan kesalahan menggunakan JavaScript alert
      echo '<script>alert("Nomor registrasi asesor tidak valid."); window.location.href="' . base_url('skema/skema') . '";</script>';
      return;
    }
  }
  public function updateSkema()
  {
    // Mendapatkan data dari form
    $id_skema = $this->input->post('id_skema');
    $nama_skema = $this->input->post('nama_skema');
    $asesor_id = $this->input->post('asesor_id');

    // Memanggil fungsi TambahSkema() dari model adminAs
    $this->skemaModel->updateSkema($id_skema, $nama_skema, $asesor_id);

    // Redirect kembali ke halaman admin setelah berhasil menambahkan data
    redirect('skema/skema');
  }

  public function deleteSkema()
  {
    $id = $this->input->post('id_skema');
    $deleted = $this->skemaModel->deleteSkema($id);
    if ($deleted) {
      redirect('skema/skema');
    }
  }
  }

?>