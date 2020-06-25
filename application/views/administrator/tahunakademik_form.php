<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i>Form Input Tahun Akademik
  	</div>
	
	<form method="post" action="<?php echo base_url('administrator/tahun_akademik/tambah_tahunakademik_aksi') ?>">
		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="text" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" class="form-control">
			<?php echo form_error('tahun_akademik','<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option value="">--Pilih Semester--</option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="">--Pilih Status--</option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>

</div>