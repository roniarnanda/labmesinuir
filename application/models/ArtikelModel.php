<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArtikelModel extends CI_Model
{
    public function getAll($site = '')
    {
        $config['base_url'] = site_url($site);
        $config['total_rows'] = $this->db->count_all('artikel');
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Kembali';
        $config['full_tag_open'] = '<div aria-label="Page navigation example"><nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '<ul><nav><div>';
        $config['num_tag_open'] = '<li class="page-item"><a class="page-link"';
        $config['num_tag_close'] = '</a></li>';
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><a class="page-link"';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item"><a class="page-link"';
        $config['prev_tagl_close'] = '</a></li>';
        $config['first_tag_open'] = '<li class="page-item"><a class="page-link"';
        $config['first_tagl_close'] = '</a></li>';
        $config['last_tag_open'] = '<li class="page-item"><a class="page-link"';
        $config['last_tagl_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $this->db->from("artikel");
        $this->db->order_by("waktu_dibuat", "DESC");
        // $query = $this->db->get();
        $query = $this->db->get('artikel', $config['per_page'], $page);
        return $query->result_array();
    }

    public function getArtikel($id, $slug)
    {
        return $this->db->get_where("artikel", ["id_artikel" => $id, "slug" => $slug])->row_array();
    }

    public function validasi()
    {
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'required|trim', [
            'required' => 'Judul Artikel Wajib Diisi!',
        ]);

        $this->form_validation->set_rules('isi', 'Isi Artikel', 'required|trim', [
            'required' => 'Isi Artikel Wajib Diisi!',
        ]);
    }

    public function tambah()
    {
        $judul = $this->input->post('judul');
        $slug = url_title($judul, 'dash', true);
        $isi = $this->input->post('isi');
        $oleh = $this->input->post('oleh');
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '1024';
            $config['upload_path'] = './assets/custom/img/artikel/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $image = 'news.png';
        }
        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'gambar' => $image,
            'isi' => $isi,
            'waktu_dibuat' => time(),
            'oleh' => $oleh
            // 'created_at' => time()
        ];
        $this->db->insert('artikel', $data);
    }

    public function edit($d)
    {
        $judul = $this->input->post('judul');
        $slug = url_title($judul, 'dash', true);
        $isi = $this->input->post('isi');
        $upload_image = $_FILES['image']['name'];
        $penyunting = $this->input->post('penyunting');

        if ($upload_image) {
            $old_image = $d["artikel"]["gambar"];
            if ($old_image != 'news.png') {
                unlink(FCPATH . 'assets/custom/img/artikel/' . $old_image);
            }

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '1024';
            $config['upload_path'] = './assets/custom/img/artikel/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
                $this->db->set('gambar', $image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $id_artikel = $d["artikel"]["id_artikel"];
        $this->db->set('judul', $judul);
        $this->db->set('slug', $slug);
        $this->db->set('isi', $isi);
        $this->db->set('penyunting', $penyunting);
        // $this->db->set('waktu_dibuat', date("Y-m-d H:i:s"));
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel');
    }

    public function hapus($id)
    {
        $this->db->select('gambar');
        $data = $this->db->get_where('artikel', ["id_artikel" => $id])->row_array();
        if ($data['gambar'] != 'news.png') {
            unlink(FCPATH . 'assets/custom/img/artikel/' . $data['gambar']);
        }
        $this->db->delete('artikel', ["id_artikel" => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel Berhasil Dihapus!</div>');
        redirect('admin/artikel');
    }
}
