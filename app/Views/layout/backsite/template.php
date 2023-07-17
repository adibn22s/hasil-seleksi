<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/backsite/images/favicon.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/backsite/vendor/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>">
	<!-- Datatable -->
    <link href="<?= base_url('assets/backsite/vendor/datatables/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/backsite/css/style.css'); ?>">
    <!-- datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/backsite/vendor/pickadate/themes/default.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/backsite/vendor/pickadate/themes/default.date.css'); ?>">

</head>

<body>

<?= $this->include('layout/backsite/navbar'); ?>
<?= $this->include('layout/backsite/sidebar'); ?>
<?= $this->renderSection('content'); ?>

<!-- Required vendors -->
    <script src="<?= base_url('assets/backsite/vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/js/deznav-init.js'); ?>"></script>	
	<script src="<?= base_url('assets/backsite/vendor/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/js/custom.min.js'); ?>"></script>
	
	<!-- Datatable -->
    <script src="<?= base_url('assets/backsite/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/js/plugins-init/datatables.init.js'); ?>"></script>
	
    <!-- Svganimation scripts -->
    <script src="<?= base_url('assets/backsite/vendor/svganimation/vivus.min.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/vendor/svganimation/svg.animation.js'); ?>"></script>

    <!-- pickdate -->
    <script src="<?= base_url('assets/backsite/vendor/pickadate/picker.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/vendor/pickadate/picker.time.js'); ?>"></script>
    <script src="<?= base_url('assets/backsite/vendor/pickadate/picker.date.js'); ?>"></script>
	
	<!-- Pickdate -->
    <script src="<?= base_url('assets/backsite/js/plugins-init/pickadate-init.js'); ?>"></script>
</body>
</html>