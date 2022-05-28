<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Bank</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Bank</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk menambahkan akun pengguna baru.
            </p>

            <form action="<?php echo base_url('bank/edit/' . $bank->id_bank); ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nama Bank</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_bank" value="<?php echo $bank->nama_bank; ?>" class="form-control" placeholder="Nama Bank" autocomplete="off">
                                        <?php echo form_error('nama_bank'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nomor Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="no_rekening" value="<?php echo $bank->no_rekening; ?>" class="form-control" maxlength="30" placeholder="Nomor Rekening" autocomplete="off">
                                        <?php echo form_error('no_rekening'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nama Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_rekening" value="<?php echo $bank->nama_rekening; ?>" class="form-control" id="inputnama_rekening3" placeholder="Nama rekening" autocomplete="off">
                                        <?php echo form_error('nama_rekening'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" required cols="30" rows="3" class="form-control" placeholder="Alamat"><?php echo $bank->alamat; ?></textarea>
                                        <?php echo form_error('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Kontak</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" name="kontak" id="inputPassword3" placeholder="Kontak" value="<?php echo $bank->kontak; ?>">
                                        <?php echo form_error('kontak'); ?>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button name="update" class="btn btn-primary mr-1" type="submit">Simpan Perubahan
                                    </button>
                                    <a href="<?php echo base_url('bank') ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>