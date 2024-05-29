<div class="container">

<div id="my_camera"></div>
 <div id="results">Your captured image will appear here...</div>
<?php

echo form_open("test/store_image");

	$data = array(
			'type' => 'hidden',
			'name' => 'image',
			'class' =>'image-tag'
	);

	echo form_input($data);
	
	$data = array(
        'name'          => 'button',
        'id'            => 'button',
        'value'         => 'true',
        'type'          => 'Take Snapshot',
        'content'       => 'Reset'
	);
	$js = 'onClick="take_snapshot()"';
echo form_button('button', 'Take Snapshot', $js);

$data = array(
	'type'  => 'submit',
	'name'  => 'submit',
	'value' => 'Submit',
	'class' => 'btn btn-success webcamsubmit',
	'id' => 'submit'
	);        
	echo form_input($data);
				
echo form_close();
?>








    <!--form method="POST" action="store_image">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag" required>
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <input type="submit" name="submit" value="Submit" class="btn btn-success webcamsubmit">
            </div>
        </div>
    </form-->
</div>
  