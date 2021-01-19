<script>
	$( function(){
		$("#from_date").datepicker({
			dateFormat: "yy-mm-dd"
		});
	});

	$( function(){
		$("#for_date").datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
</script>

<?php if($this->uri->segment(3) =="") { ?>
<p><a href="<?php echo base_url('admin/peminjaman/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah</a>
<button class="btn btn-warning" data-toggle="modal" data-target="#cetak">
<i class="fa fa-print"></i> Cetak Laporan</button></p>
<?php } ?>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama Anggota</th>
        <th>NIM</th>
        <th>Status</th>
        <th width="23%">Action</th>
    </tr>
</thead>
<tbody>
<?php $i =1; foreach($peminjaman as $peminjaman) { ?>	
    <tr>
        <td><?= $i ?></td>
        <td><?= $peminjaman->nama_anggota ?></td>
        <td><?= $peminjaman->nim ?></td>
        <td><?= $peminjaman->status_anggota ?></td>
        <td>
       	<a href="<?php echo base_url('admin/peminjaman/add/'.$peminjaman->id_anggota) ?>" class="btn btn-primary
       	btn-xs"><i class="fa fa-eye"></i> Lihat detail peminjaman</a> 
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>    

<form action="<?php echo base_url('admin/peminjaman/cetak') ?>" method="POST">
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-print"></i> Mencetak Data Peminjaman</h4>
</div>
<div class="modal-body">
 
<div class="form-group">
    <label>Dari Tanggal</label>
    <input type="text" name="from_date" class="form-control" id="from_date" autocomplete="off" required>
</div>  

<div class="form-group">
    <label>Sampai Tanggal</label>
    <input type="text" name="for_date" class="form-control" id="for_date" autocomplete="off" required>
</div>

</div>
<div class="modal-footer"> 

    <button type="submit" class="btn btn-warning">
    <i class="fa fa-print"></i> Cetak</button>
</div>
</div>
</div>
</div>
</form>


