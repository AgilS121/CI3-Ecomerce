<?php
defined('BASEPATH') OR exit ('NO direct access allowed');

class kategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //listing all kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori','desc');
        $query = $this->db->get();
        return $query->result();
    }

    //detail all kategori
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori','desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function read($slug_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori','desc');
        $query = $this->db->get();
        return $query->row();
    }

    //tambah
    public function tambah($data)
    {
        $this->db->insert('kategori', $data);
    }

    //delete
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }

    //edit
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    //login kategori
    public function login($kategoriname, $password)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where(array('kategoriname' => $kategoriname, 
        'password' => md5($password)));
        $this->db->order_by('id_kategori','desc');
        $query = $this->db->get();
        return $query->row();
    }
}