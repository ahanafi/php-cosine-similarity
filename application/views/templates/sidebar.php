<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand border-bottom border-primary">
			<a class="text-primary" href="<?= base_url('dashboard'); ?>">Aplikasi Plagiarisme</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('dashboard'); ?>">AP</a>
		</div>
		<ul class="sidebar-menu">
			<li class="<?= $uri1 == '' || $uri1 == 'dashboard' ? 'active' : ''; ?>">
				<a href="<?= base_url('dashboard'); ?>" class="nav-link">
					<i class="fas fa-fire"></i><span>Dashboard</span>
				</a>
			</li>
			<li class="dropdown <?= $uri1 == 'topik-skripsi' || $uri1 == 'topik' ? 'active' : ''; ?>">
				<a href="<?= base_url('topik-skripsi'); ?>" class="nav-link">
					<i class="fas fa-list-alt"></i><span>Topik Skripsi</span>
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
