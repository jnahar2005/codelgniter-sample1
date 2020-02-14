<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*--------------------
	Desc: Get Address by user id
---------------------*/
 	function get_user_address($usrid, $ua_type){
		$CI = & get_instance();
		return $CI->Function_model->get_one_where('user_address', array('ua_type'=>$ua_type, 'ua_fk_usr_id'=>$usrid, 'ua_status'=>'0'));
 	} 	

/*--------------------
	Desc: Get Language name of array By Id
---------------------*/
 	function getLanguagesById($langIds){
		$CI = & get_instance();
		$CI->db->where('lang_status', '0');
		$CI->db->where('lang_deleated', '0');
		$langIds = explode(',', $langIds);
		$CI->db->where_in("lang_id", $langIds);
		$query = $CI->db->get('master_language');
	  	if($query->num_rows() > 0) {
			return $query->result();
		} else { 
			return array();
		}
 	} 	

 /*--------------------
	Desc: Get specialty name by user id
---------------------*/
 	function get_specialty($s_id){
		$CI = & get_instance();
		return $CI->Function_model->get_one_where('master_specialty', array('s_id'=>$s_id, 's_status'=>'0', 's_deleated'=>'0'));
 	} 	

/*--------------------
	startDate: Current date +1
	endDate: Current date +30
	page: Dashboard>>schedule>>view (For array of save Dates of schedules)
---------------------*/
 	function check_specialty($startDate, $endDate){
		$CI = & get_instance();
		return $CI->Master_helper_mdl->check_specialty($startDate, $endDate);
 	} 	

/*--------------------
	appTime: Appointment time in strtotime
	bookingDate: date of booking
	pt_id: patient id
	page: check appoinment book_status for set color'
---------------------*/
 	function check_show_appoinment_book_status($appTime, $bookingDate, $pt_id){
		$CI = & get_instance();
		return $CI->Master_helper_mdl->check_show_appoinment_book_status($appTime, $bookingDate, $pt_id);
 	}
 	