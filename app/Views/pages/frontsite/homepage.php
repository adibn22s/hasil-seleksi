<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<!--SATU-->
<main class="mt-5">
      
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
  
          <div id="scrollspyHeading1" >
          <div class="container w-100 d-flex justify-item-center mb-3">
              <div class="mt-5">
                <img src="<?= base_url('assets/frontsite/images/home.png'); ?>" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
            
  
          <!--DUA-->
          <div id="scrollspyHeading2">
          <div class="container w-75 d-flex justify-item-center mb-3">
            <div class="container mt-5">
              <h3 class="jteks text-center fw-semibold">Jadwal Seleksi Kartu Indonesia Pintar Kuliah</h3>
              <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate quis ante sed vestibulum. Vivamus ac mi justo. Sed ultricies sem purus, ac consectetu</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-wrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="header1 text-light text-center">
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="text-center fw-medium">1</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                        <tr>
                          <th class="text-center fw-medium">2</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                        <tr>
                          <th class="text-center fw-medium">3</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                        <tr>
                          <th class="text-center fw-medium">4</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                        <tr>
                          <th class="text-center fw-medium">5</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                        <tr>
                          <th class="text-center fw-medium">6</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipiscing</td>
                          <td class="text-center">10 Agustus 2023</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
  
          <!--TIGA-->
          <div id="scrollspyHeading3">
          <div class="container w-100 d-flex justify-item-center mb-3">
            <div class="mt-5">
              <img src="<?= base_url('assets/frontsite/images/t.png'); ?>" class="img-fluid " alt="...">
            </div>
            </div>
          </div>
      </main>
<?= $this->endSection('content') ?>