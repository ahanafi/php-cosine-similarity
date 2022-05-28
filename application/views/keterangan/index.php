<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Keterangan</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Keterangan
                <a href="<?php echo base_url('keterangan/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Keterangan
                </a>
            </h2>
            <p class="section-lead">Daftar akun Keterangan</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="20%;">Nama Keterangan</th>
                                        <th style="width: 65%;">Penjelasan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($keterangans) > 0): ?>
                                        <?php foreach ($keterangans as $keterangan): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $keterangan->nama_keterangan; ?></td>
                                                <td><?php echo $keterangan->penjelasan; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('keterangan/edit/' . $keterangan->id_keterangan); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('keterangan', <?php echo $keterangan->id_keterangan; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="text-center text-info font-weight-bold" colspan="4">
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