<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('rangeadmin_user_id')) {  ?>

<?php 
    // echo "<pre>";
    // print_r($ranks);
    // print_r($units);
    // print_r($testcenters);
    // echo $this->session->userdata('user_id');
?>


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

        $idno = array(
            'type'          => 'text',
            'name'          => 'idno',
            'id'            => 'idno',
            'value'         => '',
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'autocomplete'  => 'off'
        );

        $submitbutton = array(
            'id'            => 'submitbutton',
            'name'          => 'submitbutton',           
            'value'         => 'SAVE'
        );

        $email = array(
            'type'          => 'email',
            'id'            => 'email',
            'name'          => 'email',            
            'value'         => '',
            'class'         => 'email',
            'required'      => 'true',
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
						<div class="col-xs-12 ">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<h1>Add Registrar</h1>
									

									<?php  if($this->input->get('status') === 'error') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Something went wrong, try later
										</div>

									<?php } elseif($this->input->get('status') === 'success') { ?>


										<div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Success: </strong>User Registered Successfully
										</div>


									<?php }  elseif($this->input->get('status') === 'userexists') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Id Number is already registered, Please enter unique Id number
										</div>

									<?php } elseif($this->input->get('status') === 'emailexits') { ?>

										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error: </strong>Email Address is already in use
										</div>

									<?php } ?>



									<?php echo form_open('superadmin/validatenewadmin',['class'=>'rfos','id'=>'registrationform']); ?>
					
											<div class="row">
												<div class="col-sm-6 mx-auto">

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
															?>
																<option value="<?php echo $val['id']; ?>"><?php echo $val['rank_name']; ?></option>		
															<?php                                                     
																}
															?>
														</select>
														<?php echo form_error('rank', '<div class="text-danger">', '</div>'); ?>
													</label>
													<label>
														<span>Id Number <sup>*</sup></span>
														<?php echo form_input($idno); ?>
														<?php echo form_error('idno', '<div class="text-danger">', '</div>'); ?>
													</label>

													<label>
														<span>
															Email ID <sup>*</sup> : 
														</span> 
														<?php echo form_input($email); ?>
														<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
													</label>

												

													

													
													
													 <label>
														<span>
															Mobile : +91-
														</span> 
														<?php echo form_input($mobile); ?>
														<div style="color:#a50e0e !important" class="text-danger" id="errorspan"></div><br>
													</label>
													
													
			<!--
													<label>
														<span>Unit <sup>*</sup></span>
														<select class="form-control" id="unit" name="unit" required>
															<option value="">Select Unit</option>
															<?php 
																//foreach($units as $val) { 
															?>
																<option value="<?php //echo $val['id']; ?>"><?php //echo $val['unit_name']; ?></option>		
															<?php                                                     
																//}
															?>
														</select>
														<?php //echo form_error('unit', '<div class="text-danger">', '</div>'); ?>
													</label>
			-->                                        
												</div>

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
    redirect(base_url() . 'superadmin/index');
    
}?>