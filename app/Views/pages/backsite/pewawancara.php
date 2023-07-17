<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
					<?php  if (session()->getFlashdata('pesan')) : ?>
						<div class="alert alert-success text-dark" role="alert">
							<?= session()->getFlashdata('pesan'); ?>
						</div>
					<?php endif; ?>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Wawancara</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Wawancara</a></li>
                        </ol>
                    </div>
                </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-body">
										<h5> No Ruang : <?= $room['no_ruang']; ?></h5>
										<h5> Link : <?= $room['link']; ?></h5>
										<h5> Meeting id : <?= $room['meeting_id']; ?></h5>
										<h5> Password : <?= $room['password']; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>		
				
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>Nama Peserta</th>
														<th>Hasil</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php foreach($wawancara as $b): ?>
													<tr>
														<td><?= $b['nama'] ?></td>
														<td>
                                                            <?php if ($b['status_wawancara'] == 'Lolos'): ?>
															<span class="badge badge-rounded badge-success"><?= $b['status_wawancara'] ?></span>
															<?php elseif ($b['status_wawancara'] == 'Tidak Lolos'): ?>
															<span class="badge badge-rounded badge-danger"><?= $b['status_wawancara'] ?></span>
															<?php elseif ($b['status_wawancara'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $b['status_wawancara'] ?></span>
															<?php endif; ?>
                                                        </td>
														<td><a href="/backsite/detail-wawancara/<?= $b['berkas_id'] ?>" class="btn btn-sm btn-secondary"><i class="la la-pencil"></i></a></td>											
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