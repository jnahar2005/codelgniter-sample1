<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_helper_mdl extends CI_Model {	
	/**
	 * Constructor
	 *
	 * @access	public
	 */ 
	public function __construct() {
		parent::__construct();

	}

	/*--------------------
	  | Comman Image upload function
	---------------------*/
	public function upload_file($name, $path) {
		$config = array(
			'upload_path' => $path,
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => FALSE,
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		if ($this->upload->do_upload($name)) {
			return array('upload_data' => $this->upload->data());
		} else {
			return array('error' => $this->upload->display_errors());
		}
	}

	/*public function get_radius($unit, $lat1, $lon1, $lat2, $lon2){
        $unit = $unit;
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            $radius = $miles * 1.609344;
        } else if ($unit == "N") {
            $radius = $miles * 0.8684;//Nautical Miles
        } else {
            $radius = $miles; //Miles
        }
       	return $radius = (int)$radius;     
	}*/

	public function get_schedule_appointment_detail($pt_id,$selectedDate){
		$where = " schedule.sd_status='0' and schedule.sd_deleated='0'";
        $where.= " and schedule.sd_fk_usr_id=$pt_id AND schedule.sd_date='$selectedDate'";
		$this->db->from('schedule');
		$this->db->where($where);
		$this->db->join('appointment', 'appointment.app_date = schedule.sd_date AND appointment.app_pt_id = schedule.sd_fk_usr_id', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	/*public function get_row_where($table,$where){
		$this->db->where($where);
	  	$query = $this->db->get($table);
	  	if($query->num_rows() > 0) {
	   		return $query->row();
		} else { 
	   		return array();
		}
	}*/

	/*--------------------
		appTime: Appointment time in strtotime
		bookingDate: date of booking
		pt_id: patient id
		page: check appoinment book_status for set color'
	---------------------*/
	public function check_show_appoinment_book_status($appTime, $bookingDate, $pt_id){
        $explode_time = explode("||", $appTime);
        $start_time = $explode_time[0];
        $end_time = $explode_time[1];
		$this->db->where('app_pt_id', $pt_id);
		$this->db->where('app_date', $bookingDate);
		$this->db->where('app_start_time', $start_time);
		$this->db->where('app_end_time', $end_time);
	 	$this->db->where('app_status', '0');
	 	$this->db->where('app_deleated', '0');
		$query = $this->db->get('appointment');
		$num_rows = $query->num_rows();
		if($num_rows > 0){
	    	$row = $query->row();	
	    	return $row->app_book_status;
		}else{
			return 0;
		}
	}	

	/*--------------------
		startDate: Current date +1
		endDate: Current date +30
		page: Dashboard>>schedule>>view (For array of save Dates of schedules)
	---------------------*/
	public function check_specialty($startDate, $endDate){
		$usr_id = $this->session->userdata('sess_usr_id');
	 	$this->db->select('appointment.app_id,appointment.app_date, appointment.app_cancel_status, appointment.app_pt_id, appointment.app_deleated, schedule.*');
	    $this->db->from('appointment');
	    $this->db->join('schedule', 'appointment.app_pt_id=schedule.sd_fk_usr_id AND appointment.app_date = schedule.sd_date  AND appointment.app_deleated=0', 'right'); 
	    $where = " schedule.sd_status='0' and schedule.sd_deleated='0' and schedule.sd_fk_usr_id=$usr_id";
	    //$where.= " and schedule.sd_date >= '$startDate' and schedule.sd_date <= '$endDate'";
	    $where.= " and str_to_date(schedule.sd_date, '%m/%d/%Y') BETWEEN str_to_date('$startDate', '%m/%d/%Y') and str_to_date('$endDate', '%m/%d/%Y')";
		$this->db->where($where);
		$this->db->group_by('sd_date'); 
	    $query = $this->db->get();
	   	//echo $sql = $this->db->last_query(); die;
		$num_rows = $query->num_rows();
		if($num_rows > 0){
			return $query->result();
		}else{
			return array();
		}
	}

}



