<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class commands extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_commands');
    }

    public function index_get()
    {
        $client = $this->model_commands->get();

        if (!is_null($client)) {
            $this->response(array('response' => $client), 200);
        } else {
            $this->response(array('error' => 'Une erreur est survenue.'), 404);
        }
    }



    public function index_post()
    {
        if (!$this->post('idusers')) {
            $this->response(null, 400);
        }

        $id = $this->model_commands->save($this->post('idusers'));
		
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('idusers')) {
            $this->response(null, 400);
        }
		if (!$this->put('idcommands')) {
            $this->response(null, 400);
        }
		
		
        $update = $this->model_commands->update($this->put('idusers'), $this->put('idcommands'), $this->put('date'));

        if (!is_null($update)) {
            $this->response(array('response' => 'Bien effectué'), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        $delete = $this->model_commands->delete($id);

        if (!is_null($delete)) {
            $this->response(array('response' => 'Bien effectué'), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }
}