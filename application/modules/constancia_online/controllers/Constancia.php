<?php
/**
 * Controller to create PDF documents
 *
 * @author Nazir Ortiz
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/constancia/models/Constancias_Pdf_sepaonline.php');

class Constancia extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
    }
    
    /* [C] Consult */
    public function index(){

        $this->load->view('index');
    }
    
    /* [A] Action */
    
    /* [P] Process */
    public function create_constancia(){
        
        $constancias = (object) array(
            (object) array('nombre_alumno' => 'Gabriela Bonilla', 'nivel' => 'A1', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'fecha' => '23 de diciembre de 2014', 'folio' => '2016-3423'),
            (object) array('nombre_alumno' => 'Nazir Nahun Ortiz Avila', 'nivel' => 'B2', 'periodo' => '20 de marzo al 14 de mayo de 2017', 'fecha' => '01 de octubre de 2017', 'folio' => '2012-3481'),
            (object) array('nombre_alumno' => 'Véronica Herrera Porras', 'nivel' => 'C4', 'periodo' => '12 de julio al 30 de septimebre de 2018', 'fecha' => '12 de julio de 2017', 'folio' => '2019-0034')
        );
        
        $generador = new Constancias_Pdf_sepaonline();
        $generador->generarConstancias($constancias);
    }
}