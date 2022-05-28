<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Retur Penjualan</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Retur Penjualan
                <a href="<?php echo base_url('retur-penjualan/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Retur Penjualan
                </a>
            </h2>
            <p class="section-lead">Daftar Data Retur Penjualan</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. retur</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th class="text-center">Total</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($retur_penjualan) > 0): ?>
                                        <?php foreach ($retur_penjualan as $retur): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $retur->no_retur; ?></td>
                                                <td><?php echo $retur->tanggal; ?></td>
                                                <td><?php echo $retur->nama_pelanggan; ?></td>
                                                <td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($retur->total); ?>,-</td>
                                                <td><?php echo getStatus($retur->status); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('retur-penjualan/edit/' . $retur->id_retur_penjualan); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('retur-penjualan', <?php echo $retur->id_retur_penjualan; ?>)">
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