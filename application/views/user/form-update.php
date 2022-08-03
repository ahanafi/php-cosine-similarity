<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Pengguna</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Pengguna</h2>
            <p class="section-lead">
                Silahkan isi form di bawah untuk memperbarui data akun pengguna.
            </p>

            <form action="<?php echo base_url('user/edit/' . $user->id_pengguna); ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="nama_lengkap"
                                               value="<?php echo $user->nama_lengkap; ?>" class="form-control"
                                               placeholder="Nama Lengkap" autocomplete="off">
                                        <?php echo form_error('nama_lengkap'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="username"
                                               value="<?php echo $user->username; ?>" class="form-control"
                                               maxlength="30" placeholder="Username" autocomplete="off">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" required name="email" value="<?php echo $user->email; ?>"
                                               class="form-control" id="inputEmail3" placeholder="Email"
                                               autocomplete="off">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSelect" class="col-sm-3 col-form-label">Level Pengguna</label>
                                    <div class="col-sm-9">
                                        <select name="level" id="inputSelect" required class="form-control">
                                            <option disabled selected>-- Pilih Level Pengguna --</option>
                                            <?php foreach ($user_levels as $level): ?>
                                                <option <?= (strtolower($user->level) === strtolower($level)) ? 'selected' : ''; ?>
                                                        value="<?php echo $level; ?>"><?php echo ucwords(strtolower(str_replace("_", " ", $level))); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('level'); ?>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button name="update" class="btn btn-primary mr-1" type="submit">Simpan Perubahan
                                    </button>
                                    <a href="<?php echo base_url('user'); ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>