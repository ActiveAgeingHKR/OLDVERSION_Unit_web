<?php

class Backend extends CI_Controller{
    
    public $config = [];
            function __construct() {
        parent::__construct();
        $this->aauth->control('Admin');
          $this->config = $this->config->item('controll');
        
    }
public function index(){
    
//                $data['listGroups'] = $this->aauth->list_groups();
//                $data['listPermissions'] = $this->aauth->list_perms();
//                $data['assignedPermission'] = $this->aauth->assigned_perms();
                $data['listUsers'] = $this->aauth->list_users(2);
               
                $data['type'] = 'main';
                $data['mainContent'] = 'backend/page/main';
		$this->load->view('back_layout',$data);
}
  


public function group_view(){
     $group = $this->uri->segment(2);
     $id =   $this->aauth->get_group_id($group);
     if($id == FALSE){
         show_404();
     }
     
       
               $data['listGroups'] = $this->aauth->list_groups();
                $data['listPermissions'] = $this->aauth->list_perms();
                $data['assignedPermission'] = $this->aauth->assigned_perms();
                $data['listUsers'] = $this->aauth->list_users($id);
                $data['type'] = 'group';
                $data['mainContent'] = 'backend/page/group_view';
		$this->load->view('back_layout',$data);
     
     
}

}
