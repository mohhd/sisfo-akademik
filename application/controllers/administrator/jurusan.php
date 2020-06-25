<?php 

class Jurusan extends CI_Controller {
	public function index()
	{
		$data['jurusan'] = $this->jurusan_model->tampil_data()->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/jurusan.php', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	} 

	public function input()
	{
		$data = array(
			'id_jurusan'	=> set_value('id_jurusan'),
			'kode_jurusan'	=> set_value('kode_jurusan'),
			'nama_jurusan'	=> set_value('nama_jurusan'),
		);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/jurusan_form', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else {
			$data = array(
				'kode_jurusan'	=> $this->input->post('kode_jurusan', TRUE),
				'nama_jurusan'	=> $this->input->post('nama_jurusan', TRUE),
			);

			$this->jurusan_model->input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Jurusan Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/jurusan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_jurusan','kode_jurusan','required',[
			'required'	=> 'kode jurusan wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_jurusan','nama_jurusan','required',[
			'required'	=> 'nama jurusan wajib diisi!'
		]);
	}

	public function update($id)
	{
		$where = array('id_jurusan' => $id);
		$data['jurusan'] = $this->jurusan_model->edit_data($where,'tb_jurusan')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/jurusan_update', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');

		$data = array(
			'kode_jurusan'	=> $kode_jurusan,
			'nama_jurusan'	=> $nama_jurusan
		);

		$where = array(
			'id_jurusan'	=> $id
		);

		$this->jurusan_model->update_data($where,$data,'tb_jurusan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Jurusan Berhasil Diupdate!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/jurusan');
	}

	public function delete($id)
	{
		$where = array('id_jurusan' => $id);
		$this->jurusan_model->hapus_data($where,'tb_jurusan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Jurusan Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/jurusan');

	}
}