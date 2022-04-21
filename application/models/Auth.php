<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Model{

    function get_auth($uname = null, $pass = null, $table = null){
        return $this->db->query("SELECT * FROM '$$table' WHERE nip='$username' AND pass=MD5('$password') LIMIT 1");
    }
}