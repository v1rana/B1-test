<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Exam_model extends CI_Model{

        
        function verifyuser($test_code) {          
            // var_dump($test_code);

            $qry = $this->db->get_where('tbl_users', array('testcode'=>$test_code));
            // echo "<pre>";
            // print_r($qry->result_array());

            if($qry->result_array()) {
                return $qry->result_array();
            } else {
                return "USER_NOT_FOUND";
            }


        }
		
		
		function count_using_cookie($user_id) {          
            
            $qry = $this->db->where('user_id',$user_id);
            $qry1 = $this->db->get('tbl_user_questions_detail');
            
			if($qry1->result_array()){
				return $count = $qry1->result_array()[0]['cookie_count'];
			}else{
				return false;
			}			
        }

		function insert_count_using_cookie($user_id) {          
           
			$this->db->set('cookie_count', 1);
			$this->db->where('user_id', $user_id);/////particular user id whose question is to be inserted///
			$updated = $this->db->update('tbl_user_questions_detail');
            
			if($updated){
				return true;
			}else{
				return false;
			}			
        }
      

    }