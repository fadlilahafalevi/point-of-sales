<?php

class Controller_Report extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('M_Report');
    }

	public function index(){
		if ($this->session->userdata('akses') == '1') {			
			$data['jual_bln']=$this->M_Report->get_bulan_jual();
			$data['jual_thn']=$this->M_Report->get_tahun_jual();
			$this->load->view('admin/report_list', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function reportStockBarang(){
		$this->load->library('pdf');

        $pdf = new FPDF('l','mm','A5');

        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN STOK BARANG',0,1,'C');
        $pdf->SetFont('Arial','B',12);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(70,6,'NAMA BARANG',1,0);
        $pdf->Cell(85,6,'KATEGORI',1,0);
        $pdf->Cell(30,6,'STOCK',1,1);
        $pdf->SetFont('Arial','',10);

        //add some data
		$stocks   = $this->M_Report->getStockBarang();
        foreach ($stocks as $row){
            $pdf->Cell(70,6,$row->barang_nama,1,0);
            $pdf->Cell(85,6,$row->kategori_nama,1,0);
            $pdf->Cell(30,6,$row->barang_stok,1,1);
        }
        $pdf->Output();
	}

	public function reportPenjualan_perHari(){
		$this->load->library('pdf');
		$tanggal 	= $this->input->post('tgl');

        $pdf = new FPDF('l','mm','A5');

        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN PENJUALAN BARANG',0,1,'C');
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(190,7,'Tanggal : ' . $tanggal,0,1,'C');
        $pdf->SetFont('Arial','B',8);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(21,6,'NO FAKTUR',1,0);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->Cell(25,6,'KODE BARANG',1,0);
        $pdf->Cell(40,6,'NAMA BARANG',1,0);
        $pdf->Cell(15,6,'SATUAN',1,0);
        $pdf->Cell(20,6,'HARGA JUAL',1,0);
        $pdf->Cell(10,6,'QTY',1,0);
        $pdf->Cell(15,6,'DISKON',1,0);
        $pdf->Cell(20,6,'SUBTOTAL',1,1);
        $pdf->SetFont('Arial','',8);

        //add some data
		$data_jual   = $this->M_Report->get_data_jual_perhari($tanggal);
        foreach ($data_jual as $row){
            $pdf->Cell(21,6,$row->jual_nofak,1,0);
            $pdf->Cell(30,6,$row->jual_tanggal,1,0);
            $pdf->Cell(25,6,$row->d_jual_barang_id,1,0);
            $pdf->Cell(40,6,$row->d_jual_barang_nama,1,0);
            $pdf->Cell(15,6,$row->d_jual_barang_satuan,1,0);
	        $pdf->Cell(20,6,$row->d_jual_barang_harjul,1,0);
	        $pdf->Cell(10,6,$row->d_jual_qty,1,0);
	        $pdf->Cell(15,6,$row->d_jual_diskon,1,0);
	        $pdf->Cell(20,6,$row->d_jual_total,1,1);
        }

        $total_jual = $this->M_Report->get_data_total_jual_pertanggal($tanggal);
        foreach ($total_jual as $row){
        	$pdf->SetFont('Arial','B',8);
            $pdf->Cell(21);
            $pdf->Cell(30);
            $pdf->Cell(25);
            $pdf->Cell(40);
            $pdf->Cell(15);
	        $pdf->Cell(20);
	        $pdf->Cell(10);
	        $pdf->Cell(15,6,'TOTAL',1,0);
        	$pdf->Cell(20,6,$row->total,1,1);
        }
        $pdf->Output();
	}

	public function reportPenjualan_perBulan(){
		$this->load->library('pdf');
		$bulan 	= $this->input->post('bln');

        $pdf = new FPDF('l','mm','A5');

        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN PENJUALAN BARANG',0,1,'C');
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(190,7,'Bulan : ' . $bulan,0,1,'C');
        $pdf->SetFont('Arial','B',8);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(21,6,'NO FAKTUR',1,0);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->Cell(25,6,'KODE BARANG',1,0);
        $pdf->Cell(40,6,'NAMA BARANG',1,0);
        $pdf->Cell(15,6,'SATUAN',1,0);
        $pdf->Cell(20,6,'HARGA JUAL',1,0);
        $pdf->Cell(10,6,'QTY',1,0);
        $pdf->Cell(15,6,'DISKON',1,0);
        $pdf->Cell(20,6,'SUBTOTAL',1,1);
        $pdf->SetFont('Arial','',8);

        //add some data
		$data_jual   = $this->M_Report->get_jual_perbulan($bulan);
        foreach ($data_jual as $row){
            $pdf->Cell(21,6,$row->jual_nofak,1,0);
            $pdf->Cell(30,6,$row->jual_tanggal,1,0);
            $pdf->Cell(25,6,$row->d_jual_barang_id,1,0);
            $pdf->Cell(40,6,$row->d_jual_barang_nama,1,0);
            $pdf->Cell(15,6,$row->d_jual_barang_satuan,1,0);
	        $pdf->Cell(20,6,$row->d_jual_barang_harjul,1,0);
	        $pdf->Cell(10,6,$row->d_jual_qty,1,0);
	        $pdf->Cell(15,6,$row->d_jual_diskon,1,0);
	        $pdf->Cell(20,6,$row->d_jual_total,1,1);
        }
        
        $total_jual = $this->M_Report->get_total_jual_perbulan($bulan);
        foreach ($total_jual as $row){
        	$pdf->SetFont('Arial','B',8);
            $pdf->Cell(21);
            $pdf->Cell(30);
            $pdf->Cell(25);
            $pdf->Cell(40);
            $pdf->Cell(15);
	        $pdf->Cell(20);
	        $pdf->Cell(10);
	        $pdf->Cell(15,6,'TOTAL',1,0);
        	$pdf->Cell(20,6,$row->total,1,1);
        }
        $pdf->Output();
	}

	public function reportPenjualan_perTahun(){
		$this->load->library('pdf');
		$tahun 	= $this->input->post('thn');

        $pdf = new FPDF('l','mm','A5');

        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN PENJUALAN BARANG',0,1,'C');
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(190,7,'Tahun : ' . $tahun,0,1,'C');
        $pdf->SetFont('Arial','B',8);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(21,6,'NO FAKTUR',1,0);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->Cell(25,6,'KODE BARANG',1,0);
        $pdf->Cell(40,6,'NAMA BARANG',1,0);
        $pdf->Cell(15,6,'SATUAN',1,0);
        $pdf->Cell(20,6,'HARGA JUAL',1,0);
        $pdf->Cell(10,6,'QTY',1,0);
        $pdf->Cell(15,6,'DISKON',1,0);
        $pdf->Cell(20,6,'SUBTOTAL',1,1);
        $pdf->SetFont('Arial','',8);

        //add some data
		$data_jual   = $this->M_Report->get_jual_pertahun($tahun);
        foreach ($data_jual as $row){
            $pdf->Cell(21,6,$row->jual_nofak,1,0);
            $pdf->Cell(30,6,$row->jual_tanggal,1,0);
            $pdf->Cell(25,6,$row->d_jual_barang_id,1,0);
            $pdf->Cell(40,6,$row->d_jual_barang_nama,1,0);
            $pdf->Cell(15,6,$row->d_jual_barang_satuan,1,0);
	        $pdf->Cell(20,6,$row->d_jual_barang_harjul,1,0);
	        $pdf->Cell(10,6,$row->d_jual_qty,1,0);
	        $pdf->Cell(15,6,$row->d_jual_diskon,1,0);
	        $pdf->Cell(20,6,$row->d_jual_total,1,1);
        }
        
        $total_jual = $this->M_Report->get_total_jual_pertahun($tahun);
        foreach ($total_jual as $row){
        	$pdf->SetFont('Arial','B',8);
            $pdf->Cell(21);
            $pdf->Cell(30);
            $pdf->Cell(25);
            $pdf->Cell(40);
            $pdf->Cell(15);
	        $pdf->Cell(20);
	        $pdf->Cell(10);
	        $pdf->Cell(15,6,'TOTAL',1,0);
        	$pdf->Cell(20,6,$row->total,1,1);
        }
        $pdf->Output();
	}
}
?>