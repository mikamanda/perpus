<p class="alert alert-success">
    <i class="fa fa-warning"></i> Cari nama anggota di kolom <strong>Search</strong>, kemudian klik tombol <strong><i class="fa fa-plus"></i> Peminjaman Buku</strong>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama - Nim</th>
        <th>Email - Telepon</th>
        <th>Status</th>
        <th>Alamat</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody>
<?php $i =1; foreach($anggota as $anggota) { ?>	
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $anggota->nama_anggota ?><br>
            <?php echo $anggota->nim ?></td>
        <td><?php echo $anggota->email ?>
            <br><i class="fa fa-phone"></i> Telp: <?php echo $anggota->telepon ?>
        </td>
        <td><?php echo $anggota->status_anggota ?></td>
        <td><?php echo $anggota->alamat ?></td>
        <td>
       	<a href="<?php echo base_url('admin/peminjaman/add/'.$anggota->id_anggota) ?>" class="btn btn-success
       	btn-sm"><i class="fa fa-plus"></i> Peminjaman Buku</a> 
    	</td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>    