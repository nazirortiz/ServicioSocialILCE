<?php
/**
 * Description of Pdfdocument
 *
 * @author Nazir Ortiz
 */
abstract class Pdfdocument {
    
    var $noorden;
    var $referencia;
    var $convenio;
    var $concepto_pago;
    var $conceptos;
    var $fecha_vigencia;
    var $importe;
    
    function __construct() {
        
        $this->fecha_vigencia = DateTime::createFromFormat('Y-m-d', '2017-03-19');
        $this->noorden = 'SIC150350001';
        $this->referencia = 'SICPG15X2137140YNI5';
        $this->convenio = '1152610';
        $this->concepto_pago = 'Nivel Inicial - Pago grupal (5 Alumnos)';
        $this->conceptos = array(
            array('Nivel Inicial - García Ramírez Jazmín', 1, 337.00),
            array('Nivel Inicial - Parra González Belem', 1, 337.00),
            array('Nivel Inicial - Velez Flores Ana Laura', 1, 337.00),
            array('Nivel Inicial - Camacho Ramírez Mariela', 1, 337.00),
            array('Nivel Inicial - Tolentino Ortiz Magali', 1, 337.00)
        );
        $this->importe = 1685;
    }
    
    abstract protected function generarPDF();
}
