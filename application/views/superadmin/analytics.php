<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('supersuperadmin_user_id')) {  ?>
	
	
	<?php
		
		// echo "<pre>";
		// print_r($gettestcentre);
		// echo "<br>";
		// print_r($total_admins);
		// echo "<br>";
		// print_r($total_candidates);
		// echo "<br>";
		// print_r($getadmitcardcount);
		// echo "<br>";
		// print_r(count($countpassedcandidates['passed_count']));
		// echo "<br>";
		// print_r(count($countpassedcandidates['failed_count']));
		// exit;
		
	?>
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li> <a href="<?php echo base_url('analytics/index'); ?>" class="active">DASHBOARD</a> </li>
			<li> <a href="<?php echo base_url('supersuperadmin/testcenter'); ?>">RANGE LIST</a> </li>
			<li> <a href="<?php echo base_url('supersuperadmin/rangeadmins'); ?>">ADMIN LIST</a> </li>
			<li> <a href="<?php echo base_url('supersuperadmin/logout'); ?>">LOGOUT</a> </li>
		</ul>
	</div> 
	<!-- /#sidebar-wrapper -->
	<div id="page-content-wrapper">
		<div class="welcome-box">
			<h2>Welcome Super Admin</h2>
		</div>
		<div class="content-base">
			<ul class="diff-boxes d-flex flex-wrap flex-row justify-content-center">
				<li class="card rounded-0">
					<span class="card-header">Total Test Centers</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo $gettestcentre; ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Ranges</small>
					</div>
				<a href=""></a></li>
				
				

				<li class="card rounded-0">
					<span class="card-header">Total Admins</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo $rangeadmins; ?></strong>
						
					</div>
					<div class="li-end card-footer">	
						<small>Admins</small>							
					</div>
				<a href=""></a></li>
				<li class="card rounded-0">
					<span class="card-header">Total Registrars</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo $total_admins; ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Registrars</small>							
					</div>
				<a href=""></a></li>
				<li class="card rounded-0">
					<span class="card-header">Total Candidates Enrolled</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo $total_candidates; ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Candidates</small>
					</div>
				<a href=""></a></li>
				<li class="card rounded-0">
					<span class="card-header">Total Admit Cards Issued</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo $getadmitcardcount; ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Admit Cards</small>
					</div>
				<a href=""></a></li>
				<li class="card rounded-0">
					<span class="card-header">Total Candidates Passed</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo count($countpassedcandidates['passed_count']); ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Candidates</small>
					</div>
				<a href=""></a></li>
				<li class="card rounded-0">
					<span class="card-header">Total Candidates Failed</span>
					<div class="in-dash-content  card-body">
						
						<strong><?php echo count($countpassedcandidates['failed_count']); ?></strong>
						
					</div>
					<div class="li-end card-footer">
						<small>Candidates</small>
					</div>
				<a href=""></a></li>
				
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