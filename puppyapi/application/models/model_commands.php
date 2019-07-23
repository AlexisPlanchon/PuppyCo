<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_commands extends CI_Model
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

        $query = $this->db->query('SELECT commands.idcommands,  commands.idusers,  commands.date, users.login FROM testmvc.commands, testmvc.users where users.idusers = commands.idusers');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($idusers)
    {
		$query_cat = $this->db->query("INSERT INTO testmvc.commands (idusers, date) VALUES ('".$idusers."', NOW())");

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }

	
    public function update($idusers, $idcommands, $date)
    {
		$query = $this->db->query("UPDATE commands SET idusers = '".$idusers."', date = '".$date."' WHERE idcommands = '".$idcommands."'");

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }
	
	
    public function delete($id)
    {
        $this->db->where('idcommands', $id)->delete('commands');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

}