<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class About extends CI_Controller 
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
		$this->load->view('about');
		$this->load->view('includes/bottom');
		$this->load->view('templates/footer');
	}
}
