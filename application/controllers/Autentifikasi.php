<?php defined('BASEPATH') or exit('No direct script access allowed');

class autentifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'login';
            $data['user'] = '';
            //* kata login merupakan nilai dari varibel judul dalam array $data dikirimkan ke view aute_header

            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/aute_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        // jika usernya ada
        if ($user) {
            //jika user sudah aktif
            if ($user['is_active'] == 1) {
                //cekpassword
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        if ($user['image'] == 'default.jpg') {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Silahkan Ubah Profil Anda</div>');
                        }
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('autentifikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User Belum Diaktifasi!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required|trim|numeric|min_length[12]', [
            'numeric' => 'input must be number',
            'min_length' => 'phone number too short!'
        ]);
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registration";
            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentifikasi/registration');
            $this->load->view('templates/aute_footer');
        } else {
            $this->db->trans_start();
            $user = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->db->insert('user', $user);
            $last_id = $this->db->insert_id();
            $tabungan = [
                'id_user' => $last_id,
                'saldo' => 0
            ];
            $this->db->insert('tabungan', $tabungan);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                echo 'rollback';
            } else {
                echo 'comited';
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.
            Please Login</div>');
            redirect('autentifikasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Log Out.</div>');
        redirect('autentifikasi');
    }
    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }

    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }
}