<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Topik Skripsi</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Topik Skripsi
                <a href="<?php echo base_url('topik-skripsi/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Topik Skripsi
                </a>
            </h2>
            <p class="section-lead">Daftar data Topik Skripsi</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="20%;">Nama Topik Skripsi</th>
                                        <th style="width: 65%;">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($topik_skripsi) > 0): ?>
                                        <?php foreach ($topik_skripsi as $topik): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $topik->nama_topik_skripsi; ?></td>
                                                <td><?php echo $topik->keterangan; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('topik-skripsi/edit/' . $topik->id_topik_skripsi); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('topik-skripsi', <?php echo $topik->id_topik_skripsi; ?>)">
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