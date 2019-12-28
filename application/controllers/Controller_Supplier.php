<?php
class Controller_Supplier extends CI_Controller{
	function index(){
        $this->load->model('M_Supplier');
        
		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->M_Supplier->getAllSupplier();
			$this->load->view('admin/supplier',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function updateSupplier($supplier_id) {
		$this->load->model("M_Supplier");

		if ($this->session->userdata('akses') == '1') {
			$data['supplier_id'] = $supplier_id;
			if (isset($supplier_id)) {
				$data['data'] = $this->M_Supplier->getSupplierByID($supplier_id);
			}

			$this->load->view('admin/supplier_update', $data);
		}
	}

	public function updateSupplierCommit() {
		$this->load->model('M_Supplier');

		$supplier_id 			= $this->input->post('supplier_id');
		$supplier_nama 			= $this->input->post('supplier_nama');
		$supplier_alamat 		= $this->input->post('supplier_alamat');
		$supplier_notelp 		= $this->input->post('supplier_notelp');

    	$data = array(
            "supplier_id"			=> $supplier_id,
            "supplier_nama"			=> $supplier_nama,
            "supplier_alamat"		=> $supplier_alamat,
            "supplier_notelp"		=> $supplier_notelp
        );

    	$this->M_Supplier->updateSupplier($data);

		redirect('Controller_Supplier');
	}

	public function createSupplier() {
		$this->load->model("M_Supplier");

		if ($this->session->userdata('akses') == '1') {
			$this->load->view('admin/supplier_create');
		}
	}

	public function createSupplierCommit() {
		$this->load->model("M_Supplier");

		if ($this->session->userdata('akses') == '1') {

			$supplier_nama 			= $this->input->post('supplier_nama');
			$supplier_alamat 		= $this->input->post('supplier_alamat');
			$supplier_notelp 		= $this->input->post('supplier_notelp');

			$data = array(
	            "supplier_nama"			=> $supplier_nama,
	            "supplier_alamat"		=> $supplier_alamat,
	            "supplier_notelp"		=> $supplier_notelp
			);
			$this->M_Supplier->input_data($data);
			$data['data'] = $this->M_Supplier->getAllSupplier();
			
			$this->load->view('admin/supplier', $data);
		}
	}
}