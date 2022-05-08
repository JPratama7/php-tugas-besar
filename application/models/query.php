<?php 
 
class Query extends CI_Model{
    function get_data($sql){
        return $this->db->query($sql)->result_array();
    }

    function input_data($sql){
        return $this->db->query($sql)->result();
    }
}