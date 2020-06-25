<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-eye"></i> Detail Mahasiswa
  	</div>

  	<table class="table table-bordered table-striped table-hover">
  		<?php foreach ($detail as $dt) : ?>

  		<img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo ?>" style="width: 20%">

  		<tr>
  			<td>NIM</td>
  			<td><?php echo $dt->nim ?></td>
  		</tr>
  		<tr>
  			<td>Nama Lengkap</td>
  			<td><?php echo $dt->nama_lengkap ?></td>
  		</tr>
  		<tr>
  			<td>Alamat</td>
  			<td><?php echo $dt->alamat ?></td>
  		</tr>
  		<tr>
  			<td>Email</td>
  			<td><?php echo $dt->email ?></td>
  		</tr>
  		<tr>
  			<td>Telepon</td>
  			<td><?php echo $dt->telepon ?></td>
  		</tr>
  		<tr>
  			<td>Tempat Lahir</td>
  			<td><?php echo $dt->tempat_lahir ?></td>
  		</tr>
  		<tr>
  			<td>Tanggal Lahir</td>
  			<td><?php echo $dt->tanggal_lahir ?></td>
  		</tr>
  		<tr>
  			<td>Jenis Kelamin</td>
  			<td><?php echo $dt->jenis_kelamin ?></td>
  		</tr>
  		<tr>
  			<td>Nama Prodi</td>
  			<td><?php echo $dt->nama_prodi ?></td>
  		</tr>

  	<?php endforeach; ?>
  	</table>

  	<?php echo anchor('administrator/mahasiswa','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
  	<br><br><br><br>
</div>