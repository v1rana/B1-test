<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('supersuperadmin_user_id')) {  ?>
<?php 

    // echo "<pre>";
    // print_r($centers);

?>
			<!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('analytics/index'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('supersuperadmin/testcenter'); ?>"  class="active">RANGE LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/rangeadmins'); ?>">ADMIN LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->
			
			
			
			<div id="tabs">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">                
							<div class="tab-content less-padding-box" id="nav-tabContent">
								<h1>Test Range</h1>
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="table-responsive b1-test-table">
										<table class="table table-bordered" id="table2" class="table2">								
											<thead>
												<tr>
													<th scope="col">S.NO.</th>
													<th scope="col">Test Center Name</th>
												</tr>
											</thead>
											<tbody id="myTable">
									<?php
												if($centers) {
													$i = 1;
													foreach($centers as $val) {
									?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $val['name']; ?></td>
														</tr>
									<?php
														$i++;
													}
												}
									?>
											</tbody>
										</table>
									</div>
								</div>
								</div>
						</div>
					</div>
				</div>
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