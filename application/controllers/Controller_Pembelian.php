<?php
class Controller_Pembelian extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		// $this->load->model('m_kategori');
		$this->load->model('M_Barang');
		$this->load->model('M_Supplier');
		$this->load->model('M_Pembelian');
	}

	public function index(){
		if($this->session->userdata('akses') == '1'){
			$data['supplier'] = $this->M_Supplier->getAllSupplier();
			$data['data']=$this->M_Barang->getAllBarang();
			$this->load->view('admin/pembelian_list',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function getBarangDetailByCode(){
		if($this->session->userdata('akses')=='1'){
			$kode_barang 		= $this->input->post('barang_id');
			$data['barang']		= $this->M_Barang->getBarangDetailByCode($kode_barang);
			$this->load->view('admin/pembelian_detail',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function add_to_cart(){
		if($this->session->userdata('akses')=='1'){
			$no_faktur 		= $this->input->post('no_faktur');
			$tgl_faktur		= $this->input->post('tgl_faktur');
			$supplier 		= $this->input->post('supplier');

			$this->session->set_userdata('nofak',$no_faktur);
			$this->session->set_userdata('tglfak',$tgl_faktur);
			$this->session->set_userdata('supplier',$supplier);

			$kode_barang	= $this->input->post('barang_id');
			$produk			= $this->M_Barang->getBarangDetailByCode($kode_barang);
			//$i=$produk->row_array();

			$data = array(
	               'id'       => $produk['barang_id'],
	               'name'     => $produk['barang_nama'],
	               'satuan'   => $produk['barang_satuan'],
	               'price'    => $this->input->post('barang_harpok'),
	               'harga'    => $this->input->post('barang_harjul'),
	               'qty'      => $this->input->post('barang_jumlah')
	            );

			$this->cart->insert($data); 
			redirect('Controller_Pembelian');
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function remove(){
		if($this->session->userdata('akses')=='1'){
			$row_id=$this->uri->segment(3);
			$this->cart->update(array(
	               'rowid'      => $row_id,
	               'qty'     => 0
	            ));
			redirect('Controller_Pembelian');
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function insertTransaction(){
		if($this->session->userdata('akses')=='1'){
			$no_faktur 		= $this->input->post('no_faktur');
			$tgl_faktur		= $this->input->post('tgl_faktur');
			$supplier 		= $this->input->post('supplier');
			
			if(!empty($no_faktur) && !empty($tgl_faktur) && !empty($supplier)){
				$kode_beli 		= $this->M_Pembelian->getKodeBeli();

				$data_beli = array(
			            "beli_nofak" 			 => $no_faktur,
			            "beli_tanggal" 			 => $tgl_faktur,
			            "beli_suplier_id" 	 	 => $supplier,
			            "beli_kode"		 		 => $kode_beli
			        );
				
				$order_proses 	= $this->M_Pembelian->insertTransaction($data_beli);

				if($order_proses){
					$this->cart->destroy();
					$this->session->unset_userdata('nofak');
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('supplier');
					echo $this->session->set_flashdata('msg','<label style="color: green;">Pembelian berhasil disimpan ke database.</label>');
					redirect('Controller_Pembelian');	
				}else{
					redirect('Controller_Pembelian');
				}
			}else{
				echo $this->session->set_flashdata('msg','<label style="color: red;">Pembelian gagal didimpan, mohon periksa kembali semua inputan Anda!</label>');
				redirect('Controller_Pembelian');
			}
		}else{
	        echo "Halaman tidak ditemukan";
	    }	
	}
}