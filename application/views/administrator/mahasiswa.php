<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i> Mahasiswa
  	</div>

  	<?php echo $this->session->flashdata('pesan') ?>

  	<?php echo anchor('administrator/mahasiswa/tambah_mahasiswa','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Mahasiswa</button>') ?>
	
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Alamat</th>
			<th>Email</th>
			<th colspan="3">Aksi</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($mahasiswa as $mhs) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $mhs->nama_lengkap ?></td>
				<td><?php echo $mhs->alamat ?></td>
				<td><?php echo $mhs->email ?></td>
				<td width="20px"><?php echo anchor('administrator/mahasiswa/detail/'.$mhs->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/mahasiswa/update/'.$mhs->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
  				<td width="20px"><?php echo anchor('administrator/mahasiswa/delete/'.$mhs->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>