<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Nota Penjualan</h1>
			<?php echo showBreadCrumb(); ?>
		</div>

		<div class="section-body">
			<h2 class="section-title">
				Daftar Nota Penjualan
				<?php if(showOnlyTo("1|2")): ?>
				<a href="<?php echo base_url('nota-penjualan/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
					<i class="fa fa-plus"></i>
					Tambah Nota Penjualan
				</a>
				<button class="btn btn-secondary float-right mr-1" type="button" id="btnShowFilterFrom">Filter Data</button>
				<?php endif; ?>
			</h2>
			<p class="section-lead">Daftar Nota Penjualan</p>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<?php if(showOnlyTo("1|2|3")): ?>
					<div class="card mb-0" id="card-filter">
						<div class="card-body pb-0">
							<h6>Filter</h6>
							<div class="row">
								<form action="" class="col-md-12">
									<div class="form-group row mb-1">
										<label for="" class="col-form-label-sm col-sm-2">Nama Pelanggan</label>
										<div class="col-sm-4">
											<select name="id_pelanggan" id="" class="form-control select2">
												<option disabled selected>-- Pilih Pelanggan --</option>
												<?php foreach ($pelanggan as $p): ?>
													<option <?php echo (isset($_GET['id_pelanggan']) && $_GET['id_pelanggan'] === $p->id_pelanggan) ? 'selected' : ''; ?> value="<?php echo $p->id_pelanggan; ?>"><?php echo $p->nama_pelanggan; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row mb-2">
										<label for="" class="col-form-label-sm col-sm-2">Nama Supplier</label>
										<div class="col-sm-4">
											<select name="id_supplier" id="" class="form-control select2">
												<option disabled selected>-- Pilih Supplier --</option>
												<?php foreach ($supplier as $s): ?>
													<option <?php echo (isset($_GET['id_supplier']) && $_GET['id_supplier'] === $s->id_supplier) ? 'selected' : ''; ?> value="<?php echo $s->id_supplier; ?>"><?php echo $s->nama_supplier; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row mb-1">

										<div class="col-sm-4 offset-sm-2">
											<button type="submit" class="btn btn-sm btn-primary">Tampilkan</button>
											<a href="<?php echo base_url('nota-penjualan'); ?>" class="btn btn-sm btn-secondary">Reset Filter</a>
											<button type="button" class="btn btn-sm btn-secondary">Cetak</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-md table-bordered" id="data-table">
									<thead>
									<tr>
										<th>#</th>
										<th>No. Nota</th>
										<th>Tanggal</th>
										<th>Nama Pelanggan</th>
										<th>Supplier</th>
										<th class="text-center">Total</th>
										<th>Status</th>
										<th>Bayar</th>
										<th>Lunas</th>
										<th class="text-center">Aksi</th>
									</tr>
									</thead>
									<tbody>
                                    <?php if (count($nota_penjualan) > 0): ?>
                                        <?php foreach ($nota_penjualan as $nota): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $nota->no_nota; ?></td>
												<td><?php echo $nota->tanggal; ?></td>
												<td><?php echo $nota->nama_pelanggan; ?></td>
												<td><?php echo $nota->nama_supplier; ?></td>
												<td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($nota->total); ?>,-</td>
												<td><?php echo getStatus($nota->status); ?></td>
												<td style="font-style: italic;text-align: right;">Rp. <?php echo toRupiah($nota->bayar); ?>,-</td>
												<td style="font-weight:bold;text-align: center;">
                                                    <?php echo getStatus($nota->is_lunas, "pelunasan"); ?>
												</td>
												<td class="text-center">
                                                    <?php if ($nota->status == 0): ?>
														<a href="<?php echo base_url('nota-penjualan/edit/' . $nota->id_nota_penjualan); ?>" class="btn btn-light">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-light" onclick="showConfirmDelete('nota-penjualan', <?php echo $nota->id_nota_penjualan; ?>)">
															<i class="fa fa-trash-alt"></i>
														</a>
                                                    <?php else: ?>
														<b><i><small>No action</small></i></b>
                                                    <?php endif; ?>
												</td>
											</tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
										<tr>
											<td class="text-center text-info font-weight-bold" colspan="10">
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