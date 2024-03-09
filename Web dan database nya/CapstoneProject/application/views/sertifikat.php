<div class="container-fluid">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelolaan Sertifikat Asesor</h1>
    <p class="mb-4">Masukkan Sertifikat Asesor Berdasarkan Data Yang sesuai</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sertifikat Yang Telah Terdaftar</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- button penambahan data -->
          <!-- <button href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahSertifikat">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Memasukkan Sertifikat</span>
          </button><br><br> -->
          <!-- table data asesor yang sudah di tambah -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Sertifikat</th>
                <th>No Registrasi Asesor</th>
                <th>Nama Asesor</th>
                <th>Tanggal Aktif</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Status Sertifikat</th>
                <th>File Sertifikat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($sertifikat as $sft) {
                $no++;
                ?>
                <tr>
                  <td>
                    <?= $no ?>
                  </td>
                  <td>
                    <?= $sft['nomor_sertifikat'] ?>
                  </td>
                  <td>
                    <?= $sft['asesor_id'] ?>
                  </td>
                  <td>
                    <?= $sft['nama_asesor'] ?>
                  </td>
                  <td>
                    <?= $sft['tanggal_aktif'] ?>
                  </td>
                  <td>
                    <?= $sft['tanggal_kadaluarsa'] ?>
                  </td>
                  <td>
                    <b>
                      <?= $sft['Status_sertifikat'] ?>
                    </b>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                      data-target="#melihat<?= $sft['nomor_sertifikat'] ?>">
                      Lihat Sertifikat
                    </button>
                  </td>
                  <td><button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#edit<?= $sft['nomor_sertifikat'] ?>">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#delete<?= $sft['nomor_sertifikat'] ?>">
                      Delete
                    </button>
                  </td>
                </tr>

                <!-- melihat sertifikat -->
                <div class="modal fade" id="melihat<?= $sft['nomor_sertifikat'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">File Sertifikat</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('Admin/updateDataAsesor') ?>">
                        <div class="modal-body">
                          <center>
                            <?php if ($sft['sertifikat'] != null) { ?>
                              <img src="<?= base_url('sertifikat/' . $sft['sertifikat']) ?>"
                                class="avatar img-circle img-thumbnail" style="width:360px" alt="avatar">
                            <?php } ?>
                          </center>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!-- modal hapus data -->
                <div class="modal fade" id="delete<?= $sft['nomor_sertifikat'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('sertifikat/deleteSertifikat') ?>">
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus
                          <b>
                            <?= $sft['nomor_sertifikat'] ?>
                          </b>
                          <br>
                          <br>
                          <input type="hidden" name="nomor_sertifikat" value="<?= $sft['nomor_sertifikat'] ?>">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>



                <!-- modal edit -->
                <div class="modal fade" id="edit<?= $sft['nomor_sertifikat'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Update Sertifikat <b>
                            <?= $sft['nomor_sertifikat'] ?>
                          </b></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('sertifikat/updateSertifikat') ?>"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                          <center>
                            <?php if (!empty($sft['sertifikat'])) { ?>
                              <img src="<?= base_url('sertifikat/' . $sft['sertifikat']) ?>"
                                class="avatar img-circle img-thumbnail" style="width:100px" alt="avatar">
                            <?php } else { ?>
                              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                class="avatar img-circle img-thumbnail" style="width:100px" alt="avatar">
                            <?php } ?>
                            <h6>Upload File Foto Anda</h6>
                            <input type="file" name="sertifikat" class="text-center center-block file-upload" size="20">
                          </center><br>
                          <input type="hidden" name="nomor_sertifikat" value="<?= $sft['nomor_sertifikat'] ?>">
                          <input type="hidden" name="asesor_id" value="<?= $sft['asesor_id'] ?>">
                          <h6>Tanggal Aktif</h6>
                          <input type="date" name="tanggal_aktif" value="<?= $sft['tanggal_aktif'] ?>"
                            class="form-control" required>
                          <br>
                          <h6>Tanggal Kadaluarsa</h6>
                          <input type="date" name="tanggal_kadaluarsa" value="<?= $sft['tanggal_kadaluarsa'] ?>"
                            class="form-control" required><br>
                          <h6>Status Sertifikat</h6>
                          <select name="status_sertifikat" class="form-control">
                            <option value="Aktif" <?php echo ($sft['Status_sertifikat'] == 'Aktif') ? 'selected' : ''; ?>>
                              Aktif</option>
                            <option value="Kadaluarsa" <?php echo ($sft['Status_sertifikat'] == 'Kadaluarsa') ? 'selected' : ''; ?>>Kadaluarsa</option>
                          </select>
                          <br>
                          <br>
                          <input type="submit" name="update" class="btn btn-primary" value="Update">
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


<!-- modal Memasukkan Sertifikat -->
<div class="modal fade" id="tambahSertifikat">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sertifikat Asesor<b>
          </b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <form method="post" action="<?= site_url('sertifikat/uploadSertifikat') ?>" enctype="multipart/form-data">

        <div class="modal-body">
          <h6>Nomor Sertifikat</h6>
          <input type="number" name="nomor_sertifikat" placeholder="Nomor Sertifikat" class="form-control" required>
          <br>
          <h6>Nomor Registrasi Asesor</h6>
          <input type="text" name="asesor_id" placeholder="No Registrasi Asesor" class="form-control" required>
          <br>
          <h6>Tanggal Aktif</h6>
          <input type="date" name="tanggal_aktif" placeholder="Tanggal Aktif" class="form-control" required>
          <br>
          <h6>Tanggal Kadaluarsa</h6>
          <input type="date" name="tanggal_kadaluarsa" placeholder="Tanggal Kadaluarsa" class="form-control" required>
          <br>
          <center>
            <h6>Tolong Uploadkan File Sertifikat</h6>
            <input type="file" name="gambar" class="text-center center-block file-upload" size="20" required>
          </center><br>
          <br>
          <input type="submit" name="update" class="btn btn-primary"></input>
        </div>
      </form>
    </div>
  </div>
</div>