<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i> Mata Kuliah
  	</div>

  	<?php echo $this->session->flashdata('pesan') ?>

  	<?php echo anchor('administrator/matakuliah/tambah_matakuliah','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Mata Kuliah</button>') ?>
	
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Kode Mata Kuliah</th>
			<th>Nama Mata Kuliah</th>
			<th>Program Studi</th>
			<th colspan="3">Aksi</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($matakuliah as $mk) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $mk->kode_matakuliah ?></td>
				<td><?php echo $mk->nama_matakuliah ?></td>
				<td><?php echo $mk->nama_prodi ?></td>
				<td width="20px"><?php echo anchor('administrator/matakuliah/detail/'.$mk->kode_matakuliah,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/matakuliah/update/'.$mk->kode_matakuliah,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
  				<td width="20px"><?php echo anchor('administrator/matakuliah/delete/'.$mk->kode_matakuliah,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>