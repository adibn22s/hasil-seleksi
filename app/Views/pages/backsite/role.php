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
                            <h4>Role</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Management Access</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Role</a></li>
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
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														
														<th>Role</th>
														<th>Permission</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php foreach ($role as $b): ?>
													<tr>
														<td><?= $b['title'] ?></td>
														<td><?= $b['permission_count'] ?></td>
														<td>
                                                            <!-- Button trigger modal -->
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal<?= $b['id'] ?>">View</button>
                                                            <a href="/backsite/edit-role/<?= $b['id'] ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
    
                                                            <!-- Modal -->
                                                                <div id="myModal<?= $b['id'] ?>" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Role Details</h4>
                                                                                <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row g-0 mb-4">
                                                                                    <div class="col-6 col-md-4 font-weight-bold">Role</div>
                                                                                    <div class="col-sm-6 col-md-8"><?= $b['title'] ?></div>
                                                                                </div>
                                                                                <div class="row g-0">
                                                                                    <div class="col-6 col-md-4 font-weight-bold">Permission</div>
                                                                                    <div class="col-sm-6 col-md-8">
                                                                                        <?php foreach ($b['permission_title'] as $permissionTitle): ?>
                                                                                            <span class="badge badge-rounded badge-info"><?= $permissionTitle ?></span>
                                                                                        <?php endforeach; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="btn" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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