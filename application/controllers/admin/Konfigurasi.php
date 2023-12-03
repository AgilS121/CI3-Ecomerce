<?php

defined('BASEPATH')OR exit('No direct access allowed');

class Konfigurasi extends CI_Controller
{

    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }
    //konfigurasi umum
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s harus diisi')
    );

        

        if($valid->run()===FALSE) {

        $data = array( 'title' => 'Tambah Website ',
        'konfigurasi' => $konfigurasi,
        'isi' => 'admin/konfigurasi/list');

        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'namaweb'   => $i->post('namaweb'),
                            'tagline'   => $i->post('tagline'),
                            'email'   => $i->post('email'),
                            'website'   => $i->post('website'),
                            'keywords'   => $i->post('keywords'),
                            'metatext'   => $i->post('metatext'),
                            'telepon'   => $i->post('telepon'),
                            'alamat'   => $i->post('alamat'),
                            'facebook'   => $i->post('facebook'),
                            'instagram'   => $i->post('instagram'),
                            'deskripsi'   => $i->post('deskripsi'),
                            'logo'   => $i->post('logo'),
                            'icons'   => $i->post('icons'),
                            'rekening_pembayaran'   => $i->post('rekening_pembayaran')
                        );

                            $this->konfigurasi_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah diupdate');
                            redirect(base_url('admin/konfigurasi'),'refresh');
        }
    }

    //konfigurasi logo
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s harus diisi'));

 

        if($valid->run()) {
            //check jika gambar diganti
            if(!empty($_FILES['logo']['name'])){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3600';
            $config['max_width'] = '1024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('logo')){


        $data = array( 'title' => 'Edit Konffigurasi: ',
        'konfigurasi' => $konfigurasi,
        'error' => $this->upload->display_errors(),
        'isi' => 'admin/konfigurasi/logo');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumnail gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/image/'. $upload_gambar['upload_data']['file_name'];
            $config['new_image'] = './assets/upload/image/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 3600;
            $config['height']       = 3600;
            $config['thumb_marker'] ='';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end
            $i = $this->input;
            //slug
            $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'namaweb'   => $i->post('namaweb'),
                            
                            'logo'   => $upload_gambar['upload_data']['file_name']
        );
                            
                            $this->konfigurasi_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/konfigurasi/logo'),'refresh');
        }}else{
            $i = $this->input;
            //slug
          
            $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                             'namaweb'   => $i->post('namaweb'),
            
           // 'logo'   => $upload_gambar['upload_data']['file_name']
);
            
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/konfigurasi/logo'),'refresh');
        }
    }
        //edn database
        $data = array( 'title' => 'Edit Konfigurasi: ',
        'konfigurasi' => $konfigurasi,
        'isi' => 'admin/konfigurasi/logo');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //konfigurasi icon
    public function icons()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s harus diisi'));

 

        if($valid->run()) {
            //check jika gambar diganti
            if(!empty($_FILES['icons']['name'])){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3600';
            $config['max_width'] = '1024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('icons')){


        $data = array( 'title' => 'Edit Konffigurasi: ',
        'konfigurasi' => $konfigurasi,
        'error' => $this->upload->display_errors(),
        'isi' => 'admin/konfigurasi/icons');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumnail gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/image/'. $upload_gambar['upload_data']['file_name'];
            $config['new_image'] = './assets/upload/image/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 3600;
            $config['height']       = 3600;
            $config['thumb_marker'] ='';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end
            $i = $this->input;
            //slug
            $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'namaweb'   => $i->post('namaweb'),
                            
                            'icons'   => $upload_gambar['upload_data']['file_name']
        );
                            
                            $this->konfigurasi_model->edit($data);
                            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
                            redirect(base_url('admin/konfigurasi/icons'),'refresh');
        }}else{
            $i = $this->input;
            //slug
          
            $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                             'namaweb'   => $i->post('namaweb'),
            
           // 'logo'   => $upload_gambar['upload_data']['file_name']
);
            
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/konfigurasi/icons'),'refresh');
        }
    }
        //edn database
        $data = array( 'title' => 'Edit Konfigurasi: ',
        'konfigurasi' => $konfigurasi,
        'isi' => 'admin/konfigurasi/icons');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}