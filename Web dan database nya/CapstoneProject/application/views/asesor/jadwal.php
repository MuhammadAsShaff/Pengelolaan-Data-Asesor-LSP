<div class="container-fluid">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jadwal Asessment</h1>
    <p class="mb-4">Buat Jadwal yang telah di setujui dan di sepakati bersama</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- button penambahan data -->

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

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <a href="<?= base_url('asesor_control') ?>" class="btn btn-primary mb-3">Back</a>
  </div>
</div>