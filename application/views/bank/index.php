<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Bank</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Bank
                <a href="<?php echo base_url('bank/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Bank
                </a>
            </h2>
            <p class="section-lead">Daftar akun Bank</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Bank</th>
                                        <th>No. Rekening</th>
                                        <th>Nama Rekening</th>
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($banks) > 0): ?>
                                        <?php foreach ($banks as $bank): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $bank->nama_bank; ?></td>
                                                <td><?php echo $bank->no_rekening; ?></td>
                                                <td><?php echo $bank->nama_rekening; ?></td>
                                                <td><?php echo $bank->alamat; ?></td>
                                                <td><?php echo $bank->kontak; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('bank/edit/' . $bank->id_bank); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('bank', <?php echo $bank->id_bank; ?>)">
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