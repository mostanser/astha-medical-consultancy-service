<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= lang('log_out') . ' - ' . $company_name ?></title>

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


    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>

    <script>
        var EALang = <?= json_encode($this->lang->language) ?>;
    </script>

    <link
        rel="stylesheet"
        type="text/css"
        href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: table-cell;
            vertical-align: middle;
            background-color: #CAEDF3;
        }

        #logout-frame {
            width: 630px;
            margin: auto;
            background: #FFF;
            border: 1px solid #DDDADA;
            padding: 70px;
        }

        .btn {
            margin-right: 10px;
        }

        @media(max-width: 640px) {
            #logout-frame {
                width: 100%;
                padding: 20px;
            }

            .btn {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div id="logout-frame" class="frame-container">
        <h3><?= lang('log_out') ?></h3>
        <p>
            <?= lang('logout_success') ?>
        </p>

        <br>

        <a href="<?= site_url() ?>" class="btn btn-success btn-large">
            <span class="glyphicon glyphicon-calendar"></span>
            <?= lang('book_appointment_title') ?>
        </a>

        <a href="<?= site_url('backend') ?>" class="btn btn-default btn-large">
            <span class="glyphicon glyphicon-wrench"></span>
            <?= lang('backend_section') ?>
        </a>
    </div>
</body>
</html>
