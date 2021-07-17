<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Contact extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		CI_Auth::allow();
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('includes/navbar');
		$this->load->view('contact');
		$this->load->view('includes/bottom');
		$this->load->view('templates/footer');
	}

	public function process()
	{
		if ($this->input->is_ajax_request()) {
			$data = ['email' => $this->input->post('email'), 'fullname' => $this->input->post('fullname'), 'message' => $this->input->post('message')];
	    	$this->load->model('contact_model');
	    	$response = $this->contact_model->contact($data);
	    	return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
		}
	}

}
