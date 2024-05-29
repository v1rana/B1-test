<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_model extends CI_Model {
	
        function login($userdata){
           $data = array();
           
           $username = html_escape($userdata['username']);
           $password1 = html_escape($userdata['password']);

           $password = $this->encryption->decrypt($password1);
           
           if($username !== '' && $password !== '') {
               $this->db->where("(email = '$username' AND  status = '1')");
               $query = $this->db->get('registrar');
               $row = $query->num_rows(); 
               
               if($row > 0){                   
                   $res   = $query->result_array();
                   foreach($res as $val){                      
                       if (password_verify($password, $val['password'])) {

							
							$qry = "select *,registrar.id as registrarid1 from registrar join registrarrank on registrarrank.id = registrar.rank join tbl_testcenterlist on  tbl_testcenterlist.id = registrar.testcenter where registrar.status = ? AND registrar.email = ?";
			
							$query1 =  $this->db->query($qry, array('1', $username));
							
							if($query1) {
								return $query1->result_array();
							} else {
								return FALSE;
							}
							
                       } else {
                        // echo "password did not matched";

                           return FALSE;
                       }
                   }
               } else {

                // echo "user not found";
                      return FALSE;
               }
			}
        }


        function viewtestresults() {
			$testcenterid = $this->session->userdata();		
			$testcenterid1 =  $testcenterid['userdata'][0]['testcenter'];
			
            $qry = "select *,tbl_users.id as usriddd from tbl_users join tbl_testresult on tbl_users.id = tbl_testresult.user_id join ranks on  tbl_users.rank = ranks.id join units on tbl_users.unit = units.id join tbl_testcenterlist on tbl_users.testcenter = tbl_testcenterlist.id join tbl_user_questions_detail on tbl_user_questions_detail.user_id = tbl_users.id where tbl_users.testcenter = ? and tbl_users.status = '1'";
			
			$qry2 =  $this->db->query($qry, array($testcenterid1));

            if($qry2->result_array()) {             
                return $qry2->result_array();
            } else {             
                return FALSE;
            }
        
        }

	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// REGISTRAR LEVEL ANALYTICS /////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		
		
		
		function registrar_candidate_count(){
			
			$registrar_data 		= $this->session->userdata();
			$registrar_id 			= $registrar_data['registrar_user_id'];
			$registrar_idno 		= $registrar_data['registrar_Id_number'];
			$registrar_testcenter 	= $registrar_data['registrar_testcenter_id'];					
						
			$this->db->distinct('id');
            $qry2 		= $this->db->get_where('tbl_users',['testcenter' => $registrar_testcenter, 'createdby_registrar_idno' => $registrar_idno, 'status' => '1']);
            $rowcount2 	= $qry2->num_rows();

            return $rowcount2;
			
		}
		
		
		
		function registrar_admitcard_count(){
		
			$registrar_data 		= $this->session->userdata();
			$registrar_id 			= $registrar_data['registrar_user_id'];
			$registrar_idno 		= $registrar_data['registrar_Id_number'];
			$registrar_testcenter 	= $registrar_data['registrar_testcenter_id'];
					
			
			$this->db->distinct('id');
			$qry3 		= $this->db->get_where('tbl_users',['status'=>'1', 'testcenter' => $registrar_testcenter, 'createdby_registrar_idno' => $registrar_idno, 'testcode <>'=>null]);
            $rowcount3 = $qry3->num_rows();

            return $rowcount3;
		}
		
		
		
		
	
			
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// FORGOT PASSWORD ////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		
			
		function forgotpassword($userdata) {
            $data = array();
           
            $username               = $userdata['username'];
            $newpassword            = $userdata['password_hash']; 

            
            if($username != '' &&  $newpassword != '') {
                // check if user exists
                // if exists, then update password
                // if user not exists, then give error invalid user supplied

				$a1 = $this->db->get_where('registrar',['email'=>$username]);
								
                if($a1->result_array()) {
                    // user found, now update password

                    $sql1 = "UPDATE registrar SET password = ?, randompasswordstatus = ? where email = ?";
                    $qry2 =  $this->db->query($sql1, array($newpassword, '0', $username));

                    if($qry2 === TRUE) {
                        // Password Updated Successfully
                        return "SUCCESS";
                    } else {
                        // Some error occured, Please try later
                        return "ERROR_OCCURED";
                    }
                } else {
                    // echo "INVALID_USER";
                    return "INVALID_USER"; 
                }
            }
        }
		
		
		
		
		function checkpass_status() {
			$usr_id1 	= $this->session->userdata('registrar_user_id');
			$usr_eml1 	= $this->session->userdata('registrar_emailidd');			
			
			$z1 = $this->db->get_where('registrar', ['id'=>$usr_id1,'email'=>$usr_eml1]);
			
			if($z1){
				return $z1->result_array()[0]['randompasswordstatus'];
			}
		}
		
		
			
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// UPDATE PASSWORD /////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		
		
		function updatepassword($userdata) {
            $data = array();
           
            $username               = $userdata['username'];
            $oldpassword1            = html_escape($userdata['password']); 
            $newpassword1            = html_escape($userdata['newpassword']);
            $confirmnewpasword1      = html_escape($userdata['confirmnewpassword']); 
           
            $oldpassword = $this->encryption->decrypt($oldpassword1);
            $newpassword = $this->encryption->decrypt($newpassword1);
            $confirmnewpasword = $this->encryption->decrypt($confirmnewpasword1);


            if($username !== '' && $oldpassword !== '' && $newpassword !== '' && $confirmnewpasword !== '') {
                
                $this->db->distinct();
                $this->db->limit(1);
                $this->db->where("(email = '$username' AND  status = '1')");
                $query = $this->db->get('registrar');
                $row = $query->num_rows();                

                // echo "<pre>";
                // print_r($query->result_array());

                if($row > 0){
                    $res   = $query->result_array();

                    // print_r($res);


                    foreach($res as $val){

                        // echo $oldpassword;
                        // echo "<br>";
                        // echo $val['password'];

                        if(password_verify($oldpassword, $val['password'])) {

                            // credentials matched
                            // update password 
                            // echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                            // echo "Password Matched";

                            if($val['status'] == 1) {
                                $password_hash = password_hash($newpassword,PASSWORD_DEFAULT);
                                $sql1 = "UPDATE registrar SET password = ?, randompasswordstatus = ? where email = ?";
                                $qry2 =  $this->db->query($sql1, array($password_hash, '1', $username));
                                if($qry2) {
                                    // Password Updated Successfully
									$this->session->set_userdata(['updatedpassword'=>$newpassword]);
                                    return "SUCCESS";
                                } else {
                                    // Some error occured, Please try later
                                    return "ERROR_OCCURED";
                                }
                            }
                        } else {
                            // authentication failed
                            // password did not matched
                            // send status with authentication failed

                            //echo "Password Failed";

                            return "AUTHENTICATION_FAILED";
                        }
                    }
                } else {
                    // no such user found
                    // send status no user found
                    
                    return "NO_USER_FOUND";
                }
            } else {
                // update form fields are required
                // redirect to update password form
                return "ALL_FIELDS_REQUIRED";
            }
        }
		
		
		
		
		
		
		function printresultcard($usridd) {
		
			$testcenterid = $this->session->userdata();		
			$testcenterid1 =  $testcenterid['userdata'][0]['testcenter'];
			
            $qry7 = "select *,tbl_users.id as userid1 from tbl_users join tbl_testresult on tbl_users.id = tbl_testresult.user_id join ranks on  tbl_users.rank = ranks.id join units on tbl_users.unit = units.id join tbl_testcenterlist on tbl_users.testcenter = tbl_testcenterlist.id join tbl_user_questions_detail on tbl_user_questions_detail.user_id = tbl_users.id where tbl_users.testcenter = ? and tbl_users.id = ? and tbl_users.testcode != ?";
			
			$qry8 =  $this->db->query($qry7, array($testcenterid1, $usridd, ''));

            if($qry8->result_array()) {
				// echo "<pre>";
				// print_r($qry8->result_array());
				
				
                 return $qry8->result_array();
            } else {             
                 return FALSE;
            }
		
		}
		
    }