<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
     
    public function __construct() {
        parent::__construct();

        $this->data['success_msg']=$this->session->flashdata('success');
        $this->data['error_msg']=$this->session->flashdata('error');
        $this->data['title']='Title';
        $this->data['active_class']=''; 
        $this->load->helper('cookie');
    }

    /*---------------====
        |--Login--| 
    -----------------====*/
    public function index(){  
        $this->data['page_title']='Home';
        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/home/view',$this->data);
        $this->load->view('front/includes/footer', $this->data);
    }

    //---== Login Check script==---//
    public function userLogin(){
        if (!$this->input->is_ajax_request()) { // Check csrf ajax validatio
           exit('No direct script access allowed');
        }
        $this->form_validation->set_rules('username','User Name','trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
        if($this->form_validation->run()==FALSE){ 
            $response = [
                'status'  => 2,
                'message' => $this->form_validation->error_array()
            ]; 
        }else{
            $responce = $this->Login_mdl->userLogin();
            $sess_usr_type = isset($_SESSION['sess_usr_type']) ? $_SESSION['sess_usr_type'] : "";
            $hidden_path_info = trim($this->input->post('hidden_path_info'));               

            if($hidden_path_info == 'search' && $sess_usr_type==3){
                $redirect = base_url()."search";
            }elseif($sess_usr_type==2){
                $redirect = base_url()."dashboard";
            }elseif(strpos($hidden_path_info, 'appoinment/minus15/') !== false || strpos($hidden_path_info, 'appoinment/plus15/') !== false){
                $redirect = base_url().$hidden_path_info;
            }else{
                $redirect = base_url()."dashboard";
            }
            if(isset($responce) && $responce=='1'){
                $response = array(
                    'status'  => 1, 
                    'messgae' => str_msg1,
                    'redirect'=> $redirect 
                );
            }else if(isset($responce) && $responce=='2'){
                $response = array(
                    'status'  => 0, 
                    'messgae' => str_msg2,
                    'redirect'=> $redirect 
                );
            }else{
                $response = array(
                    'status'  => 0, 
                    'messgae' => str_msg3,
                    'redirect' => ''
                );
            }
        }
        echo json_encode($response);  
    }


    /*---------------====
        Forgot_password 
    -----------------====*/
    public function forgot_password(){ 
        $this->form_validation->set_rules('txtemail','Email','trim|required|valid_email|xss_clean');
        $breadcrumbs = array(array('title' => 'Forgot Password', 'redirect' => ''));
        $this->data['breadcrumbs'] = $breadcrumbs;
        if($this->form_validation->run()==FALSE){
            $this->data['title']='User | Forgot Password';     
            $this->data['page_title']='Forgot password';
            $this->load->view('front/includes/header',$this->data);
            $this->load->view('front/forgot_password/view',$this->data);
            $this->load->view('front/includes/footer', $this->data);
        }else{
            $this->Forgot_password_mdl->forgot_password();
            redirect('forgot_password');
        }
    }

    /*---------------====
        Recover password 
    -----------------====*/
    public function recover_password(){
        $last = $this->uri->total_segments();
        $sha_forgot = $this->uri->segment($last);

        $this->db->where('usr_temp_pass', $sha_forgot);
        $query = $this->db->get('user');
        $num = $query->num_rows();
        if($num==0){
            $this->session->set_flashdata('error', str_msg6);
            redirect('forgot_password');
        }

        $this->form_validation->set_rules('new_password','Password','trim|required|min_length[8]|max_length[18]|xss_clean');
        $this->form_validation->set_rules('confirm_password','Confirm password','trim|required|matches[new_password]|xss_clean');
        $breadcrumbs = array(array('title' => 'Recover Password', 'redirect' => ''));
        $this->data['breadcrumbs'] = $breadcrumbs;
        if($this->form_validation->run()==FALSE){
            $this->data['title']='User | Forgot Password';    
            $this->data['page_title']='Change password';
            $this->load->view('front/includes/header',$this->data);
            $this->load->view('front/forgot_password/change_password',$this->data);
            $this->load->view('front/includes/footer', $this->data);
        }else{
            $this->Forgot_password_mdl->recover_password($sha_forgot);
            redirect('forgot_password');
        }
    }

    /*---------------====
        |-- Logout --| 
    -----------------====*/
    public function logout($status=''){
        $this->session->sess_destroy();
        redirect('home');     
    }


   /*---------------====
        |--Check Session and then reset session--| 
    -----------------====*/
    public function sessionCheck(){
        if (!$this->input->is_ajax_request()) { // Check csrf ajax validatio
           exit('No direct script access allowed');
        }
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']=='1'){
            echo '1';
        }else{
            echo '0';
        }
    }    

    //---== Reset session script==---//
    public function resetSession(){
        if (!$this->input->is_ajax_request()) { // Check csrf ajax validatio
           exit('No direct script access allowed');
        }
        $key = base64_decode($_COOKIE["key"]);
        $this->db->where('usr_fk_mug_id!=','1');
        $this->db->where('is_medicare!=','1');
        $this->db->where('usr_status','0');
        $this->db->where('usr_deleated','0');
        $this->db->where('usr_id',$key);
        $query = $this->db->get('user');
        $count=$query->num_rows(); 
        if($count>0){
            $row = $query->row();
            if($row->usr_status==0){ 
                $session_data = array('sess_usr_id'=>$row->usr_id, 
                    'sess_usr_type'=> $row->usr_fk_mug_id,
                    'sess_is_medicare'=> $row->is_medicare,
                    'sess_usr_email'=> $row->usr_email, 
                    'logged_in'=>TRUE);
                $this->session->set_userdata($session_data);
                $key = base64_encode($row->usr_id);
                setcookie('key', $key, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            echo '1';
        }else{
            echo '0';
        }
    }

}



