<?php
defined('BASEPATH') OR exit ('No direct access allowed');

class Dasbor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->simple_login->cek_login();
    }
    //Halaman Dashboard Admin
    public function index()
    {
        $data = array('title' => 'Halaman Admin Dashboard',
    'isi' => 'admin/dasbor/list');
    $this->load->view('admin/layout/wrapper', $data, FALSE);

    
    }
}