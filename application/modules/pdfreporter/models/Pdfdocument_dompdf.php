<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/pdfreporter/models/Pdfdocument.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/dompdf/vendor/autoload.php');

/**
 * Description of Pdfdocument_dompdf
 *
 * @author Nazir Ortiz
 */
class Pdfdocument_dompdf extends Pdfdocument {
    
    var $pdf;
    
    function __construct() {
        
        parent::__construct();
        $this->pdf = new Dompdf\Dompdf();
    }
    
    public function generarPDF() {
        
        $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/reporte.html');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', '');
        $this->pdf->render();
        $this->pdf->stream('dompdf.pdf', array("Attachment" => false));

        // $dir = $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/fpdf.pdf';
        // header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        // header("Cache-Control: public"); // needed for internet explorer
        // header("Content-Type: application/pdf");
        // header("Content-Transfer-Encoding: Binary");
        // header("Content-Length:".filesize($dir));
        // header("Content-Disposition: attachment; filename=fpdf.pdf");
        // readfile($dir);
        // die();    
    }
}
