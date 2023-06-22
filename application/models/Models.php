<?php
class Models extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getKodeProduk()
	{
		$data =  $this->db->query("SELECT MAX(KODE_PRODUK) KODE_PRODUK FROM master_produk");

		$kode_produk = $data->result()[0]->KODE_PRODUK;

		if ($kode_produk == null) {
			$kode_produk = 'PRD0000001';
		} else {
			$urutan = (int) substr($kode_produk, 3, 7);
			// var_dump($urutan);
			// exit();
			$urutan++;
			$huruf = "PRD";
			$kode_produk = $huruf . sprintf("%07s", $urutan);
		}
		return $kode_produk;
	}

	public function getWarna()
	{
		$data =  $this->db->query("SELECT * FROM master_warna");
		return $data->result();;
	}

	public function insertProduk($param)
	{
		return $this->db->insert('master_produk', $param);
	}

	public function getAllProduk()
	{
		return $this->db->query("SELECT a.kode_produk, a.nama_produk, a.kode_warna, b.nama_warna, a.ukuran, a.harga_satuan, a.quantity FROM master_produk a , master_warna b WHERE a.kode_warna = b.kode_warna")->result();
	}

	public function updateProduk($param)
	{
		$now = date('Y-m-d H:i:s');
		$param = array(
			"nama_produk" =>  $this->input->post("nama_produk"),
			"kode_warna" =>   $this->input->post("kode_warna"),
			"ukuran" => (int) $this->input->post("ukuran"),
			"harga_satuan " => (Double) $this->input->post("harga_satuan"),
			"quantity" => (int)  $this->input->post("quantity"),
			"update_by" =>  $_SESSION['username'],
			"update_date" => $now
		);
		$this->db->where('kode_produk',$this->input->post("kode_produk"));
		return $this->db->update('master_produk', $param);;
	}
	public function hapusProduk($param)
	{
		return $this->db->delete('master_produk', array('kode_produk'=>$param));
	}

	public function insertWarna($param)
	{
		return $this->db->insert('master_warna', $param);
	}
	public function insertUangMasuk($param)
	{
		return $this->db->insert('lap_keuangan', $param);
	}
	
	public function updateWarna($param)
	{
		$now = date('Y-m-d H:i:s');
		$param = array(
			"nama_warna" =>  $this->input->post("nama_warna"),
			"update_by" =>  $_SESSION['username'],
			"update_date" => $now
		);
		$this->db->where('kode_warna',$this->input->post("kode_warna"));
		return $this->db->update('master_warna', $param);;
	}
	public function hapusWarna($param)
	{
		return $this->db->delete('master_warna', array('kode_warna'=>$param));
	}

	public function insertOrder($orderDataHeader, $orderDataDetail)
	{
		$now = date('Y-m-d H:i:s');
		$this->db->trans_begin();
		// var_dump($orderDataHeader);
		// var_dump($orderDataDetail);
		// exit();
		$this->db->insert('order_trans_header', $orderDataHeader);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {

			for ($i = 0; $i < count($orderDataDetail); $i++) {
				$this->db->insert('order_trans_detail', $orderDataDetail[$i]);

				$data = $this->db->get_where('master_produk', ["kode_produk" => $orderDataDetail[$i]['kode_produk']])->result();

				$paramUpdateUnit = array(
					"quantity" => (int) $data[0]->quantity - $orderDataDetail[$i]['jumlah_beli'],
					"update_by" =>  $_SESSION['username'],
					"update_date" => $now
				);
				$this->db->where('kode_produk', $orderDataDetail[$i]['kode_produk']);
				$this->db->update('master_produk', $paramUpdateUnit);
			}

			$this->db->trans_commit();
		}
		return $this->db->trans_status();
	}

	public function getNoOrder()
	{
		$data =  $this->db->query("SELECT MAX(ORDER_NO) ORDER_NO FROM order_trans_header");

		$unit_code = $data->result()[0]->ORDER_NO;

		if ($unit_code == null) {
			$unit_code = 'TRS0000001';
		} else {
			$urutan = (int) substr($unit_code, 3, 7);
			// var_dump($urutan);
			// exit();
			$urutan++;
			$huruf = "TRS";
			$unit_code = $huruf . sprintf("%07s", $urutan);
		}
		return $unit_code;
	}

	public function insertUser($param) {
		return $this->db->insert('master_user', $param);
	}

	public function getAllUser() {
		return $this->db->get('master_user')->result();
	}

	public function login($param){
		return $this->db->get_where('master_user', $param)->result();
	}

	public function getLaporanHarian(){
		$data =  $this->db->query("SELECT DAYNAME(a.order_date) AS DAY, DATE_FORMAT(a.order_date,'%d-%b-%Y') order_date, SUM(a.total_price) total_penjualan FROM order_trans_header a 
		WHERE DATE_FORMAT(a.order_date,'%Y-%m-%d') >= SYSDATE() - INTERVAL 7 DAY GROUP BY DAY ORDER BY a.order_date ASC");
		return $data->result();
	}

	public function getLaporanBulanan(){
		$data =  $this->db->query("SELECT YEAR(order_date) tahun,MONTH(order_date) bulan,SUM(total_price) total_penjualan
		FROM order_trans_header
		GROUP BY  YEAR(order_date),MONTH(order_date)
		ORDER BY  YEAR(order_date),MONTH(order_date);");
		return $data->result();
	}

	public function getLaporanTahunan(){
		$data =  $this->db->query("SELECT YEAR(order_date) tahun, SUM(total_price) total_penjualan
		FROM order_trans_header
		GROUP BY  YEAR(order_date)
		ORDER BY  YEAR(order_date)");
		return $data->result();
	}

	public function getLapKeuangan(){
		return $this->db->get('lap_keuangan')->result();
	}

	public function getHistory($param){
		$data =  $this->db->query("SELECT a.order_no, a.order_date, a.total_price, a.insert_by FROM order_trans_header a WHERE DATE(a.order_date) = ?", array($param));
		return $data->result();
	}
	public function getHistoryDetail($param){
		$data =  $this->db->query("SELECT a.order_no, a.kode_produk, b.nama_produk, a.jumlah_beli, a.total_price FROM 
		order_trans_detail a, master_produk b WHERE a.kode_produk = b.kode_produk AND a.order_no = ?", array($param));
		return $data->result();
	}
}
