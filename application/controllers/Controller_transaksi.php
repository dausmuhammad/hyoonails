<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_transaksi extends CI_Controller {
    
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
        $data['js'] = ['transaksi'];
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('page/v_transaksi');
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

	public function insertOrder()
	{	
		$orderDataHeader = $this->input->post("orderDataHeader");
		$orderDataDetail = $this->input->post("orderDataDetail");
		
		
		$now = date('Y-m-d H:i:s');
		$paramOrderDataHeader = array(
			"order_no" =>  $orderDataHeader[0]['order_no'],
			"order_date" => $now,
			"total_price" =>  (Double) $orderDataHeader[0]['total_price'],
			"uang_bayar" =>  (Double) $orderDataHeader[0]['uang_bayar'],
			"insert_by" => $_SESSION['username'],
			"insert_date" =>$now
		);

		for($i = 0 ; $i < count($orderDataDetail);$i++){
			$paramOrderDataDetail[$i] = array(
				"order_no" =>  $orderDataDetail[$i]['order_no'],
				"kode_produk" =>   $orderDataDetail[$i]['kode_produk'],
				"jumlah_beli" => (int) $orderDataDetail[$i]['jumlah_beli'],
				"total_price" =>  (Double) $orderDataDetail[$i]['total_price'],
				"insert_by" => $_SESSION['username'],
				"insert_date" =>$now
			);
		}

		$data = $this->models->insertOrder($paramOrderDataHeader,$paramOrderDataDetail);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function getNoOrder()
	{	
		// var_dump("masuk");
		// exit();
		$data = $this->models->getNoOrder();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}

	public function cetakInvoice(){
		// var_dump($this->input->post("orderDataHeader"));
		// var_dump($this->input->post("orderDataDetail"));
		// exit();
		$this->load->library('pdf_generator');
		$this->data['title_pdf'] = 'Invoice';
        $this->data['orderDataHeader'] = $this->input->post("orderDataHeader");
		$this->data['orderDataDetail'] = $this->input->post("orderDataDetail");
		
        // filename dari pdf ketika didownload
        $file_pdf = 'Invoice '.$this->data['orderDataHeader'][0]['order_no'];
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('page/v_invoice',$this->data, true);	    
        
        // run dompdf
        $this->pdf_generator->generate($html,$file_pdf,$paper,$orientation);
	}

	public function getHistory()
	{	
		$order_date = $this->input->post("order_date");
		$data = $this->models->getHistory($order_date);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
	public function getHistoryDetail()
	{	
		$order_no = $this->input->post("order_no");
		$data = $this->models->getHistoryDetail($order_no);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}
}
