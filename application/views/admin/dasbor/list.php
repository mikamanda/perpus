<?php
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
$konfigurasi = $this->konfigurasi_model->listing();

date_default_timezone_set("Asia/Jakarta");

$b = time();
$hour = date("G",$b);

if($hour>=0 && $hour<=11)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Pagi <i>".$user_aktif->nama."</i>";
}
elseif($hour>=12 && $hour<=14)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Siang <i>".$user_aktif->nama."</i>";
}
elseif($hour>=15 && $hour<=17)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Sore <i>".$user_aktif->nama."</i>";
}
elseif($hour>=17 && $hour<=18)
{
    echo "<i class='fa fa-cloud text-warning'></i> Selamat Petang <i>".$user_aktif->nama."</i>";
}
elseif($hour>=19 && $hour<=20)
{
    echo "<i class='fa fa-cloud'></i> Selamat Malam <i>".$user_aktif->nama."</i>";
}
?>

<!-- Selamat Datang <i><?php echo $user_aktif->nama ?></i> -->