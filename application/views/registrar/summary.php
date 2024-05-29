<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>

<?php
    // echo "<pre>";
    // print_r($data);
    
?>
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
			<div id="tabs">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">                
							<div class="tab-content" id="nav-tabContent">
							   <h1 class="listregistrars text-center"> CANDIDATE LIST</h2>
							   
							   <?php  if($this->input->get('status') === 'error') { ?>

									<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Error: </strong> Some Error occured, Try later.
									</div>

								<?php } elseif($this->input->get('status') === 'success') {?>

									<div class="alert alert-dismissible alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success: </strong>Candidate Updated Successfully
									</div>

								<?php } ?>
								

								<?php echo form_open('registration/registeruser',['class'=>'rfos text-right pb-4','id'=>'registrationform']); ?>                            
									<button type="submit" class="btn btn-primary cret-bn">Add New Candidate</button>
								<?php echo form_close(); ?>
								
								
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="table-responsive b1-test-table">
										<table class="table table-bordered" id="table2" class="table2">								
											<thead>
												<tr>
													<th scope="col">S.NO.</th>
													<th scope="col">First Name</th>
													<th scope="col">Last Name</th>                                            
													<th scope="col">Belt Number</th>
													<th scope="col">Rank</th>
													<th scope="col">Unit</th>
													<th scope="col">Candidate Email</th>										
													<th scope="col">Candidate Mobile</th>
													<th scope="col">Date Of Joining</th>
													<th scope="col">DOB</th>
													<th scope="col">Exam Range</th>
													<th scope="col">Created on</th>
													<th scope="col">Registration Center IP</th>		
													<th>Action</th>
													<th>Issue Admit Card</th>
												</tr>
											</thead>
											<tbody id="myTable">
									<?php
											// echo "<pre>";
											// print_r($data);

											if($data !== 'NO_USER_FOUND') {
													$i = 1;
													foreach($data as $val) {
									?>
														<tr>
															<td><?php if($i) { echo $i; } ?></td>
															<td><?php if($i) { echo $val['firstname']; } ?></td>
															<td><?php if($i) { echo $val['lastname']; } ?></td>                                                    
															<td><?php if($i) { echo $val['beltnumber']; } ?></td>
															<td><?php if($i) { echo $val['rank_name']; } ?></td>
															<td><?php if($i) { echo $val['unit_name']; } ?></td>
															<td><?php if($i) { echo $val['email']; } ?></td>
															<td><?php if($i) { echo $val['mobile']; } ?></td>
															<td><?php if($i) { echo date('d-m-Y', strtotime($val['dateofjoining'])); } ?></td>
															<td><?php if($i) { echo date('d-m-Y', strtotime($val['dob'])); } ?></td>
															<td><?php if($i) { echo $val['name']; } ?></td>
															<td><?php if($i) { echo $val['creationdate']; } ?></td>
															<td><?php if($i) { echo $val['regestrationcenterip']; } ?></td>
															<td>
															<form action="<?php echo base_url('registration/editcandidatedetails'); ?>" method="post"><input type="hidden" name="bltid" value="<?php echo $val['beltnumber'];?>"><input type="submit" id="edit_cand" value="Edit"></form>
															<!--a href="<?php //echo base_url("registration/editcandidatedetails?bltid=$val[beltnumber]"); ?>">Edit</a-->
															
															</td>
															<td>
															
															<form action="<?php echo base_url('registration/admitcard'); ?>" method="post"><input type="hidden" name="bltid" value="<?php echo $val['beltnumber'];?>"><input type="submit" id="cand_admit" value="Issue Admit Card"></form>
															<!--a href="<?php //echo base_url("registration/admitcard?bltid=$val[beltnumber]"); ?>">Issue Admit Card</a-->
															
															</td>
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

<?php } else {
    redirect(base_url() . 'admin/index');
    
}?>