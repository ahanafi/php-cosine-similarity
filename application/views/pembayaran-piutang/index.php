<style>
    .table-responsive {
        width: auto; !important;
        overflow-x: scroll !important;
    }
    .table {
        width: 120% !important;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran Piutang</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Pembayaran Piutang
                <a href="<?php echo base_url('pembayaran-piutang/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Pembayaran Piutang
                </a>
            </h2>
            <p class="section-lead">Daftar data Pembayaran Piutang</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Bank</th>
                                        <th>Jenis Bayar</th>
                                        <th>Keterangan Bayar</th>
                                        <th>Jumlah</th>
                                        <th>Potongan Lain-lain</th>
                                        <th>Keterangan Lain-lain</th>
                                        <th>Status</th>
                                        <th>Saldo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($pembayaran_piutang) > 0): ?>
                                        <?php foreach ($pembayaran_piutang as $p): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p->tanggal; ?></td>
                                                <td><?php echo $p->nama_pelanggan; ?></td>
                                                <td><?php echo $p->nama_bank; ?></td>
                                                <td><?php echo $p->nama_jenis_bayar; ?></td>
                                                <td><?php echo $p->nama_keterangan; ?></td>
                                                <td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($p->jumlah); ?>,-</td>
                                                <td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($p->potongan_lain_lain); ?>,-</td>
                                                <td><?php echo $p->keterangan_lain_lain; ?></td>
                                                <td><?php echo getStatus($p->status); ?></td>
                                                <td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($p->saldo); ?>,-</td>
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