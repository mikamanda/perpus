<p><a href="<?php echo base_url('admin/buku/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah</a>
<button class="btn btn-warning" data-toggle="modal" data-target="#cetak">
<i class="fa fa-print"></i> Cetak</button></p>

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
        <th>Cover</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Letak Buku</th>
        <th>Jenis - Bahasa</th>
        <th>File</th>
        <th width="20%">Action</th>
    </tr>
</thead>
<tbody>
<?php 
$i =1; foreach($buku as $buku) { 
$id_buku    = $buku->id_buku;
$file_buku  = $this->file_buku_model->buku($id_buku);
?>	
    <tr>
        <td><?php echo $i ?></td>
        <td>
            <?php if($buku->cover_buku != "") { ?>
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
            <?php }else{ echo 'Tidak ada'; } ?>
        </td>
        <td><?php echo $buku->judul_buku ?></td>
        <td><?php echo $buku->penulis_buku ?></td>
        <td><?php echo $buku->letak_buku ?></td>
        <td><?php echo $buku->kode_jenis ?> - <?php echo $buku->kode_bahasa ?></td>
        <td><?php echo count($file_buku) ?> file</td>
        <td>

        <a href="<?php echo base_url('admin/file_buku/kelola/'.$buku->id_buku) ?>" class="btn btn-info btn-xs"><i class="fa fa-book"></i> Kelola File</a>     

        <?php include('detail.php'); ?> 
           
       	<a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a> 
       	
        <?php include('delete.php'); ?>
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>   

<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Cetak</h4>
</div>
<div class="modal-body">

<?php
// Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Open form
echo form_open(base_url('admin/buku/cetak'));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Jenis Buku</label>
		<select name="jenis" class="form-control">
			<option value="">Please select</option>
			<?php foreach($jenis as $jenis) { ?>
			<option value="<?php echo $jenis->id_jenis ?>">
				<?php echo $jenis->kode_jenis ?> - <?php echo $jenis->nama_jenis ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Cetak">
	</div>
</div>

<?php
//Form close
echo form_close();
?>

<div class="clearfix"></div>

</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
