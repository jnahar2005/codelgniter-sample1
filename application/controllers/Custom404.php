<?php
class custom404 extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
  		$this->output->set_status_header('404');
  		$this->load->view('front/includes/header');
       	$this->load->view('custom404view');
        $this->load->view('front/includes/footer');
    }
}
?>