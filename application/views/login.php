<?php

	// exit;


    $password_code = array(
        'type'          => 'password',
        'name'          => 'password_code',
        'id'            => 'password_code',
        'value'         => '',
        'maxlength'     => '15',
        'minlength'     => '8',
        'class'         => '',
        'required'      => 'true',
		'autocomplete'  => 'off'
    );


    $submitbutton = array(
        'id'            => 'submitbutton',
        'name'          => 'submitbutton',
        'id'            => 'submitbutton',
        'value'         => 'START'
    );

?>




<section class="test-login d-flex align-items-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-md-6 col-lg-4 pt-0 pb-4 log-pg-box my-4">				
                <h1 class="text-center mt-4">Enter Test Code</h1>
				<?php if($this->session->flashdata('msg') == 'USER_NOT_FOUND') {    ?>
						
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error: Invalid Test Code</strong>
					</div>
					
				<?php } ?>
                <?php echo form_open('main/validate',['class'=>'rfos','id'=>'testform']); ?>
                    <fieldset>
                        <div class="col-sm-12 text-center mt-4">
                            <label>
                                <span>Test Code: <sup>*</sup> </span>                    
                                <?php echo form_input($password_code); ?>
                            </label>
                        </div>
                        <div class="col-sm-12 text-center mt-4 space-add">
                            <?php echo form_submit($submitbutton); ?>
                        </div>
                    </fieldset>
                <?php echo form_close(); ?>                   
            </div>
        </div>
		
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-11 col-lg-7 hidden-xs p-2 border virtual-keyboard">
				<div id="virtualkeyboard" class="">
					<div class="panel-body">
						<ul class="keyboard">
							<li class="char">1</li>
							<li class="char">2</li>
							<li class="char">3</li>
							<li class="char">4</li>
							<li class="char">5</li>
							<li class="char">6</li>
							<li class="char">7</li>
							<li class="char">8</li>
							<li class="char">9</li>
							<li class="char">0</li>
						</ul>
						<ul class="keyboard">
							<li class="char">Q</li>
							<li class="char">W</li>
							<li class="char">E</li>
							<li class="char">R</li>
							<li class="char">T</li>
							<li class="char">Y</li>
							<li class="char">U</li>
							<li class="char">O</li>
							<li class="char">P</li>
						</ul>
						<ul class="keyboard">
							<li class="char">A</li>
							<li class="char">S</li>
							<li class="char">D</li>
							<li class="char">F</li>
							<li class="char">G</li>
							<li class="char">H</li>
							<li class="char">J</li>
							<li class="char">K</li>
							<li class="char">L</li>
							<li class="char">I</li>
						</ul>
						<ul class="keyboard">
							<li class="char">Z</li>
							<li class="char">X</li>
							<li class="char">C</li>
							<li class="char">V</li>
							<li class="char">B</li>
							<li class="char">N</li>
							<li class="char">M</li>
							<li class="backspace last"><span class="glyphicon glyphicon-arrow-left">Backspace</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>