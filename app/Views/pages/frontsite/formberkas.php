<!--Rikmin Akhir-->
<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--Berkas Rikmin Akhir-->
<main>
    <div class="container mb-5" style="margin-top: 150px;">
        <div class="login card" style="width: 100%;">
            <div class="textlogin card-body mt-3 mb-5 ms-5 me-5" url="">
                <h3 class="card-title fw-bold">Berkas Administrasi Akhir</h3>
                <form method="POST" action="/upload" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Surat Pernyataan Bersedia Mengikuti Peraturan di Universitas Gunadarma *</label>
                      <div>
                    <a href="/template/<?= $template['surat_pernyataan_peraturan'] ?>" download class="mx-auto download-template text-danger fw-bold" >
                      <p class="me-3 ">Download Template SP Mengikuti Peraturan</p>
                    </a>
                </div>
                <input class="form-control mt-3 <?= ($validation->hasError('surat_pernyataan_peraturan')) ? 'is-invalid' : ''; ?>" type="file" id="surat_pernyataan_peraturan" name="surat_pernyataan_peraturan">
                <div class="invalid-feedback">
                    <?= $validation->getError('surat_pernyataan_peraturan'); ?>
                </div>
                    </div>
                    <div class="mb-3 mt-5">
                      <label for="formFile" class="form-label">Surat Pernyataan Bersedia Mempertahankan IPK *
                      </label>
                        <div>
                            <a href="/template/<?= $template['surat_pernyataan_IPK'] ?>" download  class="mx-auto download-template text-danger fw-bold">
                              <p class="me-3">Download Template SP Mempertahankan IPK</p>
                            </a>
                        </div>
                      <input class="form-control mt-3 <?= ($validation->hasError('surat_pernyataan_IPK')) ? 'is-invalid' : ''; ?>" type="file"  id="surat_pernyataan_IPK"  name="surat_pernyataan_IPK">
                      <div class="invalid-feedback">
                          <?= $validation->getError('surat_pernyataan_IPK'); ?>
                      </div>
                    </div>
            
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button onclick="openPopup()" class="btn btn-success fw-semibold mt-3" type="submit">SELESAI</button>
                      </div>
                    </div>
                </div>
            </div>
</main>
<?= $this->endSection('content') ?>