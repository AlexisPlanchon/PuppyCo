<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_index extends CI_Controller
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

		$this->load->model('M_index');
		$array_resultat = $this->M_index->select_random_six();
		$data['result'] = $array_resultat;
		$array_cat = $this->M_index->select_category();
		$data['result_cat'] = $array_cat;
		$page = $this->load->view('V_index', $data);
	}

	public function category($id)
	{
		$this->load->model('M_index');
		$array_resultat_item_cat = $this->M_index->select_item_category($id);
		$data['result'] = $array_resultat_item_cat;
		$array_cat = $this->M_index->select_category();
		$data['result_cat'] = $array_cat;
		$page = $this->load->view('V_index', $data);
	}

	public function addcart($id)
	{
		$this->load->model('M_index');
		$array_resultat = $this->M_index->select_random_six();
		$data['result'] = $array_resultat;
		$array_cat = $this->M_index->select_category();
		$data['result_cat'] = $array_cat;
		$this->M_index->addcart($id);
		$page = $this->load->view('V_index', $data);
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if ($this->input->post('query')) {
			if (strlen($this->input->post('query')) > 1) {
				$query = $this->input->post('query');
			}
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		if (($data->num_rows() > 0) && (strlen($this->input->post('query')) > 1)) {
			$output .= '
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
					<tr>Articles trouvés :</tr>
		
		';
			foreach ($data->result() as $row) {
				$output .= '
						<a class="list-group-item list-group-item-action" href="' . site_url("C_item") . '/item/' . $row->idmvctable . '">' . $row->name . '</a>
				';
			}
		} else if (($data->num_rows() == 0) && (strlen($this->input->post('query')) > 1)) {
			$output .= '
			<div class="table-responsive">
					<table class="table table-bordered table-striped">
					<tr>
							<th>Article</th>
						</tr>
					<tr>
						<td>Aucun article trouvé</td>
					</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}
}
