<?php 

class Controller_Barang extends CI_Controller{
	function index(){
        $this->load->model('M_Barang');

		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->M_Barang->getAllBarang();
			// $data['kat']=$this->m_kategori->tampil_kategori();
			// $data['kat2']=$this->m_kategori->tampil_kategori();
			$this->load->view('admin/barang',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}
}
?>