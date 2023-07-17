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
                            <h4>Add Template</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item "><a href="edit-professor.html">Management Access</a></li>
                            <li class="breadcrumb-item "><a href="user.html">Template</a></li>
                            <li class="breadcrumb-item active"><a href="user.html">Add Template</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							
							<div class="card-body">
								<form action="/backsite/submitaddtemplate" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
									<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group fallback w-100">
                                                        <label class="form-label d-block">Surat Pernyataan Peraturan</label>
                                                        <input type="file" class="form-control <?= ($validation->hasError('surat_pernyataan_peraturan')) ? 'is-invalid' : ''; ?>" id="surat_pernyataan_peraturan" name="surat_pernyataan_peraturan">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('surat_pernyataan_peraturan'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group fallback w-100">
                                                        <label class="form-label d-block">Surat Pernyataan IPK</label>
                                                        <input type="file" class="form-control <?= ($validation->hasError('surat_pernyataan_IPK')) ? 'is-invalid' : ''; ?>" id="surat_pernyataan_IPK" name="surat_pernyataan_IPK">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('surat_pernyataan_IPK'); ?>
                                                        </div>
                                                    </div>
                                                </div>
										

										<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
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