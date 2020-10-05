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
}
