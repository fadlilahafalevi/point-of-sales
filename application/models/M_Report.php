<?php
class M_Report extends CI_Model{
	public function getStockBarang(){
		$this->db->select('kategori_id, kategori_nama, barang_nama, barang_stok');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_barang', 'tbl_barang.barang_kategori_id = tbl_kategori.kategori_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_jual_perhari($tanggal){
		$this->db->select("jual_nofak, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, d_jual_total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where('DATE(tbl_jual.jual_tanggal)', $tanggal);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_total_jual_pertanggal($tanggal){
		$this->db->select("jual_nofak, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, SUM(d_jual_total) as total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where('DATE(tbl_jual.jual_tanggal)', $tanggal);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_bulan_jual(){
		$this->db->select("DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan");
		$this->db->from('tbl_jual');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_tahun_jual(){
		$this->db->select("DISTINCT YEAR(jual_tanggal) AS tahun");
		$this->db->from('tbl_jual');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_jual_perbulan($bulan){
		$this->db->select("jual_nofak, DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, d_jual_total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where("DATE_FORMAT(tbl_jual.jual_tanggal,'%M %Y') = ", $bulan);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_total_jual_perbulan($bulan){
		$this->db->select("jual_nofak, DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, SUM(d_jual_total) as total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where("DATE_FORMAT(tbl_jual.jual_tanggal,'%M %Y') = ", $bulan);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_jual_pertahun($tahun){
		$this->db->select("jual_nofak, YEAR(jual_tanggal) AS tahun, DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, d_jual_total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where("YEAR(jual_tanggal)", $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	function get_total_jual_pertahun($tahun){
		$this->db->select("jual_nofak, YEAR(jual_tanggal) AS tahun, DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal, d_jual_barang_id, d_jual_barang_nama, d_jual_barang_satuan, d_jual_barang_harpok, d_jual_barang_harjul, d_jual_qty, d_jual_diskon, SUM(d_jual_total) as total");
		$this->db->from('tbl_jual');
		$this->db->join('tbl_detail_jual', 'tbl_jual.jual_nofak = tbl_detail_jual.d_jual_nofak');
		$this->db->where("YEAR(jual_tanggal)", $tahun);
		$query = $this->db->get();
		return $query->result();
	}
}