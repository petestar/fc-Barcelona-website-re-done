<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller 
{

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login');
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

	public function logout() {
		unset(
	        $_SESSION['id'],
	        $_SESSION['username'],
	        $_SESSION['email'],
	        $_SESSION['status']
	    );
		session_destroy();
		header("Location: ". base_url().'login');
	}
}
