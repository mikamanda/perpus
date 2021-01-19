<?php
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Open form
echo form_open(base_url('admin/anggota/edit/'.$anggota->id_anggota));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Anggota</label>
			<input type="text" name="nama_anggota" class="form-control" placeholder="Masukkan Nama" value="<?php echo 
				$anggota->nama_anggota ?>">
	</div>

	<div class="form-group">
		<label>Nim Anggota</label>
			<input type="text" name="nim" class="form-control" placeholder="Masukkan Nim Anggota" value="<?php echo 
				$anggota->nim ?>">
	</div>

	<div class="form-group">
		<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo 
				$anggota->email ?>" required>
	</div>

	<div class="form-group">
		<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo 
				$anggota->username ?>" readonly>
	</div>

	<div class="form-group">
		<label>Password <span class="text-danger"><small>(Password minimal 6 karakter atau biarkan kosong)
		</small></span></label>
			<input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo 
				set_value('password') ?>">
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Telepon/HP</label>
			<input type="text" name="telepon" class="form-control" placeholder="Masukkan No Telepon/HP" value="<?php echo 
				$anggota->telepon ?>" required>
	</div>

	<div class="form-group">
			<label>Status Anggota</label>
			<select name="status_anggota" class="form-control">
				<option value="Aktif">Aktif</option>
				<option value="Non Aktif" <?php if($anggota->status_anggota=="Non Aktif") { echo "selected"; } ?>>Non Aktif</option>
			</select>
	</div>

	<div class="form-group">
		<label>Alamat</label>
			<textarea name="alamat" id="" rows="3" class="form-control" placeholder="Alamat"><?php echo $anggota->alamat ?></textarea>	
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