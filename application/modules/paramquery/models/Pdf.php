<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pdf
 *
 * @author Nazir Ortiz
 */
require(base_url() . 'fpdf-1.81/fpdf.php');

abstract class Pdf {
    
    var $pdf;
    
    function __construct() {
        $this->pdf = new FPDF();
    }
    
    abstract protected function generarPdf();
}
