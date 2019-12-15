<?php
class Controller_Penjualan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('M_Barang');
		$this->load->model('M_Penjualan');
	}

	public function index(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$data['data']=$this->M_Barang->getAllBarang();
			$this->load->view('admin/penjualan_list',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function getBarangDetailByCode(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$kode_barang 		= $this->input->post('barang_id');
			$data['barang']		= $this->M_Barang->getBarangDetailByCode($kode_barang);
			$this->load->view('admin/penjualan_detail',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function add_to_cart(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$kode_barang	= $this->input->post('barang_id');
			$produk			= $this->M_Barang->getBarangDetailByCode($kode_barang);
			//$i 				= $produk->row_array();
			$data = array(
	               'id'       => $produk['barang_id'],
	               'name'     => $produk['barang_nama'],
	               'satuan'   => $produk['barang_satuan'],
	               'harpok'   => $produk['barang_harpok'],
	               'price'    => str_replace(",", "", $this->input->post('barang_harjul'))-$this->input->post('barang_diskon'),
	               'disc'     => $this->input->post('barang_diskon'),
	               'qty'      => $this->input->post('barang_jumlah'),
	               'amount'	  => str_replace(",", "", $this->input->post('barang_harjul'))
	            );

			if(!empty($this->cart->total_items())){
				foreach ($this->cart->contents() as $items){
					$id 			= $items['id'];
					$qty_old		= $items['qty'];
					$rowid			= $items['rowid'];
					$kobar 			= $this->input->post('kode_brg');
					$qty_new		= $this->input->post('qty');
					if($id == $kobar){
						$up = array(
								'rowid' => $rowid,
								'qty'	=> $qty_old + $qty_new
								);
						$this->cart->update($up);
					}else{
						$this->cart->insert($data);
					}
				}
			}else{
				$this->cart->insert($data);
			}
			redirect('Controller_Penjualan');
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function remove(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$row_id = $this->uri->segment(3);
			$this->cart->update(array(
	               'rowid'      => $row_id,
	               'qty'     => 0
	            ));
			redirect('Controller_Penjualan');
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function insertTransaction(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$total 			= $this->input->post('total_belanja_hide');
			$bayar_tunai 	= str_replace(",", "", $this->input->post('bayar_tunai'));
			$kembalian		= $bayar_tunai - $total;

			if(!empty($total) && !empty($bayar_tunai)){
				if($bayar_tunai < $total){
					echo $this->session->set_flashdata('msg','<label style="color: red;"><b>Jumlah uang yang anda masukan kurang.</b></label>');
					redirect('Controller_Penjualan');
				}else{
					$no_faktur 		= $this->M_Penjualan->getNoFaktur();

					$this->session->set_userdata('nofak',$no_faktur);

			    	$data_jual = array(
			            "jual_nofak" 			 => $no_faktur,
			            "jual_total" 			 => $total,
			            "jual_jml_uang" 	 	 => $bayar_tunai,
			            "jual_kembalian"		 => $kembalian
			        );
					$order_proses 	= $this->M_Penjualan->insertTransaction($data_jual);

					if($order_proses){
						$this->cart->destroy();
						
						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('suplier');
						$this->load->view('admin/penjualan_success');	
					}else{
						redirect('Controller_Penjualan');
					}
				}
				
			}else{
				echo $this->session->set_flashdata('msg','<label style="color: red;"><b>Penjualan gagal disimpan, mohon periksa kembali semua inputan Anda!</b></label>');
				redirect('Controller_Penjualan');
			}
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	public function print_invoice(){
		$data['data'] = $this->M_Penjualan->print_invoice();
		$this->load->view('admin/report/report_invoice',$data);
	}
}