<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>

	
<?php
	// echo "<pre>";
	// print_r($userdetails);
	// exit;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/webcam.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" >
    
        #results { padding:20px; border:1px solid; background:#ccc; width:225px;}
    </style>
</head>
<body class="over-hid">	
	<div id="wrapper" class="toggled">
		<header class="second-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="logo-box"><a href="javascript:void(0)" class=" d-inline-flex flex-row"><img src="<?php echo base_url('assets/images/dashboard/Haryana_police_logo2.png'); ?>" class="img-fluid"> <h1>B-1 2018 HARYANA POLICE</h1></a></div>
						</div>
						<div class="col-sm-6 d-flex align-items-center justify-content-end">
							<div class="user-login-box">								
								<span><img src="<?php echo base_url('assets/images/dashboard/user-image.png'); ?>" alt="User image" class="img-responsive"></span>								
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('admin/registrarindex'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('registration/viewusers'); ?>" class="active">CANDIDATE LIST</a></li>					
					<li> <a href="<?php echo base_url('admin/viewtestresults'); ?>">TEST RESULT</a> </li>
					<li> <a href="<?php echo base_url('admin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->


			<h1 class="text-center admitcardh1">HARYANA POLICE B1 EXAMINATION</h1>
			<h2 class="text-center admitcardh2">Candidate Admit Card</h2>

			<section class="whole-content">
				<div class="container">        
					<div class="content-box">
						<form action="<?php echo base_url('registration/store_image'); ?>" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div id="my_camera"></div>
									<br/>
									<input type=button class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">						
									<input type="hidden" name="image" class="image-tag">
								</div>
								<div class="col-md-6">
									<div id="results"></div>
								</div>            
							</div>
							<br><br>
							<table class="table table-hover">
								<tbody>
									<tr class="table-secondary">
										<td>Name : </td>
										<td><span><?php echo $userdetails['personal']['firstname']." ".$userdetails['personal']['lastname']; ?></span></td>
									</tr>
									<tr class="table-secondary">
										<td>Belt Number : </td>
										<td><span><?php echo $userdetails['personal']['beltnumber']; ?></span></td>
									</tr>
									<tr class="table-secondary">
										<td>Date of Birth : </td>
										<td><span><?php echo date('d-m-Y', strtotime($userdetails['personal']['dob'])); ?></span></td>
									</tr>
									<tr class="table-secondary">
										<td>Rank : </td>
										<td><span><?php echo $userdetails['rank']; ?></span></td>
									</tr>
									<tr class="table-secondary">
										<td>Unit : </td>
										<td><span><?php echo $userdetails['unit']; ?></span></td>
									</tr>
									<tr class="table-secondary">
										<td>Exam Language : </td>
										<td><span>HINDI</span></td>
									</tr>
									<tr class="table-secondary">
										<td>Exam year : </td>
										<td><span>2018</span></td>
									</tr>
									<tr class="table-secondary">
										<td>Exam Range : </td>
										<td><span><?php echo $userdetails['testcenter']; ?></span></td>
									</tr>									
									
								</tbody>
							</table>
							
							<input type="hidden" name="candidate_user_id" value="<?php echo $userdetails['personal']['id']; ?>">
							<input type="hidden" name="candidate_belt_number" value="<?php echo $userdetails['personal']['beltnumber']; ?>">
							<div class="col-md-12 text-center">
								<br/>
								<button class="btn btn-success snapshot">Submit</button>
							</div>
							<br><br><br><br><br><br><br>
						</form>
					</div>				
				</div>
			</section>
		
		
		
			<script language="JavaScript">
				$('.snapshot').hide();
				Webcam.set({
					width: 200,
					height: 200,
					image_format: 'jpeg',
					jpeg_quality: 90
				});
			  
				Webcam.attach( '#my_camera' );
			  
				function take_snapshot() {
					Webcam.snap( function(data_uri) {
						
						if(data_uri == ''){
							//$('.snapshot').hide();
						}else{
							$('.snapshot').show();
						$(".image-tag").val(data_uri);
						document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
						}
					} );
				}
			</script>
		
			<footer>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<small>Powered By: SeMT Development Team</small>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->
	<!-- Bootstrap core JavaScript -->
	
	</body>
</html>
	
				


        

<?php }else {
    redirect(base_url() . 'main/index');
    
}?>