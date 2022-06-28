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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Responsive-2.2.1/css/responsive.bootstrap4.min.css">

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

    #input-title {
        box-sizing: border-box;
        border: 2px solid #1369dbd4;
    }

    #input-title::placeholder {
        font-style: italic;
    }
</style>
<body class="layout-3">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a href="<?php echo base_url(); ?>" class="navbar-brand sidebar-gone-hide">Aplikasi
                    Plagiarisme</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url('cek-plagiarisme/topik-skripsi') ?>" class="nav-link">Topik Skripsi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url('cek-plagiarisme/judul-skripsi') ?>" class="nav-link">Judul Skripsi</a></li>
                    </ul>
                </div>
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