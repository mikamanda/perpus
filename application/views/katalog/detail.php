<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">  
	<h2><i class="fa fa-book"></i> <?php echo $title ?></h2><br>

<div class="row">
	<div class="col-md-4">
		<?php if($buku->cover_buku !="") { ?>
		<img src="<?php echo base_url('assets/upload/image/'.$buku->cover_buku) ?>" class="img img-thumbnail img-responsive">	
		<?php }else { echo 'Tidak ada cover'; } ?>
	</div>

	<div class="col-md-8">

		<?php if(count($file_buku) < 1) { ?>
		<p class="alert alert-success text-center">
			<i class="glyphicon glyphicon-warning-sign"></i> File buku tidak tersedia
		</p>	

	<?php }else{ ?>

<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <table class="table">
        <tbody>
<?php 
$i =1; foreach($file_buku as $file_buku) { 
?>	
    <tr>
        <th width="5%"><?php echo $i ?></th>
        <th><?php echo $file_buku->judul_file ?></th>
       <!--  <td><?php echo $file_buku->keterangan ?></td> -->
        <td width="22%">   

        <a href="<?php echo base_url('admin/file_buku/unduh/'.$file_buku->id_file_buku) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> Unduh</a>     
           
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
    </table>
</div>  


	<?php } ?>

	<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <table class="table table-hover">
        <thead>
				<tr class="text-danger">
					<th width="25%">Judul Buku</i></th>
					<th><?php echo $buku->judul_buku ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Penulis</td>
					<td><?php echo $buku->penulis_buku ?></td>
				</tr>
				<tr>
					<td>Bahasa</td>
					<td><?php echo $buku->nama_bahasa ?></td>
				</tr>
				<tr>
					<td>Jenis Buku</td>
					<td><?php echo $buku->nama_jenis ?></td>
				</tr>
				<tr>
					<td>Subjek</td>
					<td><?php echo $buku->subjek_buku ?></td>
				</tr>
				<tr>
					<td>Jumlah Buku</td>
					<td><?php echo $buku->jumlah_buku ?></td>
				</tr>
				<tr>
					<td>Letak Buku</td>
					<td><?php echo $buku->letak_buku ?></td>
				</tr>
				<tr>
					<td>Penerbit</td>
					<td><?php echo $buku->penerbit ?></td>
				</tr>
				<tr>
					<td>Tahun Terbit</td>
					<td><?php echo $buku->tahun_terbit ?></td>
				</tr>
				<tr>
					<td>Nomor Seri</td>
					<td><?php echo $buku->nomor_seri ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td class="bukubaru"><?php echo $buku->ringkasan ?></td>
				</tr>
			</tbody>
    </table>
</div>

	</div>

</div>
</div>
</div>

</div>
</div>	