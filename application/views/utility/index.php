<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Backup &amp; Restore Data</h1>
			<?php echo showBreadCrumb(); ?>
		</div>

		<div class="section-body">
			<h2 class="section-title">Backup &amp; Restore Data</h2>
			<p class="section-lead">
				Backup dan Restore database aplikasi.
			</p>

			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header border-bottom border-secondary">
							<h4 class="card-heading">Backup Database</h4>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group row">
									<label for="inputnama_rekening3" class="col-sm-3 col-form-label">No. Nota</label>
									<div class="col-sm-9">
										<input type="text" required name="no_nota"
											   value="" class="form-control" placeholder="Nomor Nota" autocomplete="off" readonly>
                                        <?php echo form_error('no_nota'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputnama_rekening3" class="col-sm-3 col-form-label">Tanggal</label>
									<div class="col-sm-9">
										<input type="date" required name="tanggal"
											   value="<?php echo set_value('tanggal'); ?>" class="form-control"
											   maxlength="30" placeholder="Nomor Rekening" autocomplete="off">
                                        <?php echo form_error('tanggal'); ?>
									</div>
								</div>
								<div class="text-right">
									<button name="submit" class="btn btn-primary mr-1" type="submit">Simpan Data</button>
									<button name="reset" class="btn btn-secondary" type="reset">Reset</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header border-bottom border-secondary">
							<h4 class="card-heading">Restore Database</h4>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-3 col-form-label">Total (Rp)</label>
									<div class="col-sm-9">
										<input type="text" onkeypress="formatRupiah(this)" required class="form-control" name="total" placeholder="Total" value="<?= set_value('total') ?>">
                                        <?php echo form_error('total'); ?>
									</div>
								</div>
								<div class="text-right">
									<button name="submit" class="btn btn-primary mr-1" type="submit">Simpan Data</button>
									<button name="reset" class="btn btn-secondary" type="reset">Reset</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>