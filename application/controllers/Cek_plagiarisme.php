<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_plagiarisme extends CI_Controller
{

    public function index()
    {
        $data = [
            'title' => 'Form Mahasiswa'
        ];

        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);
    }

    public function topik_skripsi()
    {
        $data = [
            'title' => 'Topik Skripsi',
            'topik_skripsi' => $this->Topik->all(),
            'no' => 1
        ];


        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/topik', $data);
    }

    public function judul_skripsi()
    {
        $data = [
            'title' => 'Judul Skripsi',
            'judul_skripsi' => $this->Judul_skripsi->all(),
            'no' => 1
        ];

        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/judul', $data);
    }

}

/* End of file Cek_plagiarisme.php */