<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cart extends CI_Controller {

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
	public function index()
	{
        $page = $this->load->view('V_Cart');
	}
	
	public function selectcard($id)
	{
		$this->load->model('M_cart');
		$array_cart = $this->M_cart->select_cart($id);
		$data['result_cart']= $array_cart;
        $page = $this->load->view('V_Cart', $data);
	}
	
	public function removecart($id)
	{
		$this->load->model('M_cart');
		$remove_cart = $this->M_cart->remove_cart($id);
		$array_cart = $this->M_cart->select_cart($id);
		$data['result_cart']= $array_cart;	
        $page = $this->load->view('V_Cart', $data);
	}
	
	public function addcart($id) {
		$this->load->model('M_cart');
		$array_cart = $this->M_cart->select_cart($id);
		$data['result_cart']= $array_cart;
		$this->load->model('M_index');
		$this->M_index->addcart($id);
        $page = $this->load->view('V_Cart', $data);
	}

}
