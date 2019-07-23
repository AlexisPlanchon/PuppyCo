<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_index extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); //connexion a la base
    }

    public function select_random_six() {
		$numbermax = $this->db->count_all('mvctable'); 
		
		$i=0;
		$idarrayimage = array();
		while ($i<8)
		{
			$image = rand(1, $numbermax-1);
			if (!in_array($image, $idarrayimage)) {
				$idarrayimage[] = $image;       
				$i++;
			}
		}
		
		
        $query = $this->db->select("*")
                ->from('mvctable')
				->where('idmvctable =', $idarrayimage[0])
				->or_where('idmvctable =', $idarrayimage[1])
				->or_where('idmvctable =', $idarrayimage[2])
				->or_where('idmvctable =', $idarrayimage[4])
				->or_where('idmvctable =', $idarrayimage[4])
				->or_where('idmvctable =', $idarrayimage[5])
				->or_where('idmvctable =', $idarrayimage[6])
                ->get();
		
        return $query->result_array();      //Conversion en tableau PHP
    }

	
	
    public function select_category() {

        $query_cat = $this->db->query("SELECT category FROM category");
	
        return $query_cat->result_array();      //Conversion en tableau PHP
    }
	
	
	
	public function select_item_category($id){
		$query = $this->db->query("SELECT * FROM testmvc.mvctable, testmvc.category where mvctable.category = category.idcategory and category.category = '".$id."'");
	
        return $query->result_array();      //Conversion en tableau PHP
		
	}
	
	public function addcart($id){
				$iduser = $_SESSION['idclient'];
		        $query = $this->db->query("SELECT idusers, iditem FROM cart where iditem='".$id."' and idusers='".$iduser."'");
				$nbrow_sql = $query->num_rows();
				if($nbrow_sql == 0){
					$query = $this->db->query("INSERT INTO cart (idusers, iditem) VALUES ('".$iduser."', '".$id."')");	
				}else{
					$query = $this->db->query("UPDATE CART SET quantity = quantity+1  where iditem='".$id."' and idusers='".$iduser."'");	
				}
	}
}
