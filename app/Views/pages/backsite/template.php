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
                            <h4>Template</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Template</a></li>
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
										<a href="/backsite/add-template" class="btn btn-secondary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														
														<th>Surat Pernyataan Peraturan</th>
														<th>Lihat</th>
														<th>Surat Pernyataan IPK</th>
														<th>Lihat</th>
														<th>Tanggal</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($template as $b): ?>
													<tr>
														<td><?= $b['surat_pernyataan_peraturan']?></td>
														<td>
															<a href="/template/<?= $b['surat_pernyataan_peraturan'] ?>" download><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">View</button></a>
														</td>
														<td><?= $b['surat_pernyataan_IPK']?></td>
														<td>
															<a href="/template/<?= $b['surat_pernyataan_IPK'] ?>" download><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">View</button></a>
														</td>
														<td><?= $b['created_at']?></td>
														<td>
														<button class="btn btn-sm btn-danger" onclick="deleteConfirmation(<?= $b['id'] ?>)"><i class="la la-trash-o"></i></button>
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

		<script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Template akan dihapus secara permanen!",
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
        window.location.href = "/backsite/template/delete/" + id;
    }
</script>

<?= $this->endSection('content') ?>