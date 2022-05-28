<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Jenis Bayar</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Jenis Bayar</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk menambahkan data jenis bayar baru.
            </p>

            <form action="<?php echo base_url('jenis-bayar/edit/' . $jenis_bayar->id_jenis_bayar); ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nama Jenis Bayar</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_jenis_bayar" value="<?php echo $jenis_bayar->nama_jenis_bayar; ?>" class="form-control" placeholder="Nama Jenis Bayar" autocomplete="off">
                                        <?php echo form_error('nama_jenis_bayar'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea name="keterangan" required cols="30" rows="3" class="form-control" placeholder="Keterangan"><?php echo $jenis_bayar->keterangan; ?></textarea>
                                        <?php echo form_error('keterangan'); ?>
                                    </div>
                                </div>
                                 <div class="text-right">
                                    <button name="update" class="btn btn-primary mr-1" type="submit">Simpan Perubahan</button>
                                     <a href="<?php echo base_url('jenis-bayar'); ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>