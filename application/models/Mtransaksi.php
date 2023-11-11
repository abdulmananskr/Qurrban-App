<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{
    public function gettransaksi()
    {
        return $this->db->get('transaksi');
    }
    public function transaksiWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }
    public function transaksiuser()
    {
        $user = $this->session->userdata('id_user');
        $transaksi = "SELECT t.id_transaksi, u.nama, t.nama_transaksi, t.tanggal, t.kredit_debet, t.nominal, t.saldo 
                FROM transaksi as t
                JOIN user as u 
                ON t.id_user = u.id_user
                WHERE u.id_user = $user";
        $detailtransaksi = $this->db->query($transaksi);
        return $detailtransaksi->result_array();
    }
    public function alltransaksi()
    {
        $user = $this->session->userdata('id_user');
        $transaksi = "SELECT t.id_transaksi, u.nama, t.nama_transaksi, t.tanggal, t.kredit_debet, t.nominal, t.saldo 
                FROM transaksi as t
                JOIN user as u 
                ON t.id_user = u.id_user";
        $detailtransaksi = $this->db->query($transaksi);
        return $detailtransaksi->result_array();
    }
}