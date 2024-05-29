<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

	
    public function fetch_user_quest_from_all_questions() {
		
		$sql = "(SELECT * FROM questions WHERE cat_id IN('24') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 10)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('28') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 6)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('29') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 6)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('30') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 16)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('31') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 15)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('32') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 4)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('33') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 4)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('34') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 5)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('35') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 3)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('36') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 10)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('37') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 10)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('38') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 9)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('49') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 1)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('47') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 1)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('50') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 13)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('51') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 5)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('60') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 2)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('61') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 10)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('62') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 2)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('63') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 3)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('64') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 2)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('65') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 2)
			UNION
			(SELECT * FROM questions WHERE cat_id IN('66') AND LANGUAGE='H' AND STATUS='1' ORDER BY RAND() LIMIT 1)";
        $qry2 =  $this->db->query($sql, array(EXAM_QUESTIONS));
	
        if ($qry2->result_id->num_rows > 0) {		

            return $qry2->result();
        } else {
            return false;
        }
    }

    public function insert_user_questions($data,$mac) {
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
	
		$this->db->set('attempt', '1');
		$this->db->set('user_log_count', '1');
        $this->db->where('id', $user_id);/////particular user id whose question is to be inserted///
        $this->db->where('status', '1');
        $updated = $this->db->update('tbl_users');
		
        if ($updated) {
			
			$ip_in = $this->input->ip_address();
			$time_now = strtotime("now");
			
			$this->db->set('questions_alloted', $data);
			$this->db->set('answer_time_submit', $time_now);
			$this->db->set('exam_start_status', '1');
			$this->db->set('exam_start_time', $time_now);
			$this->db->set('session_time_in', $time_now);
			$this->db->set('session_time_out', $time_now);
			$this->db->set('mac_address1', $mac);
			$this->db->set('client_ip_in', $ip_in);
			$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
			$updated = $this->db->update('tbl_user_questions_detail');

			
			if($updated){
				return true;
			}else{
				return false;
			}
		} else {
            return false;
        }
    }
    
    public function update_user_answers($data) {
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];

        $this->db->set('questions_alloted', $data);
        $this->db->set('answer_time_submit', strtotime("now"));
        $this->db->set('session_time_out', strtotime("now"));
		
        $this->db->where('user_id', $user_id);/////particular user id whose answers are to be inserted///
        $updated = $this->db->update('tbl_user_questions_detail');
		
		if($updated){
			
			$this->db->where('user_id', $user_id);/////particular user id whose answers are to be inserted///
			$qry = $this->db->get('tbl_user_questions_detail');
			return $qry->result();
			
			} else {
			
				return FALSE;
			
			}
		
    }
    
    public function fetch_user_answers($data) {

        $sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
        $this->db->where('user_id', $user_id);/////particular user id whose answers are to be inserted///
        $qry = $this->db->get('tbl_user_questions_detail');

        if ($qry->result_id->num_rows > 0) {		
            return $qry->result();
        } else {
            return false;
        }
    }

    public function fetch_user_questions() {
        $sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		
        $this->db->where('user_id',$user_id); /////particular user id whose question is to be fetched///				
        $qry = $this->db->get('tbl_user_questions_detail');
		
        if ($qry->result_id->num_rows > 0) {			

            return $qry->result();
        } else {
		
            return false;
        } 
        
    }
	
	public function fetch_questions() {
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
        
        $this->db->where('user_id', $user_id); /////particular user id whose question is to be fetched///
        $qry = $this->db->get('tbl_user_questions_detail');

        if ($qry->result_id->num_rows > 0) {	

            return $qry->result();
        } else {
            return false;
        }
        
    }
	
	public function fetch_all_questions(){
				
		$sql  = "SELECT id,correct from questions WHERE cat_id IN (24,28,29,30,31,32,33,34,35,36,37,38,49,47,50,51,60,61,62,63,64,65,66) AND LANGUAGE='H' AND status='1'";
		
		$qry =  $this->db->query($sql);	

        if ($qry->result_id->num_rows > 0) {	

            return $qry->result();
        } else {
            return false;
        }
		
	}
	
	public function check_user_loggedtime($log_count){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		$this->db->set('user_log_count',$log_count);
        $this->db->where('id', $user_id);/////particular user id whose answers are to be inserted///
        $this->db->where('status', '1');
        $this->db->update('tbl_users');
		
		
		$this->db->select('exam_start_status,answer_time_submit,exam_start_time,session_time_out,session_time_in'); 
		$this->db->where('user_id', $user_id);
		$this->db->from('tbl_user_questions_detail');
		$qry = $this->db->get();  
		
		if ($qry->result_id->num_rows > 0) {	

            return $qry->result();
        } else {
            return false;
        }
		
	}
	
	public function check_user(){
		
		$sessionid = $this->session->userdata('Candidate_data');	
        $user_id = $sessionid[0]['id'];
        
		$this->db->select('*')
		 ->where('tbl_user_questions_detail.user_id', $user_id)
		 ->where('tbl_users.status', '1')
         ->from('tbl_user_questions_detail')
         ->join('tbl_users', 'tbl_user_questions_detail.user_id = tbl_users.id');
		$qry = $this->db->get();
		
		if ($qry->result_id->num_rows > 0) {	

            return $qry->result();
        } else {
            return false;
        }
	}

	public function update_user_exam_end_status_time(){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		
		$ip_out = $this->input->ip_address();
		// exit;
		$this->db->set('exam_end_status', '1');
        $this->db->set('exam_end_time', strtotime("now"));
        $this->db->set('session_time_out', strtotime("now"));
		
		$this->db->set('client_ip_out', $ip_out);
        $this->db->where('user_id', $user_id);/////particular user id whose answers are to be inserted///
        $updated = $this->db->update('tbl_user_questions_detail');	
		
		
		if($updated){
			// echo "TRUE";		
			return TRUE;
		} else {
			// echo "FALSE";	
			return FALSE;
		}
		
    }




    
/** CHANGES DONE ON 20-jan-2019 */

    function insert_result($result_data){

        $userdata1 = $result_data['userdata'][0]['id'];

        if($userdata1 != ''){

            $unattempted_questions = EXAM_QUESTIONS-($result_data['questions_attempted']);

            $testdata = array(
                                'user_id'           =>$result_data['userdata'][0]['id'],
                                'beltnumber'        =>$result_data['userdata'][0]['beltnumber'],
                                'usertestcode'      =>$result_data['userdata'][0]['testcode'],
                                'totalquestions'    =>EXAM_QUESTIONS,
                                'totalattempted'    =>$result_data['questions_attempted'],
                                'totalunattempted'  =>$unattempted_questions,
                                'correctanswers'    =>$result_data['correct_answers'],
                                'wronganswers'      =>$result_data['incorrect_answers'],
                                'marks_obtained'    =>$result_data['marks_obtained']
            );

	
            $qry = $this->db->insert('tbl_testresult', $testdata);

            if($qry) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }


    function viewresult(){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		$sql123 = "SELECT beltnumber,usertestcode,totalquestions,totalattempted,totalunattempted,correctanswers,wronganswers,testdatetime FROM tbl_testresult WHERE tbl_testresult.user_id = $user_id LIMIT 1";
		
		$q1234 = $this->db->query($sql123);
		// echo "<pre>";
		// print_r($q1234);
		if ($q1234->result_id->num_rows > 0) {	
			return $q1234->result_array();
        } else {
            return FALSE;
			
        }
    }
	
	public function instruction(){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		$q2 = $this->db->get_where('tbl_users', ['id'=>$user_id,'status' => '1']);
		if ($q2->result_id->num_rows > 0) {	
			return $q2->result_array();
		}else{
			return FALSE;
		}
		
	}
	
	public function session_timeout($time){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
	
		
		$this->db->set('session_time_out', $time);
        $this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
        $updated = $this->db->update('tbl_user_questions_detail');
		if($updated){
			return true;
		}else{
			return false;
		}
		
	}
	
	public function time_spend($time){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
		$data = $this->db->get('tbl_user_questions_detail');
		
		if ($data->result_id->num_rows > 0) {	
			$res = $data->result_array();
			
			$time1 = $res[0]['time_spend'];
						
			$time_spend = $time + $time1 ;
			
			$this->db->set('time_spend', $time_spend);
			$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
			$updated = $this->db->update('tbl_user_questions_detail');
			
			if($updated){
				
				return $time1;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	
	}
	
	public function session_timein(){
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		$this->db->set('session_time_in',strtotime("now"));
		$this->db->set('session_time_out',strtotime("now"));
		$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
		$updated = $this->db->update('tbl_user_questions_detail');
		
	}
	
	public function mac_address($number, $mac_add){
		
		
		$sessionid = $this->session->userdata('Candidate_data');	
		$user_id = $sessionid[0]['id'];
		
		$this->db->set("mac_address".$number,$mac_add);
		$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
		$updated = $this->db->update('tbl_user_questions_detail');
		
	}
		
}
