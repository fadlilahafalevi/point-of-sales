<?php
class Controller_Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Login');
    }

    function index(){
        $this->load->view('login');
    }

    function cekuser(){
        $username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));
        $u=$username;
        $p=$password;
        $cadmin=$this->Login->cekadmin($u,$p);
        if($cadmin->num_rows() > 0){
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcadmin=$cadmin->row_array();
            
            if($xcadmin['user_level']=='1'){
                $this->session->set_userdata('akses','1');
                $idadmin=$xcadmin['user_id'];
                $user_name=$xcadmin['user_name'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_name);
            } //Admin
            if($xcadmin['user_level']=='2'){
                $this->session->set_userdata('akses','2');
                $idadmin=$xcadmin['user_id'];
                $user_name=$xcadmin['user_name'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_name);
            } //Kasir
        }
        
        if($this->session->userdata('masuk')==true){
            redirect('Controller_Login/berhasillogin');
        }else{
            redirect('Controller_Login/gagallogin');
        }
    }

    function berhasillogin(){
        redirect('Controller_Dashboard');
    }

    function gagallogin(){
        $url=base_url('Controller_Login');
        echo $this->session->set_flashdata('msg','Username Atau Password Salah');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('Controller_Login');
        echo "string " . $url;;
        redirect($url);
    }
}