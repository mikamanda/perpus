<?php
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

// Kalau ada error upload tampilkan
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '<div>';
}

//Open form
echo form_open_multipart(base_url('admin/buku/edit/'.$buku->id_buku));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Buku</label>
			<input type="text" name="judul_buku" class="form-control" placeholder="Masukkan Judul Buku" value="<?php echo $buku->judul_buku ?>" required>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Penulis Buku</label>
			<input type="text" name="penulis_buku" class="form-control" placeholder="Masukkan Nama Penulis Buku" value="<?php echo $buku->penulis_buku ?>" required>
	</div>

	<div class="form-group">
		<label>Kode Buku</label>
			<input type="text" name="kode_buku" class="form-control" placeholder="Masukkan Kode Buku" value="<?php echo $buku->kode_buku ?>">
	</div>

	<div class="form-group">
		<label>Nomor Seri Buku</label>
			<input type="text" name="nomor_seri" class="form-control" placeholder="Nomor Seri Buku" value="<?php echo $buku->nomor_seri ?>">
	</div>

	<div class="form-group">
		<label>Jenis Buku</label>
			<select name="id_jenis" class="form-control">

				<?php foreach($jenis as $jenis) { ?>
				<option value="<?php echo $jenis->id_jenis ?>" <?php if($buku->id_jenis==$jenis->id_jenis) { echo "selected"; } ?>>
					<?php echo $jenis->kode_jenis ?> - <?php echo $jenis->nama_jenis ?>
				</option>
				<?php } ?>

			</select>
	</div>

	<div class="form-group">
		<label>Bahasa Buku</label>
			<select name="id_bahasa" class="form-control">

				<?php foreach($bahasa as $bahasa) { ?>
				<option value="<?php echo $bahasa->id_bahasa ?>" <?php if($buku->id_bahasa==$bahasa->id_bahasa) { echo "selected"; } ?>>
					<?php echo $bahasa->kode_bahasa ?> - <?php echo $bahasa->nama_bahasa ?>
				</option>
				<?php } ?>

			</select>
	</div>

	
</div>

<div class="col-md-4">

	<div class="form-group">
		<label>Kolasi Buku</label>
			<input type="number" name="kolasi" class="form-control" placeholder="Kolasi Buku" value="<?php echo $buku->kolasi ?>">
	</div>

	<div class="form-group">
		<label>Penerbit Buku</label>
			<input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit Buku" value="<?php echo $buku->penerbit ?>">
	</div>

	<div class="form-group">
		<label>Tahun Terbit</label>
			<input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit Buku" value="<?php echo $buku->tahun_terbit ?>">
	</div>

	<div class="form-group">
			<label>Status Buku</label>
			<select name="status_buku" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Not Publish" <?php if($buku->status_buku=="Not Publish") { echo "selected"; } ?>>Not Publish</option>
				<option value="Missing" <?php if($buku->status_buku=="Missing") { echo "selected"; } ?>>Missing</option>
			</select>
	</div>

	<div class="form-group">
		<label>Ringkasan</label>
			<textarea name="ringkasan" id="" rows="3" class="form-control" placeholder="Ringkasan Buku"><?php echo $buku->ringkasan ?></textarea>	
	</div>
</div>	

<div class="col-md-4">
	<div class="form-group">
		<label>Subjek Buku</label>
			<input type="text" name="subjek_buku" class="form-control" placeholder="Masukkan Subjek Buku" value="<?php echo $buku->subjek_buku ?>">
	</div>

	<div class="form-group">
		<label>Letak Buku</label>
			<input type="text" name="letak_buku" class="form-control" placeholder="Masukkan Letak Buku" value="<?php echo $buku->letak_buku ?>">
	</div>

	<div class="form-group">
		<label>Jumlah Buku</label>
			<input type="number" name="jumlah_buku" class="form-control" placeholder="Jumlah Buku" value="<?php echo $buku->jumlah_buku ?>">
	</div>

	<div class="form-group">
		<label>Upload Cover Buku (<span class="text-danger">atau biarkan kosong</span>)</label>
			<input type="file" name="cover_buku" class="form-control" placeholder="Upload Cover Buku" value="<?php echo $buku->cover_buku ?>">
		<br>

		<?php if($buku->cover_buku=="") { ?>
			<span class="text-danger"><small>Belum ada cover yang diupload</small></span>
		<?php }else{ ?>
			<img src="<?php echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
		<?php } ?>

	</div>
</div>	

<div class="col-md-12 text-center">
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php
//Form close
echo form_close();
?>