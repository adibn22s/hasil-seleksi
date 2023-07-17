<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>

      <!--pengumuman-->
      <div class="selamat container mb-5" style="margin-top: 70px;">
      <div class="cardd w-100">
        <div class="content text-center">
          <h4 class="hea mt-4">SELAMAT!</h4>
          <H1 class="hea fw-bold"><?= $user['name']; ?></H1>
          <h5 class="hea mb-4">No Reg : <?= $berkas['nomor_registrasi']; ?></h5>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-1 col-sm-3"></div>
        <div class="col-md-10 col-sm-6 px-2">
          <div class="my-5">
            <h3 class="text-center fs-3">
              Kamu lolos dan berhak mengikuti Program Beasiswa KIP-K Universitas Gunadarma.<br />
              Selanjutnya, silakan serahkan berkas-berkas administrasi kepada pihak kampus sesuai<br />dengan waktu yang akan diberitahukan
              <b>melalui Group WhatsApp.</b>
            </h3>
            <h3 class="text-center mt-4">link wa : </h3>
            <a href="https://<?= $administrasi['link']; ?>" class="text-decoration-none"><h3 class="text-center text-dark fw-bold mt-4"><?= $administrasi['link']; ?></h3></a>
          </div>
        </div>
        <div class="col-md-1 col-sm-3"></div>
      </div>
    </main>
    <!--Footer-->

    <?= $this->endSection('content') ?>