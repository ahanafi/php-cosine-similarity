<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isAuthenticated()) {
            redirect(base_url('auth'));
        }
        provideAccessTo("1|2");
    }

    public function index()
    {
        $data = [
            'title' => 'Data Topik skripsi',
            'topik_skripsi' => $this->Topik->all(),
            'no' => 1
        ];
        $this->main_lib->getTemplate('topik-skripsi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Topik skripsi',
        ];

        if (isset($_POST['submit'])) {
            $rules = $this->_rules();
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('topik-skripsi/form-create', $data);
            } else {
                $topik_skripsi_data = [
                    'nama_topik_skripsi' => $this->main_lib->getPost('nama_topik_skripsi'),
                    'keterangan' => $this->main_lib->getPost('keterangan'),
                ];

                $insert = $this->Topik->insert($topik_skripsi_data);
                if ($insert) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Topik skripsi berhasil ditambahkan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menambahkan data Topik skripsi baru!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('topik-skripsi'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('topik-skripsi/form-create', $data);
        }
    }

    public function edit($id_topik_skripsi)
    {
        if (empty(trim($id_topik_skripsi))) {
            redirect(base_url('topik-skripsi'));
        }

        $topik_skripsi = $this->Topik->findById(['id_topik_skripsi' => $id_topik_skripsi]);
        $data = [
            'title' => 'Edit Topik skripsi',
            'topik_skripsi' => $topik_skripsi,
        ];

        if (isset($_POST['update'])) {
            $rules = $this->_rules();
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('topik-skripsi/form-update', $data);
            } else {
                $topik_skripsi_data = [
                    'nama_topik_skripsi' => $this->main_lib->getPost('nama_topik_skripsi'),
                    'keterangan' => $this->main_lib->getPost('keterangan')
                ];

                $update = $this->Topik->update($topik_skripsi_data, ['id_topik_skripsi' => $id_topik_skripsi]);
                if ($update) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Topik skripsi berhasil disimpan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menyimpan data Topik skripsi!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('topik-skripsi'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('topik-skripsi/form-update', $data);
        }
    }

    public function delete($id_topik_skripsi)
    {
        if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
            $data_id = $this->main_lib->getPost('data_id');
            $data_type = $this->main_lib->getPost('data_type');

            if ($data_id === $id_topik_skripsi && $data_type === 'topik-skripsi') {
                $delete = $this->Topik->delete(['id_topik_skripsi' => $data_id]);
                if ($delete) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Topik skripsi berhasil dihapus!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menghapus data Topik skripsi!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('topik-skripsi'), 'refresh');
            } else {
                $messages = [
                    'type' => 'error',
                    'text' => 'Gagal menghapus data!',
                ];
                $this->session->set_flashdata('message', $messages);
                redirect(base_url('topik-skripsi'), 'refresh');
            }
        } else {
            redirect('dashboard');
        }
    }

    public function _rules()
    {
        return [
            [
                'field' => 'nama_topik_skripsi',
                'name' => 'Nama topik skripsi',
                'rules' => 'required'
            ]
        ];
    }
}

/* End of file Topik.php */
