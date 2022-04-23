<?php 
 
class admin extends CI_Model{

    function getProposal($npm=NULL, $npm2=NULL){

    }

    function execute_query($sql){
        return $this->db->query($sql);
    }

    function get_data($sql){
        return $this->db->query($sql)->result();
    }
}