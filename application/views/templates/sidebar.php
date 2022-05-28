<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

$pembayaran_penjualan_submenu = [
    'bank', 'keterangan', 'jenis-bayar', 'daftar-bayar', 'uang-masuk',
	'pembayaran-piutang'
];
$pembayaran_penjualan = "";
if (in_array($uri1, $pembayaran_penjualan_submenu)) {
    $pembayaran_penjualan = "active ";
}

?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand border-bottom border-primary">
			<a class="text-primary" href="<?= base_url('dashboard'); ?>">Cosine Similarity</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('dashboard'); ?>">CA</a>
		</div>
		<ul class="sidebar-menu">
			<li class="<?= $uri1 == '' || $uri1 == 'dashboard' ? 'active' : ''; ?>">
				<a href="<?= base_url('dashboard'); ?>" class="nav-link">
					<i class="fas fa-fire"></i><span>Dashboard</span>
				</a>
			</li>
			<?php if(showOnlyTo("1")): ?>
			<li class="dropdown <?= $uri1 == 'user' ? 'active' : ''; ?>">
				<a href="<?= base_url('user'); ?>" class="nav-link">
					<i class="fas fa-user-alt"></i><span>Pengguna</span>
				</a>
			</li>
			<li class="dropdown <?= $uri1 == 'utility' ? 'active' : ''; ?>">
				<a href="<?= base_url('utility'); ?>" class="nav-link">
					<i class="fas fa-database"></i><span>Backup &amp; Restore Data</span>
				</a>
			</li>
			<?php endif; ?>
		</ul>
		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="#" onclick="showConfirmLogout()" class="btn btn-danger btn-lg btn-block btn-icon-split">
				<i class="fas fa-power-off"></i> <span>Logout</span>
			</a>
		</div>
	</aside>
</div>
