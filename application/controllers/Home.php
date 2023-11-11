<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tabungan'] = $this->ModelTabungan->info();
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        $data['transaksi'] = $this->Mtransaksi->gettransaksi()->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function detailHewan()
    {
        $id_hewan = $this->uri->segment(3);
        $hewan_qurban = $this->ModelHewan->joinKategoriHewan(['hewan_qurban.id_hewan' => $id_hewan])->result();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail hewan";

        foreach ($hewan_qurban as $fields) {
            $data['id_hewan'] = $fields->id_hewan;
            $data['jenis'] = $fields->jenis;
            $data['id_kategori'] = $fields->id_kategori;
            $data['harga'] = $fields->harga;
            $data['berat'] = $fields->berat;
            $data['umur'] = $fields->umur;
            $data['stok'] = $fields->stok;
            $data['gambar'] = $fields->image;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('hewan/detail-hewan', $data);
        $this->load->view('templates/footer');
    }
}