<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Jenis Bayar</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Jenis Bayar
                <a href="<?php echo base_url('jenis-bayar/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Jenis Bayar
                </a>
            </h2>
            <p class="section-lead">Daftar akun Jenis Bayar</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="20%;">Nama Jenis Bayar</th>
                                        <th style="width: 65%;">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($jenis_bayars) > 0): ?>
                                        <?php foreach ($jenis_bayars as $jenis_bayar): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $jenis_bayar->nama_jenis_bayar; ?></td>
                                                <td><?php echo $jenis_bayar->keterangan; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('jenis-bayar/edit/' . $jenis_bayar->id_jenis_bayar); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('jenis-bayar', <?php echo $jenis_bayar->id_jenis_bayar; ?>)">
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