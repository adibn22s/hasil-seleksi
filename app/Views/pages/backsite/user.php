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
                            <h4>User</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Management Access</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">User</a></li>
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
											<a href="/backsite/add-user" class="btn btn-secondary">+ Add new</a>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example3" class="display" style="min-width: 845px">
													<thead>
														<tr>
															<th>ID User</th>
															<th>Username</th>
															<th>Name</th>
															<th>Role</th>
															<th>Action</th>
														</tr>
													</thead>
												<?php foreach ($users as $b):?>
													<tbody>
														<tr>
															<td><?= $b['id']; ?></td>
															<td><strong><?= $b['email']; ?></strong></td>
															<td><strong><?= $b['name']; ?></strong></td>
															<td><strong><?= $b['role_name']; ?></strong></td>														
															<td>
																<a href="/backsite/edit-user/<?= $b['id'] ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
																<a href="/backsite/reset-password/<?= $b['id'] ?>" class="btn btn-sm btn-dark"><i class="ti-reload"></i></a>
																<button class="btn btn-sm btn-danger" onclick="deleteConfirmation(<?= $b['id'] ?>)"><i class="la la-trash-o"></i></button>
															</td>												
														</tbody>
													</tr>
												<?php endforeach;?>
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

		<script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "User akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#143b64',
            cancelButtonColor: '#ff8f16',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect atau panggil fungsi deleteData() untuk menghapus data
                deleteData(id);
            }
        });
    }

    function deleteData(id) {
        window.location.href = "/backsite/user/delete/" + id;
    }
</script>

<?= $this->endSection('content') ?>