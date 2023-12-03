<?php
defined('BASEPATH') OR exit('No dirext access allowed');

class Belanja extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
    }

    public function index()
    {
        $keranjang = $this->cart->contents();

        $data = array(  'title' => 'Keranjang Belanja',
                        'keranjang' => $keranjang,
                        'isi' => 'belanja/list'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->load->helper('url');

        //data home
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $page = $this->input->post('page');

        //proses

        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
            );
    
             $this->cart->insert($data);
            redirect($page, 'refresh');

    }
}