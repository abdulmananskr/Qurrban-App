<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Mtransaksi');
    }

    function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 2) {
            $data['transaksi'] = $this->Mtransaksi->transaksiuser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/data_transaksi', $data);
            $this->load->view('templates/footer');
        } else {
            $data['transaksi'] = $this->Mtransaksi->alltransaksi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/data_transaksi', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tariktunai()
    {
        $data['title'] = 'Tabungan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tabungan'] = $this->ModelTabungan->tampil()->result_array();
        $data['transaksi'] = $this->Mtransaksi->gettransaksi();

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nominal = $this->input->post('nominal', true);
            $id_user = $this->session->userdata('id_user');
            $result = $this->db->query("SELECT saldo
                                        FROM tabungan
                                        WHERE id_user=" . $id_user)->result();
            foreach ($result as $row) {
                $saldo_tabungan = $row->saldo;
                if (($saldo_tabungan > 0) && ($nominal <= $saldo_tabungan)) {
                    $saldo_akhir = $saldo_tabungan - $nominal;
                } else if (($saldo_tabungan <= 0)) {
                    $saldo_akhir = $saldo_tabungan;
                    redirect('user');
                } else if (($nominal > $saldo_tabungan)) {
                    $nominal = 0;
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                    Saldo Anda Tidak cukup <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    redirect('user');
                }
            }
            $transkasi = [
                'id_user' => $id_user,
                'nama_transaksi' => 'Tarik Tunai',
                'tanggal' => date('Y-m-d'),
                'kredit_debet' => 'Kredit',
                'nominal' => $nominal,
                'saldo' => $saldo_akhir
            ];
            $tabungan = array(
                'saldo' => $saldo_akhir,
                'id_user' => $id_user
            );
            $this->db->insert('transaksi', $transkasi);
            $this->db->where('id_user', $id_user);
            $this->db->set('saldo', $saldo_akhir);
            $this->db->update('tabungan', $tabungan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            Tarik tunai berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
        }
    }
    public function topup()
    {
        $data['title'] = 'Tabungan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tabungan'] = $this->ModelTabungan->tampil()->result_array();
        $data['transaksi'] = $this->Mtransaksi->gettransaksi();

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nominal = $this->input->post('nominal', true);
            $id_user = $this->session->userdata('id_user');
            $result = $this->db->query("SELECT saldo
                                        FROM tabungan
                                        WHERE id_user=" . $id_user)->result();
            foreach ($result as $row) {
                $saldo_tabungan = $row->saldo;
                if ($saldo_tabungan == 0) {
                    $saldo_akhir = $nominal;
                } else if ($saldo_tabungan > 0) {
                    $saldo_akhir = $nominal + $saldo_tabungan;
                }
            }
            $transkasi = [
                'id_user' => $id_user,
                'nama_transaksi' => 'Top Up',
                'tanggal' => date('y-m-d'),
                'kredit_debet' => 'Debet',
                'nominal' => $nominal,
                'saldo' => $saldo_akhir
            ];
            $tabungan = array(
                'saldo' => $saldo_akhir,
                'id_user' => $id_user
            );
            $this->db->insert('transaksi', $transkasi);
            $this->db->where('id_user', $id_user);
            $this->db->set('saldo', $saldo_akhir);
            $this->db->update('tabungan', $tabungan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            Top up Berhasil <button type="button" class="close" data-dismiss="alert"
    aria-label="Close">
    <span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
        }
    }
    public function cetak_bukti_transaksi()
    {
        $data['title'] = 'Cetak Bukti Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Mtransaksi->transaksiWhere(['id_transaksi' => $this->uri->segment(3)])->result_array();

        // $this->load->library('dompdf_gen');         
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/danaqurban/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('transaksi/cetak_bukti_transaksi', $data);
        $paper_size  = 'A4'; // ukuran kertas         
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape         
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF         
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("bukti_transaksi.pdf", array('Attachment' => 0));         // nama file pdf yang di hasilkan     
    }
}