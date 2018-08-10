<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/constancia/models/Fpdftools.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/fpdf-1.81/fpdf.php');

class Constancias_Pdf{

    var $pdf;

    function __construct() {

        $this->pdf = new Fpdftools();
    }

    public function generarConstancias($lista_constancias){

        $dir = $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias.pdf';

        $this->pdf->AddFont('Montserrat-Regular', '', 'Montserrat-Regular.php');
        $this->pdf->AddFont('Montserrat-Bold', '', 'Montserrat-Bold.php');

        foreach($lista_constancias as $constancia){

            $this->pdf->AliasNbPages();
            $this->pdf->SetMargins(0, 0, 0);
            $this->pdf->AddPage('L', 'Letter');
    
            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias/ilce_texto.png', 50, 0, 135, 90);
            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias/sii-01.png', 200, 40, 70, 80);
    
            $this->pdf->SetTextColor(125, 194, 77);
            $this->pdf->SetXY(180, 105);
            $this->pdf->SetFont('Montserrat-Regular','', 15);
            $this->pdf->Cell(5, 0, utf8_decode('a:'));
            $this->pdf->SetXY(183, 115);
            $this->pdf->SetFont('Montserrat-Regular','', 30);
            $this->pdf->Cell(5, 0, utf8_decode($constancia->nombre_alumno), 0, 0, 'R');
    
            $this->pdf->SetTextColor(135, 135, 135);
            $this->pdf->SetFont('Montserrat-Bold','', 14);
            $this->pdf->SetXY(48, 125);
            $this->pdf->Cell(140, 0, utf8_decode('Por haber acreditado el curso SiiB2 del programa'), 0, 0, 'R');
            $this->pdf->SetXY(48, 131);
            $this->pdf->Cell(140, 0, utf8_decode('SEPA inglés online con duración de 120 horas,'), 0, 0, 'R');
            $this->pdf->SetXY(48, 137);
            $this->pdf->Cell(140, 0, utf8_decode('impartido en la modalidad a distancia en el periodo del'), 0, 0, 'R');
            $this->pdf->SetXY(48, 143);
            $this->pdf->Cell(140, 0, utf8_decode($constancia->periodo), 0, 0, 'R');
    
            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias/texturaok.png', 5, 130, 270, 80);
    
            $this->pdf->SetFont('Montserrat-Regular','', 14);
            $this->pdf->SetXY(141, 162);
            $this->pdf->Cell(5, 0, utf8_decode('Ciudad de México'));
            $this->pdf->SetFont('Montserrat-Regular','', 13.5);
            $this->pdf->SetXY(134, 168);
            $this->pdf->Cell(5, 0, utf8_decode($constancia->fecha_impresion));
    
            $this->pdf->SetFont('Montserrat-Regular','', 14);
            $this->pdf->SetXY(230, 162);
            $this->pdf->Cell(5, 0, utf8_decode('FOLIO'));
    
            $this->pdf->SetFont('Montserrat-Bold','', 12);
            $this->pdf->SetTextColor(43, 42, 43);
            $this->pdf->SetXY(226.5, 168);
            $this->pdf->Cell(5, 0, utf8_decode($constancia->folio));
    
            $this->pdf->SetDrawColor(255, 255, 255);
            $this->pdf->SetFillColor(255, 255, 255);
            $this->pdf->RoundedRect(221, 170, 35, 35, 0, '', 'DF');
            $this->pdf->Image($constancia->url_qr, 222, 171, 33, 33);
    
            $this->pdf->SetFont('Montserrat-Regular','', 18);
            $this->pdf->SetTextColor(192, 45, 143);
            $this->pdf->SetXY(91, 191);
            $this->pdf->Cell(0, 0, utf8_decode('Mtra. Rubicelia Valencia Ortiz'));
    
            $this->pdf->SetFont('Montserrat-Regular','', 12);
            $this->pdf->SetTextColor(135, 135, 135);
            $this->pdf->SetXY(144, 195.8);
            $this->pdf->Cell(0, 0, utf8_decode('Head of Innovation'));

        }

        $this->pdf->Output();
        // $this->pdf->Output($dir, 'F');
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