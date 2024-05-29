<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>

<?php  
	if($this->session->userdata('Candidate_data')) {

$c = 1;

?>

<div class="test">
    <div id="tabs" class="scroll-box">
        <div class="container-fluid absolute-box">
            <div class="row justify-content-center">
                <div class="col-sm-6">                
                    <div class="tab-content no-sp" id="nav-tabContent">
                        
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="table-responsive b1-test-table">
								<table class="table table-bordered table1 summary-tabl" id="table1" >
									
									<tr>
										<th>Total Questions</th>
										<td>140</td>
										
										<!--th>Action</th-->
									</tr>
									
									<tbody>
									<?php 
									// echo "<pre>";
									// print_r($user_allquestion);exit;
									?>
									<tr>
										<th>Attempted Questions</th>
										
										<td><?php echo $cand_attempted_questions; ?></td>
										
									</tr>
									<tr>
									<th>Unattempted Questions</th>
										<td><?php echo 140 - $cand_attempted_questions; ?></td>
									</tr>
									<?php
									foreach($user_allquestion as $quest) { 
										//echo "hi";
										} ?>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			<form method="POST" id="submit_test_form" class="px-3 pt-4 text-center submittestform" action="<?php echo base_url('test/submit_test'); ?>">
		
		<input type="checkbox" name="check" value="check" id="agree"><span class="agree">&nbsp;&nbsp;I agree to submit test</span>
			<div class="row">
			<div class="col-sm-6 text-left">
				<a class='attempt_notattempt attempt btn btn-danger' style="color:black" href="" id="<?php echo "$quest[id]/$quest[user_answer]/140";?>">BACK</a>
			</div>
			<div class="col-sm-6 text-right">
				<input type="submit" name="submit" class="common-rfos4 common-rfos5 btn btn-success" value="Submit" id="submit_test">
			</div>
			</div>
	</form>
    </div>
	</div>
	


<?php
	} else {
		redirect(base_url());
	}
?>