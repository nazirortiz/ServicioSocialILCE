<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function registrar_cliente(){

        $this->load->view('registrar_cliente');
    }
}