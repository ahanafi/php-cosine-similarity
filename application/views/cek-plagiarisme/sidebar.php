<?php
defined('BASEPATH') or exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

?>
<div class="main-sidebar sidebar-style-2" id="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand border-primary mt-2">

            <img src="<?php echo base_url(); ?>assets/img/ucic.png" class="img-fluid" style="height: 100px;">

            <a class="navbar-brand brand-logo-mini" href="<?= base_url('cek-plagiarisme'); ?>"></a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('cek-plagiarisme'); ?>"></a>
        </div>
        <ul class="sidebar-menu mt-5">

            <div class="form-group">
               <li class="<?= $uri1 == 'cek-plagiarisme' && $uri2 == '' ? 'active' : ''; ?>">
                    <a href="<?= base_url('cek-plagiarisme'); ?>" class="nav-link">
                        <i class="fas fa-fire"></i><span>Cek Plagiarisme</span>
                    </a>
                </li>
                <li class="<?= $uri1 == 'hasil-cek-plagiarisme' && $uri2 == '' ? 'active' : ''; ?>">
                    <a href="<?= base_url('hasil-cek-plagiarisme'); ?>" class="nav-link">
                        <i class="fas fa-check-double"></i><span>Hasil Cek Plagiarisme</span>
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
