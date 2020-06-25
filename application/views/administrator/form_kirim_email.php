<div class="container-fluid">

	<div class="alert alert-success" role="alert">
	    <i class="fas fa-comment-dots"></i> Form Balas Pesan User
	 </div>

	 <?php foreach($hubungi as $hub) : ?>
	 	<form method="post" action="<?php echo base_url('administrator/hubungi/kirim_email_aksi') ?>">
	 		<div class="form-group">
	 			<label>Email</label>
	 			<input type="hidden" name="id_hubungi" value="<?php echo $hub->id_hubungi ?>">
	 			<input type="text" name="email" class="form-control" value="<?php echo $hub->email ?>" readonly>
	 		</div>
	 		<div class="form-group">
	 			<label>Subject</label>
	 			<input type="text" name="subject" class="form-control">
	 		</div>
	 		<div class="form-group">
	 			<label>Pesan</label>
	 			<textarea type="text" name="pesan" class="form-control" rows="5"></textarea>
	 		</div>

	 		<button type="submit" class="btn btn-primary">Kirim</button>
	 	</form>
	 <?php endforeach; ?>
</div>