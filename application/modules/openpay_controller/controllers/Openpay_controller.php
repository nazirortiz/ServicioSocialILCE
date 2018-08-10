<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Openpay_controller extends CI_Controller {

	public function __construct(){

		parent::__construct();
		// $this->load->model('constancia');
		// $this->load->help('constancia');
		$this->load->library('openpay_client');
	}

	/* [C] Consult */
    public function index(){

        $this->load->view('index');
	}
    
    /* [A] Action */
    
    /* [P] Process */
    public function add_comision(){
		
		$customer = $this->openpay_client->add_card();
		
		echo 'Proceso realizado con éxito';
    }
}