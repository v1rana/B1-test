<?php defined('BASEPATH') OR exit('No direct script access allowed'); exit;?>

    <!-- login form page start -->
    <section class="form-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 offset-sm-0">
                    <div class="login-form text-center">
						<?php if($this->input->get('msg') == 'error') {    ?>
						
                            <div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error: Invalid Username or Password</strong>
                            </div>
							
                        <?php } elseif($this->input->get('msg') == 'success') { ?>
						
							<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success: Password Updated Successfully, Please check email for new password</strong>
							</div>	
							
                        <?php } elseif($this->input->get('msg') == 'error') {    ?>
                            <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error: Invalid Username or Password</strong>
                            </div>
                        <?php } ?>

                        <h1>Admin Login</h1>

                        <?php echo form_open('superadmin/loginvalidate'); ?>
                            <input placeholder="USERNAME" type="email" name="loginusername" value="<?php echo set_value('username'); ?>" autocomplete="off" required>
                            <?php echo form_error('loginusername', '<div class="text-danger">', '</div>'); ?>
                            <input placeholder="PASSWORD" type="Password" name="loginpassword" id="Password" class="Password" value="" autocomplete="off" required>
                            <?php echo form_error('loginpassword', '<div class="text-danger">', '</div>'); ?>                                 <input placeholder="INPUT SYMBOLS" type="text" id="captcha" name="captcha">
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
                                <input type="submit" class="login-button" value="LOGIN">
                            </div>     
							<span class="create-acc"><a href="<?php echo base_url('superadmin/forgotpasswordindex'); ?>">Forgot Password <a/></span>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login form page end -->
