<div class="container-fluid">
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Portofolio Dari setiap Asesor</h1>
    <p class="mb-4">Anda dapat melihat kumpulan jadwal dan surat tugas dari setiap asesor yang telah di kelola.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Asesor Yang Terdaftar</h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <!-- table data asesor yang sudah di tambah -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Registrasi</th>
                <th>Nama Asesor</th>
                <th>Informasi Jadwal</th>
                <th>Informasi Surat Tugas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($portofolio as $asr) {
                $no++;
                ?>
                <tr>
                  <td>
                    <?= $no ?>
                  </td>
                  <td>
                    <?= $asr['asesor_id'] ?>
                  </td>
                  <td>
                    <?= $asr['nama_asesor'] ?>
                  </td>
                  <td style="word-wrap: break-word; max-width: 600px;">
                    <b>Nama Asesor:</b>
                    <?= $asr['nama_asesor'] ?><br>
                    <b>Nomor Registrasi Asesor:</b>
                    <?= $asr['asesor_id'] ?><br>
                    <b>Tanggal Jadwal Asestmen:</b>
                    <?= $asr['tanggal_jadwal'] ?><br>
                    <b>Nomor Penjadwalan Asesor:</b>
                    <?= $asr['id_jadwal'] ?><br>
                  </td>
                  <td style="word-wrap: break-word; max-width: 600px;">
                    <b>Nomor Surat Tugas:</b>
                    <?= $asr['no_st'] ?><br>
                    <b>Tanggal Jadwal Pembuatan Surat Tugas:</b>
                    <?= $asr['tanggal_st'] ?><br>
                    <b>Deskripsi Surat Tugas:</b>
                    <?= $asr['deskripsi'] ?>
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