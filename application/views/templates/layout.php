<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar bg-primary">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
					<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                             class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $_SESSION['user']->nama_lengkap; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url('user/profile'); ?>" class="dropdown-item has-icon">
                            <i class="far fa-user"></i>
							<span> Profil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" onclick="showConfirmLogout()" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
