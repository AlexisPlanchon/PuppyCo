<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$page = $this->load->view('V_produit');
	}

	public function category()
	{
		$page = $this->load->view('V_category');
	}
	
	public function produit()
	{
		$page = $this->load->view('V_produit');
	}
	
	public function clients()
	{
		$page = $this->load->view('V_clients');
	}
	
	public function mdp()
	{
		$page = $this->load->view('V_mdp');
	}
	
	public function commands()
	{
		$page = $this->load->view('V_commands');
	}
}
