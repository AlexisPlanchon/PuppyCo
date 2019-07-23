<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pay extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); //connexion a la base
    }

    public function select_cart($id){
		        $query = $this->db->query("SELECT * FROM testmvc.cart, mvctable where mvctable.idmvctable = cart.iditem and idusers = '1'");
	
        return $query->result_array();      //Conversion en tableau PHP
		
	}
	
	
	public function insert($id){
		
		$query = $this->db->query("DELETE FROM cart where idusers='".$_SESSION['idclient']."'");	
		$query = $this->db->query("INSERT INTO commands (idusers, date)VALUES('".$_SESSION['idclient']."', NOW())");			
				
	}
}
