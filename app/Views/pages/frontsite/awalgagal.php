<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<main>
<?php foreach ($berkas as $b):?>
      <!--hasil rikmin awal-->
      <div class="text-center">
        <h1 class="fw-bold">
          HASIL SELEKSI PEMERIKSAAN<br />
          ADMINISTRASI AWAL
        </h1>
  
        <p style="align-items: center">
          Maaf! kamu gagal untuk lanjut ke tahap Tes Wawancara.<br />
          Tetap semangat dan sukses selalu<br />
        </p>
        <br />
        <p style="font-weight: bold">Berikut adalah hasilnya :</p>
      </div>
      <div class="container mt-3 mb-5">
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
              </table>
            </div>
          </div>
        </div>
      </div>
<?php endforeach;?>
    </main>
<?= $this->endSection('content') ?>