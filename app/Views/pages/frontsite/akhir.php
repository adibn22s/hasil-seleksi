<!--Rikmin Akhir-->
<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>
      <div class="text-center">
        <h1 style="font-weight: bold">
          HASIL SELEKSI PEMERIKSAAN<br />
          ADMINISTRASI AKHIR
        </h1>
        <br />

        <h5>
          Selamat! kamu berhasil sampai ke tahapan seleksi Pemeriksaan Administrasi Akhir.<br />

          Silakan tunggu hasil akhri pengumuman seleksi Program KIP-K<br />

          Universitas Gunadarma.
        </h5>
      </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table table-bordered">
                <thead>
                  <tr class="header1 text-light text-center">
                    <th>No</th>
                    <th>Jenis File</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>Surat Pernyataan Bersedia Mengikuti Peraturan di Universitas Gunadarma</td>
                    <td class="text-center text-center fw-bold text-capitalize"><?= $administrasi['status_surat_pernyataan_peraturan']; ?></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td>Surat Pernyataan Bersedia Mempertahankan IPK</td>
                    <td class="text-center text-center fw-bold text-capitalize"><?= $administrasi['status_surat_pernyataan_IPK']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

<?= $this->endSection('content') ?>