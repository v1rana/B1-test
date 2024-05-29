<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('rangeadmin_user_id')) {  ?>
<?php
	// echo "<pre>";
	// print_r($userdetails);
	// exit;
	
	
	if($userdetails['personal']) {		
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

       $idno = array(
            'type'          => 'text',
            'name'          => 'idno',
            'id'            => 'idno',
            'value'         => $userdetails['personal']['idno'],
            'maxlength'     => '50',
            'class'         => '',
            'required'      => 'true',
			'readonly'		=> 'true'
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
										<h1>Edit Registrar Detail's</h1>
										

										
										<?php echo form_open('superadmin/validateupdationinfo',['class'=>'rfos','id'=>'registrationform']); ?>
						
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
														<label>
															<span>Id Number <sup>*</sup></span>
															<?php echo form_input($idno); ?>
															<?php echo form_error('idno', '<div class="text-danger">', '</div>'); ?>
														</label>
														
														<label>
															<span>
																Email ID : <sup>*</sup>
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

<?php
	}
	} else {
    redirect(base_url() . 'admin/index');
    
}?>