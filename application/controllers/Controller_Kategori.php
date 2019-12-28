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

	public function updateKategori($kategori_id) {
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {
			$data['kategori_id'] = $kategori_id;
			if (isset($kategori_id)) {
				$data['data'] = $this->M_Kategori->getKategoriByID($kategori_id);
			}

			$this->load->view('admin/kategori_update', $data);
		}
	}

	public function updateKategoriCommit() {
		$this->load->model('M_Kategori');

		$kategori_id 			= $this->input->post('kategori_id');
		$kategori_nama 			= $this->input->post('kategori_nama');

    	$data = array(
            "kategori_id"			=> $kategori_id,
            "kategori_nama"			=> $kategori_nama
        );

    	$this->M_Kategori->updateKategori($data);

		redirect('Controller_Kategori');
	}

	public function createKategori() {
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {
			$this->load->view('admin/kategori_create');
		}
	}

	public function createKategoriCommit() {
		$this->load->model("M_Kategori");

		if ($this->session->userdata('akses') == '1') {

			$kategori_nama = $this->input->post('kategori_nama');

			$data = array(
				'kategori_nama' => $kategori_nama
			);
			$this->M_Kategori->input_data($data);
			$data['data'] = $this->M_Kategori->getAllKategori();
			
			$this->load->view('admin/kategori', $data);
		}
	}
}