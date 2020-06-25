<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i>Form Update Mahasiswa
  	</div>

    <?php foreach ($mahasiswa as $mhs) : ?>

  	<?php echo form_open_multipart('administrator/mahasiswa/update_mahasiswa_aksi') ?>
  	<div class="form-group">
  		<label>NIM</label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
  		<input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim ?>">
  		<?php echo form_error('nim','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Nama Lengkap</label>
  		<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $mhs->nama_lengkap ?>">
  		<?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Alamat</label>
  		<input type="text" name="alamat" class="form-control" value="<?php echo $mhs->alamat ?>">
  		<?php echo form_error('alamat','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Email</label>
  		<input type="text" name="email" class="form-control" value="<?php echo $mhs->email ?>">
  		<?php echo form_error('email','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Telepon</label>
  		<input type="text" name="telepon" class="form-control" value="<?php echo $mhs->telepon ?>">
  		<?php echo form_error('telepon','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Tempat Lahir</label>
  		<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $mhs->tempat_lahir ?>">
  		<?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Tanggal Lahir</label>
  		<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $mhs->tanggal_lahir ?>">
  		<?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Jenis Kelamin</label>
  		<select name="jenis_kelamin" class="form-control" value="<?php echo $mhs->jenis_kelamin ?>">
  			<option>Laki-Laki</option>
  			<option>Perempuan</option>
  		</select>
  		<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>
  	<div class="form-group">
  		<label>Program Studi</label>
  		<select name="nama_prodi" class="form-control" value="<?php echo $mhs->nama_prodi ?>">
  			<?php foreach ($prodi as $prd) : ?>
  				<option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi; ?></option>
  			<?php endforeach; ?>
  		</select>
  		<?php echo form_error('nama_prodi','<div class="text-danger small ml-3">', '</div>') ?>
  	</div>

  	<div class="from-group">
      <?php foreach ($detail as $dt) : ?>
        <img style="width: 20%" src="<?php echo base_url().'assets/uploads/'.$mhs->photo ?>">
      <?php endforeach; ?><br><br>
  		<label>Foto</label><br>
  		<input type="file" name="userfile" value="<?php echo $mhs->photo ?>">
  	</div>

  	<button type="submit" class="btn btn-sm btn-primary mb-5 mt-3">Simpan</button>
  	<?php form_close(); ?>

  <?php endforeach; ?>

</div>