<?php 

class Prodi extends CI_Controller {

	public function index()
	{
		$data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/prodi.php', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_prodi()
	{
		$data['jurusan'] = $this->prodi_model->tampil_data('tb_jurusan')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/prodi_form', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_prodi_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_prodi();
		}else {
			$kode_prodi		= $this->input->post('kode_prodi');
			$nama_prodi		= $this->input->post('nama_prodi');
			$nama_jurusan	= $this->input->post('nama_jurusan');

			$data = array(
				'kode_prodi'	=> $kode_prodi,
				'nama_prodi'	=> $nama_prodi,
				'nama_jurusan'	=> $nama_jurusan,
			);

			$this->prodi_model->insert_data($data,'prodi');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/prodi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_prodi','kode_prodi','required',[
			'required'	=> 'kode prodi wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','nama_prodi','required',[
			'required'	=> 'nama prodi wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_jurusan','nama_jurusan','required',[
			'required'	=> 'nama jurusan wajib diisi!'
		]);
	}

	public function update($id)
	{
		$where = array('id_prodi' => $id);
		$data['prodi'] = $this->db->query("select * from prodi prd, tb_jurusan jrs where
			prd.nama_jurusan=jrs.nama_jurusan and
			prd.id_prodi='$id'")->result();

		$data['jurusan'] = $this->prodi_model->tampil_data('tb_jurusan')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/prodi_update', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_prodi');
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi = $this->input->post('nama_prodi');
		$nama_jurusan = $this->input->post('nama_jurusan');

		$data = array(
			'kode_prodi'	=> $kode_prodi,
			'nama_prodi'	=> $nama_prodi,
			'nama_jurusan'	=> $nama_jurusan
		);

		$where = array(
			'id_prodi'	=> $id
		);

		$this->prodi_model->update_data($where,$data,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Diupdate!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/prodi');
	}

	public function delete($id)
	{
		$where = array('id_prodi' => $id);
		$this->prodi_model->hapus_data($where,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/prodi');

	}
}