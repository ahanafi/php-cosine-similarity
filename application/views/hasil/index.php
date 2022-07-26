<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Hasil Cek Plagiarisme</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Hasil Cek Plagiarisme Judul Skripsi
            </h2>
            <p class="section-lead">Daftar data Judul Skripsi</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th width="30px">#</th>
                                        <th>Judul Skripsi</th>
                                        <th width="80px">Tingkat Kemiripan (%)</th>
                                        <th width="120px">Status</th>
                                        <th width="60">Tanggal Pengecekan</th>
                                        <th width="100px" class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($hasil_uji) > 0): ?>
                                        <?php foreach ($hasil_uji as $judul): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $judul->judul; ?></td>
                                                <td><?php echo $judul->kemiripan; ?></td>
                                                <td><?php echo $judul->status; ?></td>
                                                <td><?php echo $judul->tanggal; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('cek-plagiarisme/detail/' . $judul->id_uji_plagiarisme); ?>"
                                                       class="btn btn-light">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="text-center text-info font-weight-bold" colspan="6">
                                                Tidak ada data.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->