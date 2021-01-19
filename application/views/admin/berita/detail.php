<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?php echo $buku->id_buku ?>">
    <i class="fa fa-eye"></i> Detail
</button>
<div class="modal fade" id="Detail<?php echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detail data buku: <?php echo $buku->judul_buku ?></h4>
</div>
<div class="modal-body">
   <table class="table table-bordered table-striped">
       <thead>
           <tr>
               <th width="30%">Judul Buku</th>
               <th><?php echo $buku->judul_buku ?></th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <td>Penulis</td>
               <td><?php echo $buku->penulis_buku ?></td>
           </tr>
           <tr>
               <td>Jenis Buku</td>
               <td><?php echo $buku->nama_jenis ?></td>
           </tr>
           <tr>
               <td>Bahasa</td>
               <td><?php echo $buku->nama_bahasa ?></td>
           </tr>
           <tr>
               <td>Nomor Seri</td>
               <td><?php echo $buku->nomor_seri ?></td>
           </tr>
           <tr>
               <td>Kode Buku</td>
               <td><?php echo $buku->kode_buku ?></td>
           </tr>
           <tr>
               <td>Subjek Buku</td>
               <td><?php echo $buku->subjek_buku ?></td>
           </tr>
           <tr>
               <td>Letak Buku</td>
               <td><?php echo $buku->letak_buku ?></td>
           </tr>
           <tr>
               <td>Kolasi</td>
               <td><?php echo $buku->kolasi ?></td>
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
               <td>Status Buku</td>
               <td><?php echo $buku->status_buku ?></td>
           </tr>
           <tr>
               <td>Ringkasan</td>
               <td><?php echo $buku->ringkasan ?></td>
           </tr>
           <tr>
               <td>Cover Buku</td>
               <td><?php if($buku->cover_buku=="") { ?>
                    <span class="text-danger"><small>Belum ada cover yang diupload</small></span>
                        <?php }else{ ?>
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
                        <?php } ?></td>
           </tr>
           <tr>
               <td>Jumlah Buku</td>
               <td><?php echo $buku->jumlah_buku ?></td>
           </tr>
           <tr>
               <td>Tanggal Entri</td>
               <td><?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal_entri)) ?></td>
           </tr>
           <tr>
               <td>Tanggal Update</td>
               <td><?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal)) ?></td>
           </tr>
       </tbody>
   </table>
</div>
<div class="modal-footer">

    <a href="<?php echo base_url('admin/buku/delete/'.$buku->id_buku) ?>" class="btn btn-danger">
    <i class="fa fa-trash-o"></i> Hapus</a>   

    <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>   

    <button type="button" class="btn btn-success" data-dismiss="modal">
    <i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>