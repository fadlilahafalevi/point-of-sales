<?php
class M_Barang extends CI_Model {
	public function updateBarang($val){
        $this->load->model('M_Barang');

		$data_to_update = array(
            "barang_nama" 			 => $val['barang_nama'],
            "barang_kategori_id" 	 => $val['barang_kategori_id'],
            "barang_satuan"			 => $val['barang_satuan'],
            "barang_harpok" 		 => $val['barang_harpok'],
            "barang_stok" 			 => $val['barang_stok'],
            "barang_min_stok" 		 => $val['barang_min_stok'],
            "barang_tgl_last_update" => "NOW()"
        );

		$this->db->where('barang_id', $val["barang_id"]);
        return $this->db->update('tbl_barang', $data_to_update);
	}

	public function getAllBarang() {
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_barang.barang_kategori_id = tbl_kategori.kategori_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function input_data($data) {
		$this->db->insert('tbl_barang', $data);
	}

	public function getBarangDetailByID($id) {
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_barang.barang_kategori_id = tbl_kategori.kategori_id');
		$this->db->where('tbl_barang.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getBarangDetailByCode($kode_barang) {
        $query = $this->db->get_where('tbl_barang', array("barang_id"=>$kode_barang));
        if($tmp = $query->result_array())
            return $tmp[0];
	}
}