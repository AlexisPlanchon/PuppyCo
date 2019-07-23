<?php
class Ajaxsearch_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database(); //connexion a la base
	}

	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("mvctable");
		if($query != '')
		{
			$this->db->like('name', $query);
		}
		$this->db->order_by('name', 'DESC');
		return $this->db->get();
	}
}
?>