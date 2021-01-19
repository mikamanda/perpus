<?php
// LOAD KONFIGURASI DI SEMUA HALAMAN WEB
$konfigurasi = $this->konfigurasi_model->listing();
?>
<style type="text/css">
  footer p {
  color: #444;
  font-size:  0.9em;
}

.garis {
  border-top: 2px solid #ddd;
}
</style>
<hr class="garis">
<!-- footer -->
    <footer>
      <div class="text-center">
        <div class="row">
          <div class="col-sm-12">
            <p><i class="glyphicon glyphicon-copyright-mark copyright"></i> <?php echo date('Y') ?>. <?php echo $konfigurasi->namaweb ?> <i class="glyphicon glyphicon-education"></i> | <i class="fa fa-envelope"></i> <?php echo $konfigurasi->email ?><br> <i class="fa fa-home"></i> <?php echo $konfigurasi->alamat ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <a href="<?php echo $konfigurasi->facebook ?>" target="_blank" class="btn btn-primary"><i class="fa fa-facebook"></i> Ikuti Kami di Facebook</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->
 </div> <!-- /container -->
     <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="<?php echo base_url() ?>assets/perpus/js/bootstrap.min.js"></script>
<!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  </body>
</html>