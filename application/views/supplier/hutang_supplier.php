<style>
	th {
		text-align: center;
		font-weight: bold;
	}

	.format-uang {
		text-align: right;
		font-style: italic;
	}
</style>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Supplier</h1>
			<?php echo showBreadCrumb(); ?>
		</div>

		<div class="section-body">
			<h2 class="section-title">
				Daftar Hutang Supplier
			</h2>
			<p class="section-lead">Daftar Hutang Supplier</p>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
								<table class="table table-striped table-bordered" id="data-table" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Supplier</th>
											<th>Hutang Lama</th>
											<th>Hutang</th>
											<th>Pembayaran</th>
                      <th>Retur</th>
											<th>Lain-lain</th>
											<th>Sisa</th>
										</tr>
									</thead>
									<tbody>
                    <?php if (count($suppliers) > 0): ?>
                        <?php foreach ($suppliers as $supplier): ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $supplier->nama_supplier; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>

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
<div class="modal fade" tabindex="-1" role="dialog" id="detail-modal">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover">
					<thead id="table-header"></thead>
					<tbody id="table-body"></tbody>
				</table>
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
