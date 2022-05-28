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

	    $total_pelanggan = 100;
	    $total_supplier = 1102;
	    $total_nota_penjualan = 1102;
        $total_nota_supplier = 400;
        $total_retur_penjualan = 1102;
        $total_retur_supplier = 42;
	    $data = [
            'title' => 'Dashboard',
            'total_pelanggan' => $total_pelanggan,
            'total_supplier' => $total_supplier,
            'total_nota_penjualan' => $total_nota_penjualan,
            'total_nota_supplier' => $total_nota_supplier,
            'total_retur_penjualan' => $total_retur_penjualan,
            'total_retur_supplier' => $total_retur_supplier,
        ];

        $this->main_lib->getTemplate("dashboard/index", $data);
	}

}

/* End of file Dashboard.php */
