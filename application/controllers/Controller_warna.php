<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_warna extends CI_Controller {
    
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
        $data['js'] = ['warna'];
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('page/v_warna');
        $this->load->view('footer',$data);
	}

	public function getWarna()
	{	
		// var_dump("masuk");
		// exit();
		$data = $this->models->getWarna();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function insertWarna(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"kode_warna " => $this->input->post("kode_warna"),
			"nama_warna" =>  $this->input->post("nama_warna"),
			"insert_by" =>  $_SESSION['username'],
			"insert_date" => $now
		);
		$data = $this->models->insertWarna($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function updateWarna(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"kode_warna " => $this->input->post("kode_warna"),
			"nama_warna" =>  $this->input->post("nama_warna"),
			"insert_by" =>  $_SESSION['username'],
			"insert_date" => $now
		);
		
		$data = $this->models->updateWarna($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	public function hapusWarna(){
		$data = $this->models->hapusWarna($this->input->post('kode_warna'));
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
}
