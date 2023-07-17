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
                            <h4>Wawancara Peserta</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pemeriksaan Wawancara</a></li>
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
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center"><strong>01</strong></td>
														<td>Kartu Peserta KIP-Kuliah</td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Berkas</h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if ($berkas['kartu_peserta_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['kartu_peserta_status'] ?></span>
															<?php elseif ($berkas['kartu_peserta_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['kartu_peserta_status'] ?></span>
															<?php elseif ($berkas['kartu_peserta_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['kartu_peserta_status'] ?></span>
															<?php endif; ?>
                                                        </td>																									
													</tr>
													<tr>
														<td class="text-center"><strong>02</strong></td>
														<td>Ijazah atau SKL</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">berkas</h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                        <img src="https://www.imrantululi.net/asset/kcfinder/upload/files/SD%20Depan1.PNG">
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                            <?php if ($berkas['ijazah_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['ijazah_status'] ?></span>
															<?php elseif ($berkas['ijazah_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['ijazah_status'] ?></span>
															<?php elseif ($berkas['ijazah_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['ijazah_status'] ?></span>
															<?php endif; ?>
                                                        </td>												
													</tr>
													<tr>
														<td class="text-center"><strong>03</strong></td>
														<td>Nilai Ujian Sekolah yang dilegalisir oleh Kepala Sekolah</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">berkas</h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                            <?php if ($berkas['nilai_us_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['nilai_us_status'] ?></span>
															<?php elseif ($berkas['nilai_us_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['nilai_us_status'] ?></span>
															<?php elseif ($berkas['nilai_us_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['nilai_us_status'] ?></span>
															<?php endif; ?>
                                                        </td>													
													</tr>
                                                    <tr>
														<td class="text-center"><strong>04</strong></td>
														<td>Rapor semester 4 s.d. semester 6 yg terdapat Nilai Pengetahuan dan Keterampilan</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if ($berkas['rapor_smt4_6_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['rapor_smt4_6_status'] ?></span>
															<?php elseif ($berkas['rapor_smt4_6_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['rapor_smt4_6_status'] ?></span>
															<?php elseif ($berkas['rapor_smt4_6_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['rapor_smt4_6_status'] ?></span>
															<?php endif; ?>
                                                        </td>																										
													</tr>
													<tr>
														<td class="text-center"><strong>05</strong></td>
														<td> Surat Keterangan tentang prestasi atau peringkat siswa di kelas & <br>
                                                            bukti pendukung prestasi lain di bidang ko-kurikuler dan ekstra-kurikuler</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                                <div id="myModal" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"></h4>
                                                                            <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body ">
                                                                            <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                        </div>
                                                                        
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <?php if ($berkas['prestasi_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['prestasi_status'] ?></span>
															<?php elseif ($berkas['prestasi_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['prestasi_status'] ?></span>
															<?php elseif ($berkas['prestasi_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['prestasi_status'] ?></span>
															<?php endif; ?>
                                                        </td>														
													</tr>
													<tr>
														<td class="text-center"><strong>06</strong></td>
														<td>Slip Gaji Orang Tua atau Surat Keterangan Penghasilan Orang Tua dari <br>
                                                            kelurahan yang menyebutkan angka</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                                <div id="myModal" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"></h4>
                                                                            <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body ">
                                                                            <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                        </div>
                                                                        
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <?php if ($berkas['slip_gaji_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['slip_gaji_status'] ?></span>
															<?php elseif ($berkas['slip_gaji_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['slip_gaji_status'] ?></span>
															<?php elseif ($berkas['slip_gaji_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['slip_gaji_status'] ?></span>
															<?php endif; ?>
                                                        </td>												
													</tr>
                                                    <tr>
														<td class="text-center"><strong>07</strong></td>
														<td> Surat Keterangan Tidak Mampu dari Kelurahan atau Peserta Program <br>
                                                            Keluarga Harapan atau Peserta Kartu Keluarga Sejahtera dan KJP atau KIP</td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                                <div id="myModal" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"></h4>
                                                                            <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body ">
                                                                            <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                        </div>
                                                                        
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <?php if ($berkas['SKTM_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['SKTM_status'] ?></span>
															<?php elseif ($berkas['SKTM_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['SKTM_status'] ?></span>
															<?php elseif ($berkas['SKTM_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['SKTM_status'] ?></span>
															<?php endif; ?>
                                                        </td>																								
													</tr>
													<tr>
														<td class="text-center"><strong>08</strong></td>
														<td>Kartu Keluarga</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                            <?php if ($berkas['KK_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['KK_status'] ?></span>
															<?php elseif ($berkas['KK_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['KK_status'] ?></span>
															<?php elseif ($berkas['KK_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['KK_status'] ?></span>
															<?php endif; ?>
                                                        </td>													
													</tr>
													<tr>
														<td class="text-center"><strong>09</strong></td>
														<td>Rekening Listrik atau bukti pembayaran PBB 2021 atau Surat Keterangan <br>
                                                            Penggunaan Listrik </td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                                <div id="myModal" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"></h4>
                                                                            <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body ">
                                                                            <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                        </div>
                                                                        
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <?php if ($berkas['rekening_listrik_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['rekening_listrik_status'] ?></span>
															<?php elseif ($berkas['rekening_listrik_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['rekening_listrik_status'] ?></span>
															<?php elseif ($berkas['rekening_listrik_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['rekening_listrik_status'] ?></span>
															<?php endif; ?>
                                                        </td>													
													</tr>
                                                    <tr>
														<td class="text-center"><strong>10</strong></td>
														<td> KTP calon dan Orang Tua (Bapak dan Ibu)</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if ($berkas['KTP_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['KTP_status'] ?></span>
															<?php elseif ($berkas['KTP_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['KTP_status'] ?></span>
															<?php elseif ($berkas['KTP_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['KTP_status'] ?></span>
															<?php endif; ?>
                                                        </td>																								
													</tr>
													<tr>
														<td class="text-center"><strong>11</strong></td>
														<td>Hasil seleksi atau bukti pembayaran ke Bank</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                            <?php if ($berkas['hasil_seleksi_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['hasil_seleksi_status'] ?></span>
															<?php elseif ($berkas['hasil_seleksi_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['hasil_seleksi_status'] ?></span>
															<?php elseif ($berkas['hasil_seleksi_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['hasil_seleksi_status'] ?></span>
															<?php endif; ?>
                                                        </td>													
													</tr>
													<tr>
														<td class="text-center"><strong>12</strong></td>
														<td>Foto Keadaan Rumah</td>
														<td>
                                                            <button type="button" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#myModal">View</button>
                                                            <div id="myModal" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"></h4>
                                                                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <img src="https://kip-kuliah.kemdikbud.go.id/uploads/informasi/KIP-Kuliah-Digital_1fd778.png">      
                                                                    </div>
                                                                    
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </td>
														<td>
                                                            <?php if ($berkas['rumah_status'] == 'Valid'): ?>
															<span class="badge badge-rounded badge-success"><?= $berkas['rumah_status'] ?></span>
															<?php elseif ($berkas['rumah_status'] == 'Invalid'): ?>
															<span class="badge badge-rounded badge-danger"><?= $berkas['rumah_status'] ?></span>
															<?php elseif ($berkas['rumah_status'] == 'Diproses'): ?>
															<span class="badge badge-rounded badge-primary"><?= $berkas['rumah_status'] ?></span>
															<?php endif; ?>
                                                        </td>											
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

            <?php foreach($wawancara as $b): ?>
            <form action="/backsite/edit-wawancara/<?= $b['id'] ?>" method="post">
                    <div class="col-lg-12">
                                <div class="row tab-content">
                                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="status">      
                                                            <h5>Catatan Wawancara</h5>                                     
                                                                <textarea class="form-control mt-3" id="hasil_wawancara" name="hasil_wawancara" value="<?= $b['hasil_wawancara']; ?>"><?= $b['hasil_wawancara']; ?></textarea>
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
                                                                <select class="form-select" aria-label="status_wawancara" name="status_wawancara" id="status_wawancara">
                                                                    <option value="Diproses" <?= $b['status_wawancara'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                                                    <option value="Lolos" <?= $b['status_wawancara'] == 'Lolos' ? 'selected' : '' ?>>Lolos</option>
                                                                     <option value="TIdak Lolos" <?= $b['status_wawancara'] == 'TIdak Lolos' ? 'selected' : '' ?>>TIdak Lolos</option>
                                                                </select>
                                                            </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="submit" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach; ?>
                    
                
        <!--**********************************
            Content body end
        ***********************************-->

<?= $this->endSection('content') ?>