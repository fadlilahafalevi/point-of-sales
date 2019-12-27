<?php
class M_grafik extends CI_Model{
	function statistik_stok(){
        $query = $this->db->query("SELECT kategori_nama,SUM(barang_stok) AS tot_stok FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id GROUP BY kategori_nama");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan(){
        $query = $this->db->query("SELECT sum(jual_total) as total, year(jual_tanggal) as tahun FROM tbl_jual GROUP BY year(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan_pertahun($tahun){
        $query = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M') AS bulan,SUM(jual_total) total FROM tbl_jual WHERE YEAR(jual_tanggal)='$tahun' GROUP BY MONTH(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}