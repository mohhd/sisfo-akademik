<?php

class Nilai extends CI_Controller {

	public function index()
	{
		$data = array(
			'nim'	=> set_value('nim'),
			'id_tahunakademik'	=> set_value('id_tahunakademik')
		);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/masuk_khs', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function nilai_khs()
	{
		$this->_rulesKhs();

		if ($this->form_validation->run() == FALSE){
			$this->index();
		}else {
			$nim			= $this->input->post('nim',TRUE);
			$thn_akademik	= $this->input->post('id_tahunakademik',TRUE);

			$query = "SELECT krs.id_tahunakademik
							,krs.kode_matakuliah
							,matakuliah.nama_matakuliah
							,matakuliah.sks
							,krs.nilai
						FROM
							krs
						INNER JOIN matakuliah
						ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
						WHERE krs.nim = $nim AND krs.id_tahunakademik = $thn_akademik";
			$sql = $this->db->query($query)->result();

			$smt = $this->db->select('tahun_akademik, semester')
							->from('tahun_akademik')
							->where(array('id_tahunakademik' => $thn_akademik))->get()->row();

			$query_str = "SELECT mahasiswa.nim
								,mahasiswa.nama_lengkap
								,prodi.nama_prodi
							FROM
								mahasiswa
							INNER JOIN prodi
							ON (mahasiswa.nama_prodi = prodi.nama_prodi);";
			$mhs = $this->db->query($query_str)->row();

			if($smt->semester == 1){
				$tampilSemester = "Ganjil";
			}else {
				$tampilSemester = "Genap";
			}
		}

		$data = array(
			'mhs_data'	=> $sql,
			'mhs_nim'	=> $nim,
			'mhs_nama'	=> $mhs->nama_lengkap,
			'mhs_prodi'	=> $mhs->nama_prodi,
			'thn_akademik'	=> $smt->tahun_akademik."(".$tampilSemester.")",
		);
		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/khs', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function _rulesKhs()
	{
		$this->form_validation->set_rules('nim','nim','required',[
			'required'	=> 'nim wajib diisi!'
		]);
		$this->form_validation->set_rules('id_tahunakademik','id_tahunakademik','required',[
			'required'	=> 'tahun akademik wajib diisi!'
		]);
	}

	public function input_nilai()
	{
		$data = array(
			'kode_matakuliah'	=> set_value('kode_matakuliah'),
			'id_tahunakademik'	=> set_value('id_tahunakademik')
		);

		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/input_nilai_form', $data);
		$this->load->view('administrator/templates_administrator/footer.php');
	}

	public function input_nilai_aksi()
	{
		$this->_rulesInputNilai();

		if ($this->form_validation->run() == FALSE){
			$this->input_nilai();
		}else {
			$kode_matakuliah = $this->input->post('kode_matakuliah',TRUE);
			$id_tahunakademik = $this->input->post('id_tahunakademik',TRUE);

			$this->db->select('k.id_krs,k.nim,m.nama_lengkap,k.nilai,d.nama_matakuliah');
			$this->db->from('krs as k');
			$this->db->join('mahasiswa as m','m.nim = k.nim');
			$this->db->join('matakuliah as d','k.kode_matakuliah = d.kode_matakuliah');
			$this->db->where('k.id_tahunakademik',$id_tahunakademik);
			$this->db->where('k.kode_matakuliah',$kode_matakuliah);
			$query = $this->db->get()->result();

			$data = array(
				'list_nilai'	=> $query,
				'kode_matakuliah'	=> $kode_matakuliah,
				'id_tahunakademik'	=> $id_tahunakademik
			);

			$this->load->view('administrator/templates_administrator/header.php');
			$this->load->view('administrator/templates_administrator/sidebar.php');
			$this->load->view('administrator/form_nilai', $data);
			$this->load->view('administrator/templates_administrator/footer.php');
		}
	}

	public function _rulesInputNIlai()
	{
		$this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required',[
			'required'	=> 'kode matakuliah wajib diisi!'
		]);
		$this->form_validation->set_rules('id_tahunakademik','id_tahunakademik','required',[
			'required'	=> 'tahun akademik wajib diisi!'
		]);
	}

	public function simpan_nilai()
	{
		$query 	= array();
		$id_krs	= $_POST['id_krs'];
		$nilai 	= $_POST['nilai'];

		$data = array(
			'id_krs'	=> set_value('id_krs'),
		);

		for ($i=0;$i<sizeof($id_krs);$i++)
		{
			$this->db->set('nilai',$nilai[$i])->where('id_krs',$id_krs[$i])->update('krs');
		}

		$this->load->view('administrator/templates_administrator/header.php');
		$this->load->view('administrator/templates_administrator/sidebar.php');
		$this->load->view('administrator/daftar_nilai', $data);
		$this->load->view('administrator/templates_administrator/footer.php');

	}


}