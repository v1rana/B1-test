<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>
<?php
        // echo "<pre>";
        // print_r($results);
        // exit;

?>
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('admin/registrarindex'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('registration/viewusers'); ?>">CANDIDATE LIST</a></li>					
					<li> <a href="<?php echo base_url('admin/viewtestresults'); ?>" class="active">TEST RESULT</a> </li>
					<li> <a href="<?php echo base_url('admin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->
			<div id="tabs">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">                
							<div class="tab-content" id="nav-tabContent">
								<h1 class="listregistrars text-center">EXAM RESULT</h2>
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="table-responsive b1-test-table">
										<table class="table table-bordered" id="table1" class="table1">								
											<thead>
												<tr>
													<th scope="col">S.NO.</th>
													<th scope="col">First Name</th>
													<th scope="col">Last Name</th>                                           
													<th scope="col">Belt Number</th>
													<th scope="col">Rank</th>
													<th scope="col">Unit</th>	
													<th scope="col">Exam Range</th>			
													<th scope="col">Exam Center</th>
													<th scope="col">Exam Date</th>
													<th scope="col">Score</th>
													<th scope="col">Exam Ip In</th>
													<th scope="col">Exam Ip Out</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody id="myTable">
									<?php      
												if($results !== FALSE) {
													$i = 1;
													foreach($results as $val) {
														$final_marks = ($val['correctanswers'] * 1) - ($val['wronganswers'] * 0.25);
														$usrr_id = $val['user_id'];

									?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $val['firstname']; ?></td>
															<td><?php echo $val['lastname']; ?></td>                                                   
															<td><?php echo $val['beltnumber']; ?></td>
															<td><?php echo $val['rank_name']; ?></td>
															<td><?php echo $val['unit_name']; ?></td>
															<td><?php echo $val['name']; ?></td>
															<td><?php echo $val['testcode']; ?></td>
															<td><?php echo date('d-m-Y', strtotime($val['testdatetime'])); ?></td>
															<td><?php echo $final_marks; ?></td>
															<td><?php echo $val['client_ip_in']; ?></td>
															<td><?php echo $val['client_ip_out']; ?></td>
															<td><a target="_blank" href="<?php echo base_url("admin/printresultcard?bltd=$usrr_id"); ?>">Print Result</a></td>
														</tr>
									<?php
														$i++;
													}
												} else {
									?>

									<?php
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


<?php

	} else {
    redirect(base_url() . 'admin/index');
    
}?>