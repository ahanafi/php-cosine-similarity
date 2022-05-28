<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Pengguna</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Pengguna
                <a href="<?php echo base_url('user/create'); ?>" class="btn btn-primary btn-icon icon-left float-right">
                    <i class="fa fa-plus"></i>
                    Tambah Pengguna
                </a>
            </h2>
            <p class="section-lead">Daftar akun pengguna sistem.</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Level</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($users) > 0): ?>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $user->nama_lengkap; ?></td>
                                                <td><?php echo $user->username; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td>
                                                    <?php
                                                        $badgeType = "";
                                                        $level = $user->level;
                                                        if($level == "ADMIN_SUPER") {
                                                            $badgeType = "primary";
                                                        } elseif ($level == "ADMIN_TOKO") {
                                                            $badgeType = "info";
                                                        } elseif ($level == "ADMIN_KEUANGAN") {
                                                            $badgeType = "success";
                                                        } else {
                                                            $badgeType = "warning";
                                                        }
                                                    ?>
                                                    <div class="badge badge-<?= $badgeType; ?>">
                                                        <?php echo ucwords(strtolower(str_replace("_", " ", $level))); ?>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('user/edit/' . $user->id_pengguna); ?>" class="btn btn-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light" onclick="showConfirmDelete('user', <?php echo $user->id_pengguna; ?>)">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="text-center text-info font-weight-bold">
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