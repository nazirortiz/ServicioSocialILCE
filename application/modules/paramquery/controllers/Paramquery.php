<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paramquery extends CI_Controller {

    public function general(){

            $this->load->view('general');
    }

    public function filtros(){

            $this->load->view('filtros');
    }

    public function grupos(){

            $this->load->view('grupos');
    }
}