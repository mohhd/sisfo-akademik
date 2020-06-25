<div class="container-fluid">
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i> Identitas Website
  	</div>

  	<?php echo $this->session->flashdata('pesan') ?>

  	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Judul Website</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($identitas as $id) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $id->judul_website ?></td>
				<td><?php echo $id->alamat ?></td>
				<td><?php echo $id->email ?></td>
				<td><?php echo $id->telp ?></td>
				<td width="20px"><?php echo anchor('administrator/identitas/update/'.$id->id_identitas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>