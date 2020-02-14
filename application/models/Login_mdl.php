<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_mdl extends CI_Model {

    public function __construct() {    
        parent::__construct();
    }

    public function userlogin_details($sess_usr_id){ 
        $where = " usr_status='0' and usr_deleated='0'";
        $where.=" and usr_id = $sess_usr_id";
        $query = $this->db->query("SELECT *, ( SELECT GROUP_CONCAT(master_specialty.s_name) FROM `master_specialty` WHERE FIND_IN_SET(s_id, user.usr_specialty) ) AS specialties FROM `user` INNER JOIN user_address ON user_address.ua_fk_usr_id = user.usr_id AND user_address.ua_type = user.usr_default_address AND $where");
        return $query->row();             
    }

    public function get_language_by_ID($lan_ids){
       $this->db->select("GROUP_CONCAT(' ', lang_name) AS lang_name"); 
       $this->db->where("lang_id IN (".$lan_ids.")");
       $query = $this->db->get('master_language');
       if($query->num_rows()>0){
         return $query->row();
       }
    }

    function userLogin() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->where('usr_fk_mug_id!=','1');
        $this->db->where('is_medicare!=','1');
        $this->db->where('usr_deleated','0');
        $this->db->where('usr_email',$username);
        $this->db->where('usr_password',$password);
        $query = $this->db->get('user');
        $count=$query->num_rows(); 
        if($count==0){
            return 2;
        }else{
            $row = $query->row();
            if($row->usr_status==0){ 
                $session_data = array('sess_usr_id'=>$row->usr_id, 
                    'sess_usr_type'=> $row->usr_fk_mug_id,
                    'sess_is_medicare'=> $row->is_medicare,
                    'sess_usr_email'=> $row->usr_email, 
                    'logged_in'=>TRUE);
                $this->db->where('usr_id',$row->usr_id);
                $this->db->update('user',array('usr_last_login'=>time()));
                $this->session->set_userdata($session_data);
                setcookie('key', base64_encode($row->usr_id), time() + (86400 * 30), "/");
                //$this->session->set_flashdata('success', str_msg1);
                return 1;
            }else{
                return 0;     
            }
        }
    }//function


    /*--------------====--------------
            |- Contact Us -|
    --------------====--------------*/
    function contactus($adminEmail) {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phone = $this->input->post('phone');
        $extension = $this->input->post('extension');
        $email = $this->input->post('email');
        $messsage = $this->input->post('messsage');
        
        $this->db->where('con_email',$email);
        $query = $this->db->get('contactus');
        $count=$query->num_rows(); 
        if($count==0){
            $setData = array('con_firstname'=>$fname, 'con_lastname'=>$lname, 'con_phone'=>$phone, 
                'con_extension'=>$extension, 'con_email'=>$email, 'con_message'=>$messsage, 
                'con_created'=>time());
            $this->db->insert('contactus',$setData);
            $inserted_id = $this->db->insert_id();
        }else{
            $row = $query->row();
            $inserted_id = $row->con_id;
            $setData = array('con_firstname'=>$fname, 'con_lastname'=>$lname, 'con_phone'=>$phone, 
                'con_extension'=>$extension, 'con_message'=>$messsage, 'con_status'=>'0', 
                'con_deleated'=>'0', 'con_created'=>time());
            $this->db->where('con_id',$inserted_id);
            $this->db->update('contactus', $setData);
        }

        if(isset($inserted_id) && $inserted_id!=''){
            $name = $fname.' '.$lname;
            $subject = 'New Inquery!';
            $MailData['heading']= 'Hello '.ucwords('admin');
            $MailData['textMsg']="Please find a new inquiry! <br><br>";
            $MailData['textMsg'].="Name - $name <br>";
            $MailData['textMsg'].="Phone No. - $phone &nbsp;&nbsp;&nbsp;&nbsp; Ext.# - $extension <br>";
            $MailData['textMsg'].="Email ID - $email <br>";
            $MailData['textMsg'].="Message -  $messsage";
            $message = $this->load->view('emailTemplate/view.php', $MailData, TRUE);
            send_mail($adminEmail, $subject, $message);
            return 1;
        }else{
            return 0;
        }
    }
        
}
