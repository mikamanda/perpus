<div style=" border: 1px solid black; width: 300px; text-align: center;"> 
	<!-- <div style="text-align: center; margin: 0;">
		<h5>Kartu Anggota Perpustakaan</h5> -->
		
		<table border="0" cellspacing="0" cellpadding="4" style="margin-left: 5px;">
			<tr>
				<td colspan="2"><center><b>KARTU ANGGOTA PERPUSTAKAAN</b><br>
					<small>Institut Teknologi Dan Bisnis Indonesia</small></center><hr></td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="1" cellspacing="0">
						<tr>
							<td width="75" height="85"><center>Pas Photo 2x2</center></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>Nim</td>
				<td>: <?= $anggota->nim ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?= $anggota->nama_anggota ?></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>: <?= $anggota->telepon ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?= $anggota->alamat ?><p></p></td>
			</tr>
			<tr>
				<td colspan="2">
					<small style="background-color: yellow; margin-left: 0px;">Status Anggota Telah <?= $anggota->status_anggota ?></small>
				</td>
			</tr>
		</table>	

	<!-- </div> -->
</div>