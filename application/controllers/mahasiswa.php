<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'Mahasiswa')
		{ redirect('auth/logout','refresh');}
		$this->load->model('admin_model');
	}

	function index(){
		$this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_sidebar');
        $this->load->view('mahasiswa/home');
        $this->load->view('mahasiswa/v_footer');
	}

	function inputproposal(){
		$data = array(
			'dos' => $this->admin_model->get_data('SELECT * FROM dosen WHERE level = "pem"'),
		);
		$this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_sidebar');
        $this->load->view('mahasiswa/proposal', $data);
        $this->load->view('mahasiswa/v_footer');
	}

	function insertproposal(){
		$data = array(
			'id_tim' => rand(1000, 99999),
			'pembim' => $this->input->post('dospem'),
			'npm1' => $this->input->post('npm1'),
			'npm2' => $this->input->post('npm2'),
			'keg' => $this->input->post('proyek'),
			'judul' => $this->input->post('judul_proyek'),
			'status' => 'N',
			'abstrak' => $this->input->post('abstraksi'),
			'file' => $this->input->post('npm1'),
		);
		$this->db->insert('tim', $data);
		redirect('mahasiswa/index');
	}

	function indexbimbingan(){
		$npm = $this->session->userdata('username');
		$id_tim = $this->admin_model->get_data('SELECT id_tim FROM tim WHERE status = "Y" AND npm1 = "{$npm}" or npm2 = "{$npm}" ');
		$data = array(
			'tim' => $this->admin_model->get_data('SELECT * FROM tim WHERE status = "Y" AND npm1 = "{$npm}" or npm2 = "{$npm}"'),
			'bim' => $this->admin_model->get_data('SELECT * FROM bimbingan WHERE id_tim = "{$id_tim}"'),
		);
		if(!empty($id_tim)){
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

	}
}