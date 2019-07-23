<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('category')->where('idcategory', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }

        $query = $this->db->select('*')->from('category')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($city)
    {
		$query_cat = $this->db->query("INSERT INTO testmvc.category (category) VALUES ('".$city."')");

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }

    public function update($city, $id)
    {
		$query = $this->db->query("UPDATE category SET category = '".$city."' WHERE idcategory = '".$id."'");

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('idcategory', $id)->delete('category');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    private function _setCity($city)
    {
        return array(
            'name' => $city['name']
        );
    }
}