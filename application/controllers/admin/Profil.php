<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['profilMenu'] = $this->ProfilModel->getMenu();
        $data['asisten'] = $this->ProfilModel->getAsisten();
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profil Website';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/profil/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function edit()
    {
        $this->ProfilModel->editMenu();
        redirect('admin/profil');
    }

    public function tambahAsisten()
    {
        $data['title'] = 'Tambah Asisten';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->ProfilModel->validasi();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/profil/asisten', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->ProfilModel->tambahAsisten();
            redirect('admin/profil/tambahAsisten');
        }
    }

    public function editAsisten($id)
    {
        $data['title'] = 'Edit Asisten';
        $data['asisten'] = $this->ProfilModel->getWhere($id);
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->ProfilModel->validasi();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/profil/edit_asisten', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->ProfilModel->editAsisten($data['asisten']);
            // redirect('admin/profil');
        }
    }

    public function hapusAsisten($id)
    {
        $this->ProfilModel->hapusAsisten($id);
    }

    public function utama()
    {
        $data['title'] = 'Halaman Utama';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('ke', 'Gambar', 'required', [
            'required' => 'Gambar Wajib Diisi!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/profil/utama', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->ProfilModel->gantiGambar();
            redirect('admin/profil/utama');
        }
    }
}
