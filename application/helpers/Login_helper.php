<?php

function secure(){
	$ini = get_instance();
	if(!$ini->session->userdata('role')){
		redirect('Auth');
	}else{
		if($ini->session->userdata('role') == 'Admin'){
			redirect('Welcome');
		}
	}

}

function login(){
	$ini = get_instance();
	if($ini->session->userdata('role')){
		redirect('Welcome');
	}

}
                        
/* End of file login.php */
    
                        