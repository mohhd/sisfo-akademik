<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i>Form Input Jurusan
  	</div>
	
	<form method="post" action="<?php echo base_url('administrator/jurusan/input_aksi') ?>">
		<div class="form-group">
			<label>Kode Jurusan</label>
			<input type="text" name="kode_jurusan" placeholder="Masukkan Kode Jurusan" class="form-control">
			<?php echo form_error('kode_jurusan','<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Nama Jurusan</label>
			<input type="text" name="nama_jurusan" placeholder="Masukkan Nama Jurusan" class="form-control">
			<?php echo form_error('nama_jurusan','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>

</div>