<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
        provideAccessTo("1");
        $data = [
            'title' => 'Data Pengguna',
            'users' => $this->User->all(),
            'no' => 1
        ];
        $this->main_lib->getTemplate('user/index', $data);
    }

    public function create()
    {
        provideAccessTo("1");

        $list_user_levels = [
            'KAPRODI',
            'ADMIN'
        ];

        $data = [
            'title' => 'Tambah Pengguna',
            'user_levels' => $list_user_levels
        ];

        if (isset($_POST['submit'])) {
            $rules = $this->_rules('create');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('user/form-create', $data);
            } else {
                $password = $this->input->post('password');
                $user_data = [
                    'nama_lengkap' => $this->main_lib->getPost('nama_lengkap'),
                    'username' => $this->main_lib->getPost('username'),
                    'email' => $this->main_lib->getPost('email'),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'level' => $this->main_lib->getPost('level')
                ];

                $insert = $this->User->insert($user_data);
                if ($insert) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data pengguna berhasil ditambahkan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menambahkan pengguna baru!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('user'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('user/form-create', $data);
        }
    }

    public function edit($user_id)
    {
        provideAccessTo("1");

        if (empty(trim($user_id))) {
            redirect(base_url('user'));
        }

        $list_user_levels = [
            'KAPRODI',
            'ADMIN'
        ];

        $user = $this->User->findById(['id_pengguna' => $user_id]);
        $data = [
            'title' => 'Edit Pengguna',
            'user' => $user,
            'user_levels' => $list_user_levels
        ];

        if (isset($_POST['update'])) {
            $rules = $this->_rules('update');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

            if ($this->form_validation->run() === FALSE) {
                $this->main_lib->getTemplate('user/form-update', $data);
            } else {
                $user_data = [
                    'nama_lengkap' => $this->main_lib->getPost('nama_lengkap'),
                    'username' => $this->main_lib->getPost('username'),
                    'email' => $this->main_lib->getPost('email'),
                    'password' => password_hash($this->main_lib->getPost('password'), PASSWORD_DEFAULT),
                    'level' => $this->main_lib->getPost('level')
                ];

                $update = $this->User->update($user_data, ['id_pengguna' => $user_id]);
                if ($update) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data pengguna berhasil disimpan!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menyimpan data pengguna!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('user'), 'refresh');
            }
        } else {
            $this->main_lib->getTemplate('user/form-update', $data);
        }
    }

    public function delete($user_id)
    {
        provideAccessTo("1");
        if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
            $data_id = $this->main_lib->getPost('data_id');
            $data_type = $this->main_lib->getPost('data_type');

            if ($data_id === $user_id && $data_type === 'user') {
                $delete = $this->User->delete(['id_pengguna' => $data_id]);
                if ($delete) {
                    $messages = [
                        'type' => 'success',
                        'text' => 'Data pengguna berhasil dihapus!',
                    ];
                } else {
                    $messages = [
                        'type' => 'error',
                        'text' => 'Gagal menghapus data pengguna!'
                    ];
                }

                $this->session->set_flashdata('message', $messages);
                redirect(base_url('user'), 'refresh');
            } else {
                $messages = [
                    'type' => 'error',
                    'text' => 'Gagal menghapus data!',
                ];
                $this->session->set_flashdata('message', $messages);
                redirect(base_url('user'), 'refresh');
            }
        } else {
            redirect('dashboard');
        }
    }

    public function _rules($type)
    {
        $rules = [
            [
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required|alpha_numeric_spaces'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[pengguna.username]'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|is_unique[pengguna.email]|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required|min_length[6]'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'confirm_password',
                'rules' => 'required|matches[password]|trim'
            ],
            [
                'field' => 'level',
                'label' => 'level',
                'rules' => 'required|trim'
            ],
        ];

        if ($type == "update") {
            $rules = [
                [
                    'field' => 'nama_lengkap',
                    'label' => 'Nama Lengkap',
                    'rules' => 'required|alpha_numeric_spaces'
                ],
                [
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'required|valid_email'
                ],
                [
                    'field' => 'level',
                    'label' => 'level',
                    'rules' => 'required|trim'
                ],
            ];
        }

        return $rules;
    }

    public function profile()
    {
        $id_pengguna = getUser('id_pengguna');
        $data = [
            'title' => 'Profil pengguna',
            'user' => $this->User->findById(['id_pengguna' => $id_pengguna])
        ];
        $this->main_lib->getTemplate("user/profile", $data);
    }
}

/* End of file User.php */
