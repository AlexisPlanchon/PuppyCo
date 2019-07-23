<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_produit extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
			
            $query = $this->db->select('*')->from('mvctable')->where('idmvctable', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }

        $query =  $this->db->query('SELECT mvctable.idmvctable, mvctable.name, mvctable.prix, mvctable.description, mvctable.category, mvctable.stock, category.category FROM testmvc.mvctable, testmvc.category where category.idcategory = mvctable.category;');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($name, $description, $prix, $stock, $select_cat)
    {
		$query_cat = $this->db->query("INSERT INTO testmvc.mvctable (name, description, prix, stock, category) VALUES ('".$name."', '".$description."', '".$prix."', '".$stock."', '".$select_cat."')");

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }

    public function update($name, $id, $prix, $description, $stock, $select_cat)
    {
		$query = $this->db->query("UPDATE mvctable SET name = '".$name."', prix = '".$prix."', description = '".$description."', stock = '".$stock."', category = '".$select_cat."' WHERE idmvctable = '".$id."'");

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }
	
	
    public function delete($id)
    {
        $this->db->where('idmvctable', $id)->delete('mvctable');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

}