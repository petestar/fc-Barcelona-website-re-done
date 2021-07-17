<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Signup extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		CI_Auth::guest();
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('signup');
		$this->load->view('templates/footer');
	}

	public function process()
	{
		if ($this->input->is_ajax_request()) {
			$data = ['email' => $this->input->post('email'), 'password' => $this->input->post('password')];
	    	$this->load->model('signup_model');
	    	$response = $this->signup_model->signup($data);
	    	return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
		}
	}

}
