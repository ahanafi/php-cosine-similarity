<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Judul Skripsi</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Judul Skripsi
                <div class="float-right">
                    <a href="#" data-toggle="modal" data-target="#form-import-modal"
                       class="btn btn-success btn-icon icon-left">
                        <i class="fa fa-file-download"></i>
                        Import Data
                    </a>
                    <a href="<?php echo base_url('judul-skripsi/create'); ?>"
                       class="btn btn-primary btn-icon icon-left">
                        <i class="fa fa-plus"></i>
                        Tambah Judul Skripsi
                    </a>
                </div>
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
                                        <th width="80px">NIM</th>
                                        <th width="120px">Nama Mahasiswa</th>
                                        <th width="60">Prodi</th>
                                        <th>Judul Skripsi</th>
                                        <th width="70px">Topik</th>
                                        <th width="60px">Tahun Skripsi</th>
                                        <th class="text-center">Aksi</th>
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
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('judul-skripsi/edit/' . $judul->id_judul_skripsi); ?>"
                                                       class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light"
                                                       onclick="showConfirmDelete('judul-skripsi', <?php echo $judul->id_judul_skripsi; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
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
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="form-import-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('judul-skripsi/import'); ?>" id="form-logo" method="POST"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Form Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <label for="inputFile">Pilih File</label>
                    <input type="file" name="file" id="inputFile" class="form-control" required>
                    <?php
                    if (isset($_GET['errmsg']) && $_GET['errmsg'] !== '') {
                        $errorMessage = str_replace("-", " ", $_GET['errmsg']);
                        echo "<small class='form-text text-danger'>$errorMessage</small>";
                    }
                    ?>
                    <div class="alert alert-light mt-2 mb-0">
                        <b>Perhatian</b>
                        <ul class="pl-3 mb-0">
                            <li>Format foto yang didukung : <i><b>XLS atau XLSX</b></i></li>
                            <li>Pastikan format import data sudah sesuai dengan template import.</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <div class="mr-auto">
                        <a href="<?php echo base_url('judul-skripsi/download-format') ?>" class="btn btn-light">Download Template</a>
                    </div>
                    <button type="submit" name="import" class="btn btn-primary">Import Data</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>