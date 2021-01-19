<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">  
	<h2><i class="fa fa-book"></i> <?php echo $title ?></h2>
    <br>
	<p class="text-right">
		<a href="<?php echo base_url('katalog') ?>" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-search"></i> Pencarian Buku</a>
	</p>

<table class="table table-striped table-hover" id="dataTables-example">

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
        <td>
            <small>Judul Buku</small><br>
            <b><?php echo $buku->judul_buku ?></b>
            </td>
        <td>
            <small>Penulis</small><br>
            <?php echo $buku->penulis_buku ?></td>
        <td>
            <small>Penerbit</small><br>
            <?php echo $buku->penerbit ?></td>
        
        <td>

        <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Lihat Detail</a>     

   
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>    

</div>
</div>

</div>
</div>
