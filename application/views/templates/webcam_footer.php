<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>

		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/popper.min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/myscript.js'); ?>"></script>
		<!--script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script-->
		<script src="<?php //echo base_url('assets/js/webcam.js'); ?>"></script>
		<!--script type="text/javascript" >
			function preventBack(){window.history.forward();}
				setTimeout("preventBack()", 0);
				window.onunload=function(){null};
		</script-->

		<script language="JavaScript">
			Webcam.set({
				width: 490,
				height: 390,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
		  
			Webcam.attach( '#my_camera' );
		  
			function take_snapshot() {
				Webcam.snap(function(data_uri){
					$(".image-tag").val(data_uri);
					document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
				});
			}
		</script>
	</body>
</html>