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
		$uname = $this->session->userdata('username');
		$data_tim = $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND pembim = '{$uname}'");
		$list_tim = array();
		foreach ($data_tim as $dt) {
			array_push($list_tim, $dt['id_tim']);
		};
		$this->db->join('tim', 'bimbingan.id_tim = tim.id_tim');
		$this->db->where_in('bimbingan.id_tim', $list_tim);
		$this->db->select('tim.npm1, tim.keg, bimbingan.id_bimbingan, bimbingan.nilai_ket, bimbingan.nilai_part, bimbingan.pesan, bimbingan.kegiatan');
		$data_bimbingan = $this->db->get('bimbingan')->result_array();
		$data = array(
			'bim' => $data_bimbingan
		);
		$this->load->view('pembimbing/v_header');
		$this->load->view('pembimbing/v_sidebar');
		$this->load->view('pembimbing/bimbingan', $data);
		$this->load->view('pembimbing/v_footer');
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

	function indexjadwal()
	{
		$this->db->join('mahasiswa as mhs1', 'tim.npm1 = mhs1.username', 'inner');
		$this->db->join('mahasiswa as mhs2', 'tim.npm2 = mhs2.username', 'inner');
		$this->db->join('sidang', 'sidang.id_tim = tim.id_tim', 'inner');
		$this->db->where('pembim', $this->session->userdata('username'));
		$this->db->or_where('penguji', $this->session->userdata('username'));
		$this->db->select('tim.id_tim ,tim.keg, tim.judul, tim.status, tim.abstrak, tim.status, mhs1.nama as mhs1, mhs2.nama as mhs2, tim.file_draf, sidang.revisi_app, sidang.sidang_app, sidang.nilai_ket, sidang.nilai_part, sidang.revisi');
		$team = $this->db->get('tim')->result_array();
		$data = array(
			'sidang' => $team
		);
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
