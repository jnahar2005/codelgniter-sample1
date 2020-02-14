<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_mdl extends CI_Model {    
    public function __construct() {    
        parent::__construct();
    }

    public function is_unique_email($username,$sess_usr_email=''){
        if($sess_usr_email!='' && $username == $sess_usr_email) {
            return true;  
        }else{
            $this->db->where('usr_email', $username);
        }
        $this->db->where('is_medicare!=', 1);
        $query = $this->db->get('user');
        $count = $query->num_rows();
        if($count!=0){
            $this->form_validation->set_message('is_unique_email', 'Sorry, this email Id already exists.');
            return false;
        }else{
            return true;  
        }          
    }

    public function master_specialty_detail(){ 
        $this->db->where('s_status ', '0');
        $this->db->where('s_deleated', '0');
        $query = $this->db->get('master_specialty');
        return $query->result();                
    }

    public function create($usr_type){
        $username = $_POST['username'];  
        $password = $_POST['new_password']; 
        $query = $this->db->get_where('user', array('usr_email'=>$username,'is_medicare!='=>1));
        $count=$query->num_rows();
        if($count==0){
            $setData = array(
                'usr_email' => $username,
                'usr_password' => md5($password),
                'usr_created' => time(),
                'usr_last_login' => time(),
            );
            $setData = $this->security->xss_clean($setData);
            $this->db->insert('user',$setData); 
            $usr_inserted_id = $this->db->insert_id();

            $this->db->insert('user_address', array(
                'ua_fk_usr_id' => $usr_inserted_id, 'ua_type'=>'1',
            ));

            //unset create profile session detail username password
            $this->session->unset_userdata("ses_profile_arr");

            // Login Credential
            $session_data = array('sess_usr_id'=>$usr_inserted_id, 
                'sess_usr_type'=> 1,'sess_is_medicare'=>3,
                'sess_usr_email'=> $username,'logged_in'=>TRUE);
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('success', str_msg34);
            redirect('dashboard');
        }else{
            $this->session->set_flashdata('error', str_msg15);
            redirect('register');
        }
    }

}// class