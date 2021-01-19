<style type="text/css" media="screen">
	iframe {
		width: 100%;
		height: auto;
		max-height: 400px;
	}

	p {
		padding: 2px;
	}
</style>
<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">  
	<h2>Hubungi Kami Melalui Informasi dibawah ini</h2><br>

	<div class="row">
		<div class="col-md-6">
			<p>
				<strong><?php echo $konfigurasi->namaweb ?></strong>
			</p>	
			<p><i class="fa fa-home"></i> <?php echo nl2br($konfigurasi->alamat) ?></p>
			<p><i class="fa fa-phone"></i> <?php echo $konfigurasi->telepon ?></p>
			<p><i class="fa fa-envelope"></i> <?php echo $konfigurasi->email ?></p>
			<p><i class="fa fa-globe"></i> <?php echo str_replace('http://','www.',$konfigurasi->website) ?></p>
			
		</div>
		<div class="col-md-6">
			<?php echo $konfigurasi->map ?>
		</div>

	</div>

</div>
</div>

</div>
</div>	