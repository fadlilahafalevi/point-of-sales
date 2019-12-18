<?php
class M_Retur extends CI_Model{
	public function getAllRetur(){
		$this->db->select("retur_id,DATE_FORMAT(retur_tanggal,'%d/%m/%Y') AS retur_tanggal,retur_barang_id,retur_barang_nama,retur_barang_satuan,retur_harjul,retur_qty,(retur_harjul*retur_qty) AS retur_subtotal,retur_keterangan");
		$this->db->from('tbl_retur');
		$query = $this->db->get();
		return $query->result();
	}

	public function createRetur($val){
		$data_retur = array(
            "retur_barang_id" 		=> $val['barang_id'],
            "retur_barang_nama" 	=> $val['barang_nama'],
            "retur_barang_satuan"	=> $val['barang_satuan'],
            "retur_harjul" 			=> $val['barang_harjul'],
            "retur_qty" 		 	=> $val['barang_jumlah'],
            "retur_keterangan"		=> $val['keterangan']
        );
		$this->db->insert('tbl_retur', $data_retur);
		return true;
	}
}