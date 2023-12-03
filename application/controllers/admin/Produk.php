<?php
defined('BASEPATH') OR exit('NO DIRECT ACCESS ALLOWED');

class Produk extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //data produk
    public function index()
    {
        $produk = $this->produk_model->listing();
        $data = array( 'title' => 'Data Produk',
        'produk' => $produk,
        'isi' => 'admin/produk/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //tambah
    public function tambah()
    {

        $kategori = $this->kategori_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required',
        array('required' => '%s harus diisi'));

        $valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]',
        array('required' => '%s harus diisi',
                'is_unique' => '%s sudah ada.'));
       

        

        if($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5800';
            $config['max_width'] = '5024';
            $config['max_height'] = '5024';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar')){
                
                
            


        $data = array( 'title' => 'Tambah Produk',
        'kategori' => $kategori,
        'error' => $this->upload->display_errors(),
        'isi' => 'admin/produk/tambah');

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
            $config['thumb_marker'] ='';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end
            $i = $this->input;
            //slug
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
            $data = array( 'id_users'   => $this->session->userdata('id_users'),
                            'id_Kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'   => $i->post('keterangan'),
                            'keywords'   => $i->post('keywords'),
                            'harga'   => $i->post('harga'),
                            'stok'   => $i->post('stok'),
                            'gambar'   => $upload_gambar['upload_data']['file_name'],
                            'berat'   => $i->post('berat'),
                            'ukuran'   => $i->post('ukuran'),
                            'status_produk'   => $i->post('status_produk'),
                            'tanggal_post'   => date('Y-m-d H:i:s'));

                            $this->produk_model->tambah($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/produk'),'refresh');
        }
    }
        //edn database
        $data = array( 'title' => 'Tambah Produk',
        'kategori' => $kategori,
        'isi' => 'admin/produk/tambah');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //delete

    public function delete($id_produk)
    {
        $produk = $this->produk_model->detail($id_produk);
        unlink('./assets/upload/image/'.$produk->gambar);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);

        $data = array('id_produk' => $id_produk);
        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk'),'refresh');
    }

    //gambar
    public function delete_gambar($id_produk, $id_gambar)
    {
        $gambar = $this->produk_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

        $data = array('id_gambar' => $id_gambar);
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
    }

    public function gambar($id_produk)
    {
        $gambar = $this->produk_model->gambar($id_produk);
        $produk = $this->produk_model->detail($id_produk);
        

        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Judul Gambar', 'required',
        array('required' => '%s harus diisi'));


        if($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5800';
            $config['max_width'] = '5024';
            $config['max_height'] = '5024';

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
            $config['width']         = 5800;
            $config['height']       = 5800;
            $config['thumb_marker'] ='';

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
        $data = array( 'title' => 'Tambah nama Gambar: '.$produk->nama_produk,
        'produk' => $produk,
        'gambar' => $gambar,
        'isi' => 'admin/produk/gambar');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    //edit
    public function edit($id_produk)
    {
        $produk = $this->produk_model->detail($id_produk);

        $kategori = $this->kategori_model->listing();

        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required',
        array('required' => '%s harus diisi'));

        $valid->set_rules('kode_produk', 'Kode Produk');
       

        

        if($valid->run()) {
            //check jika gambar diganti
            if(!empty($_FILES['gambar']['name'])){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3600';
            $config['max_width'] = '1024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar')){
                
                
            


        $data = array( 'title' => 'Edit Produk: '.$produk->nama_produk,
        'kategori' => $kategori,
        'error' => $this->upload->display_errors(),
        'isi' => 'admin/produk/tambah');

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
            $config['thumb_marker'] ='';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end
            $i = $this->input;
            //slug
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
            $data = array(  'id_produk' => $id_produk,
                            'id_users'   => $this->session->userdata('id_users'),
                            'id_Kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'   => $i->post('keterangan'),
                            'keywords'   => $i->post('keywords'),
                            'harga'   => $i->post('harga'),
                            'stok'   => $i->post('stok'),
                            'gambar'   => $upload_gambar['upload_data']['file_name'],
                            'berat'   => $i->post('berat'),
                            'ukuran'   => $i->post('ukuran'),
                            'status_produk'   => $i->post('status_produk'));

                            $this->produk_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/produk'),'refresh');
        }}else{
            $i = $this->input;
            //slug
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
            $data = array(  'id_produk' => $id_produk,
                            'id_users'   => $this->session->userdata('id_users'),
                            'id_Kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'   => $i->post('keterangan'),
                            'keywords'   => $i->post('keywords'),
                            'harga'   => $i->post('harga'),
                            'stok'   => $i->post('stok'),
                            //'gambar'   => $upload_gambar['upload_data']['file_name'],
                            'berat'   => $i->post('berat'),
                            'ukuran'   => $i->post('ukuran'),
                            'status_produk'   => $i->post('status_produk'));

                            $this->produk_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/produk'),'refresh');
        }
    }
        //edn database
        $data = array( 'title' => 'edit Produk: '.$produk->nama_produk,
        'kategori' => $kategori,
        'produk' => $produk,
        'isi' => 'admin/produk/edit');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}