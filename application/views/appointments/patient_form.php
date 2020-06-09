<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>নতুন পেশেন্টের ডাটা যুক্ত করুন</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
<!--                    --><?//= lang('customer_form_title') ?>নতুন পেশেন্টের ডাটা যুক্ত করুন
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">এপয়েন্টমেন্ট প্রক্রিয়া সম্পন্ন করার জন্য নিচের ফর্মের মাধ্যমে পেশেন্টের সাধারন কিছু ডাটা যুক্ত করুন</h6>
                    <form>
                        <div class="form-group">
                            <input required class="form-control form-control-lg" type="text" placeholder="পেশেন্টের নাম লিখুন(*)">
                        </div>
                        <div class="form-group">
                            <input required class="form-control form-control-lg" type="text" placeholder="পেশেন্টের বয়স(*)">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-lg">
                                <option value="">লিংগ নির্বাচন করুন</option>
                                <option>পুরুষ</option>
                                <option>মহিলা</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="পেশেন্টের ফোন নাম্বার (যদি থাকে)">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="পেশেন্টের বর্তমান ঠিকানা বা জেলার নাম">
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control form-control-lg">
                                <option value="">রোগ বা সমস্যাগুলি কতদিন থেকে লক্ষ্য করছেন?</option>
                                <option>১ সপ্তাহ বা তার চেয়ে কম</option>
                                <option>২ সপ্তাহ</option>
                                <option>১ মাস</option>
                                <option>২ মাস</option>
                                <option>৩ মাস</option>
                                <option>৬ মাস বা তার বেশি</option>
                                <option>১ বছর বা তার বেশি</option>
                                <option>২ বছর বা তার বেশি</option>
                                <option>সঠিক জানা নেই</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="বর্তমান রোগের জন্য কোনো ঔষূধ খেয়ে থাকলে সেগুলা কমা দিয়ে লিখুন">
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control form-control-lg">
                                <option value="">এছাড়াও ডায়াবেটিস, প্রেসার, কিডনী বা অন্য কোনো জটিল রোগ আছে কিনা</option>
                                <option>জি</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="এছাড়াও অন্য কোনো রোগের জন্য নিয়মিত কোনো ঔষূধ খেয়ে থাকলে সেগুলা কমা দিয়ে লিখুন">
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control form-control-lg">
                                <option value="">পেশেন্টের ধূমপান বা মদ্যপান এর অভ্যাস আছে?</option>
                                <option>জি</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control form-control-lg">
                                <option value="">পেশেণ্ট কি বিদেশ ফেরত এমন কারো সংস্পর্সে এসেছিলেন গত কয়েক মাসের মধ্যে?</option>
                                <option>জি</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="inputState" class="form-control form-control-lg">
                                <option value="">যে সমস্যাগুলির কথা বললেন তা পরিবারের অন্য কারো আছে কিনা?</option>
                                <option>জি</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="সর্বশেষ মাসিক কবে শুরু হয়েছিলো তা লিখুন">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <span id="select-language" class="label label-success">
	        	<?= ucfirst($this->config->item('language')) ?>
	        </span>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
