<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i> Form Masuk Halaman KHS
  	</div>

  	<?php echo $this->session->flashdata('pesan') ?>

  	<form method="post" action="<?php echo base_url('administrator/nilai/nilai_khs') ?>">
  		
  		<div class="form-group">
  			<label>NIM</label>
  			<input type="text" name="nim" placeholder="Masukkan NIM Mahasiswa" class="form-control">
  			<?php echo form_error('nim', '<div class="text-danger small ml-2">','</div>') ?>
  		</div>
  		<div class="form-group">
  			<label>Tahun Akademik / Semester</label>
  			<?php 
  			$query = $this->db->query('SELECT id_tahunakademik, semester, CONCAT(tahun_akademik,"/")
  				AS thn_semester
  				FROM tahun_akademik');

  			$dropdowns = $query->result();

  			foreach ($dropdowns as $dropdown){
  				if ($dropdown->semester == 1){
  					$tampilSemester = "Ganjil";
  				}else {
  					$tampilSemester = "Genap";
  				}

  				$dropDownList[$dropdown->id_tahunakademik] = $dropdown->thn_semester . " " .$tampilSemester;
  			}

  			
  			echo form_dropdown('id_tahunakademik', $dropDownList, '', 'class="form-control" id="id_tahunakademik"');
  			
  			?>

  		</div>

  		<button type="submit" class="btn btn-primary">Proses</button>
  	</form>
</div>