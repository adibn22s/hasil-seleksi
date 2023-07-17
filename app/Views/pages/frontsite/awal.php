<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>
  <!--hasil rikmin awal-->
  <div class="text-center">
        <h1 class="fw-bold">
          HASIL SELEKSI PEMERIKSAAN<br />
          ADMINISTRASI AWAL
        </h1>
  
        <p style="align-items: center">
          Selamat! kamu lanjut ke tahap Tes Wawancara.<br />
          <?php if (!empty($room['tgl_wawancara']) && !empty($room['jam']) && !empty($room['link'])): ?>
          Untuk pelaksanaan wawancara, akan dilakukan pada <b><?= date('d-m-Y', strtotime($room['tgl_wawancara'])); ?>
          Pukul <?= date('H:i', strtotime($room['jam'])); ?> WIB </b> secara daring melalui :<br />
          <div
            ><b><a href="https://<?= $room['link']; ?>" class="text-decoration-none"><h5 class="text-center text-dark fw-bold mt-4"><?= $room['link']; ?></h5></a><br /></b
            ></div>
            <?php else: ?>
              Untuk waktu pelaksanaan wawancara akan diumumkan segera.<br> Silahkan dicek secara berkala, dengan cara refresh halaman ini.
            <?php endif; ?>
          </p>
        <br />
        <p style="font-weight: bold">Berikut adalah hasilnya :</p>
      </div>
      <div class="container mt-3 mb-5">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <?php foreach ($berkas as $b):?>
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
                    <th class="text-center">1</th>
                    <td>kartu peserta</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['kartu_peserta_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">2</th>
                    <td>Ijazah atau Surat Keterangan Lulus</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['ijazah_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">3</th>
                    <td>Nilai Ujian Sekolah</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['nilai_us_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">4</th>
                    <td>Rapor Semester 4 s.d. Semester 6</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['rapor_smt4_6_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">5</th>
                    <td>Surat Keterangan Prestasi atau Peringkat Siswa di Kelas</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['prestasi_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">6</th>
                    <td>Slip Gaji Orang Tua atau Surat Keterangan Penghasilan Orang Tua</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['slip_gaji_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">7</th>
                    <td>Surat Keterangan Tidak Mampu</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['SKTM_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">8</th>
                    <td>Kartu Keluarga</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['KK_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">9</th>
                    <td>Rekening Listrik atau bukti pembayaran PBB 2021 atau Surat Keterangan Penggunaan Listrik</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['rekening_listrik_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">10</th>
                    <td>KTP Calon dan Orang Tua</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['KTP_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">11</th>
                    <td>Hasil Seleksi atau Bukti Pembayaran ke Bank</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['hasil_seleksi_status']; ?></td>
                  </tr>
                  <tr>
                    <th class="text-center">12</th>
                    <td>Foto Keadaan Rumah</td>
                    <td class="text-center fw-bold text-capitalize"><?= $b['rumah_status']; ?></td>
                  </tr>
                </tbody>
                <?php endforeach;?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?= $this->endSection('content') ?>