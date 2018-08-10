<?php
/**
 * /application/modules/group/libraries/Group.php
 *
 * @author Nazir Ortiz
 */
class Group {
    
    protected $CI;
    private $group;
    	
    public function __construct($grupo) {
        
        $this->CI =& get_instance();
        $this->group = $grupo;
    }
    
    public function get_all_groups(){
        return $this->CI->group_db->get_all_groups();   
    }
    
    public function add_group(){
        
    }
}
