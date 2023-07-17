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
                            <h4>Peserta</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pemeriksaan Administrasi Awal</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Peserta</a></li>
                        </ol>
                    </div>
                </div>
				<div class="row d-flex justify-content-center">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="https://i.pinimg.com/736x/0e/ef/83/0eef83854498fb97fc05cefc1a54b394.jpg" width="100" class="img-fluid" alt="">
                                    </div>
                                    <h3 class="my-4">Jisung</h3>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Nomor Registrasi :</span><strong>123456789</strong></li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+62 123 456 7890</strong></li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">Email:</span><strong>jisung@gmail.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Alamat:</span><strong>Jalan margonda raya</strong></li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <form action="/backsite/edit-dataakhir/<?= $berkas['id'] ?>" method="post">
                                    <div class="row tab-content">
                                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>No</th>
                                                                    <th>Berkas</th>
														<th>Action</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
														<td class="text-center"><strong>1</strong></td>
														<td> Surat Pernyataan Peraturan</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" ><a href="/akhir/<?= $berkas['surat_pernyataan_peraturan'] ?>" download class="text-light">View</a></button>
                                                            <div id="myModal1" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <select class="form-select" aria-label="status_surat_pernyataan_peraturan" name="status_surat_pernyataan_peraturan" id="status_surat_pernyataan_peraturan" required>
                                                            <option selected>Status</option>
                                                            <option value="Diproses" <?= $berkas['status_surat_pernyataan_peraturan'] == 'Diproses' ? 'selected' : '' ?>>On Progress</option>
                                                            <option value="valid" <?= $berkas['status_surat_pernyataan_peraturan'] == 'valid' ? 'selected' : '' ?>>Valid</option>
                                                            <option value="invalid" <?= $berkas['status_surat_pernyataan_peraturan'] == 'invalid' ? 'selected' : '' ?>>Invalid</option>
                                                        </select>
                                                        </td>																										
													</tr>
													<tr>
														<td class="text-center"><strong>12</strong></td>
														<td>Surat Pernyataan IPK</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['surat_pernyataan_IPK'] ?>" download class="text-light">View</a></button>
                                                            <div id="myModal2" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                        <select class="form-select" aria-label="status_surat_pernyataan_IPK" name="status_surat_pernyataan_IPK" id="status_surat_pernyataan_IPK" required>
                                                            <option value="Diproses" <?= $berkas['status_surat_pernyataan_IPK'] == 'Diproses' ? 'selected' : '' ?>>On Progress</option>
                                                            <option value="valid" <?= $berkas['status_surat_pernyataan_IPK'] == 'valid' ? 'selected' : '' ?>>Valid</option>
                                                            <option value="invalid" <?= $berkas['status_surat_pernyataan_IPK'] == 'invalid' ? 'selected' : '' ?>>Invalid</option>
                                                        </select>
                                                        </td>														
													</tr>
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
                                                <div class="form-group">
                                                    <label class="form-label">Link Grup Whatsapp</label>
                                                    <input type="text" class="form-control" name="link" value="<?= $berkas['link'] ?>">
                                                </div>
										</div>
									</div>
                                </div>
                            </div>
						</div>
					</div>
                            <div class="col-lg-12">
                                <div class="row tab-content">
                                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div class="status">      
                                                        <h5>Status Pemeriksaan Data Peserta</h5>  
                                                            <select class="form-select" aria-label="status_kelulusan" name="status_kelulusan" id="status_kelulusan" required>
                                                              <option value="Diproses" <?= $berkas['status_kelulusan'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                              <option value="Lolos" <?= $berkas['status_kelulusan'] == 'Lolos' ? 'selected' : '' ?>>Lolos</option>
                                                               <option value="Tidak Lolos" <?= $berkas['status_kelulusan'] == 'Tidak Lolos' ? 'selected' : '' ?>>Tidak Lolos</option>
                                                            </select>
                                                    </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="submit" class="btn btn-light">Cancel</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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