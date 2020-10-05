<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    public function validasi()
    {
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|trim|is_unique[users.username]', [
            'required' => 'Nama Pengguna Wajib Diisi!',
            'is_unique' => 'Nama Pengguna Sudah Digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata Sandi Tidak Cocok!',
            'required' => 'Kata Sandi Wajib Diisi!',
            'min_length' => 'Kata Sandi Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim', [
            'required' => 'Role Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    }

    public function regis()
    {
        $username = $this->input->post('username');
        $role_id = $this->input->post('role');
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'username' => htmlspecialchars($username),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => $role_id
        ];
        $this->db->insert('users', $data);
    }

    public function validasiLogin()
    {
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|trim', [
            'required' => 'Nama Pengguna Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim', [
            'required' => 'Kata Sandi Wajib Diisi!'
        ]);
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin/artikel');
                } else {
                    redirect('admin/artikel');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Salah!</div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Pengguna Tidak Terdaftar!</div>');
            redirect('admin/auth');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        redirect('admin/admin');
    }
}
