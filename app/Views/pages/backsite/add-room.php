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
                            <h4>Add Room</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item "><a href="edit-professor.html">Management Access</a></li>
                            <li class="breadcrumb-item "><a href="user.html">Room</a></li>
                            <li class="breadcrumb-item active"><a href="user.html">Add Room</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							
							<div class="card-body">
								<form action="/backsite/addroom" method="post">
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nomor Ruangan</label>
												<input type="text" class="form-control" id="no_ruang" name="no_ruang">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Tanggal Wawancara</label>
												<input name="tgl_wawancara" type="date" class="datepicker-default form-control" id="datepicker">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Jam Wawancara</label>
												<input type="text" class="form-control" name="jam" id="jam">           
											</div>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Link</label>
												<input type="text" class="form-control" name="link" id="link">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Meeting ID</label>
												<input type="text" class="form-control" name="meeting_id" id="meeting_id">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="text" class="form-control" name="password" id="password">
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Pilih Pewawancara :</label>
                                            <select multiple class="form-control" id="sel2" name="pewawancara_id[]">
											<?php foreach ($users as $b) : ?>
												<option value="<?= $b['id']; ?>"> <?= $b['name']; ?></option>
											<?php endforeach; ?>
                                            </select>
											</div>
										</div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Pilih Peserta :</label>
                                            <select multiple class="form-control" id="sel2" name="peserta[]">
											<?php foreach ($peserta as $b): ?>
												<option value="<?= $b['id_wawancara']; ?>"><?= $b['nama_user']; ?></option>
											<?php endforeach; ?>
                                            </select>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="submit" class="btn btn-light">Cencel</button>
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