<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


    function __construct() {
        parent::__construct();
        
        $this->load->model('exam_model');

    }



    public function index() {
		
		exit;
        $this->load->view('templates/header');
        $this->load->view('index');
        $this->load->view('templates/footer');
    }



    
    public function examlogin()  {
		
		exit;
        $this->load->view('templates/virtual_keyboard_header');
        $this->load->view('login');
        $this->load->view('templates/virtual_keyboard_footer');
    }





    public function validate() {
        $this->form_validation->set_rules('password_code', 'Exam Code', 'trim|required|alpha_numeric|min_length[8]|max_length[15]');


        if ($this->form_validation->run() == FALSE) {
            // validation failed
            // redirect back to index function
			$this->session->set_flashdata('msg','USER_NOT_FOUND');
            $this->examlogin();
        }
        else {
            // validation passed
            // compare test code in tbl_users table, and check if person is authorised to give test             


            $test_code    = html_escape($this->input->post('password_code'));

            if($test_code) {
                $result  = $this->exam_model->verifyuser($test_code);

                if($result === "USER_NOT_FOUND") {
                    // user not found
                    // give warning

                    // echo "user not found";
					$this->session->set_flashdata('msg','USER_NOT_FOUND');
					$this->examlogin();
					
                } else {
                    // user found
                    // start test;

                    $this->session->set_userdata('Candidate_data', $result);					
					$sessionid = $this->session->userdata('Candidate_data');
					
					
				$u_id = $sessionid[0]['id'];
					$test_code = $sessionid[0]['testcode'];					
				
				// echo "<pre>";
				// print_r($sessionid);exit;
					$cookie_name = "test_code";
					$cookie_value = $test_code;
					
					if(!isset($_COOKIE[$cookie_name])) {
						
						$first_time_login_using_cookie = $this->exam_model->count_using_cookie($u_id);
						// var_dump($first_time_login_using_cookie);exit;
						if($first_time_login_using_cookie > 0){
							$msg = array();
							$msg['msg'] = "You are already logged-in";
							//print_r($msg);
							$this->load->view('templates/testheader');
							$this->load->view('thanks', $msg);
							$this->load->view('templates/testfooter');
							
							//exit;
						}else{
							$count_using_cookie = $this->exam_model->insert_count_using_cookie($u_id);
							setcookie($cookie_name, $cookie_value, time() + (14400), "/"); // 14400 = 4 hrs		
							$first_time_login_using_cookie = $this->exam_model->count_using_cookie($u_id);
							// var_dump($first_time_login_using_cookie);exit;
							redirect('/test/instruction_page', 'refresh');		
						}
					} else {
						
						if($_COOKIE[$cookie_name] == $cookie_value){
							redirect('/test/instruction_page', 'refresh');
							
						}else{
							$first_time_login_using_cookie = $this->exam_model->count_using_cookie($u_id);
							// var_dump($first_time_login_using_cookie);exit;
							if($first_time_login_using_cookie > 0){
								// echo "Someone is already loggedin";
								
								$msg['msg'] = "You are already logged-in";
								//print_r($msg);
								
								$this->load->view('templates/testheader');
								$this->load->view('thanks', $msg);
								$this->load->view('templates/testfooter');
										
								//exit;
							}else{
								$count_using_cookie = $this->exam_model->insert_count_using_cookie($u_id);
								setcookie($cookie_name, $cookie_value, time() + (14400), "/"); // 14400 = 4 hrs		
								$first_time_login_using_cookie = $this->exam_model->count_using_cookie($u_id);
								// var_dump($first_time_login_using_cookie);exit;
								redirect('/test/instruction_page', 'refresh');		
							}
						}
					} 
					
					redirect('/test/instruction_page', 'refresh');	
                }
            } else {
                // user did not enter test code
                // error message


                $this->examlogin();

            }
        }
    }

    
    function logout() {
        session_destroy();

        $this->load->view('templates/header');
        $this->load->view('thanks');
        $this->load->view('templates/footer');
    }






}