<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/kolkata");
		error_reporting(0);
       
        $this->load->model('Test_model');
        // $this->load->helper('form');
        // $this->load->helper('url');
        $this->load->helper('check_session');
		$this->load->helper('mac_helper');
		 
    }
	
    public function insert_all_questions() {

        $res['questions'] = $this->Test_model->insert_all();
    }

    public function login() {
		
		$session = check_session();
		
		if($session['0']['id'] !=''){
		
			$checkuser = $this->Test_model->check_user();
			$exam_attempt        = $checkuser[0]->attempt;
			$exam_start_status        = $checkuser[0]->exam_start_status;
			$exam_end_status        = $checkuser[0]->exam_end_status;
			if($exam_attempt == 1){  
				if($exam_start_status == 1 && $exam_end_status == 1){ 
					
					
					$this->load->view('templates/testheader');
					$this->load->view('attemptover');
					$this->load->view('templates/testfooter');
					
					
				}elseif($exam_start_status == 1 && $exam_end_status == 0){ 
								
					$user_log_count = $checkuser[0]->user_log_count;	
					
					if($user_log_count > 9){
						// $msg['msg'] = "You already attempted maximum times, Please contact to your administrator";
						redirect(base_url() . 'Test/submit_test');
						//$this->session->set_flashdata('maxattemptmsg','You already attempted maximum times, Please contact to your administrator');
						// $this->load->view('templates/testheader');
						// $this->load->view('thanks', $msg);
						// $this->load->view('templates/testfooter');
						
					}else{
						$user_log_count = ++$user_log_count;
						
						
						$mac = GetMAC();
						
						$mac_add = $this->Test_model->mac_address($user_log_count,$mac);
						
						$time = $this->Test_model->check_user_loggedtime($user_log_count);
						// print_r($time);
						$exam_start_status        = $time[0]->exam_start_status;
						$exam_start_time    = $time[0]->exam_start_time;
						$answer_time_submit = $time[0]->answer_time_submit;
					
						$time_out = $time[0]->session_time_out;
						$time_in  = $time[0]->session_time_in;
						
						$time_spend = $time_out - $time_in;
						$diff = $this->Test_model->time_spend($time_spend);
						$session_in = $this->Test_model->session_timein();
						
						if(EXAMTIME > $diff){
							$this->session->set_flashdata('timer',$time_spend);
							$this->session->set_flashdata('test', 'resume_test');
							redirect('/test/fetch_user_questions/', 'refresh');
						}else{
							
							$msg['msg'] = "Your time is completed";
							
							$this->load->view('templates/testheader');
							$this->load->view('thanks', $msg);
							$this->load->view('templates/testfooter');
						}
						
					}	
				} else{
					
					$msg['msg'] = "Contact your Administrator";
							
					$this->load->view('templates/testheader');
					$this->load->view('thanks', $msg);
					$this->load->view('templates/testfooter');
					
				}
			}else{		////////////////////////////Exam Not Attempted///////////////////////
				
							
				$data1 = $this->Test_model->fetch_user_quest_from_all_questions();
				
				$user_questions = array();
				foreach($data1 as $data){
					
					$data = array("id"=> $data->id,"ques" => $data->ques,"opt1" => $data->opt1,"opt2" => $data->opt2,"opt3" => $data->opt3,"opt4" => $data->opt4,"user_answer" => '0',"image" => $data->image);
					$user_questions[] = $data;
				
				}
				$user_question['questions'] = $user_questions;
				$serialized_data = serialize($user_question['questions']);
				
				$mac = GetMAC();
				$updated_data = $this->Test_model->insert_user_questions($serialized_data,$mac);
				
				if ($updated_data) {
					$this->session->set_flashdata('test', 'start_test');
					redirect('/test/fetch_user_questions/', 'refresh');
				} 
				else {
					redirect('/test/error', 'refresh');
				}			
			}
		}else{
			redirect("main/examlogin");
		}
		
    }
	
	public function error(){
		$message['message'] = "There is some error in updating your question.Please try to login again";
		$this->load->view('templates/testheader');
        $this->load->view('error',$message);
        $this->load->view('templates/testfooter');
	}

    public function fetch_user_questions() {
		$session = check_session();
		//echo "<pre>";print_r($session);exit;
		if($session['0']['id'] !=''){
			
			if($this->session->flashdata('timer')){
						
				$data = $this->Test_model->fetch_user_questions();
				
				 if($data[0]->exam_end_status == '1'){
					
					$this->load->view('templates/testheader');
					$this->load->view('attemptover');
					$this->load->view('templates/testfooter');
				} else{ 
				
					$u_log_count = $this->Test_model->instruction();
					$user_questions['user_log_count'] =   $u_log_count[0]['user_log_count'];
					$user_questions['name']           =   $u_log_count[0]['firstname'] ." ".$u_log_count[0]['lastname'];
					$user_questions['testcode']       =   $u_log_count[0]['testcode'];
					
					$user_questions['questions'] = unserialize($data[0]->questions_alloted); 
					$time_spend = $data[0]->time_spend;
					$time_left = EXAMTIME - $time_spend;		
				
					$test = $this->session->flashdata('test');
					if($test == 'start_test'){
						$user_questions['test'] = $test; 
					}else{
						$user_questions['test'] = $test; 
					}
				
					$user_questions['time_left'] = $time_left; 
				
					$this->load->view('templates/testheader');
					$this->load->view('user_questions',$user_questions);
					$this->load->view('templates/testfooter');
				}
			}else{
				
				$data = $this->Test_model->fetch_user_questions();
				
				if($data[0]->exam_end_status == '1'){
					
					$this->load->view('templates/testheader');
					$this->load->view('attemptover');
					$this->load->view('templates/testfooter');
					// exit;
				} else{
				
					$u_log_count = $this->Test_model->instruction();
					$user_questions['user_log_count'] =   $u_log_count[0]['user_log_count'];
					$user_questions['name']           =   $u_log_count[0]['firstname'] ." ".$u_log_count[0]['lastname'];
					$user_questions['testcode']       =   $u_log_count[0]['testcode'];
					
					$user_questions['questions'] = unserialize($data[0]->questions_alloted); 
					$exam_start_time = $data[0]->exam_start_time;
					$answer_time_submit = $data[0]->answer_time_submit;
					$time_spend = $answer_time_submit - $exam_start_time;
					$time_left = EXAMTIME - $time_spend;		
				
					$test = $this->session->flashdata('test');	
						
					if($test == 'start_test'){
						$user_questions['test'] = $test; 
					}else{
						$user_questions['test'] = $test; 
					}
				
					$user_questions['time_left'] = $time_left; 
				
					$this->load->view('templates/testheader');
					$this->load->view('user_questions',$user_questions);
					$this->load->view('templates/testfooter');
				}
			}
			
			
		}else{
			redirect("main/examlogin",'refresh');
		}
	
    } 
	
	public function user_grid(){
		$qid = $this->input->post("user_quest");
		$userq_n = $this->input->post("user_quest_number");
		$user_next_quest = $this->input->post("next_quest");
		$user_back_quest = $this->input->post("back_quest");
		
		$data = $this->Test_model->fetch_user_questions();

		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				$q_ar = $quest;
			}
		}
		// echo "<pre>";
		// print_r($q_ar);
		// shuffle($q_ar);
		// print_r($q_ar);
		$question_ar['ques_id'] = $q_ar;
		$question_ar['user_ques_no'] = $userq_n;
		$question_ar['user_next_quest'] = $user_next_quest;
		$question_ar['user_back_quest'] = $user_back_quest;
		// print_r($question_ar);
        $this->load->view('user_grid_question_form',$question_ar);
		
	}

    public function next_question() {
		
		$qid = $this->input->post("user_quest");
		$userq_n = $this->input->post("user_quest_number");
		$user_answer = $this->input->post("user_quest_answer");
		$user_next_quest = $this->input->post("next_quest");
		$user_back_quest = $this->input->post("back_quest");
		$data = $this->Test_model->fetch_user_questions();
		
		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
		
        $updated_ans = array();
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				if($quest['opt1'] == $user_answer){
					$answer = 1;
				}elseif($quest['opt2'] == $user_answer){
					$answer = 2;
				}elseif($quest['opt3'] == $user_answer){
					$answer = 3;
				}elseif($quest['opt4'] == $user_answer){
					$answer = 4;
				}else{
					$answer = 0;
				}
				$quest['user_answer'] = $answer;
				$updated_ans[]=$quest;
			}else{
				$updated_ans[]=$quest;
			}
		}
	
		$updated_user_ans = serialize($updated_ans);
		$data1 = $this->Test_model->update_user_answers($updated_user_ans);
	
		$question = unserialize($data1[0]->questions_alloted);
		
		foreach($question as $key => $quest){
			
			if($user_next_quest == $quest['id']){
				$q_ar = $quest;
				$user_n_quest = $question[$key + 1]['id'];
			}
		}
			
		$question_ar['ques_id'] = $q_ar;
		$question_ar['user_ques_no'] = $userq_n;
		$question_ar['user_next_quest'] = $user_n_quest;
		$question_ar['user_back_quest'] = $qid;
		
		$this->load->view('user_grid_question_form',$question_ar);
		
    }

	public function back_question() {
		
		$qid = $this->input->post("user_quest");
		$userq_n = $this->input->post("user_quest_number");
		$user_answer = $this->input->post("user_quest_answer");
		$user_next_quest = $this->input->post("next_quest");
		$user_back_quest = $this->input->post("back_quest");
		$data = $this->Test_model->fetch_user_questions();
		
		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
		
        $updated_ans = array();
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				if($quest['opt1'] == $user_answer){
					$answer = 1;
				}elseif($quest['opt2'] == $user_answer){
					$answer = 2;
				}elseif($quest['opt3'] == $user_answer){
					$answer = 3;
				}elseif($quest['opt4'] == $user_answer){
					$answer = 4;
				}else{
					$answer = 0;
				}
				$quest['user_answer'] = $answer;
				$updated_ans[]=$quest;
			}else{
				$updated_ans[]=$quest;
			}
		}
		
		
		
		$updated_user_ans = serialize($updated_ans);
		$data1 = $this->Test_model->update_user_answers($updated_user_ans);
	
		$question = unserialize($data1[0]->questions_alloted);
	
		foreach($question as $key => $quest){
			
			if($user_back_quest == $quest['id']){
				$q_ar = $quest;
				$user_b_quest = $question[$key - 1]['id'];
			}
			
		}
		$question_ar['ques_id'] = $q_ar;
		$question_ar['user_ques_no'] = $userq_n;
		$question_ar['user_next_quest'] = $user_next_quest;
		$question_ar['user_back_quest'] = $user_b_quest;
		
		$this->load->view('user_grid_question_form',$question_ar);
		
    }

	public function submit_test(){
	
		
		$data = $this->Test_model->fetch_user_questions();
		
		
		$question = unserialize($data[0]->questions_alloted);
		
		
		$abc = $this->Test_model->update_user_exam_end_status_time();
		
		
	
		//////User With There Attempted Answers - [START]//////
		
		$user_ques_answer = array();
		foreach($question as $key => $user_question_answer){
			if($user_question_answer['user_answer'] !='0'){
				
				$user_ques_answer[$user_question_answer['id']] = $user_question_answer['user_answer'];
			}
			
		}


		//////Users With There Attempted Answers - [END]///////////
		
		
		////Actual Questions with Correct Answer - [START]/////
		
		$data1 = $this->Test_model->fetch_all_questions();
	
		$quest_with_correct_answer = array();
		foreach($data1 as $question_correct_answer){
			
			$quest_with_correct_answer[$question_correct_answer->id] = $question_correct_answer->correct;
			
		}
	
		
		//////Actual Questions with Correct Answer - [END]////////
		
		//////////Users Correct Answers - [START]//////////////
		
		$user_correct_ans = array_intersect_assoc($user_ques_answer, $quest_with_correct_answer);
		
		///////////Users Correct Answers - [END]//////////////
		
		//////////Users InCorrect Answers - [START]//////////////
		
		$incorrect_answers = array_diff_assoc ($user_ques_answer, $quest_with_correct_answer);
			
		///////////Users InCorrect Answers - [END]//////////////
	
		
		
		
		$message['correct_answers'] = count($user_correct_ans);
		$message['incorrect_answers'] = count($incorrect_answers);
		$message['questions_attempted'] = count($user_ques_answer);	

		$correct = $message['correct_answers'];
		$wrong   = $message['incorrect_answers'];
		$message['marks_obtained'] 	= ($correct*1) - ($wrong*0.25);


		$message['message'] = "Your Test has been submitted";
		$message['userdata'] = $this->session->userdata('Candidate_data');
      

		// insert result into tbl_resultdata table
		$q1 = $this->Test_model->insert_result($message);

		 

		if($q1 === TRUE){
			// data inserted successfully
			// display result to user
	
			$q2 = array();
			
			$candidateid = $message['userdata'][0]['id'];
			
			$q2['sessiondata'] = $this->session->userdata('Candidate_data');
			$q2['user_allquestion'] = $question;
			
			
			$this->load->view('templates/testheader');
			$this->load->view('submittest',$message);
			$this->load->view('templates/testfooter');
			
			
		} else {
			
			$message['correct_answers'] = count($user_correct_ans);
			$message['incorrect_answers'] = count($incorrect_answers);
			$message['questions_attempted'] = count($user_ques_answer);	

			$correct = $message['correct_answers'];
			$wrong   = $message['incorrect_answers'];
			$message['marks_obtained'] 	= ($correct*1) - ($wrong*0.25);
			$message['message'] = "Your Test has been submitted";
			$message['userdata'] = $this->session->userdata('Candidate_data');

			// insert result into tbl_resultdata table
			$q1 = $this->Test_model->insert_result($message);
			
			
			$msg['msg'] = "Your B1 exam has been submitted";
			
			
				unset($_SESSION['Candidate_data']);
				session_destroy();			
			$this->load->view('templates/testheader');
			$this->load->view('thanks', $msg);
			$this->load->view('templates/testfooter');
		}      
	}
	
	
	
	
	
	
	
	public function attempt_notattemptlink(){
		
		$qid = $this->input->post("user_quest");
		$userq_n = $this->input->post("user_quest_number");
		$user_answer = $this->input->post("user_quest_answer");
		$data = $this->Test_model->fetch_user_questions();
		
		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
	
        $updated_ans = array();
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				if(1 == $user_answer){
					$answer = 1;
				}elseif(2 == $user_answer){
					$answer = 2;
				}elseif(3 == $user_answer){
					$answer = 3;
				}elseif(4 == $user_answer){
					$answer = 4;
				}else{
					$answer = 0;
				}
				$quest['user_answer'] = $answer;
				$updated_ans[]=$quest;
			}else{
				$updated_ans[]=$quest;
			}
		}
	
		$updated_user_ans = serialize($updated_ans);
		$data1 = $this->Test_model->update_user_answers($updated_user_ans);
	
		$question = unserialize($data1[0]->questions_alloted);
		
		foreach($question as $key => $quest){
			
			if($qid == $quest['id']){
				$q_ar = $quest;
				$user_n_quest = $question[$key + 1]['id'];
				$user_b_quest = $question[$key - 1]['id'];
			}
		}
			
		$question_ar['ques_id'] = $q_ar;
		$question_ar['user_ques_no'] = $userq_n;
		$question_ar['user_next_quest'] = $user_n_quest;
		$question_ar['user_back_quest'] = $user_b_quest;
		
		$this->load->view('user_grid_question_form',$question_ar);
	}
	
	public function reset_answer(){
		
		$qid = $this->input->post("user_quest");
		$user_answer = $this->input->post("user_quest_answer");
		$data = $this->Test_model->fetch_user_questions();
		
		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
		
        $updated_ans = array();
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				if($quest['opt1'] == $user_answer){
					$answer = 1;
				}elseif($quest['opt2'] == $user_answer){
					$answer = 2;
				}elseif($quest['opt3'] == $user_answer){
					$answer = 3;
				}elseif($quest['opt4'] == $user_answer){
					$answer = 4;
				}else{
					$answer = 0;
				}
				$quest['user_answer'] = $answer;
				$updated_ans[]=$quest;
			}else{
				$updated_ans[]=$quest;
			}
		}
	
		$updated_user_ans = serialize($updated_ans);
		$data1 = $this->Test_model->update_user_answers($updated_user_ans);
	
		$question = unserialize($data1[0]->questions_alloted);
		
	}
	
	public function submit_question(){
		
		$qid = $this->input->post("user_quest");
		$userq_n = $this->input->post("user_quest_number");
		$user_answer = $this->input->post("user_quest_answer");
		$user_next_quest = $this->input->post("next_quest");
		$user_back_quest = $this->input->post("back_quest");
		$data = $this->Test_model->fetch_user_questions();
		
		$user_questions['questions'] = unserialize($data[0]->questions_alloted);
		
        $updated_ans = array();
		foreach($user_questions['questions'] as $quest){
			
			if($qid == $quest['id']){
				
				if($quest['opt1'] == $user_answer){
					$answer = 1;
				}elseif($quest['opt2'] == $user_answer){
					$answer = 2;
				}elseif($quest['opt3'] == $user_answer){
					$answer = 3;
				}elseif($quest['opt4'] == $user_answer){
					$answer = 4;
				}else{
					$answer = 0;
				}
				$quest['user_answer'] = $answer;
				$updated_ans[]=$quest;
				// print_r($quest);exit;
			}else{
				$updated_ans[]=$quest;
			}
		}
	
		$updated_user_ans = serialize($updated_ans);
		$data1 = $this->Test_model->update_user_answers($updated_user_ans);
		
		
		if($data1 === FALSE) {
			$msg['msg'] = "Your exam has been submitted";
							
			$this->load->view('templates/testheader');
			$this->load->view('thanks', $msg);
			$this->load->view('templates/testfooter');
			
		} 	else {
		
					$question = unserialize($data1[0]->questions_alloted);
					
					$user_ques_answer = array();
					foreach($question as $user_question_answer){
						if($user_question_answer['user_answer'] !='0'){
							
							$user_ques_answer[$user_question_answer['id']] = $user_question_answer['user_answer'];
						}
						
					}
					$candidate_attempted_questions_count = count($user_ques_answer);
					
					if($question){
						// data updated successfully
						// display result to user

						$q2['sessiondata'] = $this->session->userdata('Candidate_data'); 
						$q2['user_allquestion'] = $question;
						$q2['cand_attempted_questions'] = $candidate_attempted_questions_count;
						
						$this->load->view('submit',$q2);
						
					} else {
						// something went wrong
					}  
		
		
		
		}
			
		
		
		 
		
		
	}


	public function instruction_page(){
		
		$data['info'] = $this->Test_model->instruction();
		
		$this->load->view('templates/testheader');
		$this->load->view('instruction_page',$data);
		//$this->load->view('templates/testfooter');
		
	}
	
	public function GetMAC(){
		ob_start();
			system('getmac');
			$Content = ob_get_contents();
			ob_clean();
			return substr($Content, strpos($Content,'\\')-20, 17);

		// echo getHostByName(php_uname('n'));
	}

}

?>