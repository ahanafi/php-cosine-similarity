<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Supplier</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Supplier</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk menambahkan data supplier baru.
            </p>

            <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Nama Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_supplier" value="<?php echo $nama_supplier; ?>" class="form-control" placeholder="Nama Supplier" autocomplete="off">
                                        <?php echo form_error('nama_supplier'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputnama_rekening3" class="col-sm-3 col-form-label">Kota</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="kota" value="<?php echo $kota; ?>" class="form-control" placeholder="Kota" autocomplete="off">
                                        <?php echo form_error('kota'); ?>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" required cols="30" rows="3" class="form-control" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                        <?php echo form_error('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Kontak</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" value="<?php echo $kontak; ?>" name="kontak" id="inputPassword3" placeholder="Kontak">
                                        <?php echo form_error('kontak'); ?>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" />
                                    <button name="submit" class="btn btn-primary mr-1" type="submit"><?php echo $button ?>
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
