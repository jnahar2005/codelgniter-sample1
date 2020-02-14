<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password_mdl extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	function forgot_password(){
		$email = $this->input->post('txtemail');
		$this->db->where('usr_email', $email); 
		$query = $this->db->get('user');
		$num = $query->num_rows();
		if($num==1){
			$row = $query->row();
			$usr_id = $row->usr_id; 
			$rand = rand(100000, 999999).$usr_id;
            $unique = sha1($rand);
            $this->db->where('usr_id', $usr_id); 
            $this->db->where('usr_email', $email); 
			$this->db->update('user',array('usr_temp_pass'=>$unique));
			$recover_link = base_url().'home/recover_password/'.$unique; 
        
	        $subject = 'Forgot password';
			$MailData['heading']= 'Dear '.ucwords($row->usr_firstname.' '.$row->usr_lastname); 
	        $MailData['textMsg']="We received a request to reset your password. To change your password, please click the link below within 24 hours of this email.<br><br>";             
        	$MailData['textMsg'].="Reset Your Password: <a href='".$recover_link."'>click here</a>.<br><br>";  
	        $MailData['textMsg'].= 'If you did not request to reset your password, please disregard this message. For additional questions, please feel free to contact us at any time.'; 
	        $message = $this->load->view('emailTemplate/view.php', $MailData, TRUE);
	        send_mail($email, $subject, $message);
	        $this->session->set_flashdata('success', str_msg4);
		}else{
	        $this->session->set_flashdata('error', str_msg5);
		}
	}
	

	function recover_password($sha_forgot){
		$this->db->where('usr_temp_pass', $sha_forgot);
		$query = $this->db->get('user');
		$num = $query->num_rows();
		if($num>0){	
			$row = $query->row();
			$usr_id = $row->usr_id;
			$password = $this->input->post('new_password');
			$data = array("usr_password"=>md5($password), "usr_temp_pass"=>'');
			$this->db->where('usr_id',$usr_id);
			$this->db->update('user', $data);
	        $this->session->set_flashdata('success', str_msg7);
		}else{
	        $this->session->set_flashdata('error', str_msg0);
		}	
	}
}	