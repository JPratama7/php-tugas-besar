<?php 

class Pem extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'pem')
		{ redirect('auth/logout','refresh');}
	}

	function index(){
		$this->load->view('pembimbing/v_header');
        $this->load->view('pembimbing/v_sidebar');
        $this->load->view('pembimbing/v_daftar_files');
        $this->load->view('pembimbing/v_footer');
	}

	function indexbimbingan(){
		$data['data'] = $this->admin_model->get_data('SELECT * FROM bimbingan');
		$this->load->view('pembimbing/v_header');
        $this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/bimbingan', $data);
        $this->load->view('pembimbing/v_footer');
	}

	function jadwalsidang(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM proposal');
		$this->load->view('pembimbing/v_header');
        $this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/jadwal', $data);
        $this->load->view('pembimbing/v_footer');
	}

	function sidang(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM laporan');
		$this->load->view('pembimbing/v_header');
        $this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/sidang', $data);
        $this->load->view('pembimbing/v_footer');
	}

}