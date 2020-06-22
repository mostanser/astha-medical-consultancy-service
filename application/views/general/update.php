<!DOCTYPE html>
<html>
<head>
    <title>Easy!Appointments - Update</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= asset_url('assets/img/icon/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= asset_url('assets/img/icon/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset_url('assets/img/icon/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= asset_url('assets/img/icon/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset_url('assets/img/icon/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= asset_url('assets/img/icon/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= asset_url('assets/img/icon/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= asset_url('assets/img/icon/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset_url('assets/img/icon/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= asset_url('assets/img/icon/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset_url('assets/img/icon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= asset_url('assets/img/icon/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= asset_url('assets/img/icon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= asset_url('assets/img/icon/manifest.json')  ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= asset_url('assets/img/icon/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="<?= asset_url ('assets/ext/jquery-ui/jquery-ui.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        .header {
            background: #DAFFEB;
        }

        h3 {
            margin-bottom: 40px;
        }

        .content {
            margin-top: 30px;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            padding: 15px 40px;
        }
    </style>
</head>
<body>
    <div class="container-fluid header">
        <div>
            <a href="http://easyappointments.org" target="_blank">
                <img src="<?= base_url('assets/img/installation-banner.png') ?>"
                     alt="Easy!Appointments Installation Banner">
            </a>
        </div>
    </div>

    <div class="container content">
        <?php if ($success): ?>
            <h4>
                The database was updated successfully!
            </h4>

            <p>
                You can now use the latest Easy!Appointments version.
            </p>
        <?php else: ?>
            <h4>
                There was an error during the update process ...
            </h4>

            <p>
                Please restore your database backup.
            </p>

            <div class="well text-left">
                Error Message: <?= $exception ?>
            </div>
        <?php endif; ?>

        <div>
            <a href="<?= site_url('backend') ?>" class="btn btn-default btn-large">
                <span class="glyphicon glyphicon-wrench"></span>
                <?= lang('backend_section') ?>
            </a>
        </div>
    </div>

    <footer>
        Powered by <a href="https://ris10.com">Ruhama IT Solutions</a>
    </footer>
</body>
</html>
