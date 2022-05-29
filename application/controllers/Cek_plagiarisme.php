<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_plagiarisme extends CI_Controller {

	public function index()
	{
		$data = [
				'title' => 'Cek Judul'
		];

		$this->load->view('cek-plagiarisme/form', $data);
	}

}

/* End of file Cek_plagiarisme.php */
