<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('rangeadmin_user_id')) {  ?>
<?php
	
	// echo "<pre>";
	// print_r($data);
	// print_r($registrar);
	
	// exit;
	
	
	
	 $submitbutton = array(
            'id'            => 'filtersubmitbuttn',
            'name'          => 'submitbutton',
            'class'         => 'filtersubmitbuttn',
            'value'         => 'GO'
        );
	
?>


			<!-- Sidebar -->
			<div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('superadmin/rgeaminindex'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('superadmin/getadmins'); ?>">REGISTRAR LIST</a></li>
					<li> <a href="<?php echo base_url('superadmin/viewusers'); ?>" class="active">CANDIDATE LIST</a> </li>
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
								<h1>CANDIDATE LIST</h1>	
								
								<?php if($this->input->get('status') === 'deactivatesuccess') { ?>

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
								
								
								<div class="container-fluid">
									<div class="row mb-3">
										<div class="col-sm-12">		
											 <?php echo form_open('superadmin/viewusers',['class'=>'rfos','id'=>'registrationform']); ?>
											 <div class="row">
												 <div class="col-sm-6 no-width-span justify-content-end d-inline-flex flex-row">
													 <label class="w-100 text-right regis-box">
														<span class="span-large-font">Registrar <sup>*</sup></span>
														<select class="form-control" id="registrarfilter" name="registrarfilter" required>
															<option value="ALL">ALL</option>
															<?php 
																foreach($registrar as $val) { 
															?>
																<option value="<?php echo $val['idno']; ?>"><?php echo $val['firstname']." ".$val['lastname']; ?></option>		
															<?php                                                     
																}
															?>
														</select>					
													</label>	
													</div>
													 <div class="col-sm-6 text-left no-width-span">
														<?php echo form_submit($submitbutton); ?>
													</div>	
												</div>							
											  <?php echo form_close(); ?>		
										</div>
									</div>
								</div>

									
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
													<th scope="col">Test Range</th>			
													<th scope="col">Created On</th>
													<th scope="col">Registration Center IP</th>												
													<th scope="col">Deactivate</th>												
												</tr>
											</thead>
											<tbody id="myTable">
									<?php      
												if($data !== FALSE) {
													$i = 1;
													foreach($data as $val) {                                              

									?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $val['firstname']; ?></td>
															<td><?php echo $val['lastname']; ?></td>                                                   
															<td><?php echo $val['beltnumber']; ?></td>
															<td><?php echo $val['rank_name']; ?></td>
															<td><?php echo $val['unit_name']; ?></td>
															<td><?php echo $val['name']; ?></td>                                                   
															<td><?php echo $val['creationdate']; ?></td>
															<td><?php echo $val['regestrationcenterip']; ?></td>
															<td>
																<a href="javascript:void(0);" data-href="deactivatecandidatedetails?bltno=<?php echo $val['beltnumber']; ?>" class="openPopup common-rfos2">Deactivate</a>
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
