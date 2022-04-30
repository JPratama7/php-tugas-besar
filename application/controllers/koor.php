<?php 

class Koor extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'koor')
		{ redirect('auth/logout','refresh');}
	}

	function index(){
		$mydata = $this->session->flashdata('userdata');
		$this->load->view('koor/v_header', $mydata);
        $this->load->view('koor/v_sidebar');
        $this->load->view('koor/v_daftar_files');
        $this->load->view('koor/v_footer');
	}

	function indexkegiatan(){
		$data['data'] = $this->admin_model->get_data('SELECT * FROM proposal');
		$this->load->view('koor/v_header');
        $this->load->view('koor/v_sidebar');
		$this->load->view('koor/kegiatan', $data);
        $this->load->view('koor/v_footer');
	}

	function indexproposal(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM proposal');
		$this->load->view('koor/v_header');
        $this->load->view('koor/v_sidebar');
		$this->load->view('koor/proposal', $data);
        $this->load->view('koor/v_footer');
	}

	function indexlaporan(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM laporan');
		$this->load->view('koor/v_header');
        $this->load->view('koor/v_sidebar');
		$this->load->view('koor/laporan', $data);
        $this->load->view('koor/v_footer');
	}
}