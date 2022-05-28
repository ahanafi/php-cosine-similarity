<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Nota Supplier</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
          <div class='card'>
            <div class='card-header'>
              <h4 class="section-title">Filter</h4>
            </div>
            <div class='card-body'>
              <form action = '' method='get'>
                <div class='form-group row'>
                  <label class='col-sm-3 col-form-label'>
                    Nama Pelanggan
                  </label>
                  <div class='col-sm-9'>
                    <select class='form-control select2' name='pelanggan'>
                      <?php if(count($pelanggan)>0):
                        foreach($pelanggan as $pelanggan):
                        ?>
                        <option value='<?=$pelanggan->id_pelanggan?>' <?=($pelanggan->id_pelanggan == $id_pelanggan)?'selected':''?>><?=$pelanggan->nama_pelanggan?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class='form-group row'>
                  <label class='col-sm-3 col-form-label'>
                    Supplier
                  </label>
                  <div class='col-sm-9'>
                    <select class='form-control select2' name="supplier">
                      <?php if(count($supplier)>0):
                        foreach($supplier as $supplier):
                        ?>
                        <option value='<?=$supplier->id_supplier?>' <?=($supplier->id_supplier == $id_supplier)?'selected':''?>><?=$supplier->nama_supplier?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-3'>
                  </div>
                  <div class='col-sm-9'>
                    <input type='hidden' value='true' name='tampilkan'>
                    <button type="submit" class="btn btn-primary btn-icon icon-left">
                        <i class="fa fa-eye"></i>
                        Tampilkan
                    </button> &nbsp;
                    <a href="<?php echo base_url('nota-supplier/create'); ?>" class="btn btn-primary btn-icon icon-left">
                        <i class="fa fa-print"></i>
                        Cetak
                    </a>
                  </div>
                </div>

              </form>
            </div>

          </div>
            <div class="row" style='<?=$tampil;?>'>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <table class="table table-striped table-md table-bordered" id='data-table'>
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
                                        <th>Transfer</th>
                                        <th>Lunas</th
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
                                                <td><?php echo toRupiah($supplier->total); ?></td>
                                                <td><?php echo toRupiah($supplier->total); ?></td>
                                                <td><?php echo $supplier->nama_supplier; ?></td>
                                                <td class="text-center"><?php echo ($supplier->status==1?'YES':'NO'); ?></td>
                                                <td>Bayar</td>
                                                <td>Lunas</td>
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
