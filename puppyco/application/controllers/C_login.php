<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
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
		$data['title'] = 'Login';
		$page = $this->load->view('V_login', $data);
	}

	public function connect()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			//true
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = hash('sha256', $password);
			//model function
			$this->load->model('M_login');

			if ($this->M_login->can_login($username, $password)) {
				$this->load->model('M_login');
				$idclient = $this->M_login->select_id($username, $password);
				foreach ($idclient as $row_login) {
					$idusers = $row_login['idusers'];
					$admin = $row_login['idusers'];
				}
				$session_data = array(
					'username' => $username,
					'idclient' => $idusers,
					'admin' => $admin
				);
				$this->session->set_userdata($session_data);
				if ($admin == 1) {
					redirect(site_url('C_admin'));
				} else {
					redirect(site_url('C_index'));
				}
			} else {
				$this->session->set_flashdata('error', 'Mauvais identifiants');
				redirect(site_url('C_login'));
			}
		} else {
			//false
			$this->index();
		}
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usernamecreate', 'Username', 'required');
		$this->form_validation->set_rules('passwordcreate', 'Password', 'required');
		$this->form_validation->set_rules('emailcreate', 'Email', 'required');
		if ($this->form_validation->run()) {
			//true
			$username = $this->input->post('usernamecreate');
			$password = $this->input->post('passwordcreate');
			$email = $this->input->post('emailcreate');
			$password = hash('sha256', $password);
			//model function
			$this->load->model('M_login');
			$this->M_login->create_login($username, $password, $email);
			$this->index();
		} else {
			//false
			$this->index();
		}
	}

	function enter()
	{
		if ($this->session->userdata('username') != '') {
			echo '<h2>Welcome -  ' . $this->session->userdata('username') . '</h2>';
			echo '<a href="' . site_url('C_login') . '/logout">Logout</a>';
		} else {
			redirect(site_url('C_login'));
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(site_url('C_login'));
	}
}