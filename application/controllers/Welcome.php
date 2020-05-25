<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// secureUser();
		// secure();

		if(!$this->session->userdata('nama')){
			redirect('Auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('index');
		$this->load->view('templates/footer');
	}
}
