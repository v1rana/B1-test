<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>


			<!-- Sidebar -->
			<div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('admin/registrarindex'); ?>" class="active">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('registration/viewusers'); ?>">CANDIDATE LIST</a></li>					
					<li> <a href="<?php echo base_url('admin/viewtestresults'); ?>">TEST RESULT</a> </li>
					<li> <a href="<?php echo base_url('admin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->


			<div id="page-content-wrapper">
                <div class="welcome-box">
					<h2>Welcome <?php if($username1){ echo $username1;} ?></h2>
				</div>
				<div class="content-base">
					<ul class="diff-boxes d-flex flex-wrap flex-row justify-content-center">
						
						
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
    redirect(base_url() . 'admin/index');
    
}?>