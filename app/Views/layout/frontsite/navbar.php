<!--Navbar-->
<header class="sticky-top">
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-2">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="<?= base_url('assets/frontsite/images/logo.png'); ?>" width="180" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse gap-5" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-sm-5">
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="/beranda">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="">Data Diri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="">Berkas</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link active dropdown-toggle fw-semibold"
                  aria-current="page"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Hasil
                </a>
                <ul class="dropdown-menu mt-3">
                  <li><a class="dropdown-item" href="/awal">Pemeriksaan Administrasi Awal</a></li>
                  <li><a class="dropdown-item" href="/wawancara">Wawancara</a></li>
                  <li><a class="dropdown-item" href="/akhirr">Pemeriksaan Administrasi Akhir</a></li>
                  <li><a class="dropdown-item" href="/pengumuman">Pengumuman</a></li>
                </ul>
              </li>
            </ul>
            <!-- Jika pengguna belum login -->
            <?php if (!session('logged_in')) : ?>
              <a href="/login" >
              <button class="btn logout rounded-pill px-5 fw-semibold mx-2 mb-2 text-light text-uppercase word-break" type="submit" style="">
                Login
              </button></a>
            <!-- Jika pengguna sudah login -->
            <?php else : ?>
              <a href="/logout">
              <button class="btn logout rounded-pill px-5 fw-semibold mx-2 mb-2 text-light text-uppercase word-break" type="submit" style="">
                Logout
              </button></a>
              <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
    