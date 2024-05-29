<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php  
	if($this->session->userdata('Candidate_data')) {
	
	
	$totalquestions = 140;
	
	$correct = $correct_answers;
	$wrong = $incorrect_answers;
	$marks 		= ($correct*1) - ($wrong*0.25);
	
	$attempted = $correct_answers + $incorrect_answers;
	$unattempted = 140 - $attempted;
	if($marks >= 70) {
				$remarks = "PASSED";
			} else { 
				$remarks = "FAILED";
			}
		
?>


<section class="test-login d-flex align-items-center">
	<div id="tabs" class="container">
		<div class="row justify-content-center">
		<?php if($_SESSION['Candidate_data']['0']['user_log_count'] =='10'){ echo "<h3 class='text-center mt-4' style='color:black'>You already attempted maximum times, Please contact to your Administrator</h3>";}?>
			<div class="col-xs-12 col-sm-10">
				<div class="tab-content" id="nav-tabContent">
				
					<table class="table table-bordered table1 summary-tabl" id="result-table">
						<tbody>
							<tr>
								<th>Total Questions</th>
								<td><?php echo $totalquestions; ?></td>
							</tr>
							<tr>
								<th>Attempted</th>
								<td><?php echo $attempted; ?></td>
							</tr>
							<tr>
								<th>UnAttempted</th>
								<td><?php echo $unattempted; ?></td>
							</tr>
							<tr>
								<th>Correct Answers</th>
								<td><?php echo $correct; ?></td>
							</tr>
							<tr>
								<th>Wrong Answers</th>
								<td><?php echo $wrong; ?></td>
							</tr>
							<tr>
								<th>Marks</th>
								<td><?php echo $marks; ?></td>
							</tr>
						</tbody>
						
					</table>

					<form method="POST" class="text-center px-5" action="<?php echo base_url('main/logout'); ?>">
						<input type="submit" name="exit" value="EXIT" id="exit" class="exit common-rfos">
					</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
	session_destroy();
	} else {
		redirect(base_url());
	}
?>