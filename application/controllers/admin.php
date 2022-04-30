<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		if ($this->session->userdata('level') !== 'admin')
		{ redirect('auth/logout','refresh');}
	}

	function index(){
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/home');
        $this->load->view('admin/v_footer');
	}

	function indexmahasiswa(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM mahasiswa');
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/proyek1', $data);
        $this->load->view('admin/v_footer');
	}

	function indexkegiatan(){
		$data['data'] = $this->admin->get_data('SELECT * FROM kegiatan');
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/proyek1', $data);
        $this->load->view('admin/v_footer');
	}

	function indexdosen(){
		$data['data'] = $this->admin->get_data('SELECT * FROM dosen WHERE level != "admin"');
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/proyek1', $data);
        $this->load->view('admin/v_footer');
	}
}