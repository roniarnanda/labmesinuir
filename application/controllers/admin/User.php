<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');

            // Cek ada gambar profile
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/img-profile/' . $old_image);
                }


                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/img-profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('username', $username);
            $this->db->update('users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/user/changepassword', $data);
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword');
            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                redirect('user/changepassword');
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current passwordd!</div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $data['user']['username']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
