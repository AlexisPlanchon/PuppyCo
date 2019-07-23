<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); //connexion a la base
    }

}
