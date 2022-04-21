<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    function __construct(){
        $this->load->model('auth');
    }

    function index()
    {
        $this->load->view('login');
    }

    function login(){
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $dosen = $this->auth->get_auth($uname, $password, 'dosen');
        if(count($dosen) != 0){
            $this->session->set_userdata('nama',$dosen['username']);
            echo $dosen['username'];
        }else{
            $this->session->set_userdata('nama',$dosen['username']);
            echo $dosen['username'];
        }
        
    }
}
