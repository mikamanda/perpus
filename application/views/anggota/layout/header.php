<?php
// Dapatkan id user yang didaftarkan saat login
$id_anggota     = $this->session->userdata('id_anggota');
$anggota        = $this->anggota_model->detail($id_anggota);
$konfigurasi    = $this->konfigurasi_model->listing();
?>

<style type="text/css" media="screen">
    .navbar-brand {
        font-size: 16px !important;
    }
</style>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('anggota/dasbor') ?>">
                    <?php echo $konfigurasi->namaweb ?>
                </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo date('d M Y') ?> &nbsp; 

<a href="<?php echo base_url('anggota/pengaturan') ?>" class="btn btn-success square-btn-adjust"><i class="fa fa-user"></i> <?php echo $anggota->nama_anggota ?> (<?php echo $anggota->status_anggota ?>)</a>

<a href="<?php echo base_url() ?>" class="btn btn-primary 
square-btn-adjust" target="_blank"><i class="fa fa-home"></i> Homepage</a>

<a href="<?php echo base_url('loginanggota/logout') ?>" class="btn btn-danger 
square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->