<?php
// Konfigurasi
$konfigurasi = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
	body {
	margin: 0;
	padding: 0;
	background: gold !important;
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	background-attachment: fixed; 
}

.login {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	background: rgba(232,240,254, 0.6);
	padding: 20px;
	width: 500px;
	box-shadow: 0 0 10px 5px black;
}
/* e8f0fe */
.avatar {
	font-size: 50px;
	background: black;
	width: 80px;
	height: 80px;
	line-height: 80px;
	text-align: center;
	position: fixed;
	left: 50%;
	top: 0;
	transform: translate(-50%, -50%);
	border-radius: 50%;
	color: gold;
}

.login h2{
	text-align: center;
	color: black;
	padding-top: 10px;
	padding-bottom: 10px;
	letter-spacing: 4px; 
}

.box-login {
	display: flex;
	justify-content: space-between;
	margin-bottom: 6px;
	border-bottom: 2px solid black;
	padding: 5px 0;
}

.box-login i {
	font-size: 20px;
	color: black;
	padding-right: 10px;
}

.box-login input {
	width: 100%;
	padding: 0 3px;
	background: none;
	border: none;
	outline: none;
	color: black;
	font-size: 15px;
}

.box-login input::placeholder {
	color: black;
}

.btn-login {
	width: 100%;
	background: none;
	padding: 3px;
	border: 1px solid black;
	font-size: 18px;
	letter-spacing: 5px;
	color: black;
	cursor: pointer;
	transition: 0.3s;
}

.btn-login:hover {
	background: rgba(255, 215, 0, 0.8);
}

.bottom {
	display: flex;
	justify-content: space-between;
	margin-top: 8px;
}

.bottom a {
	color: black;
	font-size: 14px;
	text-decoration: none;
}

.bottom a:hover {
	text-decoration: none;
}
	</style>
	<link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	 <!-- ICON DARI KONFIGURASI -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

	<div class="login">

		<div class="avatar">
			<i class="fa fa-user"></i>
		</div>

		<h2>Daftar Member</h2>
		<?php
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Open form
echo form_open(base_url('daftar/tambah'));
?>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
	<input type="hidden" name="status_anggota" value="Non Aktif">
	
		<div class="box-login"><i class="fa fa-tag"></i>
			<input type="text" name="nama_anggota" placeholder="Nama Lengkap" value="<?php echo 
				set_value('nama_anggota') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-tags"></i>
			<input type="text" name="nim" placeholder="Nim" value="<?php echo 
				set_value('nim') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-envelope"></i>
			<input type="email" name="email" placeholder="Email" value="<?php echo 
				set_value('email') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-user"></i>
			<input type="text" name="username" placeholder="Username" value="<?php echo 
				set_value('username') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-lock"></i>
			<input type="password" name="password" placeholder="Password" value="<?php echo 
				set_value('password') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-phone"></i>
			<input type="text" name="telepon" placeholder="Telepon" value="<?php echo 
				set_value('telepon') ?>" autocomplete="off" required>
		</div>

		<div class="box-login"><i class="fa fa-home"></i>
			<input type="text" name="alamat" placeholder="Alamat" value="<?php echo 
				set_value('Alamat') ?>" autocomplete="off" required>
		</div>

		<button type="submit" name="submit" class="btn-login">
			Daftar
		</button><p>
			<button class="btn-login"><a href="<?php echo base_url('loginanggota') ?>" style="text-decoration: none; color:black;"><i class="fa fa-backward"></i> Kembali</a>
		</button>
		</p>

		<div class="bottom">
			<a href="<?php echo base_url() ?>" target="_blank">
				<i class="fa fa-home"></i> Homepage? Klik disini</a>	
		</div>
		
	</div>
   <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
</body>
</html>