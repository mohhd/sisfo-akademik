<?php 

class Hubungi extends CI_Controller {

	public function index()
	{
		$data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/hubungi', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function kirim_email($id)
	{
		$where = array('id_hubungi' => $id);
		$data['hubungi'] = $this->hubungi_model->kirim_data($where,'hubungi')->result();
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/form_kirim_email', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function kirim_email_aksi()
	{
		$to_email	= $this->input->post('email');
		$subject	= $this->input->post('subject');
		$message	= $this->input->post('pesan');

		$config = [
			'mailtype'	=> 'html',
			'charset'	=> 'utf-8',
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.gmail.com',
			'smtp_user'	=> 'muhadiazura@gmail.com',
			'smtp_pass'	=> 'muhadi110497',
			'smtp_post'	=> 465,
			'crlf' 		=> "\r\n",
			'newline'	=> "\r\n"
		];

		$this->load->library('email',$config);

		$this->email->from("Universitas Framework Indonesia");

		$this->email->to($to_email);

		$this->email->subject($subject);

		$this->email->message($message);

		if($this->email->send()){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Pesan Terkirim!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/hubungi');
		}else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Pesan Tidak Terkirim!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/hubungi');
		}
	}
}