<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class clients extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_client');
    }

    public function index_get()
    {
        $client = $this->model_client->get();

        if (!is_null($client)) {
            $this->response(array('response' => $client), 200);
        } else {
            $this->response(array('error' => 'Une erreur est survenue.'), 404);
        }
    }



    public function index_post()
    {
        if ((!$this->post('login'))  && (!$this->post('mail'))) {
            $this->response(null, 400);
        }

        $id = $this->model_client->save($this->post('login'), $this->post('mail'));
		
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('mail')) {
            $this->response(null, 400);
        }
		if (!$this->put('login')) {
            $this->response(null, 400);
        }
		
		
        $update = $this->model_client->update($this->put('mail'), $this->put('login'), $this->put('id'));

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

        $delete = $this->model_client->delete($id);

        if (!is_null($delete)) {
            $this->response(array('response' => 'Bien effectué'), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }
}