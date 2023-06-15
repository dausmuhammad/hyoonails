<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_lap_keuangan extends CI_Controller {
    
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
        $data['js'] = ['lap_keuangan'];
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('page/v_laporan_keuangan');
        $this->load->view('footer',$data);
	}

	public function insertUangMasuk(){
		$now = date('Y-m-d H:i:s');
		$param = array(
			"uang_masuk " => $this->input->post("uang_masuk"),
			"tgl_uang_masuk" =>  $this->input->post("tanggal_uang_masuk"),
			"uang_keluar" =>   $this->input->post("uang_keluar"),
			"tgl_uang_keluar" => $this->input->post("tanggal_uang_keluar"),
			"keterangan" => $this->input->post("keterangan")
		);
		$data = $this->models->insertUangMasuk($param);
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

	public function getLapKeuangan(){
		$data = $this->models->getLapKeuangan();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function cetakLaporanKeuangan(){
		// var_dump($this->input->post("orderDataHeader"));
		// var_dump($this->input->post("orderDataDetail"));
		// exit();
		$this->load->library('pdf_generator');
		$this->data['title_pdf'] = 'Laporan Keuangan';
        $this->data['data'] =  array(
			"uang_masuk" => $this->input->post("uang_masuk"),
			"tanggal_uang_masuk" => $this->input->post("tanggal_uang_masuk"),
			"uang_keluar" => $this->input->post("uang_keluar"),
			"tanggal_uang_keluar" => $this->input->post("tanggal_uang_keluar"),
			"keterangan" => $this->input->post("keterangan"),
			"total" => $this->input->post("total"),
		);
		
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Keuangan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('page/v_lap_keuangan_pdf',$this->data, true);	    
        
        // run dompdf
        $this->pdf_generator->generate($html,$file_pdf,$paper,$orientation);
	}
}
