<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    	<i class="fas fa-edit"></i>Form Edit Tahun Akademik
  	</div>

  	<?php foreach ($tahun_akademik as $ta) : ?>
	
	<form method="post" action="<?php echo base_url('administrator/tahun_akademik/update_aksi') ?>">
		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="hidden" name="id_tahunakademik" class="form-control" value="<?php echo $ta->id_tahunakademik ?>">
			<input type="text" name="tahun_akademik" value="<?php echo $ta->tahun_akademik ?>" class="form-control">
			<?php echo form_error('tahun_akademik','<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option><?php echo $ta->semester; ?></option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option><?php echo $ta->status; ?></option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>

	<?php endforeach; ?>

</div>