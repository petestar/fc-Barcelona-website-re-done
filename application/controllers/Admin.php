<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		CI_Auth::admin();
	}

	public function index()
	{
		$this->load->model('news_model');
		$this->load->view('templates/header');
		$this->load->view('admin', ['allNews' => $this->news_model->all()]);
		$this->load->view('templates/footer');
	}

	public function auth()
	{
		if ($this->input->is_ajax_request()) {
			$data = ['email' => $this->input->post('email'), 'password' => $this->input->post('password')];
	    	$this->load->model('login_model');
	    	$response = $this->login_model->login($data);
	    	return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
		}
			

	}
}
