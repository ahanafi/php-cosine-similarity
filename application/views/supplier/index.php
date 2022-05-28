<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Supplier</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Supplier
                <a href="<?php echo base_url('supplier/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Supplier
                </a>
            </h2>
            <p class="section-lead">Daftar akun Supplier</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                                <table id='data-table' class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Kontak</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($suppliers) > 0): ?>
                                        <?php foreach ($suppliers as $supplier): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td><?php echo $supplier->nama_supplier; ?></td>
                                                <td><?php echo $supplier->alamat; ?></td>
                                                <td><?php echo $supplier->kota; ?></td>
                                                <td><?php echo $supplier->kontak; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('supplier/edit/' . $supplier->id_supplier); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('supplier', <?php echo $supplier->id_supplier; ?>)">
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
    </section>
</div>
