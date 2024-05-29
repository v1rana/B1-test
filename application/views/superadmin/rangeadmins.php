<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('supersuperadmin_user_id')) {  ?>
	
	<?php
		// echo "<pre>";
		// print_r($rangeadmins);
		// exit;
		
	?>
	
			<!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('analytics/index'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('supersuperadmin/testcenter'); ?>">RANGE LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/rangeadmins'); ?>"  class="active">ADMIN LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 
			<!-- /#sidebar-wrapper -->
			
			
			<div id="tabs">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">                
							<div class="tab-content less-padding-box" id="nav-tabContent">
								<h1>List Of Admins (Range Level)</h1>
								
								
								<?php echo form_open('supersuperadmin/createadmin',['class'=>'rfos text-right pb-4','id'=>'registrationform']); ?>                            
								<button type="submit" class="btn btn-primary cret-bn">Create New Admin</button>
								<?php echo form_close(); ?>
								
								
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="table-responsive b1-test-table">
										<table class="table table-bordered" id="table2" class="table2">								
											<thead>
												<tr>
													<th scope="col">S.NO.</th>
													<th scope="col">First Name</th>
													<th scope="col">Last Name</th> 
													<th scope="col">Rank</th>
													<th scope="col">Exam Range</th>
													<th scope="col">Created on</th>
													<th>Action</th>
													<th>Update</th>
												</tr>
											</thead>
											<tbody id="myTable">
												<?php      
													if($rangeadmins !== FALSE) {
														$i = 1;
														foreach($rangeadmins as $val) {
															
															
														?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $val['firstname']; ?></td>
															<td><?php echo $val['lastname']; ?></td>                                                   
															<td><?php echo $val['rank_name']; ?></td>
															<td><?php echo $val['name']; ?></td>                                                    
															<td><?php echo date('d-m-Y', strtotime($val['createdon'])); ?></td>
															<td>
															<a href="javascript:void(0);" data-href="deactivaterangeadmin?id=<?php echo $val['iddd']; ?>" class="openPopup common-rfos2">Deactivate</a>
															</td>
															<td><a href="<?php echo base_url("supersuperadmin/editcandidatedetails?id=$val[iddd]"); ?>">Edit</a></td>
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
					Are you sure to deactivate admin ?
				</div>
				<div class="modal-footer justify-content-center">
					<a id="deactivate" href="" class="common-rfos2">Confirm</a>
				</div>
			</div>
		</div>
	</div>	
	 <!---->
	<?php } else {
		redirect(base_url() . 'admin/index');
		
	}?>	