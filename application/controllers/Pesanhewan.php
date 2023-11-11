<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanhewan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function index()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 2) {
            $data['pemesanan_hewan'] = $this->Modelpemesanan->pesanUser();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesananHewan/pesanan_hewan', $data);
            $this->load->view('templates/footer');
        } else {
            $data['pemesanan_hewan'] = $this->Modelpemesanan->allPesananuser();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesananHewan/pesanan_hewan', $data);
            $this->load->view('templates/footer');
        }
    }
    public function pesanHewan()
    {
        $id = $this->uri->segment(3);
        $hewan = $this->ModelHewan->joinKategoriHewan(['hewan_qurban.id_hewan' => $id])->result();
        $data['title'] = 'Pesan Hewan Qurban';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $pesan['pemesanan_hewan'] = $this->Modelpemesanan->getdata()->result_array();
        foreach ($hewan as $fields) {
            $data['id_hewan'] = $fields->id_hewan;
            $data['jenis'] = $fields->jenis;
            $data['id_kategori'] = $fields->id_kategori;
            $data['berat'] = $fields->berat;
            $data['umur'] = $fields->umur;
            $data['harga'] = $fields->harga;
            $data['stok'] = $fields->stok;
            $data['image'] = $fields->image;
        }

        $this->form_validation->set_rules('berat', ' Berat', 'required');
        $this->form_validation->set_rules('umur', ' Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|numeric', [
            'numeric' => 'input harus angka'
        ]);
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat pengiriman', 'required', [
            'required' => 'Alamat pengirim harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesananHewan/pesan_hewan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'id_hewan' => $this->input->post('id_hewan', true),
                'harga' => $this->input->post('harga', true),
                'jumlah' => $this->input->post('jumlah', true),
                'alamat_pengiriman' => $this->input->post('alamat_pengiriman', true),
                'tgl_pesan' => date('y-m-d'),
                'total_harga'  => $this->input->post('harga', true) * $this->input->post('jumlah', true)
            ];

            $this->Modelpemesanan->simpanPesanan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Pesananan anda berhasil terkirim, tunggu pesanan dikirim ke tempat anda</div>');
            redirect('home');
        }
    }
    public function detailPesanan()
    {
        $id = $this->uri->segment(3);
        $data['pemesanan_hewan'] = $this->Modelpemesanan->detailPesanan(['pemesanan_hewan.id_pesanan' => $id]);

        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();;
        $data['title'] = "Detail pesanan";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesananHewan/detail_pesanan', $data);
        $this->load->view('templates/footer');
    }
    public function cetakBuktiPesanan()
    {
        $id = $this->uri->segment(3);
        $pesanan = $this->Modelpemesanan->joinPesanan(['pemesanan_hewan.id_pesanan' => $id])->result();
        foreach ($pesanan as $fields) {
            $data['id_pesanan'] = $fields->id_pesanan;
            $data['id_user'] = $fields->id_user;
            $data['id_hewan'] = $fields->id_hewan;
            $data['jenis'] = $fields->jenis;
            $data['berat'] = $fields->berat;
            $data['umur'] = $fields->umur;
            $data['harga'] = $fields->harga;
            $data['jumlah'] = $fields->jumlah;
            $data['alamat_pengiriman'] = $fields->alamat_pengiriman;
            $data['tgl_pesan'] = $fields->tgl_pesan;
            $data['total_harga'] = $fields->total_harga;
        }
        $data['title'] = 'Cetak Bukti Pesanan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // $data['pemesanan_hewan'] = $this->Modelpemesanan->wherePesanan(['id_pesanan' => $this->uri->segment(3)])->result_array();
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();

        // $this->load->library('dompdf_gen');
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/danaqurban/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('pesananHewan/cetak_bukti_pesanan', $data);
        $paper_size  = 'A4'; // ukuran kertas         
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape         
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF         
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("bukti_pesanan_hewan_qurban.pdf", array('Attachment' => 0));         // nama file pdf yang di hasilkan    
    }
}