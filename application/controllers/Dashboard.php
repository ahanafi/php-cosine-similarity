<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();

    	if(!isAuthenticated()) {
    	    redirect(base_url('auth'));
        }
    }

    public function index()
	{
	    provideAccessTo("all");

	    $total_judul_skripsi = $this->Judul_skripsi->count();
	    $total_topik_skripsi = $this->Topik->count();
	    $data = [
            'title' => 'Dashboard',
            'total_judul_skripsi' => $total_judul_skripsi,
            'total_topik_skripsi' => $total_topik_skripsi,
        ];

        $this->main_lib->getTemplate("dashboard/index", $data);
	}

}

/* End of file Dashboard.php */
