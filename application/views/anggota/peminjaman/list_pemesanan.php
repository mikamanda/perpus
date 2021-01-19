<?php
// Dapatkan id user yang didaftarkan saat login
$peminjaman     = $this->peminjaman_model->anggota($id_anggota);
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Judul Buku</th>
        <th>Tgl Dipesan</th>
        <th>Status</th>
        <th>Denda</th>
        
    </tr>
</thead>
<tbody>
<?php $i =1; foreach($peminjaman as $peminjaman) { ?>	
    <tr>
        <td><?php echo $i ?>.</td>
        <td><?php echo $peminjaman->judul_buku ?></td>
        <td><?php echo date('d-m-Y',strtotime($peminjaman->tanggal)) ?></td>
        <td><?php if($peminjaman->status_kembali == "Sudah dikembalikan"){ ?>

            <div><?php echo $peminjaman->status_kembali ?> <i class="fa fa-check" style="color:green"></i></div>

            <?php }elseif($peminjaman->status_kembali == "Sedang dipesan"){ ?>

            <?php echo $peminjaman->status_kembali ?> <small style="background-color:gold">menunggu persetujuan..</small>

            <?php }else{ ?>

            <?php echo $peminjaman->status_kembali ?> - <small class="text-success">tgl: <?php echo date('d-m-Y',strtotime($peminjaman->tanggal_pinjam)) ?></small><br>
            <small class="text-danger">Harus dikembalikan tgl: <?php echo date('d-m-Y',strtotime($peminjaman->tanggal_kembali)) ?></small>

            <?php } ?></td>
            <td>
                <?php echo $peminjaman->denda ?>

            </td>
        
    </tr>
<?php $i++; } ?>
</tbody>
</table>    