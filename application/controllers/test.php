<?php 

class test extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	// function index(){
	// 	$result = $this->admin->execute_query('SELECT * FROM proposal');
    //     foreach($result->result() as $val){
    //         foreach($val as $key => $value){
    //             $this->session->set_userdata($key, $value);
    //         };
	// 	}

	// 	$this->load->view('test');
	// }

	// function index(){

	// 	$result = $this->admin->execute_query('SELECT * FROM proposal');
	// 	foreach($result->result() as $data){
	// 		$user_data = array(
	// 			'id' => $data->id_proposal,
	// 			'npm1' => $data->npm1,
	// 			'npm2' => $data->npm2,
	// 			'keg' => $data->keg,
	// 			'judul' => $data->judul,
	// 			'status' => $data->status,
	// 		);
	// 		$this->session->set_userdata('otomatis',$user_data);
	// 	}
	// 	$this->load->view('test');
		
	// }

    function index(){
        $data['data'] = $this->admin_model->get_data('SELECT * FROM proposal');
		// $data = array(1,2,'hjelloe');
		print_r($data);
		$this->load->view('test', $data);
    }
}