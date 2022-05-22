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

	function indextim()
	{
		$this->db->join('dosen as pem', 'tim.pembim = pem.username', 'inner');
		$this->db->join('dosen as peng', 'tim.penguji = peng.username', 'inner');
		$this->db->join('mahasiswa as mhs1', 'tim.npm1 = mhs1.username', 'inner');
		$this->db->join('mahasiswa as mhs2', 'tim.npm2 = mhs2.username', 'inner');
		$this->db->select('tim.id_tim ,tim.keg, tim.judul, tim.status, tim.abstrak, tim.status, pem.nama as pem, peng.nama as peng, mhs1.nama as mhs1, mhs2.nama as mhs2');
		$team = $this->db->get('tim')->result_array();
		$data = array(
			'tim' => $team
		);
		$this->load->view('koor/v_header');
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/tim', $data);
		$this->load->view('koor/v_footer');
	}

	function indexsidang()
	{
		$data = array(
			'data' => $this->query->get_data("SELECT tim.id_tim, tim.judul, pem.nama as pembim, peng.nama as penguji, tim.keg, sidang.tanggal as tanggal FROM tim INNER JOIN sidang ON tim.id_tim = sidang.id_tim INNER JOIN dosen AS pem ON tim.pembim = pem.username INNER JOIN dosen AS peng ON tim.penguji = peng.username"),
			'penguji' => $this->query->get_data("SELECT username, nama FROM dosen")
		);
		$this->load->view('koor/v_header');
		$this->load->view('koor/v_sidebar');
		$this->load->view('koor/sidang', $data);
		$this->load->view('koor/v_footer');
	}

	function insertpenguji()
	{
		$data = array(
			'penguji' => $this->input->post('penguji')
		);

		$this->db->update('tim', $data, array(
			'id_tim' => $this->input->post('id_tim')
		));
		redirect('koor/indexsidang');
	}

	function insertjadwalsidang()
	{
		$data = array(
			'tanggal' => $this->input->post('jadwal')
		);
		$this->db->update('sidang', $data, array(
			'id_tim' => $this->input->post('id')
		));
		redirect('koor/indexsidang');
	}

	function insertkeg()
	{
		$data = array(
			''
		);
	}

	function downloadDraf()
	{
		$id = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
		$this->load->helper('download');
		$file_data = $this->query->get_data("SELECT file_draf FROM tim WHERE id_tim = {$id}")[0];
		if (!is_null($file_data['file_draf'])) {
			$file_raw = $file_data['file_draf'];
			force_download($id . ".pdf", $file_raw);
		} else {
			$this->session->set_flashdata('msg', 'File tidak ditemukan');
			redirect('koor/indextim');
		}
	}

	function downloadPropos()
	{
		$id = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
		$this->load->helper('download');
		$file_data = $this->query->get_data("SELECT file_proposal FROM tim WHERE id_tim = {$id}")[0];
		if (!is_null($file_data['file_proposal'])) {
			$file_raw = $file_data['file_proposal'];
			force_download($id . ".pdf", $file_raw);
		} else {
			$this->session->set_flashdata('msg', 'File tidak ditemukan');
			redirect('koor/indextim');
		}
	}

	function downloadAkhir()
	{
		$id = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
		$this->load->helper('download');
		$file_data = $this->query->get_data("SELECT file_final FROM tim WHERE id_tim = {$id}")[0];
		if (!is_null($file_data['file_final'])) {
			$file_raw = $file_data['file_final'];
			force_download($id . ".pdf", $file_raw);
		} else {
			$this->session->set_flashdata('msg', 'File tidak ditemukan');
			redirect('koor/indextim');
		}
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
