<?php

class Pem extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !== 'pem') {
			redirect('auth/logout', 'refresh');
		}
		$this->load->model('query');
	}

	function index()
	{
		$this->load->view('pembimbing/v_header');
		$this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/home');
		$this->load->view('pembimbing/v_footer');
	}

	function indexbimbingan()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nilai_ket', 'Nilai Ketua', 'require');
		$this->form_validation->set_rules('nilai_part', 'Nilai Partner', 'require');
		$this->form_validation->set_rules('approve', 'Approve', 'require');
		$this->form_validation->set_rules('pesan', 'Pesan', 'require');

		if ($this->form_validation->run() != false) {
		} else {
			$uname = $this->session->userdata('username');
			$id_tim = $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND pembim = '{$uname}'")[0]['id_tim'];
			$data = array(
				'bim' => $this->query->get_data("SELECT tim.npm1, tim.keg, bimbingan.id_bimbingan, bimbingan.nilai_ket, bimbingan.nilai_part, bimbingan.pesan, bimbingan.kegiatan FROM bimbingan INNER JOIN tim ON bimbingan.id_tim = tim.id_tim WHERE bimbingan.id_tim = {$id_tim}")
			);
			$this->load->view('pembimbing/v_header');
			$this->load->view('pembimbing/v_sidebar');
			$this->load->view('pembimbing/bimbingan', $data);
			$this->load->view('pembimbing/v_footer');
		}
	}

	function downloadBimbingan()
	{
		$id = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
		$this->load->helper('download');
		if (!is_null($id)) {
			$file_data = $this->query->get_data("SELECT file_bim FROM bimbingan WHERE id_bimbingan = {$id}")[0];
			$file_raw = $file_data['file_bim'];
			force_download($id . ".pdf", $file_raw);
		} else {
			echo "Error GBLK " . $this->upload->display_errors();
		}
	}

	function updatebim()
	{
		$data = [
			'nilai_ket' => $this->input->post('nilai_ket'),
			'nilai_part' => $this->input->post('nilai_part'),
			'approv' => $this->input->post('approve'),
			'pesan' => $this->input->post('pesan')
		];
		$this->db->set($data);
		$this->db->where('id_bimbingan', $this->input->post('id_bimbingan'),);
		$this->db->update('bimbingan');
		redirect(base_url('pem/indexbimbingan'));
	}

	function jadwalsidang()
	{
		$data['data'] = $this->query->get_data('SELECT * FROM proposal');
		$this->load->view('pembimbing/v_header');
		$this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/jadwal', $data);
		$this->load->view('pembimbing/v_footer');
	}

	function sidang()
	{
		$data['data'] = $this->query->get_data('SELECT * FROM laporan');
		$this->load->view('pembimbing/v_header');
		$this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/sidang', $data);
		$this->load->view('pembimbing/v_footer');
	}
}
