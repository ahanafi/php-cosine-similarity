<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><?php echo $title; ?> &mdash;</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/my-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<link rel="icon shortcut" href="<?php echo base_url('assets/img/logo.svg')?>">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>
<style>
    body {
        background: url("<?php echo base_url('assets/img/bg.jpg'); ?>") !important;
        background-size: cover;
        background-position: center;
    }

    .login-brand {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0;
    }

    .login-brand img {
        width: 180px;
    }
</style>
<body>
<div id="app my-form-login">
    <section class="section">
        <div class="container" style="margin-top: 7.5%;">
            <div class="row">
                <div class="col-5 col-sm-6 offset-sm-2 col-md-4 offset-md-2 col-lg-4 offset-lg-2 col-xl-4 offset-xl-4">
                   
                    <div class="card card-primary">

                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>assets/img/ucic.png" alt="logo" width="300">
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('auth'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" value="<?php echo set_value('email') ?>" name="email" tabindex="1" required autofocus autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="submit">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Sistem Deteksi Kemiripan Judul Skripsi | 2022 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Template JS File -->
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<?php if(isset($_SESSION['message']) && $_SESSION['message'] != ''): ?>
    <script>
        swal({
            title: '<?php echo ucfirst($_SESSION['message']['type']); ?>',
            text: '<?php echo $_SESSION['message']['text']; ?>',
            icon: '<?php echo $_SESSION['message']['type']; ?>',
            timer: 2000
        });
    </script>
<?php endif; $_SESSION['message'] = ''; ?>
</body>
</html>