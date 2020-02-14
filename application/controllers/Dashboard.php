<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper('userlogin');
        checkIfLoggedIn($this->session->userdata('sess_usr_id'));
        $this->data['sess_usr_id']= $this->session->userdata('sess_usr_id');
        $this->data['sess_usr_type']= $this->session->userdata('sess_usr_type');
        $this->data['success_msg']=$this->session->flashdata('success');
        $this->data['error_msg']=$this->session->flashdata('error');
        $this->data['title']='Title';
        $this->data['active_class']=''; 
        $this->data['adminEmail']= SITE_EMAIL;
    }

    /*--------------====--------------
        |- Show Dashboard all detail and tab -|
    --------------====--------------*/
    public function index(){
        $this->data['page_title']='Home';
        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/dashboard/view',$this->data);
        $this->load->view('front/includes/footer', $this->data);
    }

}