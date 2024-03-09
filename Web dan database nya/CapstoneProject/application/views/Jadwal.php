<div class="container-fluid">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelolaan Jadwal Asessment</h1>
    <p class="mb-4">Buat Jadwal yang telah di setujui dan di sepakati bersama</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal Yang Telah Di Buat</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- button penambahan data -->
          <button href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahJadwal">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Buat Jadwal</span>
          </button><br><br>
          <!-- table data asesor yang sudah di tambah -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Jadwal</th>
                <th>No Registrasi Asesor</th>
                <th>Nama Asesor</th>
                <th>Nomor Surat Tugas</th>
                <th>Tanggal Jadwal</th>

                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($jadwal as $jd) {
                $no++;
                ?>
                <tr>
                  <td>
                    <?= $no ?>
                  </td>

                  <td>
                    <?= $jd['id_jadwal'] ?>
                  </td>

                  <td>
                    <?= $jd['asesor_id'] ?>

                  </td>
                  <!-- <td>
                      <?= $jd['id_skema'] ?>
                    </td> -->
                  <td>
                    <?= $jd['nama_asesor'] ?>
                  </td>
                  <td>
                    <?= $jd['no_st'] ?>
                  </td>
                  <td>
                    <?= $jd['tanggal_jadwal'] ?>
                  </td>
                  <td>
                    <center><button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $jd['id_jadwal'] ?>">
                        Edit
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete<?= $jd['id_jadwal'] ?>">
                        Delete
                      </button>
                    </center>
                  </td>
                </tr>


                <!-- modal edit -->
                <div class="modal fade" id="edit<?= $jd['id_jadwal'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('jadwal/updateJadwal') ?>">
                        <div class="modal-body">
                          <input type="hidden" name="id_jadwal" value="<?= $jd['id_jadwal'] ?>">
                          <h6>Nomor Jadwal</h6>
                          <input type="date" name="tanggal_jadwal" value="<?= $jd['tanggal_jadwal'] ?>"
                            class="form-control" required>
                          <br>
                          <h6>Nomor Surat Tugas</h6>
                          <input type="text" name="no_st" value="<?= $jd['no_st'] ?>" class="form-control" readonly><br>
                          <h6>No Registrasi Asesor</h6>
                          <input type="text" name="asesor_id" value="<?= $jd['asesor_id'] ?>" class="form-control"
                            required>
                          <br>
                          <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </div>
                      </form>


                    </div>
                  </div>
                </div>


                <!-- modal hapus data -->
                <div class="modal fade" id="delete<?= $jd['id_jadwal'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form method="post" action="<?= site_url('jadwal/deleteJadwal') ?>">
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus
                          <b>
                            <?= $jd['id_jadwal'] ?>
                          </b>
                          <br>
                          <br>
                          <input type="hidden" name="id_jadwal" value="<?= $jd['id_jadwal'] ?>">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
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
<div class="modal" id="tambahJadwal">
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
          <form method="post" action="<?= site_url('jadwal/TambahJadwal') ?>">
            <input type="number" name="id_jadwal" placeholder="Nomor Jadwal Asessment" class="form-control" required>
            <br>
            <input type="date" name="tanggal_jadwal" placeholder="Tanggal Jadwal Asessment" class="form-control"
              required>
            <br>
            <input type="text" name="asesor_id" placeholder="Nomor Registrasi Asesor" class="form-control" required>
            <br>
            <input type="number" name="no_st" placeholder="Nomor Surat Tugas" class="form-control" required>
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
</div>