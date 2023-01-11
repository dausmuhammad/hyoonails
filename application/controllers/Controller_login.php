<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_login extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
		$this->load->model('models');
	}
	
	public function index()
	{
        $data['js'] = [''];
		$this->load->view('page/v_login');
	}

    public function login(){
        $param = array(
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password")
        );
		$data = $this->models->login($param);
        session_start();
        $_SESSION['username'] = $data[0]->username;
        $_SESSION['nama_lengkap'] = $data[0]->nama_lengkap;
        $_SESSION['role'] = $data[0]->role;
        header("Location:" .base_url()."Controller_main");
        exit();
        // var_dump(base_url());
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location:" .base_url());
        exit();
        // var_dump(base_url());
    }
}
