<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function pg($url)
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->menu->getMenu($url);
        $data['title'] = $data['menu']['title'];

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function submenu()
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Lainnya';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $title = $this->input->post('title');
            $url = url_title($title, 'dash', true);
            $data = [
                'menu_id' => 3,
                'title' => $title,
                'url' => 'menu/pg/' . $url,
                'icon' => 'fas fa-fw fa-folder-open',
                'description' => 'Deskripsi',
                'is_active' => 1
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('admin/menu/submenu');
        }
    }

    public function edit()
    {
        $this->Menu_model->edit();
    }

    public function hapus($id)
    {
        $this->Menu_model->hapus($id);
    }

    public function editMenu($id)
    {
        $this->Menu_model->editMenu($id);
    }
}
