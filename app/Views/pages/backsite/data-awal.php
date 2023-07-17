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
                                            <span class="mb-0">Nomor Registrasi :</span><strong><?= $berkas['nomor_registrasi']; ?></strong></li>
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
                                    <form action="/backsite/editdataawal/<?= $berkas['id'] ?>" method="post">
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
														<td class="text-center"><strong>01</strong></td>
														<td>Kartu Peserta KIP-Kuliah</td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['kartu_peserta'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
                                                        <td>
                                                            <select class="form-select" aria-label="kartu_peserta_status" name="kartu_peserta_status" id="kartu_peserta_status" required>
                                                                <option value="Diproses" <?= $berkas['kartu_peserta_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['kartu_peserta_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['kartu_peserta_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>										
													</tr>
													<tr>
														<td class="text-center"><strong>02</strong></td>
														<td>Ijazah atau SKL</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['ijazah'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
														<td>
                                                        <select class="form-select" aria-label="ijazah_status" name="ijazah_status" id="ijazah_status" required>
                                                                <option value="Diproses" <?= $berkas['ijazah_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['ijazah_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['ijazah_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>													
													</tr>
													<tr>
														<td class="text-center"><strong>03</strong></td>
														<td>Nilai Ujian Sekolah yang dilegalisir oleh Kepala Sekolah</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['nilai_us'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
														<td>
                                                            <select class="form-select" aria-label="nilai_us_status" name="nilai_us_status" id="nilai_us_status" required>
                                                                <option value="Diproses" <?= $berkas['nilai_us_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['nilai_us_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['nilai_us_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>														
													</tr>
                                                    <tr>
														<td class="text-center"><strong>04</strong></td>
														<td>Rapor semester 4 s.d. semester 6 yg terdapat Nilai Pengetahuan dan Keterampilan</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['rapor_smt4_6'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
                                                        <td>
                                                            <select class="form-select" aria-label="rapor_smt4_6_status" name="rapor_smt4_6_status" id="rapor_smt4_6_status" required>
                                                                <option value="Diproses" <?= $berkas['rapor_smt4_6_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['rapor_smt4_6_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['rapor_smt4_6_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>																												
													</tr>
													<tr>
														<td class="text-center"><strong>05</strong></td>
														<td> Surat Keterangan tentang prestasi atau peringkat siswa di kelas & <br>
                                                            bukti pendukung prestasi lain di bidang ko-kurikuler dan ekstra-kurikuler</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['prestasi'] ?>" download class="text-light">View</a></button>
                                                                
                                                            </td>
                                                            <td>
                                                            <select class="form-select" aria-label="prestasi_status" name="prestasi_status" id="prestasi_status" required>
                                                                <option value="Diproses" <?= $berkas['prestasi_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['prestasi_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['prestasi_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>																
													</tr>
													<tr>
														<td class="text-center"><strong>06</strong></td>
														<td>Slip Gaji Orang Tua atau Surat Keterangan Penghasilan Orang Tua dari <br>
                                                            kelurahan yang menyebutkan angka</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['slip_gaji'] ?>" download class="text-light">View</a></button>
                                                                
                                                            </td>
                                                            <td>
                                                            <select class="form-select" aria-label="slip_gaji_status" name="slip_gaji_status" id="slip_gaji_status" required>
                                                                <option value="Diproses" <?= $berkas['slip_gaji_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['slip_gaji_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['slip_gaji_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>														
													</tr>
                                                    <tr>
														<td class="text-center"><strong>07</strong></td>
														<td> Surat Keterangan Tidak Mampu dari Kelurahan atau Peserta Program <br>
                                                            Keluarga Harapan atau Peserta Kartu Keluarga Sejahtera dan KJP atau KIP</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['SKTM'] ?>" download class="text-light">View</a></button>
                                                                
                                                            </td>
                                                            <td>
                                                            <select class="form-select" aria-label="SKTM_status" name="SKTM_status" id="SKTM_status" required>
                                                                <option value="Diproses" <?= $berkas['SKTM_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['SKTM_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['SKTM_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>																											
													</tr>
													<tr>
														<td class="text-center"><strong>08</strong></td>
														<td>Kartu Keluarga</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['KK'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
														<td>
                                                            <select class="form-select" aria-label="KK_status" name="KK_status" id="KK_status" required>
                                                                <option value="Diproses" <?= $berkas['KK_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['KK_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['KK_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>															
													</tr>
													<tr>
														<td class="text-center"><strong>09</strong></td>
														<td>Rekening Listrik atau bukti pembayaran PBB 2021 atau Surat Keterangan <br>
                                                            Penggunaan Listrik </td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['rekening_listrik'] ?>" download class="text-light">View</a></button>
                                                                
                                                            </td>
                                                            <td>
                                                            <select class="form-select" aria-label="rekening_listrik_status" name="rekening_listrik_status" id="rekening_listrik_status" required>
                                                                <option value="Diproses" <?= $berkas['rekening_listrik_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['rekening_listrik_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['rekening_listrik_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>															
													</tr>
                                                    <tr>
														<td class="text-center"><strong>10</strong></td>
														<td> KTP calon dan Orang Tua (Bapak dan Ibu)</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['KTP'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
                                                        <td>
                                                            <select class="form-select" aria-label="KTP_status" name="KTP_status" id="KTP_status" required>
                                                                <option value="Diproses" <?= $berkas['KTP_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['KTP_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['KTP_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>																										
													</tr>
													<tr>
														<td class="text-center"><strong>11</strong></td>
														<td>Hasil seleksi atau bukti pembayaran ke Bank</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['hasil_seleksi'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
														<td>
                                                            <select class="form-select" aria-label="hasil_seleksi_status" name="hasil_seleksi_status" id="hasil_seleksi_status" required>
                                                                <option value="Diproses" <?= $berkas['hasil_seleksi_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['hasil_seleksi_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['hasil_seleksi_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
                                                            </select>
                                                        </td>																
													</tr>
													<tr>
														<td class="text-center"><strong>12</strong></td>
														<td>Foto Keadaan Rumah</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded"><a href="/akhir/<?= $berkas['rumah'] ?>" download class="text-light">View</a></button>
                                                            
                                                        </td>
														<td>
                                                            <select class="form-select" aria-label="rumah_status" name="rumah_status" id="rumah_status" required>
                                                                <option value="Diproses" <?= $berkas['rumah_status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                <option value="Valid" <?= $berkas['rumah_status'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                <option value="Invalid" <?= $berkas['rumah_status'] == 'Invalid' ? 'selected' : '' ?>>Invalid</option>
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