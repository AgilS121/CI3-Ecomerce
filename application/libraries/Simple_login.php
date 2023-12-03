<?php

defined('BASEPATH') OR exit('No direct accsess');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        //load data model

        $this->CI->load->model('user_model');


    }

    //fungsi login

    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username, $password);

        //session
        if($check)
        {
            $id_users = $check->id_users;
            $nama = $check->nama;
            $akses_level = $check->akses_level;

            //create session
            $this->CI->session->set_userdata('id_users', $id_users);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);

            redirect(base_url('admin/dasbor'), 'refresh');
        }else{
            $this->CI->session->set_flashdata('warning', 'Username atau Password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //fungsi cek login
    public function cek_login()
    {
        //memeriksa session
        if($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', ' Anda belum login ');
            redirect(base_url('login'), 'refresh');
        }
    }

    //fungsi logout
    public function logout()
    {
        $this->CI->session->unset_userdata('id_users');
            $this->CI->session->unset_userdata('nama');
            $this->CI->session->unset_userdata('username');
            $this->CI->session->unset_userdata('akses_level');

            $this->CI->session->set_flashdata('warning', ' Anda berhasil logout ');
            redirect(base_url('login'), 'refresh');
    }
}