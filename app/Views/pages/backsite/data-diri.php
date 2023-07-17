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
                            <h4>Pemeriksaan Administrasi Akhir</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pemeriksaan Administrasi Akhir</a></li>
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
										<a href="add-professor.html" class="btn btn-secondary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>Name</th>
														<th>Nomor Registrasi</th>
														<th>Form KIP-K</th>
														<th>Tanggal Input</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
														<td>Jisung</td>
														<td>1234567890</td>
                                                        <td><a href="https://imgv2-2-f.scribdassets.com/img/document/522784790/original/ad59a00eef/1681943901?v=1" class="btn btn-sm btn-secondary">View</a></td>														
														<td>2011/04/25</td>
														<td><a href="data-diri-isi.html" class="btn btn-sm btn-secondary"><i class="la la-pencil"></i></a></td>														
													</tr>
													<tr>
														<td>Tiger Nixon</td>
														<td>102836322124</td>
														<td><a href="https://imgv2-2-f.scribdassets.com/img/document/522784790/original/ad59a00eef/1681943901?v=1" class="btn btn-sm btn-secondary">View</a></td>	
														<td>2011/04/25</td>
														<td><a href="data-diri-isi.html" class="btn btn-sm btn-secondary"><i class="la la-pencil"></i></a></td>												
													</tr>
													<tr>
														<td>Garrett Winters</td>
														<td>102912024555</td>
														<td><a href="https://imgv2-2-f.scribdassets.com/img/document/522784790/original/ad59a00eef/1681943901?v=1" class="btn btn-sm btn-secondary">View</a></td>	
														<td>2011/07/25</td>
														<td><a href="data-diri-isi.html" class="btn btn-sm btn-secondary"><i class="la la-pencil"></i></a></td>	
													</tr>
													
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