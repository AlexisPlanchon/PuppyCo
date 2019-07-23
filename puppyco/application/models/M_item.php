<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); //connexion a la base
    }
	
	
	public function select_item($id){
		        $query = $this->db->select("*")
                ->from('mvctable')
				->where('idmvctable =', $id)
                ->get();
	
        return $query->result_array();      //Conversion en tableau PHP
		
	}
	
	public function select_reviews($id){
		        $query = $this->db->select("*")
                ->from('reviews')
				->where('id_item =', $id)
                ->get();
	
        return $query->result_array();      //Conversion en tableau PHP
		
	}
	
}
