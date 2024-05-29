<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 mt-5">
					<div class="login-form text-center"> 
						<?php  if($this->input->get('msg') === 'success') { ?>
							<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Success: </strong> Please check email for old password field and reset new foryouself.
							</div>
						<?php  } elseif($this->input->get('message') === 'error') { ?>
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Error: </strong> Some error occoured, Please try later.
							</div>
						<?php  } elseif($this->input->get('message') === 'authfailed') { ?>
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Error: </strong> Invalid password.
							</div>
						<?php  } elseif($this->input->get('message') === 'invaliduser') { ?>
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Error: </strong> Invalid user.
							</div>
						<?php } elseif($this->input->get('message') == 'nc') { ?>
						 
							<div class="alert alert-dismissible alert-warning">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning: New Password and Confirm New Password must be same</strong>
							</div>	
							
						 <?php } elseif($this->input->get('message') == 'rq') { ?>
						 
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning: All Fields required</strong>
							</div>	
							
						 <?php } ?>
						 
						
						<h1>Update Password</h1>
						<?php echo form_open('superadmin/updatepassword'); ?>
							<input placeholder="USERNAME" type="email" name="loginusername" value="<?php echo $this->session->userdata('rangeadmin_email'); ?>">                       

							<input placeholder="OLD PASSWORD" id="oldpass1" type="Password" name="oldpassword" autocomplete="off">
							<?php echo form_error('oldpassword', '<div class="text-danger">', '</div>'); ?>

							<input placeholder="NEW PASSWORD" id="newpass1" type="Password" name="newpassword" autocomplete="off">
							<?php echo form_error('newpassword', '<div class="text-danger">', '</div>'); ?>

							<input placeholder="CONFIRM NEW PASSWORD" id="newpass2" type="Password" name="confirmpassword" autocomplete="off">
							<?php echo form_error('confirmpassword', '<div class="text-danger">', '</div>'); ?>
							
							
							<input placeholder="INPUT SYMBOLS" type="text" id="captcha" name="captcha">
                            <?php echo form_error('captcha', '<div class="text-danger">', '</div>'); ?>
                            <div class="captcha-image">
                                <?php
                                    if(isset($filename)) {
                                        $image1 = base_url('captcha/').$filename;
                                ?>
                                    <img src="<?php echo $image1; ?>" id="captcha_image">
                                <?php
                                    }
                                ?>
                            </div> 
							
							
							
							<div class="button-box">
								<input type="submit" class="login-button" value="Update Password" id="updatepassbutton">
							</div>
							
						<?php echo form_close(); ?>
					</div>
				</div>
		</div>
		</div>
	</div>