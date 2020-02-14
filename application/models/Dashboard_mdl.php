<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_mdl extends CI_Model {
    public function __construct() {    
        parent::__construct();
    }

//---------------------------------------------------
    function change_password($usr_id){
        $password = md5($this->input->post('password')); 
        $new_password = md5($this->input->post('new_password'));   

        $query = $this->db->get_where('user', array('usr_password'=>$password, 
            'usr_id'=>$usr_id));
        $count=$query->num_rows();
        if($count==0){
            return 0;   
        }else{  
            $uc_update = array('usr_password'=>$new_password);
            $this->db->where('usr_id',$usr_id); 
            $this->db->update('user',$uc_update);    
            return 1;
        }                
    }
}