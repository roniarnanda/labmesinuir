<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Admin';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // $this->db->where('id !=', 1);
        $data['users'] = $this->db->get('users')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->AuthModel->validasi();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/admin/index', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->AuthModel->regis();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pennguna Baru Berhasil Ditambahkan!</div>');
            redirect('admin/admin');
        }
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['title'] = 'Role';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/admin/role', $data);
        $this->load->view('templates/admin_footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 5);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/admin/role-access', $data);
        $this->load->view('templates/admin_footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    // public function user($role_id)
    // {
    //     $data['title'] = 'User Access';
    //     $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    //     $this->db->where('id !=', 1);
    //     $data['users'] = $this->db->get_where('users', ['role_id' => $role_id])->result_array();

    //     $this->load->view('templates/admin_header', $data);
    //     $this->load->view('templates/admin_sidebar', $data);
    //     $this->load->view('templates/admin_topbar', $data);
    //     $this->load->view('admin/admin/role-users', $data);
    //     $this->load->view('templates/admin_footer');
    // }

    public function gantirole($id, $role)
    {
        if ($role == '1') {
            $this->db->set('role_id', '2');
        } else {
            $this->db->set('role_id', '1');
        }
        $this->db->where('id', $id);
        $this->db->update('users');
        redirect('admin/admin');
    }

    public function hapus($id)
    {
        $this->AuthModel->hapus($id);
    }
}
