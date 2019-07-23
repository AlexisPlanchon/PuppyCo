<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_client extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('users')->where('idusers', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }

        $query = $this->db->select('*')->from('users')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($login, $mail)
    {
		$query_cat = $this->db->query("INSERT INTO testmvc.users (login, mail) VALUES ('".$login."', '".$mail."')");

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }

    public function update($mail, $login, $id)
    {
		$query = $this->db->query("UPDATE users SET mail = '".$mail."', login = '".$login."' WHERE idusers = '".$id."'");

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('idusers', $id)->delete('users');

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