<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); //connexion a la base
    }

    public function select_cart($id){
		        $query = $this->db->query("SELECT * FROM testmvc.cart, mvctable where mvctable.idmvctable = cart.iditem and idusers = '1'");
	
        return $query->result_array();      //Conversion en tableau PHP
		
	}
	
	public function remove_cart($id){
		        $query = $this->db->query("SELECT idusers, iditem, quantity FROM cart where iditem='".$id."' and idusers='1'");
				$result = $query->result_array(); 
				foreach ($result as $row) { 
					$quantity = $row['quantity']; 
				
				if($quantity > 1){
					$query = $this->db->query("UPDATE CART SET quantity = quantity-1  where iditem='".$id."' and idusers='1'");	
				}else{
					$query = $this->db->query("DELETE FROM cart where iditem='".$id."' and idusers='".$_SESSION['idclient']."'");	
				}
				}
	}
	
	
	public function insert($id){
		
		$query = $this->db->query("DELETE FROM cart where idusers='".$_SESSION['idclient']."'");	
		$query = $this->db->query("INSERT INTO commands (idusers, date)VALUES('".$_SESSION['idclient']."', NOW())");			
				
	}
}
