<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Judul_skripsi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isAuthenticated()) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data Judul skripsi',
            'judul_skripsi' => $this->Judul_skripsi->all(),
            'no' => 1
        ];
        $this->main_lib->getTemplate('judul-skripsi/index', $data);
    }

    public function create()
    {
        $data = [
            'study_program' => getStudyProgram(),
            'title' => 'Tambah Judul skripsi',
            'topik_skripsi' => $this->Topik->all()
        ];

        if (isset($_POST['submit'])) {
            $rules = $this->_rules();
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('judul-skripsi/form-create', $data);
            } else {
                $judul_skripsi_data = $this->getPostData();

                $insert = $this->Judul_skripsi->insert($judul_skripsi_data);
                if ($insert) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Judul skripsi berhasil ditambahkan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menambahkan data Judul skripsi baru!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('judul-skripsi'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('judul-skripsi/form-create', $data);
        }
    }

    public function edit($id_judul_skripsi)
    {
        if (empty(trim($id_judul_skripsi))) {
            redirect(base_url('judul-skripsi'));
        }

        $judul_skripsi = $this->Judul_skripsi->findById(['id_judul_skripsi' => $id_judul_skripsi]);
        $data = [
            'title' => 'Edit Judul skripsi',
            'study_program' => getStudyProgram(),
            'judul' => $judul_skripsi,
            'topik_skripsi' => $this->Topik->all()
        ];

        if (isset($_POST['update'])) {
            $rules = $this->_rules();
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('judul-skripsi/form-update', $data);
            } else {
                $judul_skripsi_data = $this->getPostData();

                $update = $this->Judul_skripsi->update($judul_skripsi_data, ['id_judul_skripsi' => $id_judul_skripsi]);
                if ($update) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Judul skripsi berhasil disimpan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menyimpan data Judul skripsi!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('judul-skripsi'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('judul-skripsi/form-update', $data);
        }
    }

    public function delete($id_judul_skripsi)
    {
        if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
            $data_id = $this->main_lib->getPost('data_id');
            $data_type = $this->main_lib->getPost('data_type');

            if ($data_id === $id_judul_skripsi && $data_type === 'judul-skripsi') {
                $delete = $this->Judul_skripsi->delete(['id_judul_skripsi' => $data_id]);
                if ($delete) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data Judul skripsi berhasil dihapus!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menghapus data Judul skripsi!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('judul-skripsi'), 'refresh');
            } else {
                $messages = [
                    'type' => 'error',
                    'text' => 'Gagal menghapus data!',
                ];
                $this->session->set_flashdata('message', $messages);
                redirect(base_url('judul-skripsi'), 'refresh');
            }
        } else {
            redirect('dashboard');
        }
    }

    private function getPostData()
    {
        return [
            'nim' => $this->main_lib->getPost('nim'),
            'nama_mahasiswa' => $this->main_lib->getPost('nama_mahasiswa'),
            'program_studi' => $this->main_lib->getPost('program_studi'),
            'id_topik_skripsi' => $this->main_lib->getPost('topik_skripsi_id'),
            'judul' => $this->main_lib->getPost('judul_skripsi'),
            'tahun_skripsi' => $this->main_lib->getPost('tahun'),
        ];
    }

    public function import()
    {
        if (isset($_POST['import'])) {
            $uploadConfig = [
                'upload_path' => './uploads/',
                'allowed_types' => 'xls|xlsx',
                'file_ext_tolower' => TRUE,
                'encrypt_name' => TRUE
            ];

            $this->load->library('upload');
            $this->upload->initialize($uploadConfig);

            if ($this->upload->do_upload('file')) {

                $uploadedData = $this->upload->data();
                $uploadedFile = $uploadedData['full_path'];
                $reader = new Xlsx();
                $spreadsheet = $reader->load($uploadedFile);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $dataSkripsi = [];

                for ($i = 1, $iMax = count($sheetData); $i < $iMax; $i++) {
                    $rowData = $sheetData[$i];

                    $nim = $rowData[1];             // Index 1 => Nim
                    $namaMahasiswa = $rowData[2];   // Index 2 => Nama Mahasiswa
                    $programStudi = $rowData[3];    // Index 3 => Program Studi
                    $tahunSkripsi = $rowData[4];
                    $judulSkripsi = $rowData[5];
                    $topikSkripsi = $rowData[6];

                    $checkJudulByNim = $this->Judul_skripsi->findById(['nim' => $nim]);

                    // Judul belum ada di database
                    if (!$checkJudulByNim) {
                        $idTopikSkripsi = 1;

                        if ($topikSkripsi !== '') {
                            // Cek topik skripsi
                            $cekTopik = $this->Topik->getBy('nama_topik_skripsi', $topikSkripsi);

                            if ($cekTopik) {
                                $idTopikSkripsi = $cekTopik->id_topik_skripsi;
                            } else {
                                $this->Topik->insert([
                                    'nama_topik_skripsi' => $topikSkripsi,
                                    'keterangan' => $topikSkripsi
                                ]);

                                $idTopikSkripsi = $this->Topik->getLastInsertID();
                            }
                        }


                        // Tampung data di dalam variabel array
                        $dataSkripsi[] = [
                            'nim' => $nim,
                            'nama_mahasiswa' => stripslashes($namaMahasiswa),
                            'program_studi' => $programStudi,
                            'tahun_skripsi' => $tahunSkripsi,
                            'judul' => $judulSkripsi,
                            'id_topik_skripsi' => $idTopikSkripsi
                        ];
                    } else {

                        // Update by nim
                        $this->Judul_skripsi->update([
                            'nama_mahasiswa' => stripslashes($namaMahasiswa),
                            'program_studi' => $programStudi,
                            'tahun_skripsi' => $tahunSkripsi,
                            'judul' => $judulSkripsi,
                        ], ['nim' => $nim]);
                    }
                }

                unlink($uploadedFile);

                $insertJudul = $this->Judul_skripsi->insert($dataSkripsi, true);

                if ($insertJudul) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data judul skripsi berhasil diimpor.!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal mengimpor data judul skripsi!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);

                $redirectUrl = base_url('judul-skripsi');
                redirect($redirectUrl);

            } else {
                $error = $this->upload->display_errors("", "");
                $error = str_replace(" ", "-", $error);
                redirect(base_url('dosen') . '?show_modal=true&errmsg=' . $error);
            }
        } else {
            redirect(base_url('judul-skripsi'));
        }
    }

    public function download_format()
    {
        $pathFile = FCPATH . 'examples/format-import.xlsx';
        if (file_exists($pathFile)) {
            $this->load->helper('download');
            $fileName = 'Format-Import-Data-Skripsi.xlsx';
            force_download($fileName, file_get_contents($pathFile));
        } else {
            $this->session->set_flashdata('message', [
                'type' => 'error',
                'text' => 'File tidak ditemukan.'
            ]);
            redirect(base_url('judul-skripsi'), 'refresh');
        }
    }

    public function _rules()
    {
        return [
            [
                'field' => 'nim',
                'label' => 'nim',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_mahasiswa',
                'label' => 'nama_mahasiswa',
                'rules' => 'required'
            ],
            [
                'field' => 'program_studi',
                'label' => 'program_studi',
                'rules' => 'required'
            ],
            [
                'field' => 'topik_skripsi_id',
                'label' => 'topik_skripsi_id',
                'rules' => 'required'
            ],
            [
                'field' => 'judul_skripsi',
                'label' => 'judul_skripsi',
                'rules' => 'required'
            ],
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules' => 'required'
            ],
        ];
    }
}

/* End of file Judul_skripsi.php */
