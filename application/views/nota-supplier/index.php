<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nota Supplier</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Nota Supplier
                <a href="<?php echo base_url('nota-supplier/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Nota
                </a>
            </h2>
            <p class="section-lead">Daftar Nota Supplier</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <table id='data-table' class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Nota</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total</th>
                                        <th>Total HPP</th>
                                        <th>Supplier</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($notasupplier) > 0): ?>
                                        <?php foreach ($notasupplier as $supplier): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $supplier->no_nota; ?></td>
                                                <td><?php echo $supplier->tanggal; ?></td>
                                                <td><?php echo $supplier->nama_pelanggan; ?></td>
                                                <td><?php echo $supplier->total; ?></td>
                                                <td><?php echo $supplier->total_hpp; ?></td>
                                                <td><?php echo $supplier->nama_supplier; ?></td>
                                                <td class="text-center"><?php echo ($supplier->status==1?'YES':'NO'); ?></td>
                                                <td class="text-center">
                                                  <?php if($supplier->status!=1):?>
                                                    <a href="<?php echo base_url('nota-supplier/edit/' . $supplier->id_nota_pembelian); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('Nota Pembelian', <?php echo $supplier->id_nota_pembelian; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                  <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
