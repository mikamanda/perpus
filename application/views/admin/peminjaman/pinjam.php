<?php if($peminjaman->status_kembali == "Dipinjam") { ?>

<button class="btn btn-primary btn-xs disabled" data-toggle="modal" data-target="#Pinjam<?php echo $peminjaman->id_peminjaman ?>">
    <i class="fa fa-check"></i> Pinjamkan
</button>

<?php }else{ ?>
<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Pinjam<?php echo $peminjaman->id_peminjaman ?>">
    <i class="fa fa-check"></i> Pinjamkan
</button>
<div class="modal fade" id="Pinjam<?php echo $peminjaman->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Pinjamkan Buku</h4>
</div>
<div class="modal-body">
    <p class="alert alert-success"><i class="fa fa-check"></i> Pinjamkan Buku ini?</p>
</div>
<div class="modal-footer">

    <a href="<?php echo base_url('admin/peminjaman/pinjam/'.$peminjaman->id_peminjaman) ?>" class="btn btn-primary">
    <i class="fa fa-check"></i> Ya, Buku sudah dipinjamkan</a>   

    <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>   

    <button type="button" class="btn btn-primary" data-dismiss="modal">
    <i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>

<?php } ?>