<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('registrar_user_id')) {  ?>

<?php
        $firstname = array(
            'type'          => 'text',
            'name'          => 'firstname',
            'id'            => 'firstname',
            'value'         => '',
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'autocomplete'  => 'off'
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
            '2019'         => '2018'         
        );


        $lastname = array(
            'type'          => 'text',
            'name'          => 'lastname',
            'id'            => 'lastname',
            'value'         => '',
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'autocomplete'  => 'off'
        );

        $beltnumber = array(
            'type'          => 'text',
            'name'          => 'beltnumber',
            'id'            => 'beltnumber',
            'value'         => '',
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'autocomplete'  => 'off'
        );

        
      

        $submitbutton = array(
            'id'            => 'submitbutton',
            'name'          => 'submitbutton',
            'id'            => 'submitbutton',
            'value'         => 'SAVE'
        );
		
		
		$email = array(
            'type'          => 'email',
            'id'            => 'email',
            'name'          => 'email',            
            'value'         => '',
            'class'         => 'email',
            'autocomplete'  => 'off'
        );

        $mobile = array(
            'type'          => 'number',
            'id'            => 'phone',
            'name'          => 'phone',            
            'value'         => '',
            'class'         => 'phone',
            'autocomplete'  => 'off'
        );

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
						<div class="col-xs-12 ">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<h1>Add New Candidate</h1>
									

									<?php  if($this->input->get('status') === 'userexists') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong> Belt Number is already registered, Please enter unique belt number
										</div>

									<?php } elseif($this->input->get('status') === 'success') {?>
									
										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Success: </strong>Candidate Registered Successfully
										</div>

									<?php } elseif($this->input->get('status') === 'trylater') { ?>
										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Something Went Wrong, Try later
										</div>

									<?php } elseif($this->input->get('status') === 'emailexits') { ?>
										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Email Address is already in use
										</div>

									<?php } ?>
									<?php echo form_open('registration/validate',['class'=>'rfos','id'=>'registrationform']); ?>
					
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
														<span>Last Name </span> 
														<?php echo form_input($lastname); ?>
														<?php echo form_error('lastname', '<div class="text-danger">', '</div>'); ?>
													</label>
</div>
													<!-- <label>
														<span>Unique Code <sup>*</sup></span>
														<?php //echo form_input($uniquecode); ?>
														<?php //echo form_error('uniquecode', '<div class="text-danger">', '</div>'); ?>
													</label> -->

								  <div class="col-sm-6">
													<label>
														<span>Rank <sup>*</sup></span>
														<select class="form-control" id="rank" name="rank" required>
															<option value="">Select Rank</option>
															<?php 
																foreach($ranks as $val) { 
															?>
																<option value="<?php echo $val['id']; ?>"><?php echo $val['rank_name']; ?></option>		
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
														<div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
															<input name="dob" class="form-control" type="text" readonly />
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
															?>
																<option value="<?php echo $val['id']; ?>"><?php echo $val['unit_name']; ?></option>		
															<?php                                                     
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
														<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
															<input name="dateofjoining" class="form-control" type="text" readonly />
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
															Email ID : <sup>*</sup>
														</span>
														<div class="email-text-box">		
														<?php echo form_input($email); ?>
														<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
														<small class="small-tag">(If candidate will provide his/her E-mail address then he/she will get the registration detail on his/her E-mail address.)</small>
														</div>
													</label>
												   
													
													

													<!-- <label>
														<span>Rank in Recruit Course <sup>*</sup></span>
														<?php //echo form_input($rankinrecuritmentcourse); ?>
														<?php //echo form_error('rankinrecuritmentcourse', '<div class="text-danger">', '</div>'); ?>
													</label> -->

													<!-- <label>
														<span>Photo <sup>*</sup> </span>
														<input type="file" class="filestyle" data-icon="false">
													</label> -->

												</div>
												
												<div class="col-sm-6">
													<label>
														<span>
															Mobile : +91-
														</span> 
														<?php echo form_input($mobile); ?>
														<div style="color:#a50e0e !important" class="text-danger" id="errorspan"></div><br>
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

<?php } else {
    redirect(base_url() . 'admin/index');
    
}?>