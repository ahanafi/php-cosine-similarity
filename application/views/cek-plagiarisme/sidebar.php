<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand border-bottom border-primary">
			<a class="text-primary" href="<?= base_url('cek-plagiarisme'); ?>">Aplikasi Plagiarisme</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('cek-plagiarisme'); ?>">AP</a>
		</div>
		<ul class="sidebar-menu">
			<li class="<?= $uri1 == 'cek-plagiarisme' && $uri2 == '' ? 'active' : ''; ?>">
				<a href="<?= base_url('cek-plagiarisme'); ?>" class="nav-link">
					<i class="fas fa-fire"></i><span>Cek Plagiarsime</span>
				</a>
			</li>
			<li class="dropdown <?= $uri2 == 'topik-skripsi' || $uri2 == 'topik' ? 'active' : ''; ?>">
				<a href="<?= base_url('cek-plagiarisme/topik-skripsi'); ?>" class="nav-link">
					<i class="fas fa-list-alt"></i><span>Topik Skripsi</span>
				</a>
			</li>
            <li class="dropdown <?= $uri2 == 'judul-skripsi' ? 'active' : ''; ?>">
				<a href="<?= base_url('cek-plagiarisme/judul-skripsi'); ?>" class="nav-link">
					<i class="fas fa-book-open"></i><span>Judul Skripsi</span>
				</a>
			</li>
		</ul>
	</aside>
</div>
