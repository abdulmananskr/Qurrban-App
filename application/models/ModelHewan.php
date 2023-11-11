<?php defined('BASEPATH') or exit('No direct script access allowed');

class ModelHewan extends CI_Model
{

    public function getHewan()
    {
        return $this->db->get('hewan_qurban');
    }
    public function hewanWhere($where)
    {
        return $this->db->get_where('hewan_qurban', $where);
    }
    public function simpanHewan($data = null)
    {
        $this->db->insert('hewan_qurban', $data);
    }
    public function updateHewan($data = null, $where = null)
    {
        $this->db->update('hewan_qurban', $data, $where);
    }
    public function hapusHewan($where = null)
    {
        $this->db->delete('hewan_qurban', $where);
    }

    public function getKategori()
    {
        return $this->db->get('kategori_hewan');
    }
    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori_hewan', $where);
    }
    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori_hewan', $data);
    }
    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori_hewan', $where);
    }
    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('kategori_hewan', $data, $where);
    }
    //join     
    public function joinKategoriHewan($where)
    {
        $this->db->select('hewan_qurban.*,kategori_hewan.kategori');
        $this->db->from('hewan_qurban');
        $this->db->join('kategori_hewan', 'kategori_hewan.id = hewan_qurban.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getsumhewan()
    {
        $hewan = "SELECT SUM(stok) as Stok
                    FROM hewan_qurban";
        $totalhewan = $this->db->query($hewan);
        return $totalhewan->row()->Stok;
    }
}