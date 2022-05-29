<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Judul Skripsi</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Judul Skripsi</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk menambahkan data judul skripsi baru.
            </p>

            <form action="<?php echo base_url('judul-skripsi/create'); ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nim" class="col-sm-3 col-form-label">
                                        NIM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="number" required name="nim" value="<?php echo set_value('nim'); ?>" class="form-control" placeholder="Nomor induk Mahasiswa" autocomplete="off">
                                        <?php echo form_error('nim'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama_mahasiswa" class="col-sm-3 col-form-label">
                                        Nama Mahasiswa
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required name="nama_mahasiswa" value="<?php echo set_value('nama_mahasiswa'); ?>" class="form-control" placeholder="Nama Mahasiswa" autocomplete="off">
                                        <?php echo form_error('nama_mahasiswa'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="program_studi" class="col-sm-3 col-form-label">
                                        Program Studi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="program_studi" id="program_studi" class="form-control">
                                            <option value="" selected disabled>-- Pilih Program Studi --</option>
                                            <?php foreach($study_program as $key => $prodi): ?>
                                                <option <?php echo (set_value('program_studi') === $key) ? "selected" : "" ?> value="<?php echo $key ?>"><?php echo $prodi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('program_studi'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="topik_skripsi" class="col-sm-3 col-form-label">
                                        Topik Skripsi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="topik_skripsi_id" id="topik_skripsi" class="form-control">
                                            <option value="" selected disabled>-- Pilih Topik Skripsi --</option>
                                            <?php foreach($topik_skripsi as $topik): ?>
                                                <option <?php echo (set_value('topik_skripsi') === $topik->id_topik_skripsi) ? "selected" : "" ?> value="<?php echo $topik->id_topik_skripsi ?>"><?php echo $topik->nama_topik_skripsi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('topik_skripsi'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="judul_skripsi" class="col-sm-3 col-form-label">Judul Skripsi</label>
                                    <div class="col-sm-9">
                                        <textarea name="judul_skripsi" cols="30" rows="7" class="form-control" required placeholder="Judul skripsi"><?php echo set_value('judul_skripsi'); ?></textarea>
                                        <?php echo form_error('judul_skripsi'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-3 col-form-label">Tahun Skripsi</label>
                                    <div class="col-sm-4">
                                        <input type="number" min="2000" max="<?php echo (int) (date('Y') - 1) ?>" name="tahun" required class="form-control" placeholder="Tahun skripsi" value="<?php echo set_value('tahun'); ?>" />
                                        <?php echo form_error('tahun'); ?>
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