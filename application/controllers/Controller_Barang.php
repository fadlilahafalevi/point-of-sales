<?php

class Controller_Barang extends CI_Controller{
	public function index(){
        $this->load->model('M_Barang');

		if ($this->session->userdata('akses') == '1') {
			$data['data'] = $this->M_Barang->getAllBarang();
			// $data['kat']=$this->m_kategori->tampil_kategori();
			// $data['kat2']=$this->m_kategori->tampil_kategori();
			$this->load->view('admin/barang', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function getBarangDetailByID($id = '') {
		$this->load->model("M_Barang");

		if ($this->session->userdata('akses') == '1') {
			$data['id'] = $id;
			if (isset($id)) {
				$data['data'] = $this->M_Barang->getBarangDetailByID($id);
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

    	$data = $this->input->post();
    	$saved = $this->M_Barang->updateBarang($data);

        redirect("Controller_Barang");
	}

	public function createBarang() {
		$this->load->model("M_Barang");

		if ($this->session->userdata('akses') == '1') {

			$this->load->view('admin/create_barang');
		}
	}

	public function save() {
		$this->load->model("M_Barang");

		if ($this->session->userdata('akses') == '1') {

			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$hargaPokok = $this->input->post('hargaPokok');
			$stock = $this->input->post('stock');
			$minimalStock = $this->input->post('minimalStock');

			$data = array(
				'barang_id' => $kode,
				'barang_nama' => $nama,
				'barang_kategori_id' => $kategori,
				'barang_satuan' => $satuan,
				'barang_harpok' => $hargaPokok,
				'barang_stok' => $stock,
				'barang_min_stok' => $minimalStock,
			);
			$this->M_Barang->input_data($data);
			redirect('admin/barang');
		}
	}
}
?>