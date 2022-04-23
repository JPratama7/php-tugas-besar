<?php 

class pem extends CI_Controller{

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
}