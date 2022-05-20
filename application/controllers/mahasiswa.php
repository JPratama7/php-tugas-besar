<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'Mahasiswa')
		{ redirect('auth/logout','refresh');}
		$this->load->model('query');
		$this->load->helper('form');
		$this->load->library('form_validation');
		// UPLOAD Libraray
		$config['upload_path']          = 'upload/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	function index(){
		$this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_sidebar');
        $this->load->view('mahasiswa/home');
        $this->load->view('mahasiswa/v_footer');
	}

	function inputproposal(){
		$data = array(
			'dos' => $this->query->get_data('SELECT * FROM dosen WHERE level = "pem"'),
		);
		$this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_sidebar');
        $this->load->view('mahasiswa/proposal', $data);
        $this->load->view('mahasiswa/v_footer');
	}

	function insertproposal(){
		if ( !$this->upload->do_upload('proposal'))
		{
				echo "Error GBLK ".$this->upload->display_errors();
		}
		else
		{
			$data = array(
				'id_tim' => rand(1000, 99999),
				'pembim' => $this->input->post('dospem'),
				'npm1' => $this->input->post('npm1'),
				'npm2' => $this->input->post('npm2'),
				'keg' => $this->input->post('proyek'),
				'judul' => $this->input->post('judul_proyek'),
				'status' => 'N',
				'abstrak' => $this->input->post('abstraksi'),
				'file_proposal' => file_get_contents($this->upload->data('full_path'))
			);
			$this->db->insert('tim', $data);
			redirect(base_url('mahasiswa/index'));
		}
	}

	function indexbimbingan(){
		$npm = $this->session->userdata('username');
		$id_tim = $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND npm1 = '{$npm}' or npm2 = '{$npm}' ")[0]['id_tim'];
		if(!empty($id_tim)){
			$data = array(
				'tim' => $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND npm1 = '{$npm}' or npm2 = '{$npm}' ")[0]['id_tim'],
				'bim' => $this->query->get_data("SELECT * FROM bimbingan WHERE id_tim = '{$id_tim}'"),
			);
			$this->load->view('mahasiswa/v_header');
			$this->load->view('mahasiswa/v_sidebar');
			$this->load->view('mahasiswa/bimbingan', $data);
			$this->load->view('mahasiswa/v_footer');
		} else{
			$this->session->set_flashdata('msg','Data tidak ditemukan');
			redirect('mahasiswa/index');
		}
	}

	function insertbim(){
		print_r($this->input->post());
		print_r($this->upload->data());
		print_r($_FILES);
		if (!$_FILES)
		{
			$this->session->set_flashdata('msg','File tidak ditemukan');
			redirect(base_url('mahasiswa/index'));
		} else{
			$file_raw = file_get_contents($_FILES['tmp_name']);
			$data = array(   
				'id_tim' => rand(1000, 99999),
				'kegiatan' => $this->input->post('kegiatan'),
				'id_tim' => $this->session->userdata('id_tim'),
				'file_bim' => $file_raw
			);
			$this->db->insert('bimbingan', $data);
			redirect('mahasiswa/indexbimbingan');
		}
	}

	function inputDraf(){
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/v_sidebar');
		$this->load->view('mahasiswa/draft');
		$this->load->view('mahasiswa/v_footer');
	}

	function insertDraf(){

	}

	function inputDokAk(){
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/v_sidebar');
		$this->load->view('mahasiswa/dokumenakhir');
		$this->load->view('mahasiswa/v_footer');
	}

	function insertDokAk(){

	}
}