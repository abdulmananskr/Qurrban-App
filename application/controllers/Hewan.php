<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    function index()
    {

        $data['title'] = 'Hewan Qurban';         
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();                  
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        $data['kategori_hewan'] = $this->ModelHewan->getKategori()->result_array();
        
        $this->form_validation->set_rules('jenis', ' Jenis Hewan', 'required', [
            'required' => 'Jenis Hewan harus diisi'                     
        ]);         
        $this->form_validation->set_rules('id_kategori', ' Kategori', 'required', [
            'required' => 'Kategori harus diisi'                     
        ]); 
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [             
            'required' => 'Harga harus diisi',
            'numeric' => 'form input Harga type tidak valid'       
        ]);         
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [             
            'required' => 'stok harus diisi',  
            'numeric' => 'form input Stok type tidak valid'      
        ]);                 

        if ($this->form_validation->run() == false) {             
            $this->load->view('templates/header', $data);             
            $this->load->view('templates/sidebar', $data);             
            $this->load->view('templates/topbar', $data);             
            $this->load->view('hewan/index', $data);             
            $this->load->view('templates/footer');         
        } else {              
            $data = [                 
                'jenis' => $this->input->post('jenis', true),                 
                'id_kategori' => $this->input->post('id_kategori', true),                 
                'harga' => $this->input->post('harga', true),                                  
                'stok' => $this->input->post('stok', true),                
                'image' => 'img-default.jpg'             
            ]; 

            $this->ModelHewan->simpanHewan($data); 
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            berhasiil menambahkan hewan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');      
            redirect('hewan');         
        }  
    }
    public function detailHewan()     
    {         
        $id = $this->uri->segment(3);         
        $hewan = $this->ModelHewan->joinKategoriHewan(['hewan_qurban.id_hewan' => $id])->result(); 
        
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();;         
        $data['title'] = "Detail hewan"; 
        
        foreach ($hewan as $fields) {             
            $data['id_hewan'] = $fields->id_hewan;             
            $data['jenis'] = $fields->jenis;             
            $data['id_kategori'] = $fields->id_kategori;                          
            $data['harga'] = $fields->harga;             
            $data['stok'] = $fields->stok;             
            $data['image'] = $fields->image;                      
        }         
            $this->load->view('templates/header', $data);             
            $this->load->view('templates/sidebar', $data);             
            $this->load->view('templates/topbar', $data);             
            $this->load->view('hewan/detail-hewan', $data);             
            $this->load->view('templates/footer');     
    }   
    public function editHewan()
    {
        $data['title'] = 'Ubah Data Hewan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['hewan_qurban'] = $this->ModelHewan->hewanWhere(['id_hewan' => $this->uri->segment(3)])->result_array();
        
        $this->form_validation->set_rules('jenis', 'Judul Buku', 'required|min_length[3]', [
            'required' => 'Judul Buku harus diisi',
            'min_length' => 'Judul buku terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Nama pengarang harus diisi',
        ]);
        $this->form_validation->set_rules('harga', 'Nama harga', 'required', [
            'required' => 'Nama harga harus diisi'
        ]);
        $this->form_validation->set_rules('stok', 'Nama stok', 'required', [
            'required' => 'Nama stok harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hewan/edit_hewan', $data);
            $this->load->view('templates/footer');
        } else {
            $id_hewan = $this->input->post('id_hewan', true);
            $jenis = $this->input->post('jenis', true);             
            $id_kategori = $this->input->post('id_kategori', true); 
            $harga = $this->input->post('harga', true); 
            $stok = $this->input->post('stok', true);  
 
            //jika ada gambar yang akan diupload             
            $upload_image = $_FILES['image']['name']; 
 
            if ($upload_image) 
            {                 
                $config['upload_path'] = './assets/img/hewan/';                 
                $config['allowed_types'] = 'gif|jpg|png|jpeg';                 
                $config['max_size']     = '3000';                 
                $config['max_width'] = '1024';                 
                $config['max_height'] = '1000';                 
                $config['file_name'] = 'pro' . time(); 
 
                $this->load->library('upload', $config); 
 
                if ($this->upload->do_upload('image')) 
                {                     
                    $gambar_lama = $data['hewan_qurban']['image'];                     
                    if ($gambar_lama != 'img-default.jpg') 
                    {                         
                        unlink(FCPATH . 'assets/img/hewan/' . $gambar_lama);                     
                    } 
 
                    $gambar_baru = $this->upload->data('file_name');                     
                    $this->db->set('image', $gambar_baru);                 
                } else {
                    echo $this->upload->display_errors();
                }             
            } 
            $this->db->set('jenis', $jenis);             
            $this->db->set('id_kategori', $id_kategori);             
            $this->db->set('harga', $harga);             
            $this->db->set('stok', $stok);                          
            $this->db->where('id_hewan', $id_hewan);             
            $this->db->update('hewan_qurban'); 
 
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            Data hewan berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');   
            redirect('hewan');         
        }     

    }
    
    public function hapusHewan()     
    {         
        $where = ['id_hewan' => $this->uri->segment(3)];         
        $this->ModelHewan->hapusHewan($where);         
        redirect('hewan');     
    }

}