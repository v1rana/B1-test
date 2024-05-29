<section class="test-login d-flex align-items-center test-login2">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-6 text-center py-5 log-pg-box">
				<img src="<?php echo base_url('assets/images/tick.png'); ?>" alt="" class="img-fluid" />				
                <h2 class="text-center mt-4 h1">Thank You!</h2>
				<?php
					if(isset($msg)) {
						
						echo "<h3 class='text-center mt-4'>$msg</h3>";
					}
				?>
				<a href="<?php echo base_url("Main/examlogin"); ?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg> Back To Test Code Screen</a>
            </div>
        </div>
    </div>
</section>