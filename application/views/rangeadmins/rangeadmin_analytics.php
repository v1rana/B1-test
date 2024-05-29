<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('rangeadmin_user_id')) {  ?>
	
	
<?php
	
		 // echo "<pre>";
		// print_r($registrar);
		// echo "<br>";
		// print_r($candidate);
		// echo "<br>";
		// print_r($result);
		// echo "<br>";
		// print_r($admitcard);
		 
		
		
		
		$range_admin_session 		= $this->session->userdata();
		$user = ucwords($range_admin_session['userdata'][0]['firstname'])." ".ucwords($range_admin_session['userdata'][0]['lastname']);
		$range = ucwords($range_admin_session['userdata'][0]['name']);
		
?>
			<!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('superadmin/rgeaminindex'); ?>" class="active">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('superadmin/getadmins'); ?>">REGISTRAR LIST</a></li>
					<li> <a href="<?php echo base_url('superadmin/viewusers'); ?>">CANDIDATE LIST</a> </li>
					<li> <a href="<?php echo base_url('superadmin/viewtestresults'); ?>">TEST RESULT</a> </li>
					<li> <a href="<?php echo base_url('superadmin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->
            <div id="page-content-wrapper">
                <div class="welcome-box">
					<h2>Welcome <?php echo $user." ($range)"; ?></h2>
				</div>
				<div class="content-base">
					<ul class="diff-boxes d-flex flex-wrap flex-row justify-content-center">
						
						<li class="card rounded-0">
						<span class="card-header">Total Registrars</span>
							<div class="in-dash-content  card-body">
								
								<strong><?php echo $registrar; ?></strong>
								
								</div>
							<div class="li-end card-footer">
								<small>Registrars</small>							
							</div>
						</li>
						<li class="card rounded-0">
						<span class="card-header">Total Candidates Enrolled</span>
							<div class="in-dash-content  card-body">
								
								<strong><?php echo $candidate; ?></strong>
								
							</div>
							<div class="li-end card-footer">
								<small>Candidates</small>							
							</div>
						</li>
						<li class="card rounded-0">
						<span class="card-header">Total Admit Cards</span>
							<div class="in-dash-content  card-body">
								
								<strong><?php echo $admitcard; ?></strong>
								
							</div>
							<div class="li-end card-footer">	
								<small>Admit Cards</small>							
							</div>
						</li>
						<li class="card rounded-0">
						<span class="card-header">Total Candidates Passed</span>
							<div class="in-dash-content  card-body">
								
								<strong><?php echo count($result['passed_count']); ?></strong>
								
							</div>
							<div class="li-end card-footer">
								<small>Candidates</small>							
							</div>
						</li>
						<li class="card rounded-0">
						<span class="card-header">Total Candidates Failed</span>
							<div class="in-dash-content  card-body">
								
								<strong><?php echo count($result['failed_count']); ?></strong>
								
							</div>
							<div class="li-end card-footer">
								<small>Candidates</small>							
							</div>
						</li>
						
					</ul>
				</div>				
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
	
	
	


<?php } else {
    redirect(base_url() . 'supersuperadmin/index');
}?>