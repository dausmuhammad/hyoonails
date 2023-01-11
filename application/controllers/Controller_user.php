<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_user extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
		$this->load->model('models');
		session_start();
		if (!isset($_SESSION['username'])) {
			header("Location:" . base_url());
			exit();
		}
	}
	
	public function index()
	{
        $data['js'] = ['user'];
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('page/v_user');
        $this->load->view('footer',$data);
	}

	public function getAllUser()
	{	
		// var_dump("masuk");
		// exit();
		$data = $this->models->getAllUser();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function insertUser(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"username " => $this->input->post("username"),
			"password" =>  $this->input->post("password"),
			"nama_lengkap" =>  $this->input->post("nama_lengkap"),
			"role" =>  $this->input->post("role"),
			"insert_by" =>  $_SESSION['username'],
			"insert_date" => $now
		);
		$data = $this->models->insertUser($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function updateUser(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"kode_warna " => $this->input->post("kode_warna"),
			"nama_warna" =>  $this->input->post("nama_warna"),
			"insert_by" =>  $_SESSION['username'],
			"insert_date" => $now
		);
		
		$data = $this->models->updateUser($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	public function hapusUser(){
		$data = $this->models->hapusUser($this->input->post('kode_warna'));
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
}
