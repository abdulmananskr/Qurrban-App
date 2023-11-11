<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelpemesanan extends CI_Model
{
    public function getdata()
    {
        return $this->db->get('pemesanan_hewan');
    }
    public function simpanPesanan($data = null)
    {
        $this->db->insert('pemesanan_hewan', $data);
    }
    public function wherePesanan($where)
    {
        return $this->db->get_where('pemesanan_hewan', $where);
    }

    public function joinPesanan($where)
    {
        $this->db->select('pemesanan_hewan.*, hewan_qurban.jenis, hewan_qurban.berat, hewan_qurban.umur');
        $this->db->from('pemesanan_hewan');
        $this->db->join('hewan_qurban', 'hewan_qurban.id_hewan = pemesanan_hewan.id_hewan');
        $this->db->where($where);
        return $this->db->get();
    }
    public function pesanUser()
    {
        $user = $this->session->userdata('id_user');
        $transaksi = "SELECT *
                FROM pemesanan_hewan as p
                JOIN user as u 
                ON p.id_user = u.id_user
                WHERE u.id_user = $user";
        $detailtransaksi = $this->db->query($transaksi);
        return $detailtransaksi->result_array();
    }
    public function allPesananuser()
    {
        $transaksi = "SELECT *
                FROM pemesanan_hewan as p
                JOIN user as u 
                ON p.id_user = u.id_user";
        $detailtransaksi = $this->db->query($transaksi);
        return $detailtransaksi->result_array();
    }
    public function detailPesanan()
    {
        $pemesanan_hewan = "SELECT p.id_pesanan, u.nama, h.jenis, h.berat, h.umur, p.harga, p.jumlah, p.alamat_pengiriman, p.tgl_pesan, p.total_harga
                            FROM pemesanan_hewan as p
                            INNER JOIN user as u
                            ON p.id_user = u.id_user
                            INNER JOIN hewan_qurban as h
                            ON u.id_user = h.id_hewan";
        $query = $this->db->query($pemesanan_hewan);
        return $query->result_array();
    }
}