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
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
			<input type="text" name="judul_berita" class="form-control" placeholder="Masukkan Judul Berita" value="<?php echo $berita->judul_berita ?>" required>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status Berita</label>
			<select name="status_berita" class="form-control">
				<option value="Publish">Publikasikan</option>
				<option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
			</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
			<select name="jenis_berita" class="form-control">
				<option value="Berita">Berita</option>
				<option value="Slider" <?php if($berita->jenis_berita=="Slider") { echo "selected"; } ?>>Homepage Slider</option>
			</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Upload Gambar</label><br><img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-thumbnail" width="60">
			<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar" value="<?php echo $berita->gambar ?>">
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Berita</label>
			<textarea name="isi" class="form-control editor" placeholder="Isi Berita"><?php echo $berita->isi ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php
//Form close
echo form_close();
?>