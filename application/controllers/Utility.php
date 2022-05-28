<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends CI_Controller {

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
				'title' => 'Backup dan Retore Database'
		];

		$this->main_lib->getTemplate("utility/index", $data);
	}

}

/* End of file Utility.php */
