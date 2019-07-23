<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_item extends CI_Controller {

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
	 
	 
	   public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index()
	{
		$this->load->model('M_index');
		$array_cat = $this->M_index->select_category();
        $data['result_cat']= $array_cat;
        $page = $this->load->view('V_item', $data);
	}
	
	public function item($id){
		$this->load->model('M_index');
		$array_cat = $this->M_index->select_category();
        $data['result_cat']= $array_cat;
		$this->load->model('M_item');
		$array_item = $this->M_item->select_item($id);
		$data['result_item']= $array_item;
		$array_reviews = $this->M_item->select_reviews($id);
		$data['result_reviews']= $array_reviews;
        $page = $this->load->view('V_item', $data);
		
	}
	
}
