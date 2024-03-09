<div class="container-fluid">
  <div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelolaan Surat Tugas Untuk Asesor</h1>
    <p class="mb-4">Buatlah Surat Tugas Berdasarkan kesepakatan dan ketentuan yang tealh di berikan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Surat Tugas Yang Telah Di Buat</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- button penambahan data -->
          <button href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahAsesor">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Buat Surat Tugas</span>
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
                <th>Nomor Surat Tugas</th>
                <th>No Registrasi Asesor</th>
                <th>Nama Asesor</th>
                <th>Nama Tanggal Surat</th>
                <th>Skema</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($surattugas as $tugas) {
                $no++;
                ?>
                <tr>
                  <td>
                    <?= $no ?>
                  </td>
                  <td>
                    <?= $tugas['no_st'] ?>
                  </td>
                  <td>
                    <?= $tugas['asesor_id'] ?>
                  </td>
                  <td>
                    <?= $tugas['nama_asesor'] ?>
                  </td>
                  <td>
                    <?= $tugas['tanggal_st'] ?>
                  </td>
                  <td>
                    <?= $tugas['skema_st'] ?>
                  </td>
                  <td style="word-wrap: break-word; max-width: 360px;">
                    <?= $tugas['deskripsi'] ?>
                  </td>
                  <td>
                    <center><button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $tugas['no_st'] ?>">
                        Edit
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete<?= $tugas['no_st'] ?>">
                        Delete
                      </button>
                    </center>
                  </td>
                </tr>

                <!-- modal hapus data -->
                <div class="modal fade" id="delete<?= $tugas['no_st'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('surattugas/deleteSuratTugas') ?>">
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus
                          <b>
                            <?= $tugas['no_st'] ?>
                          </b>
                          <br>
                          <br>
                          <input type="hidden" name="no_st" value="<?= $tugas['no_st'] ?>">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- modal edit -->
                <div class="modal fade" id="edit<?= $tugas['no_st'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Surat Tugas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('surattugas/updateSuratTugas') ?>">
                        <div class="modal-body">
                          <input type="hidden" name="no_st" value="<?= $tugas['no_st'] ?>">
                          <h6>Tanggal Surat</h6>
                          <input type="date" name="tanggal_st" value="<?= $tugas['tanggal_st'] ?>" class="form-control"
                            required>
                          <br>
                          <h6>Skema Asesor</h6>
                          <input type="text" name="skema_st" value="<?= $tugas['skema_st'] ?>" class="form-control"
                            required>
                          <br>
                          <h6>Deskripsi</h6>
                          <input type="text" name="deskripsi" value="<?= $tugas['deskripsi'] ?>" class="form-control"
                            required>
                          <br>
                          <h6>No Registrasi Asesor</h6>
                          <input type="number" name="asesor_id" value="<?= $tugas['asesor_id'] ?>" class="form-control"
                            required readonly>
                          <br>
                          <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
        <h4 class="modal-title">Silahkan Buat Surat Tugas Untuk Asesor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-body">
          <form method="post" action="<?= site_url('surattugas/TambahSuratTugas') ?>">
            <input type="number" name="no_st" placeholder="Nomor Surat Tugas" class="form-control" required>
            <br>
            <input type="date" name="tanggal_st" placeholder="Tanggal Surat Tugas" class="form-control" required>
            <br>
            <input type="text" name="skema_st" placeholder="Skema Asesor" class="form-control" required>
            <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" required>
            <br>
            <input type="number" name="asesor_id" placeholder="Nomor Registrasi Asesor" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary">submit</button>
          </form>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>