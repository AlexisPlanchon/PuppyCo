<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class mdp extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_mdp');
    }

    public function index_get()
    {
        $cities = $this->model_mdp->get();

        if (!is_null($cities)) {
            $this->response(array('response' => $cities), 200);
        } else {
            $this->response(array('error' => 'Une erreur est survenue.'), 404);
        }
    }

    public function index_put()
    {
        if (!$this->put('mdp')) {
            $this->response(null, 400);
        }
		if (!$this->put('idusers')) {
            $this->response(null, 400);
        }
		$mdp = hash('sha256', $this->put('mdp'));
        $update = $this->model_mdp->update($mdp, $this->put('idusers'));

        if (!is_null($update)) {
            $this->response(array('response' => 'Bien effectué'), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }

}