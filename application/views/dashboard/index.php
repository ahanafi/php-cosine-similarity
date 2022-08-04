<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary text-white">
                        <i class="fa fa-book-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Judul Skripsi</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_judul_skripsi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Topik Skripsi</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_topik_skripsi ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card" id="main-card">
                    <div class="card-header border-0">
                        <h4>Halaman Dashboard</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="min-height:400px;">
                        <p>
                            Selamat datang di Sistem Deteksi Kemiripan Judul Skripsi <br> Pada Program Studi Sistem Informasi
                        </p>
                    </div>
                </div>                
            </div>
        </div>
    </section>
</div>
<style>
    #main-card {
        color: #fff;
        background-color: #0C1021;
        background-image: url('<?php echo base_url('assets/img/photo21.jpg') ?>');
        background-size: cover;
        background-position: 0 50%;
    }

    #main-card div{
        background-color: rgba(5, 77, 158, 0.85) !important;
    }

    #main-card .card-body p {
        font-weight: bolder;
        text-align: center;
        font-style: italic;
        font-size: 1.5rem;
    }
</style>