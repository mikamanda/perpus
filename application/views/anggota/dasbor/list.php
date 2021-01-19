<?php
$id_anggota    = $this->session->userdata('id_anggota');
$anggota = $this->anggota_model->detail($id_anggota);
$konfigurasi = $this->konfigurasi_model->listing();

date_default_timezone_set("Asia/Jakarta");

$b = time();
$hour = date("G",$b);

if($hour>=0 && $hour<=11)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Pagi <b><i>".$anggota->nama_anggota."</i></b>";
}
elseif($hour>=12 && $hour<=14)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Siang <b><i>".$anggota->nama_anggota."</i></b>";
}
elseif($hour>=15 && $hour<=17)
{
    echo "<i class='fa fa-cloud text-primary'></i> Selamat Sore <b><i>".$anggota->nama_anggota."</i></b>";
}
elseif($hour>=17 && $hour<=18)
{
    echo "<i class='fa fa-cloud text-warning'></i> Selamat Petang <b><i>".$anggota->nama_anggota."</i></b>";
}
elseif($hour>=19 && $hour<=20)
{
    echo "<i class='fa fa-cloud'></i> Selamat Malam <i>".$anggota->nama_anggota."</i>";
}
?>

<!-- Selamat Datang <i><?php echo $anggota->nama_anggota ?></i> -->Terimakasih anda telah bergabung bersama kami <i class="fa fa-smile-o"></i>	
<p>
	<b>Syarat Peminjaman Buku :</b>
</p>
<ol>
	<li>Hanya anggota perpustakaan yang dapat melakukan pemesanan dan peminjaman buku.</li>
	<li>Anda dapat melakukan pemesanan dan peminjaman buku dengan dibatasi limit yang telah ditentukan.</li>
	<li>Setelah melakukan pemesanan buku anda perlu mendatangi perpustakaan untuk melakukan validasi dan mengambil buku.</li>
	<li>Wajib membawa kartu anggota untuk melakukan peminjamaan.</li>
	<li>Waktu peminjaman terhitung ketika anda telah melakukan validasi peminjaman.</li>
	<li>Batas waktu peminjaman maximal 7 hari, jika lewat dari waktu yang tentukan akan dikenakan denda (per-hari Rp.1000).</li>
	<li>Petugas berhak mengatur segala pengelolaan pemesanan dan peminjaman buku.</li>
</ol>
<p>
	<i>Jika anda butuh bantuan silahkan hubungi melalui kontak dibawah ini: <br>
	<i class="fa fa-phone"></i> <i class="text-success"><b>0822-9620-9846</b></i></i>
</p>