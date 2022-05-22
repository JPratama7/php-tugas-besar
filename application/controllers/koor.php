<?php

class Koor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !== 'koor') {
			redirect('auth/logout', 'refresh');
		}

		$this->load->model('query');
	}

	function index()
	{
		$mydata = $this->session->flashdata('userdata');
		$this->load->view('koor/v_header', $mydata);
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/v_daftar_files');
		$this->load->view('koor/v_footer');
	}

	function indexsidang()
	{
		$data = array(
			'data' => $this->query->get_data("SELECT tim.id_tim, tim.judul, pem.nama as pembim, peng.nama as penguji, tim.keg, sidang.tanggal FROM tim INNER JOIN sidang ON tim.id_tim = sidang.id_tim INNER JOIN dosen AS pem ON tim.pembim = pem.username INNER JOIN dosen AS peng ON tim.penguji = peng.username"),
			'dosenpeng' => $this->query->get_data()
		);
		// print_r($data);
		$this->load->view('koor/v_header');
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/sidang', $data);
		$this->load->view('koor/v_footer');
	}

	function indexproposal()
	{
		$data['data'] = $this->admin_model->get_data('SELECT * FROM proposal');
		$this->load->view('koor/v_header');
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/proposal', $data);
		$this->load->view('koor/v_footer');
	}

	function indexlaporan()
	{
		$data['data'] = $this->admin_model->get_data('SELECT * FROM laporan');
		$this->load->view('koor/v_header');
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/laporan', $data);
		$this->load->view('koor/v_footer');
	}
}
