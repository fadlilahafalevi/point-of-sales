<?php

class Controller_Barang extends CI_Controller{
	function index(){
        $this->load->model('M_Barang');

		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->M_Barang->getAllBarang();
			// $data['kat']=$this->m_kategori->tampil_kategori();
			// $data['kat2']=$this->m_kategori->tampil_kategori();
			$this->load->view('admin/barang', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function getBarang($id = '') {
		$this->load->model("M_Barang");

		if ($this->session->userdata('akses') == '1') {
			$data['id'] = $id;
			if (isset($id)) {
				$data['data'] = $this->M_Barang->getBarang($id);
			}

			$this->load->view('admin/view_barang', $data);
		}
	}
}
?>