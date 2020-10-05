<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $site = 'admin/artikel';
        $data["artikel"] = $this->ArtikelModel->getAll($site);
        $data['pagination'] = $this->pagination->create_links();
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Artikel';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Artikel';
        $this->ArtikelModel->validasi();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/artikel/artikel', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->ArtikelModel->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel Berhasil Ditambahkan!</div>');
            redirect('admin/artikel');
        }
    }
    public function edit($id = '', $slug = '')
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Artikel';
        $this->ArtikelModel->validasi();
        $data["artikel"] = $this->ArtikelModel->getArtikel($id, $slug);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/artikel/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->ArtikelModel->edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel Berhasil Diedit!</div>');
            redirect('admin/artikel');
        }
    }

    public function hapusArtikel($id = '')
    {
        if ($id === '') {
            redirect('admin/artikel');
        } else {
            $this->ArtikelModel->hapus($id);
        }
    }
}
