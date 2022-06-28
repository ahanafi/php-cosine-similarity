<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_plagiarisme extends CI_Controller
{

    public function index()
    {
        $data = [
            'title' => 'Cek Judul'
        ];

        $this->load->view('cek-plagiarisme/form', $data);
    }

    public function topik_skripsi()
    {
        $data = [
            'title' => 'Topik Skripsi',
            'topik_skripsi' => $this->Topik->all(),
            'no' => 1
        ];

        $this->load->view('cek-plagiarisme/topik', $data);
    }

    public function judul_skripsi()
    {
        $data = [
            'title' => 'Judul Skripsi',
            'judul_skripsi' => $this->Judul_skripsi->all(),
            'no' => 1
        ];

        $this->load->view('cek-plagiarisme/judul', $data);
    }

}

/* End of file Cek_plagiarisme.php */
