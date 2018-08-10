<?php
/**
 * /application/modules/group/libraries/Reporter.php
 *
 * @author Nazir Ortiz
 */
class Reporter {
    
    public function __construct() {
        
    }
    
    public function generate_cvs(){
        
        $cvs = "nombre,descripcion, fecha de registro\n";
        $cvs .= "Grupo de inglés básico, 'Aprendizaje para los que inician', 01-12-2017\n";
        $cvs .= "Grupo de inglés intermedio, 'Aprendizaje para los que ya llevan algunos meses', 03-12-2017\n";
        $cvs .= "Grupo de inglés avanzado, 'Aprendizaje para los que ya saben inglés', 06-12-2017\n";
        return $cvs;
    }
}
