<?php 

class Mahasiswa extends CI_Controller {
	public function index()
	{
		$data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/mahasiswa', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_mahasiswa()
	{
		$data['prodi'] = $this->mahasiswa_model->tampil_data('prodi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/mahasiswa_form', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_mahasiswa_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_mahasiswa();
		}else {
			$nim			= $this->input->post('nim');
			$nama_lengkap	= $this->input->post('nama_lengkap');
			$alamat			= $this->input->post('alamat');
			$email			= $this->input->post('email');
			$telepon		= $this->input->post('telepon');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$nama_prodi		= $this->input->post('nama_prodi');
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
				'nim'			=> $nim,
				'nama_lengkap'	=> $nama_lengkap,
				'alamat'		=> $alamat,
				'email'			=> $email,
				'telepon'		=> $telepon,
				'tempat_lahir'	=> $tempat_lahir,
				'tanggal_lahir'	=> $tanggal_lahir,
				'jenis_kelamin'	=> $jenis_kelamin,
				'nama_prodi'	=> $nama_prodi,
				'photo'			=> $photo,
			);

			$this->mahasiswa_model->insert_data($data,'mahasiswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Mahasiswa Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/mahasiswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nim','nim','required',[
			'required'	=> 'nim wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_lengkap','nama lengkap','required',[
			'required'	=> 'nama lengkap wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat','alamat','required',[
			'required'	=> 'alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('email','email','required',[
			'required'	=> 'email wajib diisi!'
		]);
		$this->form_validation->set_rules('telepon','telepon','required',[
			'required'	=> 'telepon wajib diisi!'
		]);
		$this->form_validation->set_rules('tempat_lahir','tempat lahir','required',[
			'required'	=> 'tempat lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required',[
			'required'	=> 'tanggal lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required',[
			'required'	=> 'jenis kelamin wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','nama prodi','required',[
			'required'	=> 'nama prodi wajib diisi!'
		]);
	}

	public function detail($id)
	{
		$data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/mahasiswa_detail', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where
			mhs.nama_prodi=prd.nama_prodi and mhs.id='$id'")->result();

		$data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
		$data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/mahasiswa_update', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update_mahasiswa_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update();
		}else {
			$id 			= $this->input->post('id');
			$nim			= $this->input->post('nim');
			$nama_lengkap	= $this->input->post('nama_lengkap');
			$alamat			= $this->input->post('alamat');
			$email			= $this->input->post('email');
			$telepon		= $this->input->post('telepon');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$nama_prodi		= $this->input->post('nama_prodi');
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
				'nim'			=> $nim,
				'nama_lengkap'	=> $nama_lengkap,
				'alamat'		=> $alamat,
				'email'			=> $email,
				'telepon'		=> $telepon,
				'tempat_lahir'	=> $tempat_lahir,
				'tanggal_lahir'	=> $tanggal_lahir,
				'jenis_kelamin'	=> $jenis_kelamin,
				'nama_prodi'	=> $nama_prodi,
			);

			$where = array('id' => $id);

			$this->mahasiswa_model->update_data($where,$data,'mahasiswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Mahasiswa Berhasil Diubah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/mahasiswa');
		}
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->mahasiswa_model->hapus_data($where,'mahasiswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Mahasiswa Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/mahasiswa');

	}
}