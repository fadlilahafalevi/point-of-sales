<?php
class M_Penjualan extends CI_Model{
	public function insertTransaction($val){
		$idadmin=$this->session->userdata('idadmin');

		$data_jual = array(
            "jual_nofak" 			 => $val['jual_nofak'],
            "jual_total" 	 		 => $val['jual_total'],
            "jual_jml_uang"			 => $val['jual_jml_uang'],
            "jual_kembalian" 		 => $val['jual_kembalian'],
            "jual_user_id" 			 => $idadmin,
            "jual_keterangan" 		 => 'Eceran'
        );
		$this->db->insert('tbl_jual',$data_jual);

		// $this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_user_id,jual_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','$idadmin','eceran')");
		foreach ($this->cart->contents() as $item) {
			$data_to_insert = array(
				'd_jual_nofak' 			=>	$val['jual_nofak'],
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data_to_insert);

			$data_to_update = array(
	            "barang_stok" 			 => $item['qty']
	        );
			$this->db->where('barang_id', $item['id']);
	        $this->db->update('tbl_barang', $data_to_update);
			
			//$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}

	public function getNoFaktur(){
		$q 		= $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kode_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kode	= "";

        if($q->num_rows() > 0){
            foreach($q->result() as $hasil){
                $tmp 	= ((int)$hasil->kode_max) + 1;
                $kode 	= sprintf("%06s", $tmp);
            }
        }else{
            $kode = "000001";
        }
        
        return date('dmy').$kode;
	}