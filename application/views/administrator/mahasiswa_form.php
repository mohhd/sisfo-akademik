<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i>Form Input Mahasiswa
  	</div>

  	<?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi') ?>
  	<div class="form-group">
  		<label>NIM</label>
  		<input type="text" name="nim" class="form-control">
  		<?php echo form_error('nim','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Nama Lengkap</label>
  		<input type="text" name="nama_lengkap" class="form-control">
  		<?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Alamat</label>
  		<input type="text" name="alamat" class="form-control">
  		<?php echo form_error('alamat','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Email</label>
  		<input type="text" name="email" class="form-control">
  		<?php echo form_error('email','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Telepon</label>
  		<input type="text" name="telepon" class="form-control">
  		<?php echo form_error('telepon','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Tempat Lahir</label>
  		<input type="text" name="tempat_lahir" class="form-control">
  		<?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Tanggal Lahir</label>
  		<input type="date" name="tanggal_lahir" class="form-control">
  		<?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Jenis Kelamin</label>
  		<select name="jenis_kelamin" class="form-control">
  			<option value="">--Pilih Jenis Kelamin--</option>
  			<option>Laki-Laki</option>
  			<option>Perempuan</option>
  		</select>
  		<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Program Studi</label>
  		<select name="nama_prodi" class="form-control">
  			<option value="">--Pilih Program Studi--</option>
  			<?php foreach ($prodi as $prd) : ?>
  				<option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi; ?></option>
  			<?php endforeach; ?>
  		</select>
  		<?php echo form_error('nama_prodi','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>

  	<div class="from-group">
  		<label>Foto</label><br>
  		<input type="file" name="photo">
  	</div>

  	<button type="submit" class="btn btn-sm btn-primary mb-5 mt-3">Simpan</button>
  	<?php form_close(); ?>

</div>