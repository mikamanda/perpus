<?php
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Open form
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo 
				$user->nama ?>" required>
	</div>

	<div class="form-group">
		<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo 
				$user->email ?>" required>
	</div>

	<div class="form-group">
		<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo 
				$user->username ?>" required readonly disabled>
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
			<label>Level Hak Akses</label>
			<select name="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User" <?php if($user->akses_level=="User") { echo "selected"; } ?>>User</option>
			</select>
	</div>

	<div class="form-group">
		<label>Keterangan Lain</label>
			<textarea name="keterangan" id="" rows="3" class="form-control" placeholder="Keterangan"><?php echo $user->keterangan ?></textarea>	
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