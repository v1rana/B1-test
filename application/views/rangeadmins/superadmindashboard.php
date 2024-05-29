<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('rangeadmin_user_id')) {  ?>

<?php
    // echo "<pre>";
    // print_r($admins);
	// exit;
?>
			<!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('superadmin/rgeaminindex'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('superadmin/getadmins'); ?>" class="active">REGISTRAR LIST</a></li>
					<li> <a href="<?php echo base_url('superadmin/viewusers'); ?>">CANDIDATE LIST</a> </li>
					<li> <a href="<?php echo base_url('superadmin/viewtestresults'); ?>">TEST RESULT</a> </li>
					<li> <a href="<?php echo base_url('superadmin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->
			<div id="tabs">
				<div class="container-fluid">
					<div class="row">			
						<div class="col-sm-12">
								 
							<div class="tab-content" id="nav-tabContent">
							<h1 class="listregistrars text-center"> REGISTRAR LIST</h2>


								<?php  if($this->input->get('status') === 'error') { ?>
									
									<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Error: </strong> Some Error occured, Try later.
									</div>

								<?php } elseif($this->input->get('status') === 'success') { ?>

									<div class="alert alert-dismissible alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success: </strong>Registrar Updated Successfully
									</div>

								<?php } elseif($this->input->get('status') === 'deactivatesuccess') { ?>

									<div class="alert alert-dismissible alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success: </strong>Registrar Deactivated Successfully.
									</div>

								<?php } elseif($this->input->get('status') === 'deactivateerror') { ?>

									<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Error: </strong>Registrar Deactivation Error, try later.
									</div>

								<?php } ?>
							
							
							
								<?php echo form_open('superadmin/createadmin',['class'=>'rfos text-right pb-4','id'=>'registrationform']); ?>                            
									<button type="submit" class="btn btn-primary cret-bn">Create New Registrar</button>
								<?php echo form_close(); ?>

								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="table-responsive b1-test-table">
										<table class="table table-bordered" id="table1" class="table1">								
											<thead>
												<tr>
													<th scope="col">S.NO.</th>
													<th scope="col">First Name</th>
													<th scope="col">Last Name</th>
													<th scope="col">Id Number</th>
													<th scope="col">Rank</th>
													<th scope="col">Unit</th>
													<th scope="col">Center Alloted</th>
													<th scope="col">Created on</th>
													<th>Edit</th>
													<!-- <th>Deactivate</th> -->
												</tr>
											</thead>
											<tbody id="myTable">
		<?php
											
											if($admins != ''){
												if($admins === 'NO_USER_FOUND') {	
		?>
													<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>                                                    
															<!-- <td></td> -->                                                
													</tr>
		<?php		                            } else{
													$i = 1;
													foreach($admins as $val) {
		?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $val['firstname']; ?></td>
															<td><?php echo $val['lastname']; ?></td>
															<td><?php echo $val['idno']; ?></td>
															<td><?php echo $val['rank_name']; ?></td>
															<td><?php echo $val['role']; ?></td>
															<td><?php echo $val['name']; ?></td>
															<td><?php echo $val['createdon']; ?></td>
															<td>
															<form action="<?php echo base_url('superadmin/editcandidatedetails'); ?>" method="post"><input type="hidden" name="idno" value="<?php echo $val['idno'];?>"><input type="submit" id="edit_cand" value="Edit"></form>
															<!--a href="<?php// echo base_url("superadmin/editcandidatedetails?idno=$val[idno]"); ?>">Edit</a-->
															
															</td>
															<!--
															<td>
																<a href="javascript:void(0);" data-href="deactivateregistrardetails?idno=<?php //echo $val['idno']; ?>" class="openPopup common-rfos2">Deactivate</a>
															</td>
															 -->
															
														</tr>
									<?php
														$i++;
													}
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
		</div>
	</div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->
	<!-- Bootstrap core JavaScript -->
	
<!-- Modal-->
<div class="modal fade absolute-box" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog text-center" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure to deactivate Member ?
			</div>
			<div class="modal-footer justify-content-center">
				<a id="deactivate" href="" class="common-rfos2">Confirm</a>
			</div>
		</div>
	</div>
</div>	
 <!---->
	
	

<?php } else {
    redirect(base_url() . 'superadmin/index');
    
}?>