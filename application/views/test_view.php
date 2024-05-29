

<script type = 'text/javascript' src = "<?php echo base_url(); 
   ?>assets/js/custom-ajax.js"></script>

<div id="tabs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" style="color:blue; margin-top:10px">
            <?php
            $c = 1;
           

            foreach($questions as $question ) {
                $array = array('class' => 'form', 'id' => 'question_form');
                echo form_open('Test/next_question/'.$question->Id, $array);

                echo $c.". ".$question->Question."<br><br>";
              
                $data = array(
                    'name' => 'answer',
                    'value' => $question->A,
                    );      
               echo form_radio($data);
               echo form_label($question->A);

                $data = array(
                    'name' => 'answer',
                    'value' => $question->B,
                    );      
               echo form_radio($data);
               echo form_label($question->B);

                $data = array(
                    'name' => 'answer',
                    'value' => $question->C,
                    );      
               echo form_radio($data);
               echo form_label($question->C);
              
                $data = array(
                    'name' => 'answer',
                    'value' => $question->D,
                    );      
               echo form_radio($data);
               echo form_label($question->D);

               $data = array(
                'type'  => 'submit',
                'name'  => 'back',
                'value' => 'Back',
                'class' => 'back'
            );        
           echo form_input($data);

            $data = array(
                'type'  => 'submit',
                'name'  => 'next',
                'value' => 'Next',
                'class' => 'next'
            );
            echo form_input($data);
            echo form_close();
                $c++;
            }
          
            
            ?>
            

            </div>
        </div>
    </div>
</div>