<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= lang('page_title') . ' ' .  $company_name ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">
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

</head>

<body>
    <div id="main" class="container">
        <div class="wrapper row">
            <div id="book-appointment-wizard" class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">

                <!-- FRAME TOP BAR -->

                <div id="header">
                    <div id="header-logo" class="">
                        <img style="height: 60px;float: left;margin-left: 10px;margin-top: 7px;" src="<?= base_url('assets/img/astha-logo.jpg') ?>">
                        <span id="company-name"><?= $company_name ?></span>
                    </div>


                    <div id="steps">
                        <div id="step-1" class="book-step active-step" title="<?= lang('step_one_title') ?>">
                            <strong>1</strong>
                        </div>

                        <div id="step-2" class="book-step" title="<?= lang('step_two_title') ?>">
                            <strong>2</strong>
                        </div>
                        <div id="step-3" class="book-step" title="<?= lang('step_three_title') ?>">
                            <strong>3</strong>
                        </div>
                        <div id="step-4" class="book-step" title="<?= lang('step_four_title') ?>">
                            <strong>4</strong>
                        </div>
                    </div>
                </div>

                <?php if ($manage_mode): ?>
                <div id="cancel-appointment-frame" class="booking-header-bar row">
                    <div class="col-xs-12 col-sm-10">
                        <p><?= lang('cancel_appointment_hint') ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <form id="cancel-appointment-form" method="post"
                              action="<?= site_url('appointments/cancel/' . $appointment_data['hash']) ?>">
                            <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>" />
                            <textarea name="cancel_reason" style="display:none"></textarea>
                            <button id="cancel-appointment" class="btn btn-default btn-sm"><?= lang('cancel') ?></button>
                        </form>
                    </div>
                </div>
                <div class="booking-header-bar row">
                    <div class="col-xs-12 col-sm-10">
                        <p><?= lang('delete_personal_information_hint') ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <button id="delete-personal-information" class="btn btn-danger btn-sm"><?= lang('delete') ?></button>
                    </div>
                </div>
                <?php endif; ?>

                <?php
                    if (isset($exceptions)) {
                        echo '<div style="margin: 10px">';
                        echo '<h4>' . lang('unexpected_issues') . '</h4>';
                        foreach($exceptions as $exception) {
                            echo exceptionToHtml($exception);
                        }
                        echo '</div>';
                    }
                ?>

                <!-- SELECT SERVICE AND PROVIDER -->

                <div id="wizard-frame-1" class="wizard-frame">
                    <div class="frame-container">
                        <h3 class="frame-title"><?= lang('step_one_title') ?></h3>

                        <div class="frame-content">
                            <div class="form-group">
                                <!--
                                <label for="select-service">
                                    <strong><?= lang('select_service') ?></strong>
                                </label>
                                -->

                                <select id="select-service" class="col-xs-12 col-sm-4 form-control" disabled>
                                    <?php
                                        // Group services by category, only if there is at least one service with a parent category.
                                        $has_category = FALSE;
                                        foreach($available_services as $service) {
                                            if ($service['category_id'] != NULL) {
                                                $has_category = TRUE;
                                                break;
                                            }
                                        }

                                        if ($has_category) {
                                            $grouped_services = array();

                                            foreach($available_services as $service) {
                                                if ($service['category_id'] != NULL) {
                                                    if (!isset($grouped_services[$service['category_name']])) {
                                                        $grouped_services[$service['category_name']] = array();
                                                    }

                                                    $grouped_services[$service['category_name']][] = $service;
                                                }
                                            }

                                            // We need the uncategorized services at the end of the list so
                                            // we will use another iteration only for the uncategorized services.
                                            $grouped_services['uncategorized'] = array();
                                            foreach($available_services as $service) {
                                                if ($service['category_id'] == NULL) {
                                                    $grouped_services['uncategorized'][] = $service;
                                                }
                                            }

                                            foreach($grouped_services as $key => $group) {
                                                $group_label = ($key != 'uncategorized')
                                                        ? $group[0]['category_name'] : 'Uncategorized';

                                                if (count($group) > 0) {
                                                    echo '<optgroup label="' . $group_label . '">';
                                                    foreach($group as $service) {
                                                        echo '<option value="' . $service['id'] . '">'
                                                            . $service['name'] . '</option>';
                                                    }
                                                    echo '</optgroup>';
                                                }
                                            }
                                        }  else {
                                            foreach($available_services as $service) {
                                                echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <!--
                                <label for="select-provider">
                                    <strong><?= lang('select_provider') ?></strong>
                                </label>
                                -->
                                <select id="select-provider" class="col-xs-12 col-sm-4 form-control" disabled></select>
                            </div>

                            <div id="service-description" style="display:none;"></div>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-next-1" class="btn button-next btn-warning"
                                data-step_index="1">
                            <?= lang('next') ?>
                            <span class="glyphicon glyphicon-forward"></span>
                        </button>
                    </div>
                </div>

                <!-- SELECT APPOINTMENT DATE -->

                <div id="wizard-frame-2" class="wizard-frame" style="display:none;">
                    <div class="frame-container">

                        <h3 class="frame-title"><?= lang('step_two_title') ?></h3>

                        <div class="frame-content row">
                            <div class="col-xs-12 col-sm-5">
                                <div id="select-date"></div>
                            </div>

                            <div class="col-xs-12 col-sm-7">
                                <div id="available-hours"></div>
                            </div>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-2" class="btn button-back btn-default"
                                data-step_index="2">
                            <span class="glyphicon glyphicon-backward"></span>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-2" class="btn button-next btn-warning"
                                data-step_index="2">
                            <?= lang('next') ?>
                            <span class="glyphicon glyphicon-forward"></span>
                        </button>
                    </div>
                </div>

                <!-- ENTER CUSTOMER DATA -->

                <div id="wizard-frame-3" class="wizard-frame" style="display:none; height: 640px;">
                    <div class="frame-container">

                        <h3 class="frame-title"><?= lang('step_three_title') ?></h3>

                        <div class="frame-content row">
                            <div class="col-xs-12">
                                <!--<div class="form-group">
                                    <label for="first-name" class="control-label"><?= lang('first_name') ?> *</label>
                                    <input type="text" id="first-name" class="required form-control" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="last-name" class="control-label"><?= lang('last_name') ?> *</label>
                                    <input type="text" id="last-name" class="required form-control" maxlength="120" />
                                </div>-->

                                <div class="form-group">
                                    <label for="full-name" class="control-label"><?= lang('full_name') ?> *</label>
                                    <input type="text" id="full-name" class="required form-control" maxlength="100" value="Mostanser Billah"/>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label"><?= lang('email') ?> *</label>
                                    <input type="text" id="email" class="required form-control" maxlength="120" value="billahnorm@gmail.com"/>
                                </div>
                                <div class="form-group">
                                    <label for="phone-number" class="control-label"><?= lang('phone_number') ?> *</label>
                                    <input type="text" id="phone-number" class="required form-control" maxlength="60" value="01717619996"/>
                                </div>
                                <div class="form-group">
                                    <label for="password"><?= lang('password') ?> *</label>
                                    <input type="password" id="password" class="form-control required" maxlength="512" value="1236">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm"><?= lang('retype_password') ?> *</label>
                                    <input type="password" id="password-confirm" class="form-control required" maxlength="512" value="1236">
                                </div>

                                <inpt type="hidden" name="country" value="Bangladesh" id="country"/>
                                <!--
                                <inpt type="hidden" name="city" value="Dhaka" id="city"/>
                                <inpt type="hidden" name="state" value="Dhaka" id="state"/>
                                <inpt type="hidden" name="zip" value="1217" id="zip"/>
                                -->
                                <input type="hidden" value="430" name="amount" id="total_amount"/>

                            </div>

                            <!--<div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="control-label"><?= lang('address') ?></label>
                                    <input type="text" id="address" class="form-control" maxlength="120" />
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label"><?= lang('city') ?></label>
                                    <input type="text" id="city" class="form-control" maxlength="120" />
                                </div>
                                <div class="form-group">
                                    <label for="zip-code" class="control-label"><?= lang('zip_code') ?></label>
                                    <input type="text" id="zip-code" class="form-control" maxlength="120" />
                                </div>
                                <div class="form-group">
                                    <label for="notes" class="control-label"><?= lang('notes') ?></label>
                                    <textarea id="notes" maxlength="500" class="form-control" rows="3"></textarea>
                                </div>
                            </div>-->

                            <?php if ($display_terms_and_conditions): ?>
                            <label>
                                <input type="checkbox" class="required" id="accept-to-terms-and-conditions">
                                <?= strtr(lang('read_and_agree_to_terms_and_conditions'),
                                    [
                                        '{$link}' => '<a href="#" data-toggle="modal" data-target="#terms-and-conditions-modal">',
                                        '{/$link}' => '</a>'
                                    ])
                                ?>
                            </label>
                            <br>
                            <?php endif ?>

                            <?php if ($display_privacy_policy): ?>
                            <label>
                                <input type="checkbox" class="required" id="accept-to-privacy-policy">
                                <?= strtr(lang('read_and_agree_to_privacy_policy'),
                                    [
                                        '{$link}' => '<a href="#" data-toggle="modal" data-target="#privacy-policy-modal">',
                                        '{/$link}' => '</a>'
                                    ])
                                ?>
                            </label>
                            <br>
                            <?php endif ?>

                            <span id="form-message" class="text-danger"><?= lang('fields_are_required') ?></span>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-3" class="btn button-back btn-default"
                                data-step_index="3"><span class="glyphicon glyphicon-backward"></span>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-3" class="btn button-next btn-warning"
                                data-step_index="3">
                            <?= lang('next') ?>
                            <span class="glyphicon glyphicon-forward"></span>
                        </button>
                    </div>
                </div>

                <!-- APPOINTMENT DATA CONFIRMATION -->

                <div id="wizard-frame-4" class="wizard-frame" style="display:none;">
                    <div class="frame-container">
                        <h3 class="frame-title"><?= lang('step_four_title') ?></h3>
                        <div class="frame-content row">
                            <div id="appointment-details" class="col-xs-12 col-sm-6"></div>
                            <div id="customer-details" class="col-xs-12 col-sm-6"></div>
                        </div>

                        <div class="col-xs-12 col-sm-12">
                            <img id="paywith-logo-sslcomm" style="width: 100%" class="pull-right" src="<?= base_url('assets/img/paywithlogo.jpg') ?>" />
                        </div>

                        <?php if ($this->settings_model->get_setting('require_captcha') === '1'): ?>
                        <div class="frame-content row">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="captcha-title">
                                    CAPTCHA
                                    <small class="glyphicon glyphicon-refresh"></small>
                                </h4>
                                <img class="captcha-image" src="<?= site_url('captcha') ?>">
                                <input class="captcha-text" type="text" value="" />
                                <span id="captcha-hint" class="help-block" style="opacity:0">&nbsp;</span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-4" class="btn button-back btn-default"
                                data-step_index="4">
                            <span class="glyphicon glyphicon-backward"></span>
                            <?= lang('back') ?>
                        </button>
                        <form id="book-appointment-form" style="display:inline-block" method="post">
                            <button id="book-appointment-submit" type="button" class="btn btn-lg btn-danger">
                                <span class="glyphicon glyphicon-ok"></span>
                                <?= !$manage_mode ? lang('confirm_and_pay') : lang('update') ?>
                            </button>
                            <input type="hidden" name="csrfToken" />
                            <input type="hidden" name="post_data" />
                        </form>
                    </div>
                </div>

                <!-- FRAME FOOTER -->

                <div id="frame-footer">
                    Powered By
                    <a href="https://ris10.com" target="_blank">Ruhama IT Solutions</a>
                    |
                    <span id="select-language" class="label label-success">
    		        	<?= ucfirst($this->config->item('language')) ?>
    		        </span>
                    |
                    <a href="<?= site_url('backend'); ?>">
                        <?= $this->session->user_id ? lang('backend_section') : lang('login') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php if ($display_cookie_notice === '1'): ?>
        <?php require 'cookie_notice_modal.php' ?>
    <?php endif ?>

    <?php if ($display_terms_and_conditions === '1'): ?>
        <?php require 'terms_and_conditions_modal.php' ?>
    <?php endif ?>

    <?php if ($display_privacy_policy === '1'): ?>
        <?php require 'privacy_policy_modal.php' ?>
    <?php endif ?>

    <script>
        var GlobalVariables = {
            availableServices   : <?= json_encode($available_services) ?>,
            availableProviders  : <?= json_encode($available_providers) ?>,
            baseUrl             : <?= json_encode(config('base_url')) ?>,
            manageMode          : <?= $manage_mode ? 'true' : 'false' ?>,
            customerToken       : <?= json_encode($customer_token) ?>,
            dateFormat          : <?= json_encode($date_format) ?>,
            timeFormat          : <?= json_encode($time_format) ?>,
            displayCookieNotice : <?= json_encode($display_cookie_notice === '1') ?>,
            appointmentData     : <?= json_encode($appointment_data) ?>,
            providerData        : <?= json_encode($provider_data) ?>,
            customerData        : <?= json_encode($customer_data) ?>,
            csrfToken           : <?= json_encode($this->security->get_csrf_hash()) ?>
        };

        var EALang = <?= json_encode($this->lang->language) ?>;
        var availableLanguages = <?= json_encode($this->config->item('available_languages')) ?>;
    </script>

    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book_api.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book.js') ?>"></script>

    <script>
        $(document).ready(function() {
            FrontendBook.initialize(true, GlobalVariables.manageMode);
            GeneralFunctions.enableLanguageSelection($('#select-language'));
        });
    </script>

    <?php google_analytics_script(); ?>
</body>
</html>
