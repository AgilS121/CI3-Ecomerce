<?php
defined('BASEPATH') OR exit('NO DIRECT ACCESS ALLOWED');

class Gambar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('produk_model');
        //proteksi alaman
        $this->simple_login->cek_login();
    }

    public function Gambar($id_produk)
    {
        
        $gambar = $this->produk_model->detail($id_produk);
        $produk = $this->produk_model->gambar($id_produk);

        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Nama Gambar', 'required',
        array('required' => '%s harus diisi'));


        if($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3600';
            $config['max_width'] = '1024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar')){
                
        $data = array( 'title' => 'Tambah Gambar: '.$produk->nama_produk,
        'produk' => $produk,
        'gambar' => $gambar,
        'error' => $this->upload->display_errors(),
        'isi' => 'admin/produk/gambar');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumnail gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/image/'. $upload_gambar['upload_data']['file_name'];
            $config['new_image'] = './assets/upload/image/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 250;
            $config['height']       = 250;
            

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end
            $i = $this->input;
            
            $data = array(  'id_produk'   => $id_produk,
                            'judul_gambar'   => $i->post('judul_gambar'),
                            'gambar'   => $upload_gambar['upload_data']['file_name']

                        );

                            $this->produk_model->tambah_gambar($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
        }
    }
        //edn database
        $data = array( 'title' => 'Tambah Gambar: '.$produk->nama_produk,
        'produk' => $produk,
        'gambar' => $gambar,
        'isi' => 'admin/produk/gambar');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
}