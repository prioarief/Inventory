<?php

function secure(){
	$ini = get_instance();
	if(!$ini->session->userdata('role')){
		redirect('Admin/Auth');
	}else{
		if($ini->session->userdata('role') == 'Admin'){
			redirect('Welcome');
		}
	}

}

function secureUser(){
	$ini = get_instance();
	if(!$ini->session->userdata('buyer')){
		redirect('Auth');
	}

}

function login(){
	$ini = get_instance();
	if($ini->session->userdata('nama')){
		redirect('Welcome');
	}

}
                        
/* End of file login.php */
    
                        