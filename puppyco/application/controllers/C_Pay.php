<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pay extends CI_Controller
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
	public function index()
	{
		$page = $this->load->view('V_Pay');
	}

	public function selectcard($id)
	{
		$this->load->model('M_pay');
		$array_cart = $this->M_pay->select_cart($id);
		$data['result_cart'] = $array_cart;
		$page = $this->load->view('V_Pay', $data);

	}

	public function pay($id)
	{	


		//Load email library
		$this->load->library('email'); // Note: no $config param needed
		$this->email->from('puppystorefr@gmail.com', 'puppystorefr@gmail.com');
		$this->email->to('antoinehisette@gmail.com');
		$this->email->subject('Votre commande chez PuppyCo');
		$this->email->message('Votre commande a bien été pris en compte et vous sera livré dans les prochains jours.');
		$this->email->send(); 
		$this->load->model('M_pay');
		$array_cart = $this->M_pay->insert($id);
		redirect(site_url('C_index'));
	}
}
