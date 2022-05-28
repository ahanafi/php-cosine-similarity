<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Nota Penjualan</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Status Nota Penjualan
                <a href="<?php echo base_url('nota-penjualan/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Nota Penjualan
                </a>
            </h2>
            <p class="section-lead">Daftar akun Nota Penjualan</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Nota</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Supplier</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($nota_penjualan) > 0): ?>
                                        <?php foreach ($nota_penjualan as $nota): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $nota->no_nota; ?></td>
                                                <td><?php echo $nota->tanggal; ?></td>
                                                <td><?php echo $nota->nama_pelanggan; ?></td>
                                                <td><?php echo $nota->nama_supplier; ?></td>
                                                <td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($nota->total); ?>,-</td>
                                                <td class="text-center">
                                                    <?php if($nota->status == 0): ?>
                                                        <a href="<?php echo base_url('nota-penjualan/ubah-status/' . $nota->id_nota_penjualan); ?>" class="badge badge-primary">
                                                            DITERIMA
                                                        </a>
                                                    <?php else: ?>
                                                        <b><i><small>YES</small></i></b>
                                                    <?php endif; ?>
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