
<?php if($this->uri->segment(3) =="") { ?>
<p><a href="<?php echo base_url('admin/peminjaman/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"></i>Tambah</a></p>
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
        <th>Judul Buku</th>
        <th>Tgl Dipesan</th>
        <th>Status Buku</th>
        <th>Denda</th>
        <th width="25%">Action</th>
    </tr>
</thead>
<tbody>
<?php $i =1; foreach($peminjaman as $peminjaman) { ?>	

   
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $peminjaman->judul_buku ?></td>
        <td><?php echo date('d-m-Y',strtotime($peminjaman->tanggal)) ?></td>
        <td><?php echo $peminjaman->status_kembali ?></td>
        <td><?php echo $peminjaman->denda ?></td>
        <td>
        
        <?php include('kembali.php'); ?>  

       

       	<a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_detail_peminjaman) ?>" class="btn btn-warning
       	btn-xs"><i class="fa fa-edit"></i> Olah</a> 
       	
        <?php include('delete.php'); ?>
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>    
