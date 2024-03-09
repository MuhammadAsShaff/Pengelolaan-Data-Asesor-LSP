<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Penambahan User Dan Data Asesor</h1>
  <p class="mb-4">Tolong Sesuaikan Penambahanan Data Asesor dengan data yang sesuai dengan berkas.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Asesor Yang Terdaftar</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <!-- button penambahan data -->
        <button href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahAsesor">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambahkan Data</span>
        </button><br><br>
        <!-- Alert -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <!-- table data asesor yang sudah di tambah -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor Registrasi</th>
              <th>Nama Asesor</th>
              <th>Email</th>
              <th>Password</th>
              <th>No KTP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($asesor as $asr) {
              $no++;
              ?>
              <tr>
                <td>
                  <?= $no ?>
                </td>
                <td>
                  <?= $asr['nomor_registrasi_asesor'] ?>
                </td>
                <td>
                  <?= $asr['nama_asesor'] ?>
                </td>
                <td>
                  <?= $asr['email'] ?>
                </td>
                <td>
                  <?= $asr['password'] ?>
                </td>
                <td>
                  <?= $asr['nomor_ktp'] ?>
                </td>
                <td>
                  <center><button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#edit<?= $asr['nomor_registrasi_asesor'] ?>">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#delete<?= $asr['nomor_registrasi_asesor'] ?>">
                      Delete
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                      data-target="#detail<?= $asr['nomor_registrasi_asesor'] ?>">
                      <i class="fa fa-user" aria-hidden="true">
                        Detail</i>
                    </button>
                  </center>
                </td>
                </td>
              </tr>

              <!-- modal hapus data -->
              <div class="modal fade" id="delete<?= $asr['nomor_registrasi_asesor'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="<?= site_url('asesor_control/deleteDataAsesor') ?>">
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus
                        <b>
                          <?= $asr['nama_asesor'] ?>
                        </b>
                        <br>
                        <br>
                        <input type="hidden" name="NoRegistrasi" value="<?= $asr['nomor_registrasi_asesor'] ?>">
                        <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- modal edit -->
              <div class="modal fade" id="edit<?= $asr['nomor_registrasi_asesor'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Asesor</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="<?= site_url('asesor_control/updateDataAsesor') ?>">
                      <div class="modal-body">
                        <!-- <h6>Nomor Registrasi</h6> -->

                        <input type="hidden" name="NoRegistrasi" value="<?= $asr['nomor_registrasi_asesor'] ?>">
                        <h6>Nama Asesor</h6>
                        <input type="text" name="namaAsesor" value=" <?= $asr['nama_asesor'] ?>" class="form-control"
                          required>
                        <br>
                        <h6>Email</h6>
                        <input type="text" name="email" value=" <?= $asr['email'] ?>" class="form-control" required>
                        <br>
                        <h6>Password</h6>
                        <input type="text" name="password" value="<?= $asr['password'] ?>" class="form-control" required>
                        <br>
                        <h6>Nomor KTP</h6>
                        <input type="number" name="NoKTP" value="<?= $asr['nomor_ktp'] ?>" class="form-control" required>
                        <br>
                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <!-- modal detail -->
              <div class="modal fade" id="detail<?= $asr['nomor_registrasi_asesor'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Detail Profile <b>
                          <?= $asr['nama_asesor'] ?>
                        </b></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="<?= site_url('asesor_control/uploadGambar') ?>"
                      enctype="multipart/form-data">

                      <div class="modal-body">
                        <center>
                          <?php if (!empty($asr['gambar'])) { ?>
                            <img src="<?= base_url('gambar/' . $asr['gambar']) ?>" class="avatar img-circle img-thumbnail"
                              style="width:100px" alt="avatar">
                          <?php } else { ?>
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                              class="avatar img-circle img-thumbnail" style="width:100px" alt="avatar">
                          <?php } ?>

                          <h6>tolong Uploadkan File Foto anda</h6>
                          <input type="file" name="gambar" class="text-center center-block file-upload" size="20">
                        </center><br>
                        <input type="hidden" name="NoRegistrasi" value="<?= $asr['nomor_registrasi_asesor'] ?>">
                        <h6>Nama Asesor</h6>
                        <input type="text" name="namaAsesor" value=" <?= $asr['nama_asesor'] ?>" class="form-control"
                          required>
                        <br>
                        <h6>Email</h6>
                        <input type="email" name="email" value=" <?= $asr['email'] ?>" class="form-control" required>
                        <!-- <br>
                        <h6>User Name</h6>
                        <input type="text" name="userName" value="<?= $asr['username'] ?>" class="form-control"
                          required> -->
                        <br>
                        <h6>Nomor KTP</h6>
                        <input type="number" name="NoKTP" value="<?= $asr['nomor_ktp'] ?>" class="form-control" required>
                        <br>
                        <h6>Alamat</h6>
                        <input type="text" name="alamat" value="<?= $asr['alamat'] ?>" class="form-control">
                        <br>
                        <h6>Pendidikan Terakhir</h6>
                        <input type="text" name="pendidikan_terakhir" value="<?= $asr['pendidikan_terakhir'] ?>"
                          class="form-control">
                        <br>
                        <h6>Password</h6>
                        <input type="text" name="password" value="<?= $asr['password'] ?>" class="form-control">
                        <br>
                        <h6>Tanggal Lahir</h6>
                        <input type="date" name="tanggal_lahir" value="<?= $asr['tanggal_lahir'] ?>"
                          class="form-control"><br>
                        <input type="submit" name="update" class="btn btn-primary"></input>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal Penambahan Asesor -->
<div class="modal" id="tambahAsesor">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Data Asesor Sesuai Dengan Dokumen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-body">
          <form method="post" action="<?= site_url('asesor_control/TambahAsesor') ?>">
            <input type="number" name="NoRegistrasi" placeholder="Nomor Registrasi" class="form-control" required>
            <br>
            <input type="text" name="namaAsesor" placeholder="Nama Asesor" class="form-control" required>
            <br>
            <input type="text" name="email" placeholder="Email" class="form-control" required>
            <br>
            <input type="text" name="password" placeholder="Password" class="form-control" required>
            <br>
            <input type="number" name="NoKTP" placeholder="Nomor KTP" class="form-control" required>
            <br>

            <button type="submit" class="btn btn-primary ">submit</button>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>