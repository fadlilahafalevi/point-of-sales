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

	public function getKategoriByID($kategori_id) {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('kategori_id', $kategori_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateKategori($val){
        $this->load->model('M_Kategori');

		$data_to_update = array(
            "kategori_id"			=> $val['kategori_id'],
            "kategori_nama"			=> $val['kategori_nama']
        );

		$this->db->where('kategori_id', $val["kategori_id"]);
        return $this->db->update('tbl_kategori', $data_to_update);
	}

	public function input_data($data) {
		$this->db->insert('tbl_kategori', $data);
	}

	// function simpan_kategori($kat){
	// 	$hsl=$this->db->query("INSERT INTO tbl_kategori(kategori_nama) VALUES ('$kat')");
	// 	return $hsl;
	// }

}