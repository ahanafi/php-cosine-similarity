<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Retur Supplier</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Retur Supplier
                <a href="<?php echo base_url('retur-supplier/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah
                </a>
            </h2>
            <p class="section-lead">Daftar Retur Supplier</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id='table-1'>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Retur</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total</th>
                                        <th class="text-center">Status</th>
                                        <th>Potong</th>
                                        <th class="text-center">Lunas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($retursupplier) > 0): ?>
                                        <?php foreach ($retursupplier as $ret_sup): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $ret_sup->no_retur; ?></td>
                                                <td><?php echo $ret_sup->tanggal; ?></td>
                                                <td><?php echo $ret_sup->nama_supplier; ?></td>
                                                <td><?php echo $ret_sup->total; ?></td>
                                                <td class="text-center"><?php echo ($ret_sup->status==1?'YES':'NO'); ?></td>
                                                <td></td>
                                                <td class="text-center">
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
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
