<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/pdfreporter/models/Pdfdocument.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/pdfreporter/models/Fpdftools.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/fpdf-1.81/fpdf.php');

/**
 * Description of Pdfdocument_fpdf
 *
 * @author Nazir Ortiz
 */
class Pdfdocument_fpdf extends Pdfdocument {
    
    var $pdf;
    
    function __construct() {
        
        parent::__construct();
        $this->pdf = new Fpdftools();
    }
    
    public function generarPDF() {
        
        $radius = 0.4;
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/fpdf.pdf';
        
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage('Portrait', 'Letter');

        // Header
        $this->pdf->SetFont('Arial','', 7);
        $this->pdf->Cell(10, 0, '15/03/2017');
        $this->pdf->Cell(55);
        $this->pdf->Cell(60, 0, utf8_decode('Formato único para pago por referencia en BBVA Bancomer'));

        $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/sepa_ingles_logo.png', 20, 15, 78, 20);
        $this->pdf->Ln(30);

        // Rectangulo de vigencia
        $this->pdf->SetDrawColor(51, 120, 183);
        $this->pdf->SetFillColor(51, 120, 183);
        $this->pdf->SetLineWidth(0.3);
        $this->pdf->RoundedRect(153.5, 16, 41.5, 5.3, $radius, '12', 'DF');
        $this->pdf->RoundedRect(153.5, 16, 13.8, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 16, 27.6, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 16, 41.5, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 16, 41.5, 17.5, $radius, '1234', '');
        $this->pdf->SetTextColor(255,255,255);
        $this->pdf->SetFont('Arial','B', 8);
        $this->pdf->SetXY(166, 19);
        $this->pdf->Cell(5, 0, utf8_decode('VIGENCIA'));
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetXY(158, 24.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('d')));
        $this->pdf->SetXY(171.5, 24.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('m')));
        $this->pdf->SetXY(184, 24.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('Y')));
        $this->pdf->SetXY(154.5, 30.5);
        $this->pdf->SetFont('Arial','B', 5.5);
        $this->pdf->Cell(5, 0, utf8_decode('NO COBRAR DESPUÉS DE ESTA FECHA'));
        $this->pdf->RoundedRect(15, 37, 185, 1.5, 0, '', 'DF');
        
        // Titulo
        $this->pdf->SetXY(39, 44);
        $this->pdf->SetFont('Arial','B', 12);
        $this->pdf->Cell(5, 0, utf8_decode('FORMATO PARA DEPÓSITO REFERENCIADO EN BBVA BANCOMER'));

        // Body
        $this->pdf->RoundedRect(20, 50, 175, 4.5, $radius, '12', 'DF');
        $this->pdf->RoundedRect(20, 50, 77, 33, $radius, '14', '');
        $this->pdf->RoundedRect(97, 50, 80, 112, $radius, '124', '');
        $this->pdf->RoundedRect(97, 50, 98, 112, $radius, '1234', '');
        $this->pdf->RoundedRect(97, 154.4, 80, 7.5, $radius, '4', 'DF');
        $this->pdf->RoundedRect(176, 154.4, 19, 7.5, $radius, '3', '');
        $this->pdf->SetFillColor(225, 225, 225);
        $this->pdf->SetDrawColor(225, 225, 225);
        $this->pdf->RoundedRect(97.3, 54.9, 79.3, 5, $radius, '', 'DF');
        $this->pdf->RoundedRect(177.5, 54.9, 17, 5, $radius, '', 'DF');
        $this->pdf->SetTextColor(255,255,255);
        $this->pdf->SetFont('Arial','B', 7);
        $this->pdf->SetXY(20.5, 52.5);
        $this->pdf->Cell(5, 0, utf8_decode('DATOS ADMINISTRATIVOS'));
        $this->pdf->SetXY(123, 52.5);
        $this->pdf->Cell(5, 0, utf8_decode('DETALLE DEL CONCEPTO DE PAGO'));
        $this->pdf->SetXY(154, 158.5);
        $this->pdf->Cell(5, 0, utf8_decode('TOTAL A PAGAR'));

        $this->pdf->SetAlpha(0.2);

        $positionX = 97.5;
        $positionY = 59.95;

        for ($i = 0; $i <= 13; $i++){

            for ($k = 0; $k <= 6; $k++){

                $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/sepa_ingles_logo_small_blackandwhite.png', $positionX, $positionY, 13.5, 5.5);
                $positionX += 13.9;
            }
            $positionX = 97.5;
            $positionY += 6.8;
        }

        $this->pdf->SetAlpha(1);
        $this->pdf->SetTextColor(0, 0, 0);

        $this->pdf->SetXY(115, 57.5);
        $this->pdf->Cell(5, 0, utf8_decode('Concepto'));
        $this->pdf->SetXY(161, 57.5);
        $this->pdf->Cell(5, 0, utf8_decode('Cantidad'));
        $this->pdf->SetXY(180.5, 57.5);
        $this->pdf->Cell(5, 0, utf8_decode('Importe'));

        // Texto en DATOS ADMINISTRATIVOS
        $this->pdf->SetFont('Arial','', 8);
        $this->pdf->SetXY(21, 59); $this->pdf->Cell(5, 0, utf8_decode('Número de orden:')); 
        $this->pdf->SetXY(51, 59); $this->pdf->Cell(5, 0, utf8_decode('SIC150350001'));
        $this->pdf->SetXY(21, 64); $this->pdf->Cell(5, 0, utf8_decode('Programa educativo:')); 
        $this->pdf->SetXY(51, 64); $this->pdf->Cell(5, 0, utf8_decode('SEPA Inglés'));
        $this->pdf->SetXY(21, 69); $this->pdf->Cell(5, 0, utf8_decode('Número de referencia:')); 
        $this->pdf->SetXY(51, 69); $this->pdf->Cell(5, 0, utf8_decode('SICPG15X2137140YNI5'));
        $this->pdf->SetXY(21, 74); $this->pdf->Cell(5, 0, utf8_decode('Nombre del alumno:')); 
        $this->pdf->SetXY(51, 72.1); $this->pdf->MultiCell(45, 4, utf8_decode('Escuela Normal Rural Carmen Serdán (TETELES)'));

        // Conceptos
        $positionXConcepto = 98;
        $positionYConcepto = 61;

        for($row = 0; $row <= 2; $row++){
            
            $this->pdf->SetXY($positionXConcepto, $positionYConcepto);
            $this->pdf->Cell(65 , 5, utf8_decode($this->conceptos[$row][0]), 0);
            $this->pdf->Cell(12, 5, utf8_decode($this->conceptos[$row][1]), 0, 0, 'C');
            $this->pdf->Cell(6, 5, '$', 0, 0, 'R');
            $this->pdf->Cell(13, 5, number_format(utf8_decode($this->conceptos[$row][2]), 2), 0, 0, 'R');
            $positionYConcepto += 5;
        }

        $this->pdf->SetXY(177.5, 155.8);
        $this->pdf->Cell(3, 5, '$');
        $this->pdf->SetXY(180, 155.8);
        $this->pdf->Cell(14, 5, number_format($this->importe, 2), 0, 0, 'R');

        // Concepto de pago
        $this->pdf->SetDrawColor(51, 120, 183);
        $this->pdf->SetFillColor(51, 120, 183);
        $this->pdf->RoundedRect(20, 90, 73, 50, $radius, '1234', '');
        $this->pdf->RoundedRect(20, 90, 73, 4.5, $radius, '12', 'DF');
        $this->pdf->RoundedRect(20, 101, 73, 4.5, $radius, '', 'DF');
        $this->pdf->RoundedRect(20, 128, 73, 4.5, $radius, '', 'DF');
        $this->pdf->SetFont('Arial','B', 7);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetXY(20.5, 92.5);
        $this->pdf->Cell(5, 0, utf8_decode('CONCEPTO DE PAGO'));
        $this->pdf->SetXY(20.5, 103.4);
        $this->pdf->Cell(5, 0, utf8_decode('FIRMA O SELLO DEL CAJERO'));
        $this->pdf->SetXY(20.5, 130.4);
        $this->pdf->Cell(5, 0, utf8_decode('LÍNEA DE CAPTURA'));
        $this->pdf->SetFont('Arial','', 8);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(21, 97.7); $this->pdf->Cell(5, 0, utf8_decode($this->concepto_pago));
        $this->pdf->SetFont('Arial','', 5.5);
        $this->pdf->SetXY(22, 108); $this->pdf->MultiCell(70, 2, utf8_decode('ESTE FORMATO SÓLO ES VÁLIDO CON EL RECIBO DE PAGO DEL BANCO CON LA FIRMA O SELLO DEL CAJERO'), 0, 'C');
        $this->pdf->SetFont('Arial','B', 10);
        $this->pdf->SetXY(36, 135.4); $this->pdf->Cell(70, 2, utf8_decode($this->referencia));
        $this->pdf->SetFont('Arial','B', 7);
        $this->pdf->SetXY(41, 145); $this->pdf->Cell(70, 2, utf8_decode('CONVENIO CIE: ' . $this->convenio));
        $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/codigobarras.png', 20, 151, 73, 8);
        $this->pdf->SetFont('Arial','B', 5.8);
        $this->pdf->SetXY(44, 159.4); $this->pdf->Cell(70, 2, utf8_decode($this->referencia));
        $this->pdf->SetFont('Arial','B', 5.8);
        $this->pdf->SetXY(54, 166.5); $this->pdf->Cell(70, 2, utf8_decode('LA CANTIDAD A PAGAR POR CUOTA DE RECUPERACIÓN, ESTÁ EXPRESADA EN PESOS MEXICANOS.'));
        
        
        $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/lineapunteada.png', 15, 172, 187, 1);

        $this->pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/sepa_ingles_logo.png', 20, 177, 78, 20);

        // Rectangulo de vigencia
        $this->pdf->SetDrawColor(51, 120, 183);
        $this->pdf->SetFillColor(51, 120, 183);
        $this->pdf->SetLineWidth(0.3);
        $this->pdf->RoundedRect(153.5, 178, 41.5, 5.3, $radius, '12', 'DF');
        $this->pdf->RoundedRect(153.5, 178, 13.8, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 178, 27.6, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 178, 41.5, 11.4, $radius, '12', '');
        $this->pdf->RoundedRect(153.5, 178, 41.5, 17.5, $radius, '1234', '');
        $this->pdf->SetTextColor(255,255,255);
        $this->pdf->SetFont('Arial','B', 8);
        $this->pdf->SetXY(166, 181);
        $this->pdf->Cell(5, 0, utf8_decode('VIGENCIA'));
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetXY(158, 186.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('d')));
        $this->pdf->SetXY(171.5, 186.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('m')));
        $this->pdf->SetXY(184, 186.5);
        $this->pdf->Cell(5, 0, utf8_decode($this->fecha_vigencia->format('Y')));
        $this->pdf->SetXY(154.5, 192.5);
        $this->pdf->SetFont('Arial','B', 5.5);
        $this->pdf->Cell(5, 0, utf8_decode('NO COBRAR DESPUÉS DE ESTA FECHA'));
        $this->pdf->RoundedRect(15, 199, 185, 1.5, 0, '', 'DF');
        
        // Titulo
        $this->pdf->SetXY(39, 206);
        $this->pdf->SetFont('Arial','B', 12);
        $this->pdf->Cell(5, 0, utf8_decode('FORMATO PARA DEPÓSITO REFERENCIADO EN BBVA BANCOMER'));

        $this->pdf->SetDrawColor(51, 120, 183);
        $this->pdf->SetFillColor(51, 120, 183);
        $this->pdf->RoundedRect(20, 211.5, 73, 38, $radius, '1234', '');
        $this->pdf->RoundedRect(20, 211.5, 73, 4.5, $radius, '12', 'DF');
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetXY(20.5, 214);
        $this->pdf->SetFont('Arial','B', 7);
        $this->pdf->Cell(5, 0, utf8_decode('FIRMA O SELLO DEL CAJERO'));
        $this->pdf->SetFont('Arial','', 5.3);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(21.5, 229); $this->pdf->MultiCell(70, 2, utf8_decode('ESTE FORMATO SÓLO ES VÁLIDO CON EL RECIBO DE PAGO DEL BANCO CON LA FIRMA O SELLO DEL CAJERO'), 0, 'C');

        $this->pdf->SetDrawColor(51, 120, 183);
        $this->pdf->SetFillColor(51, 120, 183);
        $this->pdf->RoundedRect(97, 211.5, 97.5, 38, $radius, '1234', '');
        $this->pdf->RoundedRect(97, 211.5, 97.5, 4.5, $radius, '12', 'DF');
        $this->pdf->RoundedRect(97, 223, 97.5, 4.5, $radius, '', 'DF');
        $this->pdf->SetFont('Arial','B', 7);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetXY(97.5, 214);
        $this->pdf->Cell(5, 0, utf8_decode('CONCEPTO DE PAGO'));
        $this->pdf->SetXY(97.5, 225.5);
        $this->pdf->Cell(5, 0, utf8_decode('LÍNEA DE CAPTURA'));
        $this->pdf->SetFont('Arial','', 8);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(98, 219.5); $this->pdf->Cell(5, 0, utf8_decode($this->concepto_pago));
        $this->pdf->SetFont('Arial','B', 10);
        $this->pdf->SetXY(125, 231); $this->pdf->Cell(70, 2, utf8_decode($this->referencia));
        $this->pdf->RoundedRect(97, 236.5, 97.5, 13, $radius, '34', '');
        $this->pdf->SetFont('Arial','B', 15);
        $this->pdf->SetXY(110, 242); $this->pdf->Cell(70, 2, utf8_decode('Total a pagar:'));
        $this->pdf->SetFont('Arial','B', 15);
        $this->pdf->SetXY(150, 240.5); $this->pdf->Cell(35, 5, '$' . number_format($this->importe, 2), 0, 0, 'R');

        $this->pdf->SetFont('Arial','B', 5.5);
        $this->pdf->SetXY(8, 251); $this->pdf->MultiCell(200, 3, utf8_decode('PARA SU TRANQUILIDAD, UNA VEZ PAGADO EL IMPORTE ASEGÚRESE DE ADJUNTAR EL COMPROBANTE ORIGINAL DE PAGO SELLADO Y FIRMADO, AL EXPEDIENTE DIGITAL DEL ALUMNO DE SEPA INGLÉS'));
        $this->pdf->SetFont('Arial','B', 5.7);
        $this->pdf->SetXY(93, 252); $this->pdf->Cell(20, 5, utf8_decode('http://sepa.ilce.edu.mx'));

        // Go to 1.5 cm from bottom
        $this->pdf->SetXY(0, 254.3);
        // Select Arial italic 8
        $this->pdf->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->pdf->Cell(0, 5, utf8_decode('Página ') . $this->pdf->PageNo() . "/{nb}", 0, 0, 'R');

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