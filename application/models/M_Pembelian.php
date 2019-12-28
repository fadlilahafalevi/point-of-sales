<?php
class M_Pembelian extends CI_Model{
	public function insertTransaction($val){
		$idadmin = $this->session->userdata('user_id');

		$data_beli = array(
            "beli_nofak" 			 => $val['beli_nofak'],
            "beli_tanggal" 	 		 => $val['beli_tanggal'],
            "beli_suplier_id"		 => $val['beli_suplier_id'],
            "beli_user_id" 			 => $idadmin,
            "beli_kode" 		 	 => $val['beli_kode']
        );
		$this->db->insert('tbl_beli', $data_beli);

		foreach ($this->cart->contents() as $item) {
			$data_to_insert = array(
				'd_beli_nofak' 		=>	$val['beli_nofak'],
				'd_beli_barang_id'	=>	$item['id'],
				'd_beli_harga'		=>	$item['price'],
				'd_beli_jumlah'		=>	$item['qty'],
				'd_beli_total'		=>	$item['subtotal'],
				'd_beli_kode'		=>	$val['beli_kode']
			);
			$this->db->insert('tbl_detail_beli',$data_to_insert);


			$this->db->query("update tbl_barang set barang_stok = barang_stok+'$item[qty]', barang_tgl_last_update = NOW() where barang_id = '$item[id]'");
		}
		return true;
	}

	public function getKodeBeli(){
		$q 		= $this->db->query("SELECT MAX(RIGHT(beli_kode,6)) AS kode_max FROM tbl_beli WHERE DATE(beli_tanggal)=CURRENT_DATE");
        $kode 	= "";

        if($q->num_rows()>0){
            foreach($q->result() as $hasil){
                $tmp 	= ((int)$hasil->kode_max) + 1;
                $kode 	= sprintf("%06s", $tmp);
            }
        }else{
            $kode = "000001";
        }
        return "BL".date('dmy').$kode;
	}
}