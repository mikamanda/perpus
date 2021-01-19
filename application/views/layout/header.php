<?php
// LOAD KONFIGURASI DI SEMUA HALAMAN WEB
$konfigurasi = $this->konfigurasi_model->listing();
?>

<!-- The justified navigation menu is meant for single line per list item.
   Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
<div class="header">

	<div class="col-md-2">
		<a href="<?php echo base_url() ?>" title="<?php echo $konfigurasi->namaweb ?>">
			<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive" alt="<?php echo $konfigurasi->namaweb ?>">
		</a>
	</div>
	<div class="col-md-6">
		<h1 class="text-muted"><?php echo $konfigurasi->namaweb ?> <a href="<?php echo base_url('login') ?>" style="color: rgba(220,167,0, 0.9);" target="_blank"><i class="glyphicon glyphicon-education"></i></a></h1>
		<h3 class="text-warning"><?php echo $konfigurasi->tagline ?></h3>
	</div>

	<div class="col-md-4 text-right">
		<p>
			<a href="<?php echo $konfigurasi->facebook ?>" target="_blank" class="btn">
			<i class="fa fa-facebook fa-2x"></i>
			</a>

			<a href="<?php echo $konfigurasi->twitter ?>" style="color:#00c7ee;" target="_blank" class="btn">
			<i class="fa fa-twitter fa-2x"></i>
			</a>

			<a href="<?php echo $konfigurasi->instagram ?>" style="color:#7e2e1f;" target="_blank" class="btn">
			<i class="fa fa-instagram fa-2x"></i>
			</a>

		</p>
	</div>
	<div class="clearfix"></div>
</div>  