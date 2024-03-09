<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div> -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a type="button" class="nav-link collapsed" data-toggle="modal" data-target="#edit">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Profile Asesor</div>
              </div>
              <div class="col-auto">
                <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a class="nav-link collapsed" href="<?php echo site_url('surattugas/tampilSuratTugas'); ?>">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Surat Tugas</div>
              </div>
              <div class="col-auto">
                <i class="fa fa-envelope fa-2x text-gray-300" aria-hidden="true"></i>
                <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a class="nav-link collapsed" href="<?php echo site_url('jadwal/tampilJadwal'); ?>">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      Jadwal Assesment
                    </div>
                  </div>
                  <div class="col">
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fa fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a class="nav-link collapsed" href="<?php echo site_url('asesor_control/tampilPortofolio') ?>">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Portofolio</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
                <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>



    </a>
  </div>

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->






    <div class="col-xl-3 col-md-6 mb-4">
      <a class="nav-link collapsed" href="<?php echo site_url('sertifikat/tampilSertifikat') ?>">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Sertifikat</div>
              </div>
              <div class="col-auto">
                <i class="fa fa-envelope fa-2x text-gray-300" aria-hidden="true"></i>
                <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>


  


    <?php
    $nomor_registrasi_asesor = $this->session->userdata('nomor_registrasi_asesor');
    $nama_asesor = $this->session->userdata('nama_asesor');

    $password = $this->session->userdata('password');
    $email = $this->session->userdata('email');
    $alamat = $this->session->userdata('alamat');
    $tanggal_lahir = $this->session->userdata('tanggal_lahir');
    $nomor_ktp = $this->session->userdata('nomor_ktp');
    $gambar = $this->session->userdata('gambar');
    ?>

    <!-- modal edit -->
    <div id="result-container">
      <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Profile
                <?php echo $nama_asesor ?>
              </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form method="post" action="<?= site_url('asesor_control/profileAsesor') ?>" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="text-center">
                  <?php if (!empty($gambar)) { ?>
                    <img src="<?= base_url('gambar/' . $gambar) ?>" class="avatar img-circle img-thumbnail"
                      style="width:100px" alt="avatar">
                  <?php } else { ?>
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                      style="width:100px" alt="avatar">
                  <?php } ?>
                </div>
                <h6>Tolong Unggah Foto Anda</h6>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar">
                  <label class="custom-file-label" for="gambar">Choose file</label>
                </div>
                <br>
                <br>
                <h6>Nomor Registrasi Asesor</h6>
                <input type="number" name="nomor_registrasi_asesor" value="<?php echo $nomor_registrasi_asesor ?>"
                  class="form-control" required readonly>
                <br>
                <h6>Nama Asesor</h6>
                <input type="text" name="nama_asesor" value="<?php echo $nama_asesor ?>" class="form-control" required>
                <br>
                <h6>Email</h6>
                <input type="email" name="email" value="<?php echo $email ?>" class="form-control" required>
                <br>
                <h6>Password</h6>
                <input type="text" name="password" value="<?php echo $password ?>" class="form-control" required>
                <br>
                <h6>Nomor HP</h6>
                <input type="text" name="nomor_ktp" value="<?php echo $nomor_ktp ?>" class="form-control" required>
                <br>
                <h6>Alamat</h6>
                <input type="text" name="alamat" value="<?php echo $alamat ?>" class="form-control">
                <br>
                <h6>Tanggal Lahir</h6>
                <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>" class="form-control">
                <br>
                <input type="submit" name="update" class="btn btn-primary" value="Update">
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- Content Row -->

  <!-- Approach -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
          <a class="nav-link btn btn-danger" href="<?php echo site_url('login/logoutAsesor'); ?>">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          <span>Log Out</span></a>
    </div>
    <div class="card-body">
      <p class="mb-0">Terimakasih telah bekerja dengan Semangat, jangan lupa jaga kesehatan yaaaa:).</p>
    </div>
  </div>

</div>
</div>

</div>