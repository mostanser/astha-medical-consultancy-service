<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><?= lang('login') . ' - ' . $company_name ?></title>

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

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

    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: table-cell;
            vertical-align: middle;
            background-color: #CAEDF3;
        }

        #login-frame {
            width: 630px;
            margin: auto;
            background: #FFF;
            border: 1px solid #DDDADA;
            padding: 70px;
        }

        @media(max-width: 640px) {
            #login-frame {
                width: 100%;
                padding: 20px;
            }
        }
    </style>

    <script>
        var GlobalVariables = {
            'csrfToken': <?= json_encode($this->security->get_csrf_hash()) ?>,
            'baseUrl': <?= json_encode($base_url) ?>,
            'destUrl': <?= json_encode($dest_url) ?>,
            'AJAX_SUCCESS': 'SUCCESS',
            'AJAX_FAILURE': 'FAILURE'
        };

        var EALang = <?= json_encode($this->lang->language) ?>;
        var availableLanguages = <?= json_encode($this->config->item('available_languages')) ?>;

        $(document).ready(function() {
        	GeneralFunctions.enableLanguageSelection($('#select-language'));

            /**
             * Event: Login Button "Click"
             *
             * Make an ajax call to the server and check whether the user's credentials are right.
             * If yes then redirect him to his desired page, otherwise display a message.
             */
            $('#login-form').submit(function(event) {
                event.preventDefault();

                var postUrl = GlobalVariables.baseUrl + '/index.php/user/ajax_check_login';
                var postData = {
                    'csrfToken': GlobalVariables.csrfToken,
                    'username': $('#username').val(),
                    'password': $('#password').val()
                };

                $('.alert').addClass('hidden');

                $.post(postUrl, postData, function(response) {
                    if (!GeneralFunctions.handleAjaxExceptions(response)) {
                        return;
                    }

                    if (response == GlobalVariables.AJAX_SUCCESS) {
                        window.location.href = GlobalVariables.destUrl;
                    } else {
                        $('.alert').text(EALang['login_failed']);
                        $('.alert')
                            .removeClass('hidden alert-danger alert-success')
                            .addClass('alert-danger');
                    }
                }, 'json');
            });
        });
    </script>
</head>
<body>
    <div id="login-frame" class="frame-container">
        <div class="col-xs-12 col-sm-12">
            <img id="astha-logo" style="height: 150px; margin-bottom: 20px; text-align: center" class="center-block" src="<?= base_url('assets/img/astha-logo.jpg') ?>" />
        </div>
        <br />

        <h5 class="center-block"><?= lang('backend_section') ?></h5>
        <p><?= lang('you_need_to_login') ?></p>
        <hr>
        <div class="alert hidden"></div>
        <form id="login-form">
            <div class="form-group">
                <label for="username"><?= lang('username') ?></label>
                <input type="text" id="username"
                		placeholder="<?= lang('enter_username_here') ?>"
                		class="form-control" />
            </div>
            <div class="form-group">
                <label for="password"><?= lang('password') ?></label>
                <input type="password" id="password"
                		placeholder="<?= lang('enter_password_here') ?>"
                		class="form-control" />
            </div>
            <br>

            <button type="submit" id="login" class="btn btn-primary">
            	<?= lang('login') ?>
            </button>

            <br><br>

            <a href="<?= site_url('user/forgot_password') ?>" class="forgot-password">
            	<?= lang('forgot_your_password') ?></a>
            |
            <span id="select-language" class="label label-success">
	        	<?= ucfirst($this->config->item('language')) ?>
	        </span>
        </form>
    </div>

    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
</body>
</html>
