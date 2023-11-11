<?php defined('BASEPATH') or exit('No direct script access allowed'); 
 
class Admin extends CI_Controller { 

    public function __construct()     
    {         
        parent::__construct();
        cek_login();
        $this->load->model('Mtransaksi');
    }         
 
    public function index() 
    {         
        $data['title'] = 'Dashboard';         
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();  
        $data['tabungan'] = $this->ModelTabungan->tampil()->num_rows();  
        $data['sum'] = $this->ModelTabungan->totalsaldo();  
        $data['sumhewan'] = $this->ModelHewan->getsumhewan();  
        $data['transaksi'] = $this->Mtransaksi->alltransaksi();  
        
        
        $this->load->view('templates/header', $data);         
        $this->load->view('templates/sidebar', $data);         
        $this->load->view('templates/topbar', $data);         
        $this->load->view('admin/index', $data);         
        $this->load->view('templates/footer');     
    } 
}