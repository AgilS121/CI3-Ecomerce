<?php
defined('BASEPATH') OR exit ('NO direct access allowed');

class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //listing all user
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id_users','desc');
        $query = $this->db->get();
        return $query->result();
    }

    //detail all user
    public function detail($id_users)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id_users','desc');
        $query = $this->db->get();
        return $query->row();
    }

    //tambah
    public function tambah($data)
    {
        $this->db->insert('users', $data);
    }

    //delete
    public function delete($data)
    {
        $this->db->where('id_users', $data['id_users']);
        $this->db->delete('users', $data);
    }

    //edit
    public function edit($data)
    {
        $this->db->where('id_users', $data['id_users']);
        $this->db->update('users', $data);
    }

    //login user
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('username' => $username, 
        'password' => md5($password)));
        $this->db->order_by('id_users','desc');
        $query = $this->db->get();
        return $query->row();
    }
}