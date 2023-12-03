<?php
defined('BASEPATH') OR exit('NO DIRECT ACCESS ALLOWED');

class User extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //proteksi alaman
        $this->simple_login->cek_login();
    }

    //data user
    public function index()
    {
        $user = $this->user_model->listing();
        $data = array( 'title' => 'Data Pengguna',
        'user' => $user,
        'isi' => 'admin/user/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //tambah
    public function tambah()
    {

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama lengkap', 'required',
        array('required' => '%s harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email',
        array('required' => '%s harus diisi',
                'valid_email' => '%s tidak valid'));

        $valid->set_rules('username', 'Username', 'required|min_length[6]|is_unique[users.username]',
        array('required' => '%s harus diisi',
        'min_length' => '%s minimal harus 6 karakter',
        'is_unique' => '%s sudah ada. Buat username yang baru'));

        $valid->set_rules('password', 'Password', 'required',
        array('required' => '%s harus diisi'));

        if($valid->run()===FALSE) {

        $data = array( 'title' => 'Tambah Pengguna',
        'isi' => 'admin/user/tambah');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
            $data = array( 'nama'   => $i->post('nama'),
                            'email'   => $i->post('email'),
                            'username'   => $i->post('username'),
                            'password'   => md5($i->post('password')),
                            'akses_level'   => $i->post('akses_level'));

                            $this->user_model->tambah($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/user'),'refresh');
        }
    }

    //delete

    public function delete($id_users)
    {
        $data = array('id_users' => $id_users);
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'),'refresh');
    }

    //tambah
    public function edit($id_users)
    {

        $user = $this->user_model->detail($id_users);
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama lengkap', 'required',
        array('required' => '%s harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email',
        array('required' => '%s harus diisi',
                'valid_email' => '%s tidak valid'));

        $valid->set_rules('password', 'Password', 'required',
        array('required' => '%s harus diisi'));

        if($valid->run()===FALSE) {

        $data = array( 'title' => 'Edit Pengguna',
        'user' => $user,
        'isi' => 'admin/user/edit');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
            $data = array( 'id_users' => $id_users,
                'nama'   => $i->post('nama'),
                            'email'   => $i->post('email'),
                            'username'   => $i->post('username'),
                            'password'   => md5($i->post('password')),
                            'akses_level'   => $i->post('akses_level'));

                            $this->user_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah diedit');
                            redirect(base_url('admin/user'),'refresh');
        }
    }
}