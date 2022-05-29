<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?> &mdash; Cosine Similarity</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
<style>
    .navbar-bg {
        height: 70px !important;
    }

    body {
        background: #1369db33;
    }

    .main-content {
        padding-top: 80px !important;
    }

    .footer-left {
        color: black;
    }

    ul.navbar-nav.navbar-right {
        background: #72a4e4 !important;
        border-radius: 20px;
    }
    #input-title{
        box-sizing: border-box;
        border: 2px solid #1369dbd4;
    }
    #input-title::placeholder{
        font-style: italic;
    }
</style>
<body class="layout-3">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a href="<?php echo base_url(); ?>dist/index" class="navbar-brand sidebar-gone-hide">Aplikasi
                    Plagiarisme</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <ul class="navbar-nav navbar-right ml-auto">
                    <li>
                        <a target="_blank" href="<?php echo base_url('login') ?>"
                           class="nav-link nav-link-lg nav-link-user">
                            Login Kaprodi
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Halaman Cek Judul Skripsi</h2>
                    <p class="section-lead">
                        Silahkan masukkan judul skripsi yang ingin Anda ajukan sebagai penelitian.
                    </p>
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Cek Judul Skripsi</h4>
                        </div>
                        <div class="card-body pt-0">
                            <form action="<?php echo "" ?>" method="POST">
                                <div class="form-group">
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" class="form-control form-control-lg" required id="input-title"
                                               name="title" autofocus autocomplete="off"
                                               placeholder="Ketik judul skripsi disini..." aria-label="Input title">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <span class="mr-2">Cek Judul</span>
                                                <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; <?php echo date('Y') ?>
                <div class="bullet"></div>
                Aplikasi Cek Plagiarisme Judul Skripsi <i>(Cosine Similarity)</i>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>
</html>


