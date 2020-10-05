<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username') and $this->session->userdata('role_id')) {
            redirect('admin/artikel');
        }

        $this->AuthModel->validasiLogin();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->AuthModel->login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('admin/auth');
    }

    public function blocked()
    {
        $this->load->view('admin/auth/blocked');
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please Login</div>');
            redirect('admin/auth');
        }
    }
}
