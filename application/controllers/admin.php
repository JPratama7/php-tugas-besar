<?php 

class admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level') !== 'admin')
		{ redirect('auth/logout','refresh');}
		$this->load->model('admin');
	}

	function index(){
		$this->load->view('admin/v_header');
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/v_daftar_files');
        $this->load->view('admin/v_footer');
	}

	function getAllproposal(){
		$result = $this->admin->execute_query('SELECT * FROM proposal');
        foreach($result->result() as $val){
            foreach($val as $key => $value){
                $user_data=array(

				);
            };
		}
	}

	function getAlllaporan(){
		$result = $this->admin->execute_query('SELECT * FROM laporan');
		foreach($result->result() as $data){
			$udata = array(
				'id' => $data->id_proposal,
				'npm1' => $data->npm1,
				'npm2' => $data->npm2,
				'keg' => $data->keg,
				'judul' => $data->judul,
				'status' => $data->status,
			);
		}
		$this->load->view('test', $udata);
		
	}
}