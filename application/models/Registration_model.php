<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Registration_model extends CI_Model{
  
    
    function getranks() {
        $query11 = $this->db->get('ranks');
        $row11 = $query11->num_rows(); 
        if($row11) {
            return $query11->result_array();
        } else {
            return FALSE;
        }

    }

    function getunits() {
		$this->db->order_by('unit_name', 'asc');
        $query12 = $this->db->get('units');
        $row12 = $query12->num_rows(); 
        if($row12) {
            return $query12->result_array();
        } else {
            return FALSE;
        }
    }



    function createuser($userdata) {

        $dateofjoining  = date("Y-m-d", strtotime($userdata['dateofjoining']) );
        $dob1           = date("Y-m-d", strtotime($userdata['dob']) );
        $testyear       = date("Y-m-d", strtotime($userdata['testyear']) );

        $testcenterid = $this->session->userdata();		
        $testcenterid1 =  $testcenterid['userdata'][0]['testcenter'];
		
		
		// echo "<pre>";
		// print_r($testcenterid);
		
        $this->db->distinct('id');        
        $qrry = $this->db->get_where('tbl_testcenterlist', ['id'=>$testcenterid1]);
        $row  = $qrry->num_rows();
		
        if($row > 0) {
            $cand_testcenter_id   = $qrry->result_array();
        }

        $data = array(
                            'firstname'                 => $userdata['firstname'],
                            'lastname'                  => $userdata['lastname'],                           
                            'beltnumber'                => $userdata['beltnumber'],                            
                            'rank'                      => $userdata['rank'],
                            'unit'                      => $userdata['unit'],                
                            'dateofjoining'             => $dateofjoining,
                            'dob'                       => $dob1,
                            'examlanguage'              => $userdata['examlanguage'],                          
                            'testyear'                  => '2018',
							'email'                  	=> $userdata['emailid'],
							'mobile'                  	=> $userdata['mobileno'],
                            'testcenter'                => $testcenterid1,
							'createdby_registrar_id'	=> $testcenterid['userdata'][0]['id'],
							'createdby_registrar_email'	=> $testcenterid['userdata'][0]['email'],
							'createdby_registrar_idno'	=> $testcenterid['userdata'][0]['idno'],
							'regestrationcenterip'		=> $this->input->ip_address()
							
                );
				
				
		// print_r($data);
		

        $queryy1 = $this->db->insert('tbl_users', $data);
		$user_id = $this->db->insert_id();
		
		
		if($queryy1 === TRUE) { 
			
			$emaildata = array('email' => $userdata['emailid']);
			$query = $this->db->insert('all_email', $emaildata); 
		
			if($query === TRUE){
				 // QUERY EXECUTED SUCCESSFULLY
				// DATA INSERTED INTO tbl_users TABLE
				// echo "SUCCESS";
				
				$data1 = array(
								'user_id' => $user_id
								);
				$k = $this->db->insert('tbl_user_questions_detail', $data1);
				
				if($k === TRUE) {
					//echo "SUCCESS";
					return "SUCCESS";
				} else {
					//echo "ERROR_OCCURED";
					return "ERROR_OCCURED";
				}
			}else{
				return "ERROR_OCCURED";
			}  
		} else {
				// SOME ERROR OCCURED WHILE EXECUTING QUERY
				 echo "ERROR OCCURED";

				//return "ERROR_OCCURED";
		}

    }



    function summary() {
		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess);
		// exit;
		
		$userid22 = $sess['registrar_Id_number'];
		
		
        $this->db->DISTINCT('beltnumber');
		$this->db->where(['tbl_users.createdby_registrar_idno'=> $userid22, 'tbl_users.status'=>'1']);
        $this->db->from('tbl_users');		
        $this->db->join('ranks', 'tbl_users.rank = ranks.id');
        $this->db->join('units', 'tbl_users.unit =  units.id');
        $this->db->join('tbl_testcenterlist', 'tbl_users.testcenter =  tbl_testcenterlist.id');
        $query = $this->db->get();
        $row    = $query->num_rows();
		
	    if($row > 0) {
            $res   = $query->result_array();        
            return $res;
        } else {
            return "NO_USER_FOUND";
        }

    }





    function viewsingleuser() {

        $sess = $this->session->userdata();
            
        $first_name     =  $sess['firstname'];
        $last_name      =  $sess['lastname'];       
        $belt_number    =  $sess['beltnumber'];

        $query  = $this->db->get_where('tbl_users',['firstname'=>$first_name,'lastname'=>$last_name,'beltnumber'=>$belt_number]);       
        $row    = $query->num_rows(); 
        
        if($row > 0) {
            return $query->result_array();
        }
    }



    function checkuser($beltnumber) {
        $query1 = $this->db->get_where('tbl_users',['beltnumber'=>$beltnumber]);
        $row1 = $query1->num_rows(); 
        if($row1) {
            return "USER_EXISTS";
        } else {
            return "NO_USER_FOUND";
        }
    }
	
	
	
	function fetchregistereduserdetails_model($param) {

        // $abc1    =  $this->db->get_where('tbl_users', ['beltnumber'=>$param, 'testcode']);
        // $row11   = $abc1->num_rows();
        // $candidate_data1 = array();

		
		$qry = "SELECT * FROM tbl_users WHERE beltnumber = ? and status = ?";
		$abc1  =  $this->db->query($qry, array($param, '1'));
		$row11 = $abc1->num_rows();	
		
       if($row11) {  
            $candidate_data1['personal'] = $abc1->result_array()[0];

            if($abc1->result_array()){
                $aaa = $abc1->result_array();
                $rank_id1 = $aaa[0]['rank'];
                $test_center1 = $aaa[0]['testcenter'];
                $unit_number1 = $aaa[0]['unit'];


                $n = $this->db->get_where('ranks',['id'=>$rank_id1]);
                $m = $this->db->get_where('units',['id'=>$unit_number1]);
                $y = $this->db->get_where('tbl_testcenterlist',['id'=>$test_center1]);

                $n2 = $n->result_array(); 
                $m2 = $m->result_array(); 
                $y2 = $y->result_array(); 


                if($n2){
                    $candidate_data1['rank'] = $n2[0]['rank_name'];
                }
                if($m2){
                    $candidate_data1['unit'] = $m2[0]['unit_name'];
                }
                 if($y2){
                    $candidate_data1['testcenter'] = $y2[0]['name'];
                }
            }
        }
        
        
            // echo "<pre>";
            // print_r($candidate_data1);


            return $candidate_data1;
           
    }
	
	
	
		function candidaterank($user_rankid){
			$z1 = $this->db->get_where('ranks',['id'=>$user_rankid]);
			return $z1->result_array()[0];
		}

		
		function candidateunit($user_unitid){
			$z2 = $this->db->get_where('units', ['id'=>$user_unitid]);
			return $z2->result_array()[0];
		}
		
		
		function updateuser($userdata) {
		
			$dateofjoining  = date("Y-m-d", strtotime($userdata['dateofjoining']) );
			$dob1           = date("Y-m-d", strtotime($userdata['dob']) );			

			$data = array(
								'firstname'                 => $userdata['firstname'],
								'lastname'                  => $userdata['lastname'],
								'rank'                      => $userdata['rank'],
								'unit'                      => $userdata['unit'],                
								'dateofjoining'             => $dateofjoining,
								'dob'                       => $dob1,
								'email'                  	=> $userdata['emailid'],
								'mobile'                  	=> $userdata['mobileno']
					);
								
			
			$this->db->where('beltnumber', $userdata['beltnumber']);
			$queryy1 = $this->db->update('tbl_users', $data);
			
			if($queryy1 === TRUE) { 
				return "SUCCESS";
			} else {
				return "ERROR";
			}
		}
				
				
				
				
		function updatetestcode($testcode, $btlno) {
			$data1 = array(
							'testcode' => $testcode
						);	

			$this->db->where('beltnumber', $btlno);					
			$queryy1 = $this->db->update('tbl_users', $data1);						
		}
		
		
		
		
		function updateuserphoto($param1,$param2,$param3) {
		
			$data2 = array('photo' => $param3);
			
			$this->db->where(['beltnumber'=> $param1, 'id'=>$param2]);					
			$queryy2 = $this->db->update('tbl_users', $data2);
			
			if($queryy2) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public function check_email($email){
		
			$check_email = $this->db->get_where('all_email', ['email' => $email,'status' => '1']);
			
			if($check_email->num_rows() !=''){
				return true;
			}else{
				return false;
			}
			
		}
		
}