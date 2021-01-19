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
	width: 350px;
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
	margin-bottom: 15px;
	border-bottom: 2px solid black;
	padding: 8px 0;
}

.box-login i {
	font-size: 20px;
	color: black;
	padding-right: 10px;
}

.box-login input {
	width: 100%;
	padding: 0 10px;
	background: none;
	border: none;
	outline: none;
	color: black;
	font-size: 18px;
}

.box-login input::placeholder {
	color: black;
}

.btn-login {
	width: 100%;
	background: none;
	padding: 10px;
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
	margin-top: 10px;
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

		<h2>Login Admin</h2>
		<?php 
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-danger"><i class="fa fa-remove"></i> ';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>
	<form role="form" method="post" action="<?php echo base_url('login') ?>">
		<div class="box-login"><i class="fa fa-user"></i>
			<input type="text" name="username" placeholder="Username" autocomplete="off">
		</div>

		<div class="box-login">
			<i class="fa fa-lock"></i>
			<input type="password" name="password" placeholder="Password">
		</div>

		<button type="submit" class="btn-login">
			Login
		</button>

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