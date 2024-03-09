<div class="container-fluid">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelolaan Skema Asesor</h1>
    <p class="mb-4">Tolong Sesuaikan Pengelolaan Skema Asesor berdasarkan Data yang tersedia.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Skema Yang Tersedia</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- button penambahan data -->
          <button href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahJadwal">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambahkan Skema</span>
          </button><br><br>
          <!-- table data asesor yang sudah di tambah -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Skema</th>
                <th>No Registrasi Asesor</th>
                <th>Nama Asesor</th>
                <th>Nama Skema</th>
                <!-- <th>Skema</th> -->
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($skema as $sk) {
                $no++;
                ?>
                <tr>
                  <td>
                    <?= $no ?>
                  </td>
                  <td>
                    <?= $sk['id_skema'] ?>
                  </td>

                  <td>
                    <?= $sk['asesor_id'] ?>
                  </td>

                  <td>
                    <?= $sk['nama_asesor'] ?>
                  </td>
                  <!-- <td>
                      </td> -->
                  <td>
                    <?= $sk['nama_skema'] ?>
                  </td>
                  <td>
                    <center><button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $sk['id_skema'] ?>">
                        Edit
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete<?= $sk['id_skema'] ?>">
                        Delete
                      </button>
                    </center>
                  </td>
                </tr>

                <!-- modal hapus data -->
                <div class="modal fade" id="delete<?= $sk['id_skema'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus
                        <b>
                          <?= $sk['id_skema'] ?>
                        </b>
                        <br>
                        <br>
                        <input type="hidden" name="id_skema" value="<?= $sk['id_skema'] ?>">
                        <button type="button" class="btn btn-danger hapusSkema">Hapus</button>
                      </div>
                      <!-- AJAX -->
                      <script src="<?php echo base_url('Assets/vendor/jquery/jquery.min.js') ?>"></script>
                      <script>
                        $(document).ready(function () {
                          // Tangani peristiwa klik pada tombol "Hapus"
                          $(".hapusSkema").click(function () {
                            var idSkema = $(this).siblings("input[name='id_skema']").val();

                            // Lakukan permintaan AJAX
                            $.ajax({
                              type: "POST",
                              url: "<?php echo site_url('skema/deleteSkema') ?>",
                              data: {
                                id_skema: idSkema
                              },
                              success: function (response) {
                                // Redirect ke halaman skema setelah berhasil menghapus
                                window.location.href = "<?php echo site_url('skema/skema') ?>";
                              },
                              error: function (xhr, status, error) {
                                // Tangani error jika terjadi
                                console.log(error);
                              }
                            });
                          });
                        });
                      </script>

                    </div>
                  </div>
                </div>



                <!-- modal edit -->
                <div class="modal fade" id="edit<?= $sk['id_skema'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Skema</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <form id="formEdit<?= $sk['id_skema'] ?>" method="post"
                        action="<?= site_url('skema/updateSkema') ?>">

                        <div class="modal-body">
                          <input type="hidden" name="id_skema" value="<?= $sk['id_skema'] ?>">
                          <h6>Nama Skema</h6>
                          <input type="text" name="nama_skema" value="<?= $sk['nama_skema'] ?>" class="form-control"
                            required>
                          <br>
                          <h6>No Registrasi Asesor</h6>
                          <input type="number" name="asesor_id" value="<?= $sk['asesor_id'] ?>" class="form-control"
                            required>
                          <br>
                          <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                      <script>
                        $(document).ready(function () {
                          // Tangani peristiwa submit pada form edit
                          $("#formEdit<?= $sk['id_skema'] ?>").submit(function (event) {
                            event.preventDefault(); // Mencegah tindakan default (misalnya, mengirimkan form)

                            var form = $(this);
                            var url = form.attr("action");
                            var formData = form.serialize(); // Mengambil data form dalam format URL-encoded

                            // Lakukan permintaan AJAX
                            $.ajax({
                              type: "POST",
                              url: url,
                              data: formData,
                              success: function (response) {
                                // Redirect ke halaman skema setelah berhasil mengedit
                                window.location.href = "<?php echo site_url('skema/skema') ?>";
                              },
                              error: function (xhr, status, error) {
                                // Tangani error jika terjadi
                                console.log(error);
                              }
                            });
                          });
                        });
                      </script>
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
        <h4 class="modal-title">Silahkan Buat Skema Baru Untuk Asesor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-body">
          <form method="post" action="<?= site_url('skema/TambahSkema') ?>">
            <input type="number" name="id_skema" placeholder="Nomor Skema" class="form-control" required>
            <br>
            <input type="text" name="nama_skema" placeholder="Nama Skema Asesor" class="form-control" required>
            <br>
            <input type="text" name="asesor_id" placeholder="Nomor Registrasi Asesor" class="form-control" required>
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