<?php
class M_Kategori extends CI_Model{

	// function hapus_kategori($kode){
	// 	$hsl=$this->db->query("DELETE FROM tbl_kategori where kategori_id='$kode'");
	// 	return $hsl;
	// }

	// function update_kategori($kode,$kat){
	// 	$hsl=$this->db->query("UPDATE tbl_kategori set kategori_nama='$kat' where kategori_id='$kode'");
	// 	return $hsl;
	// }

	function getAllKategori(){
		$query = $this->db->get('tbl_kategori');
		return $query->result();
	}

	// function simpan_kategori($kat){
	// 	$hsl=$this->db->query("INSERT INTO tbl_kategori(kategori_nama) VALUES ('$kat')");
	// 	return $hsl;
	// }

}