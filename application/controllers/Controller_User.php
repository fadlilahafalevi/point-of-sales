<?php
class Controller_User extends CI_Controller{
	function index(){
        $this->load->model('M_User');
        
		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->M_User->getAllUser();
			$this->load->view('admin/user',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}
}