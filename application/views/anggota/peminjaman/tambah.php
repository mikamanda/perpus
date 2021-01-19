<?php
// Dapatkan id user yang didaftarkan saat login
$id_anggota     = $this->session->userdata('id_anggota');
$anggota        = $this->anggota_model->detail($id_anggota);
$konfigurasi    = $this->konfigurasi_model->listing();
$buku           = $this->buku_model->listing();
?>

<?php
if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
// Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('anggota/peminjaman/add/'.$anggota->id_anggota));
?>

<!-- limit peminjaman -->

<?php if(count($limit) >= $konfigurasi->max_jumlah_peminjaman) { ?>

<div class="alert alert-warning text-center">
    <i class="fa fa-warning fa-3x"></i>
    <p>Anda sudah melewati batas limit pemesanan/peminjaman buku.</p>
</div>

<?php }else{ ?>

<div class="row alert alert-default">

<div class="col-md-12">
<div class="form-group">
    <div class="alert alert-success text-center">
    <i class="fa fa-warning"></i> Anda Dapat Memesan/Meminjam Sebanyak <?php echo $konfigurasi->max_jumlah_peminjaman ?> Buku!
</div>
    <label>Judul Buku Yang Dipesan</label>
    <br>
    <select name="id_buku" class="form-control js-example-basic-single" style="width: 100%; padding: 10px 20px !important;" required>
        <option value="">Pilih Buku</option>
        <?php foreach($buku as $buku) { ?>
            <?php if($buku->jumlah_buku <= 0){ ?>

            <option disabled><?php echo $buku->judul_buku ?> - (Stok Habis)</option>

            <?php }else{ ?>
                
            <option value="<?php echo $buku->id_buku ?>">

            <?php echo $buku->judul_buku ?> - (Sisa <?php echo $buku->jumlah_buku ?> Buku)

            <?php } ?>
        </option>
        <?php } ?>  
    </select>
</div>
</div>  
<div class="col-md-4">
<div class="form-group">
    <!-- kosong -->
</div>  

<div class="form-group">
    <label>Nama Peminjam</label>
    <input type="text" name="nama_anggota" class="form-control" value="<?php echo 
                $anggota->nama_anggota ?>" readonly>
</div>  

<div class="form-group">
    <!-- <label>Status</label>
    <select name="status_kembali" class="form-control">
        <option value="Sedang dipesan">Sedang dipesan</option>
    </select> -->
    <input type="hidden" name="status_kembali" class="form-control" value="Sedang dipesan">
</div>  

</div>

<!--  -->
<div class="col-md-8">
<div class="row">
<div class="col-md-6">
    <div class="form-group">
    <!-- <label>Tanggal Peminjaman</label> -->
    <input type="hidden" name="tanggal_pinjam" class="form-control" value="<?php echo date('d M Y') ?>" placeholder="YYY-MM-DD" id="tanggal_pinjam">
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
    <!-- <label>Tanggal Peminjaman</label> -->
    <input type="hidden" name="tanggal_kembali" class="form-control" value="<?php echo date('d M Y') ?>" placeholder="YYY-MM-DD" id="tanggal_kembali">
</div>
</div>
<!--  -->

</div>

<!-- <div class="form-group">
    <label>Tanggal Dipesan</label> -->
    <input type="hidden" name="keterangan" class="form-control" value="<?php echo date('d M Y') ?>" readonly>
<!-- </div> -->

<div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo set_value('keterangan') ?>" placeholder="Keterangan (Opsional)">
</div>

</div>

<div class="col-md-12 text-right">
    <button type="reset" name="reset" class="btn btn-default btn-lg">
        <i class="fa fa-repeat"></i> Reset
    </button>
    <button type="submit" name="submit" class="btn btn-danger btn-lg">
        <i class="fa fa-book"></i> Pesan Buku
    </button>
</div>  

</div>

<?php } ?>

<!-- Batas Limit -->

<?php
// form close
echo form_close();
?>
<!-- End tambah -->

<?php 
// Ambil data peminjaman
include('list_pemesanan.php');
?>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>