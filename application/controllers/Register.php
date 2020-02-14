<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
     
    public function __construct() {
        parent::__construct();

        $this->data['success_msg']=$this->session->flashdata('success');
        $this->data['error_msg']=$this->session->flashdata('error');
        $this->data['title']='Title';
        $this->data['active_class']='';  
    }

    public function index(){
        $breadcrumbs = array(array('title' => 'Registration', 'redirect' => ''));
        $this->data['breadcrumbs'] = $breadcrumbs;
        $this->data['page_title']='Home';
        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/register/view',$this->data);
        $this->load->view('front/includes/footer', $this->data);
    }

    /*---------------====---------------
        |-- check Email is have or not --| 
    -----------------====---------------*/
    public function checkEmail(){
        $email = $this->input->post('txt_email');     
        $this->db->where('is_medicare!=', 1);
        $this->db->where('usr_email', $email);
        $query = $this->db->get('user');
        $count=$query->num_rows();
        if($count!=0){
            $response = [
                'status'  => 1,
                'message' => str_msg15
            ];     
        }else{
            $response = [
                'status'  => 0,
                'message' => ''
            ];   
        }
        echo json_encode($response);
    } 

    // This function is use for email unique check.
    function is_unique_email($username){
        return $count = $this->Register_mdl->is_unique_email($username);
    }

    /*---------------== Registration ==---------------
        |-- Create --| 
    -----------------====---------------*/
    public function create(){
        $breadcrumbs = array(array('title' => 'Create Profile', 'redirect' => ''));
        $this->data['breadcrumbs'] = $breadcrumbs;
        $last = $this->uri->total_segments();
        $action = $this->uri->segment($last);
        $this->form_validation->set_rules('username','Email','required|trim|valid_email|callback_is_unique_email|xss_clean');
        $this->form_validation->set_rules('new_password','Password','trim|required|min_length[8]|max_length[18]|xss_clean');
        $this->form_validation->set_rules('confirm_password','Confirm password','trim|required|matches[new_password]|xss_clean');
        if($this->form_validation->run()==FALSE){
            $this->data['page_title']='Create Profile';
            $this->load->view('front/includes/header',$this->data);
            $this->load->view('front/register/create',$this->data);
            $this->load->view('front/includes/footer', $this->data);
        }else{
            $this->Register_mdl->create($usr_type);
        }
    }
}