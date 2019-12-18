<?php
class Controller_Retur extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		// $this->load->model('m_kategori');
		$this->load->model('M_Barang');
		$this->load->model('M_Retur');
		// $this->load->model('m_suplier');
		// $this->load->model('m_penjualan');
	}

	public function index(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$data['data'] 	= $this->M_Barang->getAllBarang();
			$data['retur'] 	= $this->M_Retur->getAllRetur();
			$this->load->view('admin/retur_list',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function getBarangDetailByCode(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$kode_barang 		= $this->input->post('barang_id');
			$data['barang']		= $this->M_Barang->getBarangDetailByCode($kode_barang);
			$this->load->view('admin/retur_detail',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function createRetur(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$barang_id 		= $this->input->post('barang_id');
			$barang_nama 	= $this->input->post('barang_nama');
			$barang_satuan 	= $this->input->post('barang_satuan');
			$barang_harjul 	= str_replace(",", "", $this->input->post('barang_harjul'));
			$barang_jumlah 	= $this->input->post('barang_jumlah');
			$keterangan 	= $this->input->post('keterangan');

			$data_to_insert = array(
				'barang_id' 	=> $barang_id,
				'barang_nama' 	=> $barang_nama,
				'barang_satuan' => $barang_satuan,
				'barang_harjul' => $barang_harjul,
				'barang_jumlah' => $barang_jumlah,
				'keterangan' 	=> $keterangan,
			);

			$this->M_Retur->createRetur($data_to_insert);
			redirect('Controller_Retur');
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}
}