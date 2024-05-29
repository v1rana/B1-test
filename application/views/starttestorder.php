<?php
    $submitbutton = array(
        'id'            => 'submitbutton',
        'name'          => 'submitbutton',
        'id'            => 'submitbutton',
        'value'         => 'START TEST'
    );
?>




<section class="test-login d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 pt-5">	
                <?php echo form_open('superadmin/starttest',['class'=>'rfos','id'=>'testform']); ?>
                    <fieldset>                        
                        <div class="col-sm-12 text-center mt-4">
                            <?php echo form_submit($submitbutton); ?>
                        </div>
                    </fieldset>
                <?php echo form_close(); ?>                   
            </div>
        </div>
    </div>
</div>