<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1" id="forgot1">	
			
			<?php if($this->input->get('status') == 2) { ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error: Some Error Occured, Please Contact Support</strong>
				</div>
			<?php } elseif($this->input->get('status') == 3) { ?>
				<div class="alert alert-dismissible alert-warning">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Warning: Invalid User</strong>
				</div>
			<?php } ?>
				<div class="login-form text-center">						
					<h1>Forgot Password</h1>                    
					<?php echo form_open('admin/forgotpassword'); ?>
						<input placeholder="USERNAME" type="email" name="loginusername" value="<?php echo set_value('username'); ?>" id="forgotpagefield" autocomplete="off" required>
						<?php echo form_error('loginusername', '<div class="text-danger">', '</div>'); ?>

						<div class="button-box">
							<input type="submit" class="login-button" value="Update Password" id="forgotbutton">
						</div>                        
					<?php echo form_close(); ?>
				</div>
			</div>
	   </div>
	</div>
</div>