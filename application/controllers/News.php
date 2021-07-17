<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class News extends CI_Controller 
{

	public function index()
	{
		$this->load->model('news_model');
		$this->load->view('templates/header');
		$this->load->view('includes/navbar');
		$this->load->view('news', ['allNews' => $this->news_model->all()]);
		$this->load->view('includes/bottom');
		$this->load->view('templates/footer');
	}

	public function read($id, $title = '')
	{
		$this->load->model('news_model');
		$this->load->view('templates/header');
		$this->load->view('includes/navbar');

		$this->load->view('single', ['news' => $this->news_model->find($id), 'allNews' => $this->news_model->all(), 'id' => $id]);
		$this->load->view('includes/bottom');
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if ($this->input->is_ajax_request()) {
			$data = ['title' => $this->input->post('title'), 'author' => $this->input->post('author'), 'description' => $this->input->post('description')];
	    	$this->load->model('news_model');
	    	$response = $this->news_model->add($data);
	    	return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
		}
	}

	public function upload($id) {
		if ($this->input->is_ajax_request()) {
			$extension = explode('.', $_FILES['newsimage']['name']);
			$filename = substr(str_shuffle(time().uniqid()), 0, 4).'.'.end($extension);
	        $this->load->library('upload', ['upload_path' => './assets/images/news', 'file_name' => $filename, 'allowed_types' => 'gif|jpg|png|webp|jpeg|svg', 'file_ext_tolower' => true]);
	        if (!$this->upload->do_upload('newsimage')) return (new CI_Response(500, ['Content-Type: application/json']))->send(['info' => 'Invalid image. Try another.', 'status' => 0]);

	        $this->load->model('news_model');
		    $response = $this->news_model->upload(['image' => strtolower($filename), 'id' => $id]);
		    return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
		}

	}

	public function delete($id) {
		$this->load->model('news_model');
		$response = $this->news_model->delete($id);
		return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
	}

	public function edit($id) {
		$data = ['title' => $this->input->post('title'), 'author' => $this->input->post('author'), 'description' => $this->input->post('description'), 'id' => $id];
	    	$this->load->model('news_model');
		$this->load->model('news_model');
		$response = $this->news_model->edit($data);
		return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
	}

}
