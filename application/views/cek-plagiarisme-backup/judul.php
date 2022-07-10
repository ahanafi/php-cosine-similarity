<?php $this->load->view('cek-plagiarisme/header') ?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Halaman Data Judul Skripsi</h2>
                <p class="section-lead">
                    Daftar judul penelitian.
                </p>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Judul Skripsi</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md table-bordered" id="data-table">
                                <thead>
                                <tr>
                                    <th width="30px">#</th>
                                    <th width="80px">NIM</th>
                                    <th width="120px">Nama Mahasiswa</th>
                                    <th width="60">Prodi</th>
                                    <th>Judul Skripsi</th>
                                    <th width="70px">Topik</th>
                                    <th width="60px">Tahun Skripsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (count($judul_skripsi) > 0): ?>
                                    <?php foreach ($judul_skripsi as $judul): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $judul->nim; ?></td>
                                            <td><?php echo $judul->nama_mahasiswa; ?></td>
                                            <td><?php echo $judul->program_studi; ?></td>
                                            <td><?php echo $judul->judul; ?></td>
                                            <td><?php echo $judul->topik_skripsi; ?></td>
                                            <td><?php echo $judul->tahun_skripsi; ?></td>
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