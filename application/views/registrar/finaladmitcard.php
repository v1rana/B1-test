<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>
	
	
<?php
		
		if($userdetails) {
			$name = ucwords($userdetails['personal']['firstname'])." ".ucwords($userdetails['personal']['lastname']);
			$examdatetime = date('d-m-Y');
			
			$testcode = $userdetails['personal']['testcode'];
			
			
?>

				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="certificate-page">
								<div class="inner-conter">
									<div class="row">
										<div class="col-md-8">
											<h2 class="text-left" style="font-size:24px; font-weight:500;">Candidate Admit Card (Mock Test)</h2>
										</div>
										<div class="col-md-2 offset-md-2">
											<a onclick="window.print()" class="btn btn-success">Print</a>
										</div>
									</div>
									<br><br><br><br><br><br>
						
									<img width="150px" height="150px"  src="<?php echo $pic; ?>"><br><br>
									
									<table  class="table table-striped">										
										<tr class="content-box">
											<td class="left-box-content">Name</td>
											<td class="right-box-content"><?php echo $name; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Belt Number</td>
											<td class="right-box-content"><?php echo $userdetails['personal']['beltnumber']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Date of Birth</td>
											<td class="right-box-content"><?php echo date('d-m-Y', strtotime($userdetails['personal']['dob'])); ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Rank</td>
											<td class="right-box-content"><?php echo $userdetails['rank']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Unit</td>
											<td class="right-box-content"><?php echo $userdetails['unit']; ?></td>
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
											<td class="right-box-content"><?php echo $userdetails['testcenter']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Exam Date</td>
											<td class="right-box-content"><?php echo $examdatetime; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Exam Code</td>
											<td class="right-box-content"><?php echo $testcode; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
				
				
				
				<div class="container" style="page-break-before: always;">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="certificate-page">
								<div class="inner-conter">
									<h2>Candidate Admit Card</h2><br><br><br><br>
									<img width="150px" height="150px"  src="<?php echo $pic; ?>">
									<table  class="table table-striped">
										<tr>							
											<td></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Name</td>
											<td class="right-box-content"><?php echo $name; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Belt Number</td>
											<td class="right-box-content"><?php echo $userdetails['personal']['beltnumber']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Date of Birth</td>
											<td class="right-box-content"><?php echo date('d-m-Y', strtotime($userdetails['personal']['dob'])); ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Rank</td>
											<td class="right-box-content"><?php echo $userdetails['rank']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Unit</td>
											<td class="right-box-content"><?php echo $userdetails['unit']; ?></td>
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
											<td class="right-box-content"><?php echo $userdetails['testcenter']; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Exam Date</td>
											<td class="right-box-content"><?php echo $examdatetime; ?></td>
										</tr>
										<tr class="content-box">
											<td class="left-box-content">Exam Code</td>
											<td class="right-box-content"><?php echo $testcode; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<br><br><br><br><br><br><br><br>
		<?php 
		}
	}
	else {
		redirect(base_url() . 'main/index');
		
	}?>			