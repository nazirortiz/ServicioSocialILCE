<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/application/modules/pdfreporter/models/Pdfdocument.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/mpdf-7.0/vendor/autoload.php');

/**
 * Description of Pdfdocument_mpdf
 *
 * @author Nazir
 */
class Pdfdocument_mpdf extends Pdfdocument {
    
    var $pdf;
    
    function __construct() {
        
        parent::__construct();
        $this->pdf = new \Mpdf\Mpdf();
    }
    
    public function generarPDF() {
        
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/saes/content/mpdf.pdf';
        
        $html = '<table width="60%" cellspacing="0">
			<thead>
				<tr>
					<th>Empid</th>
					<th>Name</th>
					<th>Salary</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				   <td>1</td>
				   <td>Tiger Nixon</td>
				   <td>320800</td>
				   <td>61</td>
				</tr>
				<tr>
				   <td>2</td>
				   <td>Garrett Winters</td>
				   <td>434343</td>
				   <td>63</td>
				</tr>
				<tr>
				   <td>3</td>
				   <td>Ashton Cox</td>
				   <td>86000</td>
				   <td>66</td>
				</tr>
				<tr>
				   <td>4</td>
				   <td>Cedric Kelly</td>
				   <td>433060</td>
				   <td>22</td>
				</tr>
				<tr>
				   <td>5</td>
				   <td>Airi Satou</td>
				   <td>162700</td>
				   <td>33</td>
				</tr>
				<tr>
				   <td>6</td>
				   <td>Brielle Williamson</td>
				   <td>372000</td>
				   <td>61</td>
				</tr>
				<tr>
				   <td>7</td>
				   <td>Herrod Chandler</td>
				   <td>137500</td>
				   <td>59</td>
				</tr>
				<tr>
				   <td>8</td>
				   <td>Rhona Davidson</td>
				   <td>327900</td>
				   <td>55</td>
				</tr>
				<tr>
				   <td>9</td>
				   <td>Colleen Hurst</td>
				   <td>205500</td>
				   <td>39</td>
				</tr>
				<tr>
				   <td>10</td>
				   <td>Sonya Frost</td>
				   <td>103600</td>
				   <td>23</td>
				</tr>
			</tbody>
		</table>';
        
        $this->pdf->WriteHTML($html);
        
        $this->pdf->Output($dir, \Mpdf\Output\Destination::FILE);
        
        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public"); // needed for internet explorer
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:".filesize($dir));
        header("Content-Disposition: attachment; filename=fpdf.pdf");
        readfile($dir);
        
        die();    
    }
}
