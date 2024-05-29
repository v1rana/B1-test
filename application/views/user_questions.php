<div id="element" class="test-login">
	<div id="tabs" class="belowtestbutton">
		<div class="container-fluid px-5 pb-5 pt-3">
			<div class="row">
				<div class="col-sm-12 px-3 text-right pb-4">
					<div class="fixed-height-box">
						<div id="timeleft" class="text-center "></div>
						<div id="timeleft1" class="text-center "></div>
						<div id="timeleft2" class="text-center "></div>
					</div>
				</div>
			</div>
		
			<div class="row justify-content-between">
				<div class="col-sm-5 px-3 pb-4">
					<div class="candidate-details log_count">
						<label>Test Code</label><h3><?php echo $testcode; ?></h3>
					</div>
					<div class="candidate-details log_count">
						<label>Candidate Name</label><h3><?php echo $name; ?></h3>
					</div>
					
				</div>
				<div class="col-sm-5 px-3 text-right pb-4">
					<div class="log_count">
						<?php echo $user_log_count; ?>
						<span>लॉग-इन समय की संख्या  /  Number of Time Logged-In </span>
					</div>
					<div id="timer"></div>
				</div>
			</div>
			
			<div class="row pre-start-test align-content-center justify-content-center">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 py-5 log-pg-box">	
					<div class="exam_start text-center exam start">
						<span><img src="<?php echo base_url('assets/images/success.png'); ?>" alt="Sign up" class="img-responsive" /></span>
						<button class="login-button e_start mt-0" value=""><?php  if($test == 'start_test'){echo "Start Test";}else{ echo "Resume Test";}?></button>
					</div>
				</div>
			</div>
			
		<div class="row show_question">
			<div id="grid_quest" class="col-sm-7 grid">
				
			</div>
			<div class="col-sm-9 normal" style="color:blue; margin-top:10px;display:none;">
            <?php
            $c = 1;
            $d = 0;
         
            foreach($questions as $key => $question ) {
				
				
				$array = array('class' => 'form', 'id' => $question['id']);
				echo form_open('#', $array);
				

				if($questions[$key - 1]['id'] != ''){
					
					$data = array(
					'type'  => 'submit',
					'name'  => 'back',
					'value' => 'Back',
					'id' => $questions[$key - 1]['id']
					);        
					echo form_input($data);
				}

				if($questions[$key + 1]['id'] !=''){
					
					$data = array(
					'type'  => 'submit',
					'name'  => 'next',
					'value' => 'Next',					
					'id' => $questions[$key + 1]['id']
					);
				
					echo form_input($data);
				}else{
					$data = array(
					'type'  => 'submit',
					'name'  => 'submit',
					'value' => 'Save & Next',
					'class' => 'submit common-rfos',
					'id' => 'submit'
					);        
					echo form_input($data);
				}

				
				$data = array(
						'type' => 'hidden',
						'name' => 'begining_time_left',
						'id' => "time_left1",
						'value'   => $time_left,
				);

				echo form_input($data);
				
				echo form_close();
			
			} 
		
          
  ?>          
        <form method="POST" id="submit_test_form" class="px-3 pt-4 text-center submittestform" action="<?php echo base_url('test/submit_test'); ?>">
		
		<input type="checkbox" name="check" value="check" id="agree"><span class="agree">&nbsp;&nbsp;मैं अंतिम प्रस्तुत करने के लिए सहमत हूँ  /  I agree to submit test</span><br>
		<input type="submit" name="submit" value="Submit" id="submit_test">
	</form>   
            </div>
			<div class="col-sm-5 summary">
			
				<div class="card test-aside">
					<div class="card-header">प्रशन / Questions</div>
					<div class="card-body py-3 px-1">
						
						<ul  class="test-counting text-center">
							<?php
							$c = 1;
							foreach($questions as $key => $question) {
							
							if($question['user_answer'] != 0){
								$color = 'green';
							}else{
								$color = 'red';
							}
							?>
							<li class="<?php echo $color; ?>" id="<?php echo "li".$question['id']; ?>"><a  class="g_quest" href="javascript:void(0)" id="<?php echo $question['id']."/".$questions[$key - 1]['id']."/".$questions[$key + 1]['id'];?>"><?php echo $c++;?></a></li>
							<?php
							}
							?>

						</ul>
					</div>
					
					<div class="attempt-notattempt-question-answer d-flex flex-row justify-content-around">
					<div class="atm-ques d-flex flex-row">
					<span class="col-green"></span>
					<strong>प्रयासित / Attempted</strong>
					</div>
					<div class="atm-ques d-flex flex-row">
					<span class="col-red"></span>
					<strong>अपरीक्षित / Not Attempted</strong>
					</div>
					</div>
				  
				</div>
				
				
				
			</div>
		
		</div>
    </div>
</div>
</div>

