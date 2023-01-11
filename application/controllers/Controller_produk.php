<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_produk extends CI_Controller {
    
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
        $data['js'] = ['produk'];
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('page/v_produk');
        $this->load->view('footer',$data);
	}

	public function getKodeProduk()
	{	
		// var_dump("masuk");
		// exit();
		$data = $this->models->getKodeProduk();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function getWarna()
	{	
		// var_dump("masuk");
		// exit();
		$data = $this->models->getWarna();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function insertProduk(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"kode_produk " => $this->input->post("kode_produk"),
			"nama_produk" =>  $this->input->post("nama_produk"),
			"kode_warna" =>   $this->input->post("kode_warna"),
			"ukuran" => (int) $this->input->post("ukuran"),
			"harga_satuan " => (Double) $this->input->post("harga_satuan"),
			"quantity" => (int)  $this->input->post("quantity"),
			"insert_by" =>  $_SESSION['username'],
			"insert_date" => $now
		);
		$data = $this->models->insertProduk($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function getAllProduk(){
		$data = $this->models->getAllProduk();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function updateProduk(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"kode_produk " => $this->input->post("kode_produk"),
			"nama_produk" =>  $this->input->post("nama_produk"),
			"kode_warna" =>   $this->input->post("kode_warna"),
			"ukuran" => (int) $this->input->post("ukuran"),
			"harga_satuan " => (Double) $this->input->post("harga_satuan"),
			"quantity" => (int)  $this->input->post("quantity"),
			"update_by" =>  $_SESSION['username'],
			"update_date" =>  $now,
		);
		
		$data = $this->models->updateProduk($param);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	public function hapusProduk(){
		$data = $this->models->hapusProduk($this->input->post('kode_produk'));
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
}
