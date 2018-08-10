<?php
/**
 * Controller to create PDF documents
 *
 * @author Nazir Ortiz
 */
class Pdfreporter extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        $this->load->model('pdfdocument_fpdf');
        $this->load->model('pdfdocument_mpdf');
        $this->load->model('pdfdocument_dompdf');
    }
    
    /* [C] Consult */
    public function fpdf(){

        $this->load->view('fpdf');
    }
    
    public function mpdf(){

        $this->load->view('mpdf');
    }

    public function dompdf(){

        $this->load->view('dompdf');
    }
    
    public function pdfjs(){

        $this->load->view('pdfjs');
    }
    
    /* [A] Action */
    
    /* [P] Process */
    public function createpdf_fpdf(){
        
        $pdf = new Pdfdocument_fpdf();
        $pdf->generarPDF();
    }
    
    public function createpdf_mpdf(){
        
        $pdf = new Pdfdocument_mpdf();
        $pdf->generarPDF();
    }

    public function createpdf_dompdf(){
        
        $pdf = new Pdfdocument_dompdf();
        $pdf->generarPDF();
    }
}
