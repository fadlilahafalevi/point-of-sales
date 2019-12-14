<?php
class M_Barang extends CI_Model {

	// function hapus_barang($kode){
	// 	$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
	// 	return $hsl;
	// }

	function updateBarang($val){
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

	// function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
	// 	$user_id=$this->session->userdata('idadmin');
	// 	$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
	// 	return $hsl;
	// }

	function input_data($data) {
		$this->db->insert('tbl_barang', $data);
	}

	function getBarangDetailByID($id) {
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

	// function get_kobar(){
	// 	$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
	//        $kd = "";
	//        if($q->num_rows()>0){
	//            foreach($q->result() as $k){
	//                $tmp = ((int)$k->kd_max)+1;
	//                $kd = sprintf("%06s", $tmp);
	//            }
	//        }else{
	//            $kd = "000001";
	//        }
	//        return "BR".$kd;
	// }

}