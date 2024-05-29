<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('supersuperadmin_user_id')) {  ?>

<?php 
   /*  echo "<pre>";
    
    print_r($userdetails); 
	print_r($ranks);
	print_r($testcenters);
    //echo $this->session->userdata('user_id');
	
	exit; */
?>


<?php
        $firstname = array(
            'type'          => 'text',
            'name'          => 'firstname',
            'id'            => 'firstname',
            'value'         => $userdetails['personal']['firstname'],
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true'            
        ); 

        $lastname = array(
            'type'          => 'text',
            'name'          => 'lastname',
            'id'            => 'lastname',
            'value'         => $userdetails['personal']['lastname'],
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true'
        );

		$rank_option = array(			
            'name'          => 'rank',
            'id'            => 'rank',
            'class'         => 'rank'
		);
		
       

        $submitbutton = array(
            'id'            => 'submitbutton',
            'name'          => 'submitbutton',           
            'value'         => 'UPDATE'
        );

        $email = array(
            'type'          => 'email',
            'id'            => 'email',
            'name'          => 'email',            
            'value'         => $userdetails['personal']['email'],
            'class'         => 'email',
            'required'      => 'true'
        );

        $mobile = array(
            'type'          => 'number',
            'id'            => 'phone',
            'name'          => 'phone',            
            'value'         => $userdetails['personal']['phone'],
            'class'         => 'phone'            
        );
?>
			<div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="<?php echo base_url('analytics/index'); ?>">DASHBOARD</a> </li>
                    <li> <a href="<?php echo base_url('supersuperadmin/testcenter'); ?>">RANGE LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/rangeadmins'); ?>" class="active">ADMIN LIST</a> </li>
					<li> <a href="<?php echo base_url('supersuperadmin/logout'); ?>">LOGOUT</a> </li>
				</ul>
			</div> 

			<div id="tabs">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 ">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<h1>Edit Admin Details</h1>
									
									<?php  if($this->input->get('status') === 'error') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Something went wrong, try later
										</div>

									<?php } elseif($this->input->get('status') === 'success') { ?>


										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Success: </strong>Admin Registered Successfully
										</div>


									<?php }  elseif($this->input->get('status') === 'userexists') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Admin is already registered
										</div>

									<?php } ?>



									<?php echo form_open('supersuperadmin/validateupdationinfo',['class'=>'rfos','id'=>'registrationform']); ?>
					
											<div class="row">
												<div class="col-xl-6 col-lg-8 col-md-12 mx-auto">

													<label>
														<span>First Name <sup>*</sup> </span>                    
														<?php echo form_input($firstname); ?>
														<?php echo form_error('firstname', '<div class="text-danger">', '</div>'); ?>
													</label>                                     
								                    <label>
														<span>Last Name <sup>*</sup></span> 
														<?php echo form_input($lastname); ?>
														<?php echo form_error('lastname', '<div class="text-danger">', '</div>'); ?>
													</label>
													<label>
														<span>Rank <sup>*</sup></span>
														<select class="form-control" id="rank" name="rank" required>
															<option value="">Select Rank</option>
															<?php 
																foreach($ranks as $val) { 
															
																	if($val['rank_name'] == $userdetails['rank']){
																		?>
																		 <option value="<?php echo $userdetails['personal']['rank']; ?>" selected><?php echo $userdetails['rank']; ?></option>
																		<?php
																		}else{
																		?>
																		 <option value="<?php echo $val['id']; ?>"><?php echo $val['rank_name']; ?></option>	
																		<?php }	                        
																}
															?>
														</select>
														<?php echo form_error('rank', '<div class="text-danger">', '</div>'); ?>
													</label>

													<label>
														<span>
															Email ID <sup>*</sup> : 
														</span> 
														<?php echo form_input($email); ?>
														<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
													</label>

												

													

													<label>
														<span>Test Range <sup>*</sup></span>
														<select class="form-control" id="testcenter" name="testcenter" required>
															<option value="">Select Range</option>
															<?php 
																foreach($testcenters as $val) { 
															
																	if($val['name'] == $userdetails['testcenter']){
																		?>
																		 <option value="<?php echo $userdetails['personal']['range']; ?>" selected><?php echo $userdetails['testcenter']; ?></option>
																		<?php
																		}else{
																		?>
																		 <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>	
																		<?php }	                        
																}
															?>
														</select>
														<?php echo form_error('rank', '<div class="text-danger">', '</div>'); ?>
													</label>
													
													 <label>
														<span>
															Mobile : +91-
														</span> 
														<?php echo form_input($mobile); ?>
														<?php echo form_error('mobile', '<div class="text-danger">', '</div>'); ?>
													</label>
													
													<?php														
														echo form_hidden('edituser_iddd', $edit_id);
													?>
												<div class="col-sm-12 text-center bytn">
													<?php echo form_submit($submitbutton); ?>
												</div>
											</div>

									<?php echo form_close(); ?>									

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
	
	
	
	
<?php } else {
    redirect(base_url() . 'supersuperadmin/index');
    
}?>