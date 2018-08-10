<?php
/**
 * Controller to create PDF documents
 *
 * @author Nazir Ortiz
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/constancia/models/Constancias_Pdf.php');

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
            (object) array('nombre_alumno' => 'Gabriela Bonilla', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'folio' => '2017-0081', 'fecha_impresion' => '01 de octubre de 2017', 'url_qr' => $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigo_bidimensional.png'),
            (object) array('nombre_alumno' => 'Luis Dario Rodriguez Lemus', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'folio' => '2017-0081', 'fecha_impresion' => '01 de octubre de 2017', 'url_qr' => $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigo_bidimensional.png'),
            (object) array('nombre_alumno' => 'Nazir Nahun Ortíz Avila', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'folio' => '2017-0081', 'fecha_impresion' => '01 de octubre de 2017', 'url_qr' => $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigo_bidimensional.png'),
            (object) array('nombre_alumno' => 'Emmanuel Tarsicio Olivos', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'folio' => '2017-0081', 'fecha_impresion' => '01 de octubre de 2017', 'url_qr' => $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigo_bidimensional.png'),
            (object) array('nombre_alumno' => 'Verónica Herrera Porras', 'periodo' => '13 de febrero al 14 de mayo de 2017', 'folio' => '2017-0081', 'fecha_impresion' => '01 de octubre de 2017', 'url_qr' => $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigo_bidimensional.png')
        );

        $generador = new Constancias_Pdf();
        $generador->generarConstancias($constancias);
    }
}
