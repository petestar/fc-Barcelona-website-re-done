<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		CI_Auth::allow();
	}

	public function index()
	{
		$this->load->model('news_model');
		$this->load->view('templates/header');
		$this->load->view('includes/navbar');
		$this->load->view('home', ['allNews' => $this->news_model->all()]);
		$this->load->view('includes/bottom');
		$this->load->view('templates/footer');
	}
}
