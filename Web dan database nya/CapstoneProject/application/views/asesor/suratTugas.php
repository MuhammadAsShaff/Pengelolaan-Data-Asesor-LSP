<div class="container-fluid">
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Surat Tugas Untuk Anda</h1>
    <p class="mb-4">Semua Yang Di Tampilkan Di sini Adalah Surat Tugas Yang Anda Terima</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Surat Tugas</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
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
                  <td style="word-wrap: break-word; max-width: 600px;">
                    <?= $tugas['deskripsi'] ?>
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