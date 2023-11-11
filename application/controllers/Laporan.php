<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    // laporan data hewan
    public function laporan_hewan()
    {
        $data['title'] = 'Laporan Data Hewan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        $data['kategori'] = $this->ModelHewan->getKategori()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hewan/laporan_hewan', $data);
        $this->load->view('templates/footer');
    }
    public function cetak_laporan_hewan()
    {
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        $data['kategori'] = $this->ModelHewan->getKategori()->result_array();

        $this->load->view('hewan/laporan_print_hewan', $data);
    }
    public function laporan_hewan_pdf()
    {
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        // $this->load->library('dompdf_gen');         
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/danaqurban/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('hewan/laporan_pdf_hewan', $data);
        $paper_size  = 'A4'; // ukuran kertas         
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape         
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF         
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));         // nama file pdf yang di hasilkan     
    }
    public function export_excel_hewan()
    {
        $data = array('title' => 'Laporan Hewan Qurban', 'hewan_qurban' => $this->ModelHewan->getHewan()->result_array());
        $this->load->view('hewan/export_excel_hewan', $data);
    }

    // laporan data anggota
    public function laporan_nasabah()
    {
        $data['title'] = 'Laporan Data Nasabah';
        $nasabah['user'] = $this->ModelUser->getUserWhere(['role_id' => 2])->result_array();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nasabah/laporan_nasabah', $nasabah);
        $this->load->view('templates/footer');
    }
    public function cetak_laporan_nasabah()
    {
        $data = array('title' => 'Laporan Data Nasabah', 'user' => $this->ModelUser->getUserWhere(['role_id' => 2])->result_array());

        $this->load->view('nasabah/laporan_print_nasabah', $data);
    }
    public function laporan_nasabah_pdf()
    {
        $data['user'] = $this->ModelUser->getUserWhere(['role_id' => 2])->result_array();
        // $this->load->library('dompdf_gen');         
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/danaqurban/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('nasabah/laporan_pdf_nasabah', $data);
        $paper_size  = 'A4'; // ukuran kertas         
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape         
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF         
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_nasabah.pdf", array('Attachment' => 0));         // nama file pdf yang di hasilkan     
    }
    public function export_excel_nasabah()
    {
        $data = array('title' => 'Laporan Data Nasabah', 'user' => $this->ModelUser->getUserWhere(['role_id' => 2])->result_array());
        $this->load->view('nasabah/export_excel_nasabah', $data);
    }

    // laporan data transaksi
    public function laporan_transaksi()
    {
        $data['title'] = 'Laporan Data Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Mtransaksi->alltransaksi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/laporan_transaksi', $data);
        $this->load->view('templates/footer');
    }
    public function cetak_laporan_transaksi()
    {
        $data['transaksi'] = $this->Mtransaksi->alltransaksi();

        $this->load->view('transaksi/laporan_print_transaksi', $data);
    }
    public function laporan_transaksi_pdf()
    {
        $data['transaksi'] = $this->Mtransaksi->alltransaksi();
        // $this->load->library('dompdf_gen');         
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/danaqurban/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('transaksi/laporan_pdf_transaksi', $data);
        $paper_size  = 'A4'; // ukuran kertas         
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape         
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF         
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));         // nama file pdf yang di hasilkan     
    }
    public function transaksi_export_excel()
    {
        $data = array('title' => 'Laporan Data Transaksi', 'transaksi' => $this->Mtransaksi->alltransaksi());
        $this->load->view('transaksi/export_excel_transaksi', $data);
    }
}