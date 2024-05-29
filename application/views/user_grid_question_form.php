<style>
ol{display: flex;
flex-wrap: wrap;list-style: decimal;padding-left:20px;}
.frb {display:list-item;padding:0;}
</style>
<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php  
	if($this->session->userdata('Candidate_data')) {
?> 


<?php
// print_r($ques_id);exit;
if($ques_id['user_answer'] == 1){$checked1 = true;}else{$checked1 = false;}
if($ques_id['user_answer'] == 2){$checked2 = true;}else{$checked2 = false;}
if($ques_id['user_answer'] == 3){$checked3 = true;}else{$checked3 = false;}
if($ques_id['user_answer'] == 4){$checked4 = true;}else{$checked4 = false;} 

$array = array('class' => 'form', 'id' => $ques_id['id']);	
	echo form_open('Test/submit_test/', $array);
	echo "<div class=ques-ans-ul>";	
	
	echo "<h2>"."<strong>".$user_ques_no.".&nbsp;</strong> <span class=hinditext>".$ques_id['ques']."</span></h2><br><br>";
	if($ques_id['image'] !=''){
		
		echo "<img height='200px' src=".base_url("assets/images/")."$ques_id[image]>";echo "<br>";
	}
	echo "<ol class=shuffle>";	
	$data = array(
	'name' => 'answer',
	'value' => $ques_id['opt1'],
	'checked' => $checked1
	);      
	echo "<li class=frb>";
	echo form_radio($data);
	echo form_label($ques_id['opt1'],'',array('class' => 'hinditext',"id"=>"a"));
	echo "</li>";
	$data = array(
	'name' => 'answer',
	'value' => $ques_id['opt2'],
	'checked' => $checked2
	);      
	echo "<li class=frb >";
	echo form_radio($data);
	echo form_label($ques_id['opt2'],'',array('class' => 'hinditext',"id"=>"b"));
	echo "</li>";
	$data = array(
	'name' => 'answer',
	'value' => $ques_id['opt3'],
	'checked' => $checked3
	);      
	echo "<li class=frb>";
	echo form_radio($data);
	echo form_label($ques_id['opt3'],'',array('class' => 'hinditext',"id"=>"c"));
	echo "</li>";
	$data = array(
	'name' => 'answer',
	'value' => $ques_id['opt4'],
	'checked' => $checked4
	);   
	echo "<li class=frb>";	
	echo form_radio($data);
	echo form_label($ques_id['opt4'],'',array('class' => 'hinditext',"id"=>"d"));
	echo "</li>";
	echo "</ol>";
	$data = array(
		'type'  => 'submit',
		'name'  => 'reset',
		'value' => 'रीसेट करें  / Reset',
		'class' => 'reset common-rfos reset-btm',
		'id'    => $ques_id['id']
		);        
		echo form_input($data);

	if($user_back_quest != ''){
		$data = array(
		'type'  => 'submit',
		'name'  => 'back',
		'value' => 'जमा करें और पिछले पर जाएं  /  Save & Previous',
		'class' => 'back common-rfos',
		'id'    => $user_back_quest
		);        
		echo form_input($data);
		
	}
	// $data = array(
		// 'type'  => 'submit',
		// 'name'  => 'save',
		// 'value' => 'Save',
		// 'class' => 'save common-rfos',
		// );        
	// echo form_input($data);
	if($user_next_quest != ''){
		$data = array(
		'type'  => 'submit',
		'name'  => 'next',
		'value' => 'जमा करें और अगले पर जाएं  / Save & Next',
		'class' => 'next common-rfos',
		'id'    => $user_next_quest
		);        
		echo form_input($data);
		
	}else{
		$data = array(
		'type'  => 'submit',
		'name'  => 'submit',
		'value' => 'जमाकरें और अगले पर जाएं  / Save & Next',
		'class' => 'submit common-rfos',
		//'id' => 'submit'
		);        
		echo form_input($data);
	}
	
	
	
	$data = array(
			'type' => 'hidden',
			'name' => 'counter',
			'class' =>'backcounter',
			'id'   => $user_ques_no - 1,
	);
	
	echo form_input($data);
	
	$data = array(
			'type' => 'hidden',
			'name' => 'counter',
			'class' =>'nextcounter',
			'id'   => ++$user_ques_no,
	);

	echo form_input($data);
	
		$data = array(
			'type' => 'hidden',
			'name' => 'questionid',
			'value'   => $ques_id['id'],
	);

	echo form_input($data);
	
/* 	$data = array(
			'type' => 'hidden',
			'name' => 'time_left',
			'name' => 'time_left',
			'id' => "time_left",
			'value'   => $time_left,
	);

	echo form_input($data); */
	echo "</div>";
	
	echo form_close(); 
 
?>




<?php
	} else {
		redirect(base_url());
	}
?>