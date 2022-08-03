<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand border-primary mt-2">
			
			<img src="<?php echo base_url(); ?>assets/img/ucic.png" class="img-fluid" style="height: 100px;">

            <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard'); ?>"></a>
		</div>

		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('dashboard'); ?>">AP</a>
		</div>
		
		<ul class="sidebar-menu mt-5">
			<li class="<?= $uri1 == '' || $uri1 == 'dashboard' ? 'active' : ''; ?>">
				<a href="<?= base_url('dashboard'); ?>" class="nav-link">
					<i class="fas fa-fire"></i><span>Dashboard</span>
				</a>
			</li>
			<li class="dropdown <?= $uri1 == 'topik-skripsi' || $uri1 == 'topik' ? 'active' : ''; ?>">
				<a href="<?= base_url('topik-skripsi'); ?>" class="nav-link">
					<i class="fas fa-list-alt"></i><span>Kelola Topik Skripsi</span>
				</a>
			</li>
            <li class="dropdown <?= $uri1 == 'judul-skripsi' ? 'active' : ''; ?>">
				<a href="<?= base_url('judul-skripsi'); ?>" class="nav-link">
					<i class="fas fa-book-open"></i><span>Kelola Judul Skripsi</span>
				</a>
			</li>
            <li class="dropdown <?= $uri1 == 'cek-plagiarisme' && ($uri2 === 'hasil' || $uri2 === 'detail') ? 'active' : ''; ?>">
				<a href="<?= base_url('cek-plagiarisme/hasil'); ?>" class="nav-link">
					<i class="fas fa-check-double"></i><span>Hasil Cek Plagiarisme</span>
				</a>
			</li>
			<li class="dropdown <?= $uri1 == 'user' ? 'active' : ''; ?>">
				<a href="<?= base_url('user'); ?>" class="nav-link">
					<i class="fas fa-users"></i><span>Pengguna</span>
				</a>
			</li>
		</ul>
		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="#" onclick="showConfirmLogout()" class="btn btn-danger btn-lg btn-block btn-icon-split">
				<i class="fas fa-power-off"></i> <span>Logout</span>
			</a>
		</div>
	</aside>
</div>
