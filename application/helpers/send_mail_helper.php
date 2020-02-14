<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if( !function_exists('send_mail') ) {
		function send_mail($to, $subject, $message) {
	    	$config = array(
	            'protocol' => 'smtp',
	            'smtp_host' => 'email-smtp.us-west-2.amazonaws.com',
	            'smtp_user' => 'AKIA25QDDIMEVEXS6VXQ',
	            'smtp_pass' => 'BPbhgtyF8w+mv9D2Ei9oYSIB+9GPU1w8r6dJ4NMmKzzo',
	            'smtp_port' => 587,            
	        );
	        $config['mailpath'] = '/usr/sbin/sendmail';  
	        //$config['charset'] = 'iso-8859-1';
	        $config['charset'] = 'UTF-8';
	        $config['mailtype'] = 'html';
	        $config['newline'] = "\r\n";
	        $config['smtp_crypto'] = "tls";
	        $config['wordwrap'] = TRUE;
	        
	        $CI = & get_instance();
			$CI->load->library('email');
	        $CI->email->initialize($config); 
	        $CI->email->from('info@bridge2pt.com',"Bridge2pt");
			$CI->email->to($to);
			$CI->email->subject($subject);
			$CI->email->message($message);
	        if (!$CI->email->send()) {
	           	return(0);
 				//echo $CI->email->print_debugger();
	        } else {
	        	return(1);
	           	/*$data["message"] = "Message sent correctly!";
				echo 'yes';*/
	        }
	    }//function
	}//function-exist
?>