<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">  
	<h2><i class="fa fa-search"></i> <?php echo $title ?></h2><br>

	<p class="alert alert-success">Hasil pencarian dengan kata kunci: <strong><?php echo $keywords ?></strong></p>

<hr>
    <table class="table table-striped table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Cover</th>
        <th>Judul buku</th>
        <th>Penulis</th>   
        <th width="20%">Aksi</th>
    </tr>
</thead>
<tbody>
<?php 
$i =1; foreach($buku as $buku) { 
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

        <td>

        <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat detail</a>     

    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>    

</div>
</div>

</div>
</div>	
