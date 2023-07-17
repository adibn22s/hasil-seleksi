<?= $this->extend('layout/backsite/template'); ?>
<?= $this->section('content') ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success text-dark" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pemeriksaan Administrasi Awal</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Forms</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Pemeriksaan Administrasi Awal</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Nomor Registrasi</th>
                                                <th>Status</th>
                                                <th>Tanggal Input</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($berkas as $b) : ?>
                                                <tr>
                                                    <td><?= $b['user_name'] ?></td>
                                                    <td><?= $b['nomor_registrasi'] ?></td>
                                                    <td>
                                                        <?php if ($b['status_kelulusan'] == 'Lolos') : ?>
                                                            <span class="badge badge-rounded badge-success"><?= $b['status_kelulusan'] ?></span>
                                                        <?php elseif ($b['status_kelulusan'] == 'Tidak Lolos') : ?>
                                                            <span class="badge badge-rounded badge-danger"><?= $b['status_kelulusan'] ?></span>
                                                        <?php elseif ($b['status_kelulusan'] == 'Diproses') : ?>
                                                            <span class="badge badge-rounded badge-primary"><?= $b['status_kelulusan'] ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= date('d/m/Y', strtotime($b['created_at'])) ?></td>
                                                    <td>
                                                        <a href="/backsite/data-awal/<?= $b['id'] ?>" class="btn btn-sm btn-secondary"><i class="la la-pencil"></i></a>
                                                        <button class="btn btn-sm btn-danger" onclick="deleteConfirmation(<?= $b['id'] ?>)"><i class="la la-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#143b64',
            cancelButtonColor: '#ff8f16',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect atau panggil fungsi deleteData() untuk menghapus data
                deleteData(id);
            }
        });
    }

    function deleteData(id) {
        window.location.href = "/backsite/dataawal/delete/" + id;
    }
</script>

<?= $this->endSection('content') ?>
