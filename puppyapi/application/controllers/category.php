<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class category extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_category');
    }

    public function index_get()
    {
        $cities = $this->model_category->get();

        if (!is_null($cities)) {
            $this->response(array('response' => $cities), 200);
        } else {
            $this->response(array('error' => 'Une erreur est survenue.'), 404);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $city = $this->model_category->get($id);

        if (!is_null($city)) {
            $this->response(array('response' => $city), 200);
        } else {
            $this->response(array('error' => 'Une erreur est survenue'), 404);
        }
    }

    public function index_post()
    {
        if (!$this->post('category')) {
            $this->response(null, 400);
        }

        $id = $this->model_category->save($this->post('category'));
		
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('category')) {
            $this->response(null, 400);
        }
		if (!$this->put('id')) {
            $this->response(null, 400);
        }
		
		
        $update = $this->model_category->update($this->put('category'), $this->put('id'));

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

        $delete = $this->model_category->delete($id);

        if (!is_null($delete)) {
            $this->response(array('response' => 'Bien effectué'), 200);
        } else {
            $this->response(array('error', 'Une erreur est survenue'), 400);
        }
    }
}