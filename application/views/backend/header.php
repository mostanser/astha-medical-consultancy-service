<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $company_name ?> </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/trumbowyg/ui/trumbowyg.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/backend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/trumbowyg/trumbowyg.min.js') ?>"></script>

    <script>
    	// Global JavaScript Variables - Used in all backend pages.
    	var availableLanguages = <?= json_encode($this->config->item('available_languages')) ?>;
    	var EALang = <?= json_encode($this->lang->language) ?>;
    </script>
</head>

<body>
<nav id="header" class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div id="header-logo" class="navbar-brand">
                <img src="<?= base_url('assets/img/astha-logo.jpg') ?>">
                <div style="font-weight: normal;font-size: 25px;color: whitesmoke;margin-top: 3px;"><?= $company_name ?></div>
            </div>
            
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu" 
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <div id="header-menu" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php $hidden = ($privileges[PRIV_APPOINTMENTS]['view'] == TRUE) ? '' : 'hidden' ?>
                <?php $active = ($active_menu == PRIV_APPOINTMENTS) ? 'active' : '' ?>
                <?php $cust_active = ($active_menu == PRIV_CUSTOMERS_DASHBOARD) ? 'active' : '' ?>

                <?php if($role_slug == 'customer') { ?>
                <li class="<?= $cust_active . $hidden ?>">
                    <a href="<?= site_url('backend') ?>" class="menu-item"
                       title="<?= lang('manage_appointment_record_hint') ?>">
                        <?= lang('customer_dashboard') ?>
                    </a>
                </li>
                <?php } ?>

                <?php
                if($active_menu == PRIV_CUSTOMERS_DASHBOARD) $hidden = 'hidden';
                ?>
                <?php if($role_slug != 'customer') { ?>
                <li class="<?= $active . $hidden  ?>">
                    <a href="<?= site_url('backend') ?>" class="menu-item"
                            title="<?= lang('manage_appointment_record_hint') ?>">
                        <?= lang('calendar') ?>
                    </a>
                </li>
                <?php } ?>

                <?php $hidden = ($privileges[PRIV_CUSTOMERS]['view'] == TRUE) ? '' : 'hidden' ?>
                <?php $active = ($active_menu == PRIV_CUSTOMERS) ? 'active' : '' ?>
                <li class="<?= $active . $hidden ?>">
                    <a href="<?= site_url('backend/customers') ?>" class="menu-item"
                            title="<?= lang('manage_customers_hint') ?>">
                        <?= lang('customers') ?>
                    </a>
                </li>

                <?php $hidden = ($privileges[PRIV_SERVICES]['view'] == TRUE) ? '' : 'hidden' ?>
                <?php $active = ($active_menu == PRIV_SERVICES) ? 'active' : '' ?>
                <li class="<?= $active . $hidden ?>">
                    <a href="<?= site_url('backend/services') ?>" class="menu-item"
                            title="<?= lang('manage_services_hint') ?>">
                        <?= lang('services') ?>
                    </a>
                </li>

                <?php $hidden = ($privileges[PRIV_USERS]['view'] ==  TRUE) ? '' : 'hidden' ?>
                <?php $active = ($active_menu == PRIV_USERS) ? 'active' : '' ?>
                <li class="<?= $active . $hidden ?>">
                    <a href="<?= site_url('backend/users') ?>" class="menu-item"
                            title="<?= lang('manage_users_hint') ?>">
                        <?= lang('users') ?>
                    </a>
                </li>

                <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE
                        || $privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'hidden' ?>
                <?php $active = ($active_menu == PRIV_SYSTEM_SETTINGS) ? 'active' : '' ?>
                <li class="<?= $active . $hidden ?>">
                    <a href="<?= site_url('backend/settings') ?>" class="menu-item"
                            title="<?= lang('settings_hint') ?>">
                        <?= lang('settings') ?>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('user/logout') ?>" class="menu-item"
                            title="<?= lang('log_out_hint') ?>">
                        <?= lang('log_out') ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="notification" style="display: none;"></div>

<div id="loading" style="display: none;">
    <div class="any-element animation is-loading">
        &nbsp;
    </div>
</div>
