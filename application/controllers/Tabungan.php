<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mtransaksi');
    }
    function index()
    {
        $data['title'] = 'Tabungan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        $data['tabungan'] = $this->ModelTabungan->getTabunganWhere(['id' => $this->uri->segment(3)])->result_array();
        $data['tabungan'] = $this->ModelTabungan->tabungan(); 
         
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('tabungan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tariktunai ()
    {
        $data['title'] = 'Tabungan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        $data['tabungan'] = $this->ModelTabungan->tampil()->result_array();
        $data['transaksi'] = $this-> Mtransaksi->gettransaksi()->result_array();

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registration";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('tabungan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $transkasi = [
                'id_transaksi' => htmlspecialchars($this->input->post('nama', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'kredit_debit' => 'kredit',
                'nominal' => $this->input->post('nominal', true)
            ];
            $this->db-insert('nominal',true);
            redirect('user');
        }


        
    }
    // public function total($field, $where)     
    // {         
    //     $this->db->select_sum($field);         
    //     if(!empty($where) && count($where) > 0)
    //     {             
    //         $this->db->where($where);         
    //     }
    //     $this->db->from('tabungan');         
    //     return $this->db->get()->row($field);     
    // }

    // // public function index(){
    // //     $data['tabungan'] = $this->ModelTransaksi->tampil()->result_array();
        
    // // }

    
    // public function total($field, $where)     
    // {         
    //     $this->db->select_sum($field);         
    //     if(!empty($where) && count($where) > 0)
    //     {             
    //         $this->db->where($where);         
    //     }
    //     $this->db->from('tabungan');         
    //     return $this->db->get()->row($field);     
    // }          
}