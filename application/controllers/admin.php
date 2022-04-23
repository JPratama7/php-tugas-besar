<?php 

class admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'admin')
		{ redirect('auth/logout','refresh');}
	}

	function index(){
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/v_daftar_files');
        $this->load->view('admin/v_footer');
	}
}