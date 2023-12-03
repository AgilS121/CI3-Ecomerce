<?php

defined('BASEPATH') OR exit ('No direct Allowed');

class Login extends CI_Controller {

    //Halaman Login
    public function index() {

        //validasi
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi'));

        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi'));

        if($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //proses ke login
            $this->simple_login->login($username, $password);
        }
        //end
        $data = array('title' => 'Login Admin');
        $this->load->view('login/list', $data, FALSE);
    }

    //fungsi logout
    public function logout(){
         $this->simple_login->logout();
    }
}