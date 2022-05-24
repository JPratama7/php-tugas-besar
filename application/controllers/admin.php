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
		$npm = $this->session->userdata('username');
		$id_tim = $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND npm1 = '{$npm}' or npm2 = '{$npm}' ")[0]['id_tim'];
		if (!empty($id_tim)) {
			$data = array(
				'tim' => $this->query->get_data("SELECT id_tim FROM tim WHERE status = 'Y' AND npm1 = '{$npm}' or npm2 = '{$npm}' ")[0]['id_tim'],
				'bim' => $this->query->get_data("SELECT * FROM bimbingan WHERE id_tim = '{$id_tim}'"),
			);
			$this->load->view('mahasiswa/v_header');
			$this->load->view('mahasiswa/v_sidebar');
			$this->load->view('mahasiswa/bimbingan', $data);
			$this->load->view('mahasiswa/v_footer');
		} else {
			$this->session->set_flashdata('msg', 'Data tidak ditemukan');
			redirect('mahasiswa/index');
		}

		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/mahasiswa',$data);
        $this->load->view('admin/v_footer');
	}

	function indexkegiatan(){

		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/kegiatan');
        $this->load->view('admin/v_footer');
	}

	function indexdprodi(){
		
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/pstudi');
        $this->load->view('admin/v_footer');
	}

	function indexdosen(){
		
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
		$this->load->view('admin/dosen');
        $this->load->view('admin/v_footer');
	}
}