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
                            <h4>Pilih Ruangan</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="edit-professor.html">Management Access</a></li>
                            <li class="breadcrumb-item active"><a href="user.html">Room</a></li>
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
										<a href="/backsite/add-room" class="btn btn-secondary">+ Add Room</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>Nomor Ruangan</th>
														<th>Tanggal Wawancara</th>
														<th>Link</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($room as $b): ?>
                                                    <tr>
														<td><?= $b['no_ruang']; ?></td>
														<td><?= $b['tgl_wawancara']; ?></td>
														<td><?= $b['link']; ?></td>
														<td>
															<a href="/backsite/pewawancara/<?= $b['id']?>" class="btn btn-sm btn-secondary">Pilih</a>
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
            text: "Room akan dihapus secara permanen!",
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
        window.location.href = "/backsite/room/delete/" + id;
    }
</script>
<?= $this->endSection('content') ?>