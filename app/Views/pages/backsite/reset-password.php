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
                            <h4>Reset Password</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="edit-professor.html">Management Access</a></li>
                            <li class="breadcrumb-item active"><a href="user.html">User</a></li>
                            <li class="breadcrumb-item active"><a href="add-user.html">Reset Password</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
							<div class="card-body">
                                <form action="/backsite/reset/<?= $role['user_id'] ?>" method="post">
									<div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nama</label>
                                                <input type="text" readonly class="form-control-plaintext font-weight-bold" value="<?= $berkas['name'] ?>">
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">New Password</label>
												<input type="text" class="form-control" name="new_password" value="">
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Konfirmasi Password</label>
												<input type="text" class="form-control" name="confirm_password" value="">
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