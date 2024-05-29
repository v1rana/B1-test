<?php
	
	
	exit;
	
	
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Passwordencrypt extends CI_Controller {
	
	
		function index() {
			if($this->input->post('pvalue')){
                $password1 = $this->input->post('pvalue');
                $encyprted_password = $this->encryption->encrypt($password1);
                
                echo $encyprted_password;
            }
		}
		
		
		
		function oldpass1() {		
			if($this->input->post('oldpass1')){
                $password11 = $this->input->post('oldpass1');
                $encyprted_password11 = $this->encryption->encrypt($password11);                
                echo $encyprted_password11;
            }
		}
		
		
		
		function newpass1() {
			if($this->input->post('newpass1')){
                $password13 = $this->input->post('newpass1');
                $this->session->set_userdata('newpass1', $password13);
                $encyprted_password3 = $this->encryption->encrypt($password13);                
                echo $encyprted_password3;
            }
		}
				
		
		function newpass2() {
			if($this->input->post('newpass2')){
                $password14 = $this->input->post('newpass2');
                $this->session->set_userdata('confirmnewpass', $password14);
                $encyprted_password5 = $this->encryption->encrypt($password14);                
                echo $encyprted_password5;
            }
		}
		
	}