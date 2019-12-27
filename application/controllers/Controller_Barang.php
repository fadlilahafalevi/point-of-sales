<?php

class Controller_Barang extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
    }

	public function index(){
        $this->load->model('M_Barang');

		if ($this->session->userdata('akses') == '1') {
			$data['data'] = $this->M_Barang->getAllBarang();
			$this->load->view('admin/barang', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function getBarangDetailByID($id = '') {
		$this->load->model("M_Barang");
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {
			$data['id'] = $id;
			if (isset($id)) {
				$data['data'] = $this->M_Barang->getBarangDetailByID($id);
				$data['kategori'] = $this->M_Kategori->getAllKategori();
			}

			$this->load->view('admin/barang_detail', $data);
		}
	}

	public function updateBarangForm($id = '') {
		$this->load->model("M_Barang");
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {
			$data['id'] = $id;
			if (isset($id)) {
				$data['data'] = $this->M_Barang->getBarangDetailByID($id);
				$data['kategori'] = $this->M_Kategori->getAllKategori();
			}

			$this->load->view('admin/barang_update', $data);
		}
	}

	public function updateBarangCommit() {
		$this->load->model('M_Barang');

		$barang_id 				= $this->input->post('barang_id');
		$barang_nama 			= $this->input->post('barang_nama');
		$barang_kategori_id 	= $this->input->post('barang_kategori_id');
		$barang_satuan 			= $this->input->post('barang_satuan');
		$barang_harpok 			= $this->input->post('barang_harpok');
		$barang_stok 			= $this->input->post('barang_stok');
		$barang_min_stok 		= $this->input->post('barang_min_stok');

    	$data = array(
            "barang_id" 			 => $barang_id,
            "barang_nama" 			 => $barang_nama,
            "barang_kategori_id" 	 => $barang_kategori_id,
            "barang_satuan"			 => $barang_satuan,
            "barang_harpok" 		 => $barang_harpok,
            "barang_stok" 			 => $barang_stok,
            "barang_min_stok" 		 => $barang_min_stok
        );

    	$this->M_Barang->updateBarang($data);

		redirect('Controller_Barang');
	}

	public function createBarang() {
		$this->load->model("M_Barang");
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {

			$data['kategori'] = $this->M_Kategori->getAllKategori();
			$this->load->view('admin/barang_create', $data);
		}
	}

	public function createBarangCommit() {
		$this->load->model("M_Barang");

		if ($this->session->userdata('akses') == '1') {

			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('barang_kategori_id');
			$satuan = $this->input->post('satuan');
			$hargaPokok = $this->input->post('hargaPokok');
			$hargaJual = $this->input->post('hargaJual');
			$stock = $this->input->post('stock');
			$minimalStock = $this->input->post('minimalStock');

			$data = array(
				'barang_id' => $kode,
				'barang_nama' => $nama,
				'barang_kategori_id' => $kategori,
				'barang_satuan' => $satuan,
				'barang_harpok' => $hargaPokok,
				'barang_harjul' => $hargaJual,
				'barang_stok' => $stock,
				'barang_min_stok' => $minimalStock,
			);
			$this->M_Barang->input_data($data);
			$data['data'] = $this->M_Barang->getAllBarang();
			
			$this->load->view('admin/barang', $data);
		}
	}
}
?>