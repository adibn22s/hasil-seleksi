<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
			
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit User</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="edit-professor.html">Management Access</a></li>
                            <li class="breadcrumb-item active"><a href="user.html">User</a></li>
                            <li class="breadcrumb-item active"><a href="add-user.html">Edit User</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
							<div class="card-body">
                                <form action="/backsite/edituser/<?= $role['user_id'] ?>" method="post">
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nama</label>
												<input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" value="<?= old('name', isset($input['name']) ? $input['name'] : $berkas['name']); ?>" >
												<div class="invalid-feedback">
													<?= $validation->getError('name'); ?>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Username</label>
												<input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?=  old('email', isset($input['email']) ? $input['email'] : $berkas['email']); ?>" >
												<div class="invalid-feedback">
													<?= $validation->getError('email'); ?>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" class="form-control" value="<?= $berkas['password'] ?>" readonly>
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label" for="role">Role</label>
													<select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" aria-label="role" name="role" id="role" required>
                                                        <option value="1" <?= $role['role_id'] == '1' ? 'selected' : '' ?>>Admin</option>
                                                        <option value="2" <?= $role['role_id'] == '2' ? 'selected' : '' ?>>Wawancara</option>
                                                        <option value="3" <?= $role['role_id'] == '3' ? 'selected' : '' ?>>Peserta</option>
                                                    </select>
													<div class="invalid-feedback">
														<?= $validation->getError('role'); ?>
													</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="submit" class="btn btn-light">Cancel</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?= $this->endSection('content') ?>