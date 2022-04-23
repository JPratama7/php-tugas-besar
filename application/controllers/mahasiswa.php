<?php 

class mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'Mahasiswa')
		{ redirect('auth/logout','refresh');}
	}

	function index(){
		$this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_sidebar');
        $this->load->view('mahasiswa/v_daftar_files');
        $this->load->view('mahasiswa/v_footer');
	}
}