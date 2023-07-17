<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>
  <div class="selamat container mb-5" style="margin-top: 70px;">
      <div class="cardd w-100">
        <div class="content text-center">
          <h4 class="hea mt-4">SELAMAT DATANG!</h4>
          <H1 class="hea fw-bold"><?= $user['name']; ?></H1>
          <?php if (!empty($berkas['nomor_registrasi'])): ?>
          <h5 class="hea mb-4">Nomor Registrasi : <?= $berkas['nomor_registrasi']; ?></h5>
          <?php else: ?>
            <h5 class="hea mb-4"></h5>
            <?php endif; ?>
        </div>
      </div>
      </div>



      <div class="container py-5">
        <h3 class="status mt-4 text-secondary text-center fw-bold">STATUS SELEKSI ANDA</h3>
        <img src="<?= base_url('assets/frontsite/images/ggg.png'); ?>" class="img-fluid" alt="...">
        <div class="container text-center">
          <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
              <div class="p-3 fw-semibold">7 Juli 2023</div>
            </div>
            <div class="col">
              <div class="p-3 fw-semibold">11 Juli 2023</div>
            </div>
            <div class="col">
              <div class="p-3 fw-semibold"></div>
            </div>
            <div class="col">
              <div class="p-3 fw-semibold"></div>
            </div>
            <div class="col">
              <div class="p-3 fw-semibold"></div>
            </div>
          </div>
        </div>
          
      </div>

</main>
<?= $this->endSection('content') ?>