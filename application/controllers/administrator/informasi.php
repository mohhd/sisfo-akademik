<?php 

class Informasi extends CI_Controller {
	public function index()
	{
		$data['informasi'] = $this->informasi_model->tampil_data('informasi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/informasi', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_informasi()
	{
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/informasi_form');
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function tambah_informasi_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_informasi();
		}else {
			$id_informasi		= $this->input->post('id_informasi');
			$icon				= $this->input->post('icon');
			$judul_informasi	= $this->input->post('judul_informasi');
			$isi_informasi		= $this->input->post('isi_informasi');


			$data = array(
				'icon'				=> $icon,
				'judul_informasi'	=> $judul_informasi,
				'isi_informasi'		=> $isi_informasi,
			);

			$this->informasi_model->insert_data($data,'informasi');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Informasi Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/informasi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('icon','icon','required',[
			'required'	=> 'icon wajib diisi!'
		]);
		$this->form_validation->set_rules('judul_informasi','judul_informasi','required',[
			'required'	=> 'judul informasi wajib diisi!'
		]);
		$this->form_validation->set_rules('isi_informasi','isi_informasi','required',[
			'required'	=> 'isi_informasi wajib diisi!'
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
		$where = array('id_informasi' => $id);
		$data['informasi'] = $this->informasi_model->edit_data($where,'informasi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/informasi_update', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update_informasi_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update();
		}else {
			$id					= $this->input->post('id_informasi');
			$icon				= $this->input->post('icon');
			$judul_informasi	= $this->input->post('judul_informasi');
			$isi_informasi		= $this->input->post('isi_informasi');


			$data = array(
				'icon'				=> $icon,
				'judul_informasi'	=> $judul_informasi,
				'isi_informasi'		=> $isi_informasi,
			);

			$where = array('id_informasi' => $id);

			$this->informasi_model->update_data($where,$data,'informasi');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Informasi Berhasil Diubah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/informasi');
		}
	}

	public function delete($id)
	{
		$where = array('id_informasi' => $id);
		$this->informasi_model->hapus_data($where,'informasi');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Informasi Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/informasi');

	}
}