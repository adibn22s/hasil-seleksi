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
                            <h4>Pengumuman Akhir</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pengumuman Akhir</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4>
										<a href="add-professor.html" class="btn btn-primary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														
														<th>Name</th>
														<th>Nomor Registrasi</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach($AdmAkhir as $b): ?>
													<tr>
														<td><?= $b['nama'] ?></td>
														<td><?= $b['no_regis'] ?></td>
														<td>
															<?php if ($b['status_kelulusan'] == 'Lolos'): ?>
															<span class="badge badge-rounded badge-success"><?= $b['status_kelulusan'] ?></span>
															<?php elseif ($b['status_kelulusan'] == 'Tidak Lolos'): ?>
															<span class="badge badge-rounded badge-danger"><?= $b['status_kelulusan'] ?></span>
															<?php elseif ($b['status_kelulusan'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $b['status_kelulusan'] ?></span>
															<?php endif; ?>
														</td>											
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
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