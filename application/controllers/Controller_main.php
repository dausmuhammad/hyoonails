<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_main extends CI_Controller
{
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
		$data['js'] = ['main'];
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('content');
		$this->load->view('footer', $data);
	}

	public function getLaporanHarian(){
		$data = $this->models->getLaporanHarian();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function getLaporanBulanan(){
		$data = $this->models->getLaporanBulanan();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function getLaporanTahunan(){
		$data = $this->models->getLaporanTahunan();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
}
