<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gift extends CI_Controller
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
        $this->load->view('gift');
        $this->load->view('includes/bottom');
        $this->load->view('templates/footer');
	}

	public function upload()
	{

        if ($this->input->is_ajax_request()) {
            $extension = explode('.', $_FILES['file']['name']);
            $filename = substr(str_shuffle(time().uniqid()), 0, 12).'.'.end($extension);
            $this->load->library('upload', ['upload_path' => './assets/images/uploads', 'file_name' => $filename, 'allowed_types' => 'gif|jpg|png|webp|jpeg|svg', 'file_ext_tolower' => true]);
            if (!$this->upload->do_upload('file')) return (new CI_Response(500, ['Content-Type: application/json']))->send(['info' => 'Invalid image. Try another.', 'status' => 0]);

            $this->load->model('gift_model');
            $response = $this->gift_model->upload(['filename' => strtolower($filename), 'userid' => $_SESSION['id'], 'type' => $_FILES['file']['type']]);
            return (new CI_Response(200, ['Content-Type: application/json']))->send($response);
        }

	}

}
