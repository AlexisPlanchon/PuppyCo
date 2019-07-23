<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database(); //connexion a la base
	}

	public function can_login($username, $password)
	{
		$query = $this->db->select("*")
			->from('users')
			->where('login =', $username)
			->where('password =', $password)
			->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function create_login($username, $password, $email)
	{
		$query_log = $this->db->query("INSERT INTO users (login, password, mail) VALUES ('" . $username . "', '" . $password . "', '" . $email . "')");
		return true;
	}

	public function select_id($username, $password)
	{
		$query = $this->db->select("idusers")
			->from('users')
			->where('login =', $username)
			->where('password =', $password)
			->get();
		return $query->result_array();      //Conversion en tableau PHP
	}
}
