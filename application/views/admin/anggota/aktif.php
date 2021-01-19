<?php if($anggota->status_anggota == "Aktif") { ?>

<button class="btn btn-success btn-xs disabled" data-toggle="modal" data-target="#Aktif<?php echo $anggota->id_anggota ?>">
    <i class="fa fa-check"></i> Aktif
</button>

<?php }else{ ?>
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Aktif<?php echo $anggota->id_anggota ?>">
    <i class="fa fa-check"></i> Aktif
</button>
<div class="modal fade" id="Aktif<?php echo $anggota->id_anggota ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Pengaktifan Anggota</h4>
</div>
<div class="modal-body">
    <p class="alert alert-success"><i class="fa fa-check"></i> Aktifkan Anggota?</p>
</div>
<div class="modal-footer">

    <a href="<?php echo base_url('admin/anggota/aktif/'.$anggota->id_anggota) ?>" class="btn btn-success">
    <i class="fa fa-check"></i> Ya, Aktifkan</a>   

    <a href="<?php echo base_url('admin/anggota/edit/'.$anggota->id_anggota) ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>   

    <button type="button" class="btn btn-success" data-dismiss="modal">
    <i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>

<?php } ?>