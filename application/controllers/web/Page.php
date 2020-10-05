<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function index()
    {
        function limit_text($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->menu->getSubMenu();
        $data['title'] = 'Beranda';
        $site = 'web/page';
        $data["artikel"] = $this->ArtikelModel->getAll($site);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/web_header', $data);
        $this->load->view('web/index', $data);
        $this->load->view('templates/web_footer');
    }

    public function artikel($id = '', $slug = '')
    {
        $data['title'] = 'Artikel';
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->menu->getSubMenu();
        if ($id === '' or $slug === '') {
            $site = 'web/page/artikel';
            $data["artikel"] = $this->ArtikelModel->getAll($site);
            $data['pagination'] = $this->pagination->create_links();
            $this->load->view('templates/web_header', $data);
            $this->load->view('web/daftar_artikel', $data);
            $this->load->view('templates/web_footer');
        } else {
            $data["artikel_list"] = $this->ArtikelModel->getAll();
            $data["artikel"] = $this->ArtikelModel->getArtikel($id, $slug);
            $this->load->view('templates/web_header', $data);
            $this->load->view('web/artikel', $data);
            $this->load->view('templates/web_footer');
        }
    }

    public function profil()
    {
        $data['title'] = 'Profil Website';
        $data['profilMenu'] = $this->ProfilModel->getMenu();
        $data['asisten'] = $this->ProfilModel->getAsisten();
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->menu->getSubMenu();

        $this->load->view('templates/web_header', $data);
        $this->load->view('web/profil', $data);
        $this->load->view('templates/web_footer');
    }

    public function menu($pg, $url)
    {
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->menu->getSubMenu();
        $data['artikel'] = $this->menu->getMenu($url);
        $data['title'] = $data['artikel']['title'];
        $this->load->view('templates/web_header', $data);
        $this->load->view('web/menupage', $data);
        $this->load->view('templates/web_footer');
    }
}
