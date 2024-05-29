<?php

	defined('BASEPATH') OR exit('No direct script access allowed.');

    //if ( ! function_exists('check_session')) {
        function check_session()  {
			$ci = & get_instance();
            if($ci->session->userdata('Candidate_data')){
				
				return $ci->session->userdata('Candidate_data');
				
			}else{
				
				return $ci->session->unset_userdata('Candidate_data');
				
			}
        }
    //}
