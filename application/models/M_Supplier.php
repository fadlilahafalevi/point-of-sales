<?php
class M_Supplier extends CI_Model{
	// public function hapus_suplier($kode){
	// 	$hsl=$this->db->query("DELETE FROM tbl_suplier where suplier_id='$kode'");
	// 	return $hsl;
	// }

	// public function update_suplier($kode,$nama,$alamat,$notelp){
	// 	$hsl=$this->db->query("UPDATE tbl_suplier set suplier_nama='$nama',suplier_alamat='$alamat',suplier_notelp='$notelp' where suplier_id='$kode'");
	// 	return $hsl;
	// }

	public function getAllSupplier(){
		// $hsl=$this->db->query("select * from tbl_suplier order by suplier_id desc");

		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$query = $this->db->get();
		return $query->result();

		// return $hsl;
	}

	public function getSupplierByID($supplier_id) {
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$this->db->where('supplier_id', $supplier_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateSupplier($val){
        $this->load->model('M_Supplier');

		$data_to_update = array(
            "supplier_id"			=> $val['supplier_id'],
            "supplier_nama"			=> $val['supplier_nama'],
            "supplier_alamat"		=> $val['supplier_alamat'],
            "supplier_notelp"		=> $val['supplier_notelp']
        );

		$this->db->where('supplier_id', $val["supplier_id"]);
        return $this->db->update('tbl_supplier', $data_to_update);
	}

	public function input_data($data) {
		$this->db->insert('tbl_supplier', $data);
	}

	// public function simpan_suplier($nama,$alamat,$notelp){
	// 	$hsl=$this->db->query("INSERT INTO tbl_suplier(suplier_nama,suplier_alamat,suplier_notelp) VALUES ('$nama','$alamat','$notelp')");
	// 	return $hsl;
	// }
}