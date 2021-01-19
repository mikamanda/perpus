<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

// ERROR FORM
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/konfigurasi'));
?>

<div class="col-md-6">
	
<div class="form-group">
	<label>Nama Website</label>
	<input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
</div>

<div class="form-group">
	<label>Tagline</label>
	<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>">
</div>

<div class="form-group">
	<label>No Telepon Resmi</label>
	<input type="text" name="telepon" class="form-control" placeholder="No Telepon Resmi" value="<?php echo $konfigurasi->telepon ?>">
</div>

<div class="form-group">
	<label>Email Resmi</label>
	<input type="email" name="email" class="form-control" placeholder="Email Resmi" value="<?php echo $konfigurasi->email ?>">
</div>

<div class="form-group">
	<label>Website</label>
	<input type="text" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $konfigurasi->website ?>">
</div>

<div class="form-group">
	<label>Facebook Account (URL)</label>
	<input type="url" name="facebook" class="form-control" placeholder="http://facebook.com/akun" value="<?php echo $konfigurasi->facebook ?>">
</div>

<div class="form-group">
	<label>Instagram Account (URL)</label>
	<input type="url" name="instagram" class="form-control" placeholder="http://instagram.com/akun" value="<?php echo $konfigurasi->instagram ?>">
</div>

<div class="form-group">
	<label>Twitter Account (URL)</label>
	<input type="url" name="twitter" class="form-control" placeholder="http://twitter.com/akun" value="<?php echo $konfigurasi->twitter ?>">
</div>

<div class="alert alert-success">
<h2>Setting Peminjaman Buku</h2>
<hr>

<div class="form-group">
	<label>Durasi Waktu Peminjaman (Hari)</label>
	<input type="number" name="max_hari_peminjaman" class="form-control" placeholder="Durasi Waktu Peminjaman" value="<?php echo $konfigurasi->max_hari_peminjaman ?>">
</div>

<div class="form-group">
	<label>Jumlah Maximal Peminjaman (Buku)</label>
	<input type="number" name="max_jumlah_peminjaman" class="form-control" placeholder="Jumlah Maximal Peminjaman (Buku)" value="<?php echo $konfigurasi->max_jumlah_peminjaman ?>">
</div>

<div class="form-group">
	<label>Denda Keterlambatan Perhari (Rp)</label>
	<input type="number" name="denda_perhari" class="form-control" placeholder="Denda Keterlambatan Perhari (Rp)" value="<?php echo $konfigurasi->denda_perhari ?>">
</div>

</div>

</div>

<div class="col-md-6">

<div class="form-group">
	<label>Alamat Kampus</label>
	<textarea name="alamat" placeholder="Alamat Kampus" class="form-control"><?php echo $konfigurasi->alamat ?></textarea>
</div>	
	
<div class="form-group">
	<label>Deskripsi Kampus</label>
	<textarea name="deskripsi" placeholder="Deskripsi Kampus" class="form-control"><?php echo $konfigurasi->deskripsi ?></textarea>
</div>

<div class="form-group">
	<label>Keywords website (untuk SEO Google)</label>
	<textarea name="keywords" placeholder="Keywords website (untuk SEO Google)" class="form-control"><?php echo $konfigurasi->keywords ?></textarea>
</div>

<div class="form-group">
	<label>Kode Google Map (pilih format iframe)</label>
	<textarea name="map" placeholder="Kode Google Map (pilih format iframe)" class="form-control"><?php echo $konfigurasi->map ?></textarea>
</div>

<div class="form-group">
	<label>Metatext (dari Google Analytics &amp; Webmaster)</label>
	<textarea name="metatext" placeholder="Metatext (dari Google Analytics &amp; Webmaster)" class="form-control"><?php echo $konfigurasi->metatext ?></textarea>
</div>

<h4>Google Map</h4>
	<hr>
	<style type="text/css" media="screen">
		iframe {
			width: 100%;
			height: auto;
			min-height: 300px;
		}
	</style>
	<?php echo $konfigurasi->map ?>
	<hr>
<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary btn-lg">
		<i class="fa fa-save"></i> Simpan Konfigurasi
	</button>
	<button type="reset" name="reset" class="btn btn-default btn-lg">
		<i class="fa fa-repeat"></i> Reset
	</button>
</div>

</div>



<?php
// form close
echo form_close();
?>
