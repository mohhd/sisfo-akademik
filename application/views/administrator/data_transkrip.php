<div class="container-fluid">
	
	<center>
		<legend><strong>TRANSKRIP NILAI</strong></legend>

		<table>
			<tr>
				<td>NIM</td>
				<td>: <?php echo $nim; ?></td>
			</tr>
			<tr>
				<td>Nama Mahasiswa</td>
				<td>: <?php echo $nama; ?></td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>: <?php echo $prodi; ?></td>
			</tr>

		</table>

	</center>

	<table class="table table-bordered table-striped table-hover mt-3">
  		<tr>
  			<th>No</th>
  			<th>Kode Mata Kuliah</th>
  			<th>Nama Mata Kuliah</th>
  			<th align="center">SKS</th>
  			<th align="center">Nilai</th>
  			<th align="center">Skor</th>
  		</tr>

  		<?php 
  		$no = 1;
      	$jumlahSks = 0;
      	$jumlahSkor = 0;
  		foreach ($transkrip as $tr) : ?>
  			<tr>
  				<td width="20px"><?php echo $no++; ?></td>
  				<td><?php echo $tr->kode_matakuliah; ?></td>
  				<td><?php echo $tr->nama_matakuliah; ?></td>
  				<td align="center"><?php echo $tr->sks; ?></td>
  				<td align="center"><?php echo $tr->nilai; ?></td>
  				<td align="center"><?php echo skorNilai($tr->nilai,$tr->sks); ?></td>
  				<?php 
  					$jumlahSks+=$tr->sks;
  					$jumlahSkor+=skorNilai($tr->nilai,$tr->sks);
  				 ?>
  			</tr>
  			
  		<?php endforeach; ?>

      <tr>
        <td colspan="3">Jumlah</td>
        <td align="center"><?php echo $jumlahSks ?></td>
        <td></td>
        <td align="center"><?php echo $jumlahSkor ?></td>
      </tr>
  	</table>

    <p>Index Prestasi Kumulatif : <?php echo number_format($jumlahSkor/$jumlahSks,2); ?></p>

</div>