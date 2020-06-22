<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ASTHA JAGAO: MEDICAL CONSULTANCY SERVICES">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Booking</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>EasyCheckout (Popup) - SSLCommerz</h2>

        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this
            sample form for understanding EasyCheckout (Popup) Payment integration with SSLCommerz.</p>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">ASTHA Doctor Consultancy</h6>
                        <small class="text-muted">300 Taka Flat Discount</small>
                    </div>
                    <span class="text-muted">150</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>150 TK</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">আপনার তথ্য দিন</h4>
            <form method="POST" class="needs-validation" novalidate action="requestssl">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">সম্পূর্ণ নাম*
                        <input type="text" name="fname" class="form-control" id="fname" placeholder=""
                               value="John Doe" required>
                        <div class="invalid-feedback">
                            সম্পূর্ণ নাম আবশ্যক
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone">ফোন/মোবাইল*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"
                               value="01717619996" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            ফোন/মোবাইল নাম্বার  আবশ্যক
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone">চার ডিজিটের পিন সেট করুন*</label>
                    <div class="input-group">
                        <input type="password" name="password" maxlength="4" class="form-control" id="password" placeholder="4 Digit PIN"
                               value="" required>
                        <div class="invalid-feedback" style="width: 100%;" >
                            চার ডিজিটের পিন নাম্বার আবশ্যক
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="email">ই-মেইল <span class="text-muted">(যদি থাকে)</span></label>
                    <input type="email" name="email" class="form-control" id="email"
                           placeholder="you@example.com" value="you@example.com" required>
                    <div class="invalid-feedback">
                        যদি থাকে তাহলে সঠিক ই-মেইল এড্রেস্টি দিন
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">ঠিকানা</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="বর্তমান ঠিকানা লিখুন"
                           value="93 B, New Eskaton Road" required>
                    <div class="invalid-feedback">
                        বর্তমান ঠিকানা লিখুন
                    </div>
                </div>
                <inpt type="hidden" name="country" value="Bangladesh" id="country"/>
                <inpt type="hidden" name="city" value="Dhaka" id="state"/>
                <inpt type="hidden" name="state" value="Dhaka" id="state"/>
                <inpt type="hidden" name="zip" value="1217" id="zip"/>
                <input type="hidden" value="1200" name="amount" id="total_amount"/>
                <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>" />

                <!--
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select name="country" class="custom-select d-block w-100" id="country" required>
                            <option value="">Choose...</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                -->
                <hr class="mb-4">

                <button name="submit" value="submit" type="submit" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="checkout_ajax.php"> Pay Now
                </button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
