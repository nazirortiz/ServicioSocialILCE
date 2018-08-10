<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/constancia/models/Fpdftools.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/fpdf-1.81/fpdf.php');

class Constancias_Pdf_sepaonline {

    var $pdf;

    function __construct() {

        $this->pdf = new Fpdftools();
    }

    public function generarConstancias($lista_constancias){

        $dir = $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias.pdf';

        $this->pdf->AddFont('FuturaStd-Heavy', '', 'FuturaStd-Heavy.php');
        $this->pdf->AddFont('FuturaStd-Medium', '', 'FuturaStd-Medium.php');
        $this->pdf->AddFont('Caslon-BoldItalic', '', 'Caslon-BoldItalic.php');

        foreach($lista_constancias as $constancia){

            $this->pdf->AliasNbPages();
            $this->pdf->SetMargins(0, 0, 0, 0);
            $this->pdf->AddPage('P', 'Letter');
    
            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias-online/fondo-constancia-online.png', 1, 1, 215, 277);
            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias-online/sepa-online-logo.png', 68, 38, 85, 35);

            $this->pdf->SetTextColor(147, 149, 152);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 21);
            $this->pdf->SetXY(68, 85);
            $this->pdf->MultiCell(99, 8, utf8_decode('El Instituto Latinoamericano de la Comunicación Educativa'), 0, 'L');
            
            $this->pdf->SetFont('FuturaStd-Medium', '', 19);
            $this->pdf->SetXY(68, 108);
            $this->pdf->Cell(0, 0, utf8_decode('otorga la presente'));
            
            $this->pdf->SetTextColor(118, 190, 67);
            $this->pdf->SetFont('Caslon-BoldItalic', '', 75);
            $this->pdf->SetXY(67, 123);
            $this->pdf->Cell(0, 0, utf8_decode('constancia'));

            $this->pdf->SetTextColor(0, 95, 185);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 27);
            $this->pdf->SetXY(67, 150);
            $this->pdf->Cell(0, 0, utf8_decode('a: ' . $constancia->nombre_alumno));

            $this->pdf->SetTextColor(147, 149, 152);
            $this->pdf->SetFont('FuturaStd-Medium', '', 16);
            $this->pdf->SetXY(68, 160);
            $this->pdf->MultiCell(130, 7, utf8_decode('Por haber acreditado el curso ' . $constancia->nivel . ' del programa SEPA inglés online con duración de 120 horas, impartido en la modalidad a distancia en el periodo del ' . $constancia->periodo), 0, 'L');

            $this->pdf->SetTextColor(147, 149, 152);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 14);
            $this->pdf->SetXY(68, 204);
            $this->pdf->Cell(0, 0, utf8_decode('Ciudad de México'));

            $this->pdf->SetFont('FuturaStd-Medium', '', 14);
            $this->pdf->SetXY(68, 210);
            $this->pdf->Cell(0, 0, utf8_decode($constancia->fecha));

            $this->pdf->SetFont('FuturaStd-Heavy', '', 16);
            $this->pdf->SetXY(68, 240);
            $this->pdf->Cell(0, 0, utf8_decode('Mtra. Rubicelia Ortiz Valencia'));

            $this->pdf->SetTextColor(118, 190, 67);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 12);
            $this->pdf->SetXY(68, 245);
            $this->pdf->Cell(0, 0, utf8_decode('Titular de la Unidad de Innovación'));

            $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/constancias-online/ilce-online-logo.png', 69, 255, 19, 13);

            $this->pdf->SetTextColor(35, 31, 32);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 12);
            $this->pdf->SetXY(184, 235);
            $this->pdf->Cell(0, 0, utf8_decode('FOLIO'));

            $this->pdf->SetTextColor(35, 31, 32);
            $this->pdf->SetFont('FuturaStd-Heavy', '', 12);
            $this->pdf->SetXY(179, 240);
            $this->pdf->Cell(0, 0, utf8_decode($constancia->folio));
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