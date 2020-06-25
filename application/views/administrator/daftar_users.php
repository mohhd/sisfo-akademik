<div class="container-fluid">
	<div class="alert alert-success" role="alert">
    	<i class="fas fa-university"></i> Daftar Users
  	</div>

  	<?php echo $this->session->flashdata('pesan') ?>

  	<?php echo anchor('administrator/users/tambah_users','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah User</button>') ?>

  	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Email</th>
			<th>Level</th>
			<th>Blokir</th>
			<th colspan="2">Aksi</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($users as $user) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $user->username ?></td>
				<td><?php echo $user->email ?></td>
				<td><?php echo $user->level ?></td>
				<td><?php echo $user->blokir ?></td>
				<td width="20px"><?php echo anchor('administrator/users/update/'.$user->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
  				<td width="20px"><?php echo anchor('administrator/users/delete/'.$user->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>