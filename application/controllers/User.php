<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Mtransaksi');
        $this->load->model('ModelHewan');
    }
    function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tabungan'] = $this->ModelTabungan->info();
        $data['hewan_qurban'] = $this->ModelHewan->getHewan()->result_array();
        $data['kategori_hewan'] = $this->ModelHewan->getKategori()->result_array();
        $data['transaksi'] = $this->Mtransaksi->gettransaksi()->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');

        // echo "selamat Belajar Website";
    }

    public function anggota()
    {
        $data['title'] = 'Nasabah';
        $nasabah['user'] = $this->ModelUser->getUserWhere(['role_id' => 2])->result_array();
        $data['user'] = $this->ModelUser->getUserWhere(['id_user' => $this->uri->segment(3)])->result_array();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/anggota', $nasabah);
        $this->load->view('templates/footer');
    }

    function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');

        // echo "selamat Belajar Website";
    }

    public function ubahProfil()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required|trim',
            [
                'required' => 'Nama tidak Boleh Kosong'
            ]
        );
        $this->form_validation->set_rules(
            'no_telepon',
            'no_telepon Lengkap',
            'required|trim|numeric',
            [
                'required' => 'No Telepon tidak Boleh Kosong',
                'numeric' => 'input harus angka'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat Lengkap',
            'required|trim',
            [
                'required' => 'alamat tidak Boleh Kosong'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $no_telepon = $this->input->post('no_telepon', true);
            $alamat = $this->input->post('alamat', true);

            //jika ada gambar yang akan diupload             
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            Profil Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('user/profile');
        }
    }
}