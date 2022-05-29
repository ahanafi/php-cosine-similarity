<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->main_lib->createFirstUser();
    }

    public function index() {
        if(isAuthenticated()) {
            redirect(base_url('dashboard'));
        }

	    if(isset($_POST['submit'])) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $rules = [
				[
					'field' => 'email',
					'label'	=> 'E-mail',
					'rules' => 'required'
				],
				[
					'field' => 'password',
					'label'	=> 'Password',
					'rules' => 'required'
				]
			];
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

            if ($this->form_validation->run() === FALSE) {
                $data = ['title' => "Login - Cosine Similarity"];
                $this->load->view('auth/form-login', $data);
            } else {
                $credentials = [
                    'email' => $email,
                    'password' => $password
                ];
                $login = $this->Auth->login($credentials);
                if ($login) {
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Oops! Username atau Password Anda salah!'
					]);
					redirect(base_url('auth'));
				}
            }

        } else {
            $data = ['title' => "Login - Cosine Similarity"];
            $this->load->view('auth/form-login', $data);
        }
	}

	public function logout()
    {
        if (isset($_POST['logout']) && $_POST['logout'] == 'TRUE') {
            $this->session->sess_destroy();
            $this->session->unset_userdata('user');
            redirect('login');
        } else {
            echo "<script>window.history.back();</script>";
        }

    }
}
