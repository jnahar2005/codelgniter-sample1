<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Function_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Insert Update Data
	public function insert_update_data($data,$table,$table_id="",$id=""){
		if($id!=''&& $table_id!=''){
			$this->_update($id,$data,$table,$table_id);
			return $id;
		}else{
			$this->_insert($data, $table);
			return $lastinsertid =$this->db->insert_id();
		}
	}

    /*|--------------------------------------------------------------------------
    | General Update Function where array
    |--------------------------------------------------------------------------*/
	public function update_data_where($setData,$table,$whereArray){
		if(is_array($setData) && is_array($whereArray) && $table!=""){
			$data = $setData;
			$this->db->where($whereArray);
			$this->db->update($table, $data);
			return 1;
		}else{
			return 0;
		}
    }

	public function _insert($data, $table){		
		$this->db->set($data);
		if($this->db->insert($table) !== FALSE){
			return TRUE;
		}
		return array();
	}

	protected function _update($id, $data, $table, $table_id){
		$this->db->where($table_id, $id);
		if($this->db->update($table, $data) !== FALSE){
			return TRUE;
		}
		return array();
	}

	/*
    |--------------------------------------------------------------------------
    | General Mail Function to send mail
    |--------------------------------------------------------------------------
    */
   	public function general_mail($data) {
        if(!empty($data)){   
            $config['protocol']  = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'processing.synergytop@gmail.com';
            $config['smtp_pass'] = 'synergyTop@123';
            $config['mailtype']  = 'html';          
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
	        $this->email->to($data['to']);
	        //$this->email->from(ADMIN_EMAIL, SITE_NAME);
	        $this->email->subject($data['msg']);
	        $this->email->message($data['subject']);
	        if (!empty($data['file'])) {
	            foreach ($data['file'] as $val) {
	                $this->email->attach($val);
	            }
	        }
	        if (!$this->email->send()) {
	            return(0);
	        }else {       	
	            return(1);
	        }
	    }else{
	    	return(0);
	    }
    }

    /*
    |--------------------------------------------------------------------------
    | General get_all_where_as_select Function to send mail
    |--------------------------------------------------------------------------
    */
	public function get_all_where_as_select($table,$where,$where_or='',$select='',$group_by='',$order_by=array(),$limit=''){  	

	  	if($table){
		  	$this->db->select(($select)?$select:"*");
		  
		  	if(!empty($where))
		 	$this->db->where($where);
		  
		  	if($where_or){
		   		$this->db->or_where($where_or);
		  	}
		  
		  	if($group_by)
		  	$this->db->group_by($group_by);
	     	
	      	if(!empty($order_by))
			$this->db->order_by($group_by);

	      	if(!empty($limit))
	      	$this->db->limit(1);
	      
		  	$query = $this->db->get($table);
		  	if($query->num_rows() > 0) {
		   		return $query->result();
			} else { 
		   		return array();
			}
		}else{
			return array();
		}
	 }


    /*
    |--------------------------------------------------------------------------
    | General get_all_where
    |--------------------------------------------------------------------------
    */
	public function get_all_where($table,$where,$where_or='',$order_by=''){
		$this->db->where($where);
	  	if($where_or){
	   		$this->db->or_where($where_or);
	  	}
	  	if(!empty($order_by)){
			$this->db->order_by($order_by);
	  	}
	  	if(!empty($group_by)){
			$this->db->group_by($group_by);
	  	}
		$query = $this->db->get($table);
	  	if($query->num_rows() > 0) {
			return $query->result();
		} else { 
			return array();
		}
	 }

	public function get_all_where_count($table='',$whereArray){
		$query = $this->db->get_where($table,$whereArray);
		if($query->num_rows() > 0) {
			return $query->num_rows();
	  	} else { 
			return '0';
	  	}
	}

	public function get_all($table){  
		$query = $this->db->get($table);
	  	if($query->num_rows() > 0) {
	   		return $query->result();
		} else { 
	   		return array();
		}
	}

	public function delete_data($tabel,$arrayData){
		if($this->db->delete($tabel, $arrayData)){
			return(1);	
		}else{
			return(0);
		}
	}

	public function get_check($table,$req,$res){
		$this->db->select($res);
		$this->db->where($req);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->num_rows();
	  	} else { 
			return array();
	  	}
	}

	public function get_one_where($table,$where,$where_or='',$order_by=''){
		$this->db->where($where);
		if($where_or){
			$this->db->or_where($where_or);
		}
	  	if($order_by){
	   		$this->db->order_by($order_by);
	  	}
	  	$query = $this->db->get($table);
	  	if($query->num_rows() > 0) {
	   		return $query->row();
		} else { 
	   		return (object)array();
		}
	}


	public function call_curl($url='',$postData=array()){		
		$params = '';
	   	if(is_array($postData) && !empty($postData)){
		    foreach($postData as $key=>$value)
		        $params .= $key.'='.$value.'&';
		    	$params = trim($params, '&');
	   	}

	    $ch = curl_init();
        curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            )
        );
        if($params!=''){
        	curl_setopt($ch, CURLOPT_HEADER, 0);
		    //We add these 2 lines to create POST request
		    curl_setopt($ch, CURLOPT_POST, count($postData)); //number of parameters sent
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //parameters data
        }

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        $output = array(
			'status'=>"Success",
			"status_code" => 200,
			"data" => curl_exec($ch)
		);

        //Print error if any
        if(curl_errno($ch)){
          	$output = array(
				'status'=>"Error",
				"status_code" => 404,
				"data" => curl_error($ch)
			); 
        }
        curl_close($ch);
        return $output;
	}

	/*
    |--------------------------------------------------------------------------
    | Random String
    |--------------------------------------------------------------------------
    */    
    function random_string() {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Token
    |--------------------------------------------------------------------------
    */    
    function create_token($planPassword) {
        $hashed_password = md5($planPassword);
        return $hashed_password;
    }

    /*
    |--------------------------------------------------------------------------
    | get_token_data
    |--------------------------------------------------------------------------
    */    
    function get_token_data($token) {
        $this->db->select("*, (SELECT referral.r_code FROM referral WHERE referral.r_fk_uc_id = user_creditional.uc_id) AS r_code");
	    $this->db->from("user_creditional");
	    $this->db->where('uc_token ',$token);
	    $q = $this->db->get();
	    return current($q->result());
    }

}