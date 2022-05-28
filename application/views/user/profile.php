<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pengguna</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Profile</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Profil Pengguna</h2>
			<p class="section-lead">
				Halaman profil pengguna.
			</p>

			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-5">
					<div class="card profile-widget">
						<div class="profile-widget-header">
							<img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
							<div class="profile-widget-items">
								<div class="profile-widget-item text-left pl-3">
									<div class="profile-widget-item-label">&nbsp;</div>
									<div class="profile-widget-item-value"><?php echo $user->nama_lengkap; ?></div>
								</div>
							</div>
						</div>
						<div class="profile-widget-description">
							<div class="profile-widget-name">
                                <?php echo $user->nama_lengkap; ?>
								<div class="text-muted d-inline font-weight-normal">
									<div class="slash"></div>
                                    <?php echo getUserLevel($user->level); ?>
								</div>
							</div>
							Ujang maman is a superhero name in
							<b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with
							<b>'John Doe'</b>.
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-7">
					<div class="card">
						<form method="post" class="needs-validation" novalidate="">
							<div class="card-header">
								<h4>Edit Profile</h4>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
									<div class="col-sm-9">
										<input type="text" required name="nama_lengkap" value="<?php echo $user->nama_lengkap; ?>" class="form-control" placeholder="Nama Lengkap" autocomplete="off">
                                        <?php echo form_error('nama_lengkap'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Username</label>
									<div class="col-sm-9">
										<input type="text" required name="username" value="<?php echo $user->username; ?>" class="form-control" placeholder="Username" autocomplete="off">
                                        <?php echo form_error('username'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">E-mail</label>
									<div class="col-sm-9">
										<input type="text" required name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="Alamat email" autocomplete="off">
                                        <?php echo form_error('email'); ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Jenis Pengguna</label>
									<div class="col-sm-9">
										<input type="text" required name="level" value="<?php echo getUserLevel($user->level); ?>" class="form-control" readonly>
                                        <?php echo form_error('level'); ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12 text-right">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
