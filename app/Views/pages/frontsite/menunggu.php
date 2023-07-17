<?= $this->extend('layout/frontsite/template'); ?>
<?= $this->section('content') ?>

<div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets/frontsite/images/success.jpg'); ?>" class="img-fluid w-50" alt="...">
                            <section>
                                <div class="row h-100">
                                    <div
                                        class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                                        <h2>Mohon Bersabar Data Anda Sedang Dalam Proses Seleksi</h2>
                                        <p>Terimakasih atas perhatiannya!
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection('content') ?>