<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilModel extends CI_Model
{
    function getMenu()
    {
        return $this->db->get('web_profil')->result_array();
    }

    function editMenu()
    {
        $id = $this->input->post('id');
        $isi = $this->input->post('isi');
        $this->db->set('description', $isi);
        $this->db->where('id', $id);
        $this->db->update('web_profil');
    }

    function getAsisten()
    {
        return $this->db->get('asisten')->result_array();
    }

    function getWhere($id)
    {
        return $this->db->get_where('asisten', ['id' => $id])->row_array();
    }

    function validasi()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim', [
            'required' => 'NPM Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required|trim', [
            'required' => 'Mata Kuliah Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('dosen', 'Dosen Pengampu', 'required|trim', [
            'required' => 'Dosen Pengampu Kuliah Wajib Diisi!',
        ]);
    }

    function tambahAsisten()
    {
        $nama = $this->input->post('nama');
        $npm = $this->input->post('npm');
        $matkul = $this->input->post('matkul');
        $dosen = $this->input->post('dosen');
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '1024';
            $config['upload_path'] = './assets/custom/img/img-profile/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $foto = 'default.jpg';
        }
        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'matkul' => $matkul,
            'dosen' => $dosen,
            'foto' => $foto
        ];
        $this->db->insert('asisten', $data);
    }

    function editAsisten($data)
    {
        $nama = $this->input->post('nama');
        $npm = $this->input->post('npm');
        $matkul = $this->input->post('matkul');
        $dosen = $this->input->post('dosen');
        $id = $this->input->post('id');
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $old_image = $data["foto"];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/custom/img/img-profile/' . $old_image);
            }

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/custom/img/img-profile/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data('file_name');
                $this->db->set('foto', $image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('nama', $nama);
        $this->db->set('npm', $npm);
        $this->db->set('matkul', $matkul);
        $this->db->set('dosen', $dosen);
        $this->db->where('id', $id);
        $this->db->update('asisten');
        redirect('admin/profil');
    }

    function hapusAsisten($id)
    {
        $this->db->select('foto');
        $data = $this->db->get_where('asisten', ["id" => $id])->row_array();
        if ($data['foto'] != 'default.jpg') {
            unlink(FCPATH . 'assets/custom/img/img-profile/' . $data['foto']);
        }
        $this->db->delete('asisten', ["id" => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel Berhasil Dihapus!</div>');
        redirect('admin/profil');
    }

    function gantiGambar()
    {

        $ke = $this->input->post('ke');
        $upload_gambar = $_FILES['gambar']['name'];
        if ($upload_gambar) {
            for ($i = 1; $i <= 3; $i++) {
                if ($ke == $i) {
                    unlink(FCPATH . 'assets/custom/img/web/' . $ke . '.jpg');
                    $config['file_name'] = $ke . '.jpg';
                }
            }
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/custom/img/web/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
}
