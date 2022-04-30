<?php 
 
class admin_model extends CI_Model{
    function get_data($sql){
        return $this->db->query($sql)->result_array();
    }
}