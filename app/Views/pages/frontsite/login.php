<!--Rikmin Akhir-->
<?= $this->extend('layout/frontsite/template-login'); ?>
<?= $this->section('content') ?>

<!--LOGIN-->
<div class="atlog d-flex justify-content-center mb-4" style="margin-top: 30px;">
    <img src="<?= base_url('assets/frontsite/images/logo.png'); ?>" class="img-fluid me-3" alt="..." width="180px">
    <H4 class="mt-4 fw-bold">SELEKSI BEASISWA KIP-K UNIVERSITAS GUNADARMA</H4>

  </div>
    <div class="container mb-5 d-flex justify-content-center" >
    <div class="login card " style="width: 75%;">
        
        <div class="textlogin card-body mt-3 mb-5 ms-5 me-5 " url="">
          <h2 class="card-title fw-bold">LOGIN</h2>
          <p class="card-subtitle mb-2 text-body-secondary">Silahkan login dengan memasukkan username dan password yang telah diberikan di email anda</p>
          <form method="POST" action="loginn">
            <div class="username mt-3 mb-2">
              <label for="email" class="form-label fw-semibold" >Username</label>
              <input class="usershape form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email', isset($input['email']) ? $input['email'] : ''); ?>" id="email" aria-describedby="emailHelp" placeholder="Masukkan Username" name="email">
              <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
              </div>
            </div>
            <div class="pass mt-3 mb-2">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="usershape form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" value="<?= old('password', isset($input['password']) ? $input['password'] : ''); ?>" aria-labelledby="passwordHelpBlock" placeholder="Masukkan Password" id="password" name="password">
            <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
            </div>
          </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="button1 btn fw-semibold" type="submit" role="button">LOGIN</button>
              </div>

          </form>

        </div>
      </div>
      </div>

<?= $this->endSection('content') ?>    