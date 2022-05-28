<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelanggan</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Pelanggan
                <a href="<?php echo base_url('pelanggan/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Pelanggan
                </a>
            </h2>
            <p class="section-lead">Daftar akun Pelanggan</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Kontak</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($pelanggans) > 0): ?>
                                        <?php foreach ($pelanggans as $pelanggan): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $pelanggan->nama_pelanggan; ?></td>
                                                <td><?php echo $pelanggan->alamat; ?></td>
                                                <td><?php echo $pelanggan->kota; ?></td>
                                                <td><?php echo $pelanggan->kontak; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('pelanggan/edit/' . $pelanggan->id_pelanggan); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('pelanggan', <?php echo $pelanggan->id_pelanggan; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
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