<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTabungan extends CI_Model{
    
    public function tampil()
    {         
        return $this->db->get('tabungan');     
    }
    public function info()
    {       
        $id_user = $this->session->userdata('id_user');
        $infosaldo = "SELECT saldo
                        FROM tabungan
                        WHERE id_user=" . $id_user;
        $info = $this->db->query($infosaldo);
        return $info->row_array();
    } 

    public function totalsaldo()
    {
        $sql = "SELECT SUM(saldo) as  saldo FROM tabungan" ;
        $total = $this->db->query($sql);                 
        return $total->row()->saldo;   
    }

    public function tabungan()
    {
        $tab = "SELECT t.id, u.image, u.nama, t.saldo 
                FROM tabungan as t
                JOIN user as u 
                ON t.id_user = u.id_user" ;
        $total = $this->db->query($tab);                 
        return $total->result_array(); 
    }

    public function getTabunganWhere($where = null)     
    {         
        return $this->db->get_where('tabungan', $where);     
    } 
    
}