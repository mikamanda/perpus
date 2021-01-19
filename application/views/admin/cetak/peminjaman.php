<style>
	table, th, td{
		border: 1px solid black;
	}
	table{
		margin-top: 35px;
		border-collapse: collapse;
	}
	th, td {
		padding: 15px;
	}
	h1, h4{
		text-align: center;
		margin: 0;
	}
</style>
<h1>Laporan Peminjaman</h1>
<h4>Institut Teknologi dan Bisnis Indonesia</h4>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Status Kembali</th>
    </tr>
</thead>

<?php foreach($pinjam as $key => $pinjam) : ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $pinjam->nama_anggota ?></td>
        <td><?php echo $pinjam->nim ?></td>
        <td><?php echo $pinjam->judul_buku ?></td>
        <td><?php echo $pinjam->tanggal_pinjam ?></td>
        <td><?php echo $pinjam->status_kembali ?></td>
    </tr>
<?php endforeach ?>
</tbody>
</table> 
