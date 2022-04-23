<?php 

class koor extends CI_Controller{

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
}