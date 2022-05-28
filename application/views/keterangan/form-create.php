<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Keterangan</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah keterangan</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk menambahkan data keterangan baru.
            </p>

            <form action="<?php echo base_url('keterangan/create'); ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nama keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_keterangan" value="<?php echo set_value('nama_keterangan'); ?>" class="form-control" placeholder="Nama keterangan" autocomplete="off">
                                        <?php echo form_error('nama_keterangan'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Penjelasan</label>
                                    <div class="col-sm-9">
                                        <textarea name="penjelasan" required cols="30" rows="5" class="form-control" placeholder="Penjelasan"><?php echo set_value('penjelasan'); ?></textarea>
                                        <?php echo form_error('penjelasan'); ?>
                                    </div>
                                </div>
                                 <div class="text-right">
                                    <button name="submit" class="btn btn-primary mr-1" type="submit">Simpan Data
                                    </button>
                                    <button name="reset" class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>