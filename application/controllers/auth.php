<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        // if ($this->session->has_userdata('level'))
		// { 
        //     redirect($this->session->userdata('level'),'refresh');
        // }
    }
 
    function index(){
        $this->load->view('login');
    }
 
    function login(){
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $dosen = $this->login_model->get_data($username,$password, 'dosen');
        $mhs = $this->login_model->get_data($username,$password, 'mahasiswa');

        if($dosen->num_rows() == 1){ //table Admin
            foreach($dosen->result() as $data){
                $user_data = array(
                    'username' => $data->username,
                    'level' => $data->level
                );
                $this->session->set_userdata($user_data);
            }
            if ($this->session->userdata('level') == 'admin')
                {
                    redirect('admin');
                }
            else if ($this->session->userdata('level') == 'koor')
                {
                    redirect('koor');
                }
            else if ($this->session->userdata('level') == 'pem')
                {
                    redirect('pem');
                }
            else 
                {
                    $text = 'Username dan Password Salah';
                    echo $this->session->set_flashdata('msg',$text);
                    redirect('auth');
                }
        }

        elseif($mhs->num_rows() == 1){ //table Customer
            foreach($mhs->result() as $data){
                $npm = $data->username;
                $id_tim = $this->login_model->execute_query("SELECT id_tim FROM tim WHERE status = 'Y' AND npm1 = '{$npm}' or npm2 = '{$npm}' ")[0]['id_tim'];
                $user_data = array(
                    'username' => $data->username,
                    'level' => 'Mahasiswa',
                    'id_tim' => $id_tim,
                    'keg' => $this->db->query("SELECT keg FROM tim WHERE id_tim = '{$id_tim}'")
                );
                $this->session->set_userdata($user_data);
            }
            redirect('mahasiswa');
        }

        else {
            $text = 'Username dan Password Salah';
            echo $this->session->set_flashdata('msg',$text);
            redirect('auth');
        }
    }
 
    function logout()
    {
        $_SESSION = array();  
        session_destroy();
        redirect('auth');
    }
}