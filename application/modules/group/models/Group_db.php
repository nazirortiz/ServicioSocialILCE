<?php
/**
 * /application/modules/group/models/Group_db.php
 *
 * @author Nazir Ortiz
 */
class Group_db extends CI_Model {
    
    public $nombre;
    public $descripcion;
    
    public function __construct($nombre, $descripcion) {
        
        parent::__construct();
        $this->load->database();
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
    
    public function get_all_groups(){
        
        $groups[0] = new Group_db('Inglés I', 'Descripción Inglés I');
        $groups[1] = new Group_db('Inglés II', 'Descripción Inglés II');
        $groups[2] = new Group_db('Inglés III', 'Descripción Inglés III');
        
        return $groups;
    }
    
    public function add_group($group){
        
        $this->db->insert('groups', array(
            'nombre' => $group['nombre'],
            'descripcion' => $group['descripcion'],
            'fecha_registro' => getdate(),
        ));
    }
}
