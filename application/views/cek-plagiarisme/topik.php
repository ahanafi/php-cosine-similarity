<?php $this->load->view('cek-plagiarisme/header') ?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Halaman Data Topik Skripsi</h2>
                <p class="section-lead">
                    Daftar topik penelitian.
                </p>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Topik Skripsi</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered" id="data-table">
                                <thead>
                                <tr>
                                    <th width="30px;">No.</th>
                                    <th>Nama Topik Skripsi</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (count($topik_skripsi) > 0): ?>
                                    <?php foreach ($topik_skripsi as $topik): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $topik->nama_topik_skripsi; ?></td>
                                            <td><?php echo $topik->keterangan; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center text-info font-weight-bold" colspan="7">
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
        </section>
    </div>
<?php $this->load->view('cek-plagiarisme/footer') ?>