<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'authentication';
$route['404_override'] = 'Errorpage';
$route['translate_uri_dashes'] = TRUE;

//CUSTOM ROUTE LIST
$route['auth'] = 'Authentication';
$route['login'] = 'Authentication/index';
$route['logout'] = 'Authentication/logout';

//Restrict page route
$route['restrict-page'] = 'Errorpage/restrict_page';

$route['jenis-bayar'] = 'JenisBayar/index';
$route['jenis-bayar/create'] = 'JenisBayar/create';
$route['jenis-bayar/(:any)/(:num)'] = 'JenisBayar/$1/$2';

$route['nota-penjualan'] = 'NotaPenjualan/index';
$route['nota-penjualan/create'] = 'NotaPenjualan/create';
$route['nota-penjualan/status'] = 'NotaPenjualan/status';
$route['nota-penjualan/(:any)/(:num)'] = 'NotaPenjualan/$1/$2';
$route['nota-penjualan/get-total/(:any)'] = 'NotaPenjualan/getTotal/$1';

$route['retur-penjualan'] = 'ReturPenjualan/index';
$route['retur-penjualan/create'] = 'ReturPenjualan/create';
$route['retur-penjualan/status'] = 'ReturPenjualan/status';
$route['retur-penjualan/(:any)/(:num)'] = 'ReturPenjualan/$1/$2';
$route['retur-penjualan/get-total/(:any)'] = 'ReturPenjualan/getTotal/$1';

$route['pembayaran-piutang'] = 'PembayaranPiutang/index';
$route['pembayaran-piutang/create'] = 'PembayaranPiutang/create';
$route['pembayaran-piutang/status'] = 'PembayaranPiutang/status';
$route['pembayaran-piutang/(:any)/(:num)'] = 'PembayaranPiutang/$1/$2';

$route['pelanggan/get-detail/([a-z]+)/(:num)'] = 'Pelanggan/get_detail/$1/$2';

$route['nota-pembelian'] = 'NotaPembelian/index';
$route['nota-pembelian/create'] = 'NotaPembelian/create';
$route['nota-pembelian/(:any)/(:num)'] = 'NotaPembelian/$1/$2';
$route['daftar-nota-pembelian'] = 'NotaPembelian/daftar';

$route['daftar-bayar'] = 'DaftarBayar/index';
$route['daftar-bayar/create'] = 'DaftarBayar/create';
$route['daftar-bayar/(:any)/(:num)'] = 'DaftarBayar/$1/$2';

$route['uang-masuk'] = 'UangMasuk/index';
$route['uang-masuk/create'] = 'UangMasuk/create';
$route['uang-masuk/(:any)/(:num)'] = 'UangMasuk/$1/$2';

$route['uang-keluar'] = 'UangKeluar/index';
$route['uang-keluar/create'] = 'UangKeluar/create';
$route['uang-keluar/(:any)/(:num)'] = 'UangKeluar/$1/$2';

$route['transfer'] = 'transfer/index';
$route['transfer/create'] = 'transfer/create';
$route['transfer/(:any)/(:num)'] = 'transfer/$1/$2';

$route['retur-supplier'] = 'ReturSupplier/index';
$route['retur-supplier/create'] = 'ReturSupplier/create';
$route['retur-supplier/(:any)/(:num)'] = 'ReturSupplier/$1/$2';

$route['daftar-retur-supplier'] = 'ReturSupplier/daftar';

$route['nota-supplier'] = 'NotaSupplier/index';
$route['nota-supplier/create'] = 'NotaSupplier/create';
$route['nota-supplier/daftar'] = 'NotaSupplier/daftar';
$route['nota-supplier/status'] = 'NotaSupplier/status';
$route['nota-supplier/(:any)/(:num)'] = 'NotaSupplier/$1/$2';
