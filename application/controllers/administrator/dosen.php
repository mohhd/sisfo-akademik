<?php 

class Dosen extends CI_Controller {
	public function index()
	{
		$data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/dosen', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_dosen()
	{
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/dosen_form');
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_dosen_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_dosen();
		}else {
			$nidn			= $this->input->post('nidn');
			$nama_dosen		= $this->input->post('nama_dosen');
			$alamat			= $this->input->post('alamat');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$email			= $this->input->post('email');
			$telp			= $this->input->post('telp');
			$photo			= $_FILES['photo'];
			if ($photo = ''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif';

				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('photo')){
					echo "Gagal Upload!"; die();
				}else {
					$photo = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nidn'			=> $nidn,
				'nama_dosen'	=> $nama_dosen,
				'alamat'		=> $alamat,
				'jenis_kelamin'	=> $jenis_kelamin,
				'email'			=> $email,
				'telp'			=> $telp,
				'photo'			=> $photo,
			);

			$this->dosen_model->insert_data($data,'dosen');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Dosen Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nidn','nidn','required',[
			'required'	=> 'nidn wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_dosen','nama dosen','required',[
			'required'	=> 'nama dosen wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat','alamat','required',[
			'required'	=> 'alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required',[
			'required'	=> 'jenis kelamin wajib diisi!'
		]);
		$this->form_validation->set_rules('email','email','required',[
			'required'	=> 'email wajib diisi!'
		]);
		$this->form_validation->set_rules('telp','telp','required',[
			'required'	=> 'telepon wajib diisi!'
		]);
	}

	public function detail($id)
	{
		$data['detail'] = $this->dosen_model->ambil_id_dosen($id);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/dosen_detail', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update($id)
	{
		$where = array('nidn' => $id);
		$data['dosen'] = $this->dosen_model->edit_data($where,'dosen')->result();
		$data['detail'] = $this->dosen_model->ambil_id_dosen($id);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/dosen_update', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update_dosen_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update();
		}else {
			$id 			= $this->input->post('id_dosen');
			$nidn			= $this->input->post('nidn');
			$nama_dosen		= $this->input->post('nama_dosen');
			$alamat			= $this->input->post('alamat');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$email			= $this->input->post('email');
			$telp			= $this->input->post('telp');
			$photo			= $_FILES['userfile']['name'];
			
			if ($photo){
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif';

				$this->load->library('upload',$config);
				if($this->upload->do_upload('userfile')){
					$userfile = $this->upload->data('file_name');
					$this->db->set('photo',$userfile);
				}else {
					echo "Gagal Upload!";
				}
			}

			$data = array(
				'nidn'			=> $nidn,
				'nama_dosen'	=> $nama_dosen,
				'alamat'		=> $alamat,
				'jenis_kelamin'	=> $jenis_kelamin,
				'email'			=> $email,
				'telp'			=> $telp,
			);

			$where = array('id_dosen' => $id);

			$this->dosen_model->update_data($where,$data,'dosen');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Dosen Berhasil Diubah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/dosen');
		}
	}

	public function delete($id)
	{
		$where = array('nidn' => $id);
		$this->dosen_model->hapus_data($where,'dosen');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Dosen Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/dosen');

	}
}