<!-- Begin Page Content -->

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Pengelolaan Data Asesor</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>

</div>
<!-- End of Page Wrapper -->
<script src="<?php echo base_url('Assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('Assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('Assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('Assets/js/sb-admin-2.min.js') ?>"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url('Assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('Assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script src="<?php echo base_url('Assets/js/demo/datatables-demo.js') ?>"></script>
<!-- <script src="<?php echo base_url('https://code.jquery.com/jquery-3.6.0.min.js') ?>"></script>
<script>
  $(document).ready(function() {
    // Fungsi untuk mengirim permintaan AJAX saat tombol submit diklik
    $('form').on('submit', function(e) {
      e.preventDefault(); // Mencegah reload halaman

      var form = $(this); // Ambil elemen form yang dikirim

      $.ajax({
        url: form.attr('action'), // URL yang dituju
        type: form.attr('method'), // Metode HTTP (GET/POST)
        data: new FormData(this), // Data form
        processData: false, // Jangan proses data secara otomatis
        contentType: false, // Jangan mengatur tipe konten secara otomatis
        success: function(response) {
          // Tangani respons dari server
          // Misalnya, perbarui tampilan dengan data terbaru
          $('#result-container').html(response);

          // Tampilkan pesan sukses atau notifikasi lainnya jika diperlukan
          alert('Data berhasil diperbarui');
        },
        error: function(xhr, status, error) {
          // Tangani kesalahan jika terjadi
          console.log(xhr.responseText);
          alert('Terjadi kesalahan. Silakan coba lagi.');
        }
      });
    });
  });
</script> -->


</body>

</html>