<?php
class Controller_Kategori extends CI_Controller{
	function index(){
        $this->load->model('M_Kategori');
        
		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->M_Kategori->getAllKategori();
			$this->load->view('admin/kategori',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}
}