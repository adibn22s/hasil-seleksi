<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>
      <!--hasil wawancara-->
      <div class="text-center">
        <h1 class="fw-bold">PENGUMUMAN HASIL SELEKSI <br />WAWANCARA</h1>
        <br />
        <h5 class="grid column-gap-3">
          Selamat! kamu dinyatakan lolos tahapan seleksi Wawancara.<br />
          Silakan lengkapi berkas-berkas Pemeriksaan Administrasi Akhir<br />
          dengan menekan tombol dibawah ini.
        </h5>
      </div>
      <center>
        <a href="/formberkas"><button class="btn button-berkas fw-semibold  fs-5 my-5"><span>Berkas</span></button></a>
      </center>
      <br />
      <br />
    </main>

<?= $this->endSection('content') ?>