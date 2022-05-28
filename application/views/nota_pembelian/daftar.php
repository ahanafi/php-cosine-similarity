<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Nota Pembelian</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
          <div class='card'>
            <div class='card-header'>
              <h4 class="section-title">Filter</h4>
            </div>
            <div class='card-body'>
              <form>
                <div class='form-group row'>
                  <label class='col-sm-3 col-form-label'>
                    Nama Pelanggan
                  </label>
                  <div class='col-sm-9'>
                    <select class='form-control select2'>
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class='form-group row'>
                  <label class='col-sm-3 col-form-label'>
                    Supplier
                  </label>
                  <div class='col-sm-9'>
                    <select class='form-control select2'>
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-3'>
                  </div>
                  <div class='col-sm-9'>
                    <a href="<?php echo base_url('nota-pembelian/create'); ?>" class="btn btn-primary btn-icon icon-left">
                        <i class="fa fa-eye"></i>
                        Tampilkan
                    </a> &nbsp;
                    <a href="<?php echo base_url('nota-pembelian/create'); ?>" class="btn btn-primary btn-icon icon-left">
                        <i class="fa fa-print"></i>
                        Cetak
                    </a>
                  </div>
                </div>

              </form>
            </div>

          </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id='table-1'>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Nota</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total</th>
                                        <th>Supplier</th>
                                        <th class="text-center">Status</th>
                                        <th>Bayar</th>
                                        <th>Lunas</th
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($notapembelian) > 0): ?>
                                        <?php foreach ($notapembelian as $pembelian): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $pembelian->no_nota; ?></td>
                                                <td><?php echo $pembelian->tanggal; ?></td>
                                                <td><?php echo $pembelian->nama_pelanggan; ?></td>
                                                <td><?php echo $pembelian->total; ?></td>
                                                <td><?php echo $pembelian->nama_supplier; ?></td>
                                                <td class="text-center"><?php echo ($pembelian->status==1?'YES':'NO'); ?></td>
                                                <td>Bayar</td>
                                                <td>Lunas</td>
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
