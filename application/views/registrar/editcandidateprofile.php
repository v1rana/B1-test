<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>
<?php
	// echo "<pre>";
	// print_r($userdetails);
	// exit;
	if($userdetails['personal']) {
		$dob1           = date("d-m-Y", strtotime($userdetails['personal']['dob']) );
		$doj1           = date("d-m-Y", strtotime($userdetails['personal']['dateofjoining']) );
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

        $testlanguage = array(    
            'id'            => 'testlanguage',
            'name'          => 'testlanguage'
        );
        $testlanguageoptions = array(           
            'Hindi'         => 'Hindi'           
        );

        $testyear = array(    
            'id'            => 'testyear',
            'name'          => 'testyear'
        );
        $testyearoptions = array(           
            '2018'         => '2018'         
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

        $beltnumber = array(
            'type'          => 'text',
            'name'          => 'beltnumber',
            'id'            => 'beltnumber',
            'value'         => $userdetails['personal']['beltnumber'],
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'readonly'      => 'true'
        );

        
      

        $submitbutton = array(
            'id'            => 'submitbutton',
            'name'          => 'submitbutton',
            'id'            => 'submitbutton',
            'value'         => 'UPDATE'
        );
		
		
		$email = array(
            'type'          => 'email',
            'id'            => 'email',
            'name'          => 'email',            
            'value'         => $userdetails['personal']['email'],
            'class'         => 'email'            
        );

        $mobile = array(
            'type'          => 'number',
            'id'            => 'phone',
            'name'          => 'phone',            
            'value'         => $userdetails['personal']['mobile'],
            'class'         => 'phone'            
        );

?>


					<!-- Sidebar -->
					<div id="sidebar-wrapper">
						<ul class="sidebar-nav">
							<li> <a href="<?php echo base_url('admin/registrarindex'); ?>">DASHBOARD</a></li>
							<li> <a href="<?php echo base_url('registration/viewusers'); ?>" class="active">CANDIDATE LIST</a></li>					
							<li> <a href="<?php echo base_url('admin/viewtestresults'); ?>">TEST RESULT</a></li>
							<li> <a href="<?php echo base_url('admin/logout'); ?>">LOGOUT</a> </li>
						</ul>
					</div> 
					<!-- /#sidebar-wrapper -->


					<div id="tabs">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 ">
									<div class="tab-content" id="nav-tabContent">
										<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
											<h1>Candidate Details</h1>
											

											
											<?php echo form_open('registration/validateupdationinfo',['class'=>'rfos','id'=>'registrationform']); ?>
											
													<div class="row marg-btm">
														<div class="col-sm-6">

															<label>
																<span>First Name <sup>*</sup> </span>                    
																<?php echo form_input($firstname); ?>
																<?php echo form_error('firstname', '<div class="text-danger">', '</div>'); ?>
															</label>
															</div>
															<div class="col-sm-6">

															<label>
																<span>Last Name <sup>*</sup></span> 
																<?php echo form_input($lastname); ?>
																<?php echo form_error('lastname', '<div class="text-danger">', '</div>'); ?>
															</label>
</div>
															<div class="col-sm-6">
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
																	?>
																		<!--option value="<?php //echo $userdetails['personal']['rank']; ?>"><?php //echo $userdetails['rank']; ?></option-->		
																	<?php                                                     
																		}
																	?>
																</select>
																<?php echo form_error('rank', '<div class="text-danger">', '</div>'); ?>
															</label>
</div>
															<div class="col-sm-6">
															<label>
																<span>Belt No. <sup>*</sup></span>
																<?php echo form_input($beltnumber); ?>
																<?php echo form_error('beltnumber', '<div class="text-danger">', '</div>'); ?>
															</label>
</div>
															<div class="col-sm-6">

															<label>
																<span>Date of Birth <sup>*</sup></span>
																	<div class="email-text-box">
																	<input name="dob" type="text" value="<?php echo $dob1; ?>"/>
																    <small class="small-tag">(DOB must be greater than 20 Years)</small>
																	</div>																	
															</label>
</div>
			<div class="col-sm-6">
															<label>
																<span>Unit <sup>*</sup></span>
																<select class="form-control" id="unit" name="unit" required>											
																	<option value="">Select Unit</option>
																	<?php 
																		foreach($units as $val) { 
																			if($val['unit_name'] == $userdetails['unit']){														
																	?>
																				<option value="<?php echo $userdetails['personal']['unit']; ?>" selected><?php echo $userdetails['unit']; ?></option>
																	<?php
																				}else{
																	?>
																				<option value="<?php echo $val['id']; ?>"><?php echo $val['unit_name']; ?></option>		
																	<?php                                                     
																				}
																		}
																	?>
																</select>
																<?php echo form_error('unit', '<div class="text-danger">', '</div>'); ?>
															</label>
															</div>
															<div class="col-sm-6">
														   

															<label>
																<span>Exam Medium <sup>*</sup></span>
																<?php echo form_dropdown($testlanguage, $testlanguageoptions, ''); ?>
																<?php echo form_error('testlanguage', '<div class="text-danger">', '</div>'); ?>
															</label>
</div>
														<div class="col-sm-6">

															<label>
																<span>Date of Joining <sup>*</sup> </span>                     
																	<div class="email-text-box">
																	<input name="dateofjoining"  type="text" value="<?php echo $doj1; ?>" />
																	<small class="small-tag">(Minimum Service required 5 years)</small>
																	</div>
															</label>
</div>
															<div class="col-sm-6">
															<label>
																<span>Test Year<sup>*</sup> </span>
																<?php echo form_dropdown($testyear, $testyearoptions, ''); ?>
																<?php echo form_error('testyear', '<div class="text-danger">', '</div>'); ?>
															</label>
															</div>
																<div class="col-sm-6">
														   <label>
																<span>
																	Email ID : 
																</span> 
																<div class="email-text-box">
																<?php echo form_input($email); ?>
																<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
																<small class="small-tag">(If candidate will provide his/her E-mail address then he/she will get the registration detail on his/her E-mail address.)</small>
																</div>
															</label>
														   
														                                       

														</div>
															<div class="col-sm-6">
	                                                        <label>
																<span>
																	Mobile : +91-
																</span> 
																<?php echo form_input($mobile); ?>
																<div style="color:#a50e0e !important" class="text-danger" id="errorspan"></div>
															</label> 
														</div>


														

												
	
														

														<div class="col-sm-12 text-center mb-5">
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
	}
} else {
    redirect(base_url() . 'admin/index');
    
}?>