<?php
/**
 * CAP Group - /application/modules/group/controllers/Group.php
 *
 * @author Nazir Ortiz
 */
class Group extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->library('group');
        $this->load->model('group_db');
    }
    
    /* [C] Consult */
    public function index() {
        
        $groups = $this->group_db->get_all_groups();
        $this->load->view('index', $groups);
    }
    
    public function register_group_view(){
        
        $this->load->view('register_group_view');
    }
    
    /* [A] Action */
    public function register_group($group){
        
        $this->group_db->add_group($group);
    }
    
    /* [P] Process */
    private function get_report(){
        
        //¿Donde va esta librería 'Reporter'?
        $this->load-library('reporter');
        $report = new Reporter();
        return $report->generate_pdf();
    }
}
