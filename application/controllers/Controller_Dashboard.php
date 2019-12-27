<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('m_grafik');
	}
	
	function index(){
		if($this->session->userdata('akses')=='1'){
			$data['report']=$this->m_grafik->statistik_stok();
			$data['reportPenjualan']=$this->m_grafik->graf_penjualan();
			$this->load->view('admin/dashboard',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}
}
