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
                  <td >
                    <b> Nama Asesor:</b> <i>
                      <?= $asr['nama_asesor'] ?>
                    </i><br>

                    <b>Nomor Registrasi Asesor:</b>
                    <i>
                      <?= $asr['nomor_registrasi_asesor'] ?>
                    </i><br>

                    <b>Tanggal Jadwal Asestmen:</b>
                    <i>
                      <?= $asr['tanggal_jadwal'] ?>
                    </i><br>

                    <b>Nomor Penjadwalan Asesor:</b>
                    <i>
                      <?= $asr['id_jadwal'] ?>
                    </i> <br>
                  </td>
                  <td style="word-wrap: break-word; max-width: 600px;">
                    <b>Nomor Surat Tugas:</b>
                    <i>
                      <?= $asr['no_st'] ?>
                    </i><br>
                    <b>Tanggal Jadwal Pembuatan Surat Tugas:</b>
                    <i>
                      <?= $asr['tanggal_st'] ?>
                    </i><br>
                    <b>Deskripsi:</b>
                    <i>
                      <?= $asr['deskripsi'] ?>
                    </i><br>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>