<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>
	
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<div class="certificate-page">
							<div class="inner-conter">
								<div class="row">
									<div class="col-md-8">
										<h2 class="text-left" style="font-size:24px; font-weight:500;">Candidate Result Card (Mock Test)</h2>
									</div>
									<div class="col-md-2 offset-md-2">
										<a onclick="window.print()" class="btn btn-success">Print</a>
									</div>
								</div>
								<br><br><br><br><br><br>
								
								<img width="150px" height="150px"  src="<?php echo $pic; ?>"><br><br>
								<table class="table">							
									<tr class="content-box">
										<td class="left-box-content">Name</td>
										<td class="right-box-content"><?php echo $candidate_name; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Belt Number</td>
										<td class="right-box-content"><?php echo $cand_belno; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Date of Birth</td>
										<td class="right-box-content"><?php echo $dob; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Rank</td>
										<td class="right-box-content"><?php echo $rankname; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Unit</td>
										<td class="right-box-content"><?php echo $unitname; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Language</td>
										<td class="right-box-content">Hindi</td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Year</td>
										<td class="right-box-content">2018</td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Range</td>
										<td class="right-box-content"><?php echo $examrange; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Date</td>
										<td class="right-box-content"><?php echo $examdatetime; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Questions</td>
										<td class="right-box-content"><?php echo $totalquestions; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Attempted</td>
										<td class="right-box-content"><?php echo $totalattempted; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total UnAttempted</td>
										<td class="right-box-content"><?php echo $totalunattempted; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Correct Answers</td>
										<td class="right-box-content"><?php echo $totalcorrectanswers; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Wrong Answers</td>
										<td class="right-box-content"><?php echo $totalwronganswers; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Final Score</td>
										<td class="right-box-content"><?php echo $finalscore; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Result Date Time</td>
										<td class="right-box-content"><?php echo $resultdatetime; ?></td>
									</tr>
								</table>	
								<br><br><br><br><br><br>
								<br><br><br><br><br><br>
								<div class="row">
									<div class="col-md-4">
										(Registrar)<br>
										<?php echo $regname; ?>
									</div>
									<div  class="col-md-4 offset-md-4">
										(Candidate)<br>
										<?php echo $candidate_name; ?>	
									</div>
								</div>	
								
								<div class="row">
									<div class="col-md-4">
										<?php echo $currntdatetime; ?>
									</div>
									<div class="col-md-4 offset-md-4">
										<?php echo $currntdatetime; ?>
									</div>
								</div>						
							</div>
						</div>				
					</div>			
				</div>	
			</div>
			
			
			<div class="container"  style="page-break-before: always;">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<div class="certificate-page">
							<div class="inner-conter">
								<h2 class="text-center" style="font-size:24px; font-weight:500;">Candidate Result Card (Mock Test)</h2><br><br><br><br>
								<img width="150px" height="150px"  src="<?php echo $pic; ?>"><br><br>
								<table class="table">							
									<tr class="content-box">
										<td class="left-box-content">Name</td>
										<td class="right-box-content"><?php echo $candidate_name; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Belt Number</td>
										<td class="right-box-content"><?php echo $cand_belno; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Date of Birth</td>
										<td class="right-box-content"><?php echo $dob; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Rank</td>
										<td class="right-box-content"><?php echo $rankname; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Unit</td>
										<td class="right-box-content"><?php echo $unitname; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Language</td>
										<td class="right-box-content">Hindi</td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Year</td>
										<td class="right-box-content">2018</td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Range</td>
										<td class="right-box-content"><?php echo $examrange; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Exam Date</td>
										<td class="right-box-content"><?php echo $examdatetime; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Questions</td>
										<td class="right-box-content"><?php echo $totalquestions; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Attempted</td>
										<td class="right-box-content"><?php echo $totalattempted; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total UnAttempted</td>
										<td class="right-box-content"><?php echo $totalunattempted; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Correct Answers</td>
										<td class="right-box-content"><?php echo $totalcorrectanswers; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Total Wrong Answers</td>
										<td class="right-box-content"><?php echo $totalwronganswers; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Final Score</td>
										<td class="right-box-content"><?php echo $finalscore; ?></td>
									</tr>
									<tr class="content-box">
										<td class="left-box-content">Result Date Time</td>
										<td class="right-box-content"><?php echo $resultdatetime; ?></td>
									</tr>
								</table>	
								<br><br><br><br><br><br>
								<br><br><br><br><br><br>
								<div class="row">
									<div class="col-md-4">
										(Registrar)<br>
										<?php echo $regname; ?>
									</div>
									<div  class="col-md-4 offset-md-4">
										(Candidate)<br>
										<?php echo $candidate_name; ?>	
									</div>
								</div>	
								
								<div class="row">
									<div class="col-md-4">
										<?php echo $currntdatetime; ?>
									</div>
									<div class="col-md-4 offset-md-4">
										<?php echo $currntdatetime; ?>
									</div>
								</div>					
								
							</div>
						</div>				
					</div>			
				</div>	
			</div>
			
			<br><br><br><br><br><br><br><br>

	
	

<?php }else {
    redirect(base_url() . 'main/index');
    
}?>