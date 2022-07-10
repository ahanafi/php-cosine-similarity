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
                <li class="">
                    <a href="<?php echo base_url('login') ?>" class="nav-link nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block">
                            Login Kaprodi
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
