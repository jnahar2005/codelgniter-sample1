<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('checkIfLoggedIn')){
    function checkIfLoggedIn($session_loggedIn){
        $loggedIn = $session_loggedIn;
        if($loggedIn == false){	
			$redirect_url = urlencode(uri_string());
            redirect(base_url().'?redirect_url='.$redirect_url);
        }
    }
}