<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Daftar Bayar</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Bayar
                <a href="<?php echo base_url('daftar-bayar/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Daftar Bayar
                </a>
            </h2>
            <p class="section-lead">Daftar Bayar</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="my-daftar-bayar data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Bank</th>
                                        <th>Jenis Bayar</th>
                                        <th>Jumlah</th>
                                        <th>Potongan Lain - Lain</th>
                                        <th>Ket Lain - Lain</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody style="cursor:pointer">
                                    <?php if (count($daftar_bayars) > 0): ?>
                                        <?php foreach ($daftar_bayars as $daftar_bayar): ?>
                                            <tr>
                                                <td><?php echo $daftar_bayar->id_bayar; ?></td>
                                                <td><?php echo $daftar_bayar->tanggal; ?></td>
                                                <td><?php echo $daftar_bayar->nama_pelanggan; ?></td>
                                                <td><?php echo $daftar_bayar->nama_bank; ?></td>
                                                <td><?php echo $daftar_bayar->nama_jenis_bayar; ?></td>
                                                <td><?php echo $daftar_bayar->jumlah; ?></td>
                                                <td><?php echo $daftar_bayar->potongan_lain_lain; ?></td>
                                                <td><?php echo $daftar_bayar->ket_lain_lain; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('daftar-bayar/edit/' . $daftar_bayar->id_bayar); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('daftar-bayar', <?php echo $daftar_bayar->id_bayar; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="text-center text-info font-weight-bold" colspan="9">
                                                Tidak ada data.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <p id="click-response"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-show-part">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <label for="id_bayar" class="col-sm-3 col-form-label">ID Bayar</label>
                    <div class="col-sm-9">
                      <input type="text" id='id_bayar' class="form-control">
                        <p id='id_bayar'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="text" id='tanggal' class="form-control">
                        <p id='tanggal'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pelanggan" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-9">
                      <input type="text" id='nama_pelanggan' class="form-control">
                        <p id='nama_pelanggan'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bank" class="col-sm-3 col-form-label">Bank</label>
                    <div class="col-sm-9">
                      <input type="text" id='bank' class="form-control">
                        <p id='bank'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_bayar" class="col-sm-3 col-form-label">Jenis Bayar</label>
                    <div class="col-sm-9">
                      <input type="text" id='jenis_bayar' class="form-control">
                        <p id='jenis_bayar'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ket_bayar" class="col-sm-3 col-form-label">Ket Bayar</label>
                    <div class="col-sm-9">
                      <input type="text" id='ket_bayar' class="form-control">
                        <p id='ket_bayar'></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="text" id='jumlah' class="form-control">
                        <p id='jumlah'></p>
                    </div>
                </div>
              </div>
              <div class='modal-header'>
                <h5 class="modal-title">Alokasi Dana</h5>
              </div>
              <div class='modal-body row'>
                <table class='table table-striped table-md table-bordered'>
                  <thead>
                    <tr>
                        <th>No Nota</th>
                        <th>Tanggal</th>
                        <th>Bayar</th>
                        <th>Total Nota</th>
                        <th>No Retur</th>
                        <th>Potong Retur</th>
                        <th>Total Retur</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6" class="text-right">Potong Lain Lain</td>
                      <td><input type="text" name='potongan_lain'></td>
                    </tr>
                    <tr>
                      <td colspan="6" class="text-right">Keterangan Lain Lain</td>
                      <td><input type="text" name='keterangan_lain'></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
