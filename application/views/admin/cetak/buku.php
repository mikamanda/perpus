<style>
    table, th, td{
        border: 1px solid black;
    }
    table{
        margin-top: 35px;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
    h1, h4{
        text-align: center;
        margin: 0;
    }
</style>
<h1>Daftar Buku</h1>
<h4>Perpustakaan Institut Teknologi dan Bisnis Indonesia</h4><hr>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Letak Buku</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
<?php 
$i =1; foreach($buku as $buku) { 
$id_buku    = $buku->id_buku;
?>  
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $buku->judul_buku ?></td>
        <td><?php echo $buku->penulis_buku ?></td>
        <td><?php echo $buku->letak_buku ?></td>
        <td><?php if($buku->jumlah_buku <= 0){ ?>

            Stok Habis

            <?php }else{ ?>

           <?php echo $buku->jumlah_buku ?>

            <?php } ?></td>
    </tr>
<?php $i++; } ?>
</tbody>
</table> 
