<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Booking</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
<!--                    --><?//= lang('customer_form_title') ?>Customer Booking Form
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input required class="form-control form-control-lg" type="text" placeholder="নাম লিখুন(*)">
                        </div>
                        <div class="form-group">
                            <input required class="form-control form-control-lg" type="text" placeholder="ফোন নাম্বার(*)">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input required class="form-control form-control-lg" type="text" placeholder="Amount(*)">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Street Address">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="City">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="booking/patientform" class="btn btn-primary">Patient Form</a>
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

<!--		<img src="img/ssl.png" class="img">-->
<!--		<h4 align="center">Pay With SSLCommerz - Nexus / Debit / Credit / Mobile / Internet Banking</h4>-->
<!--		<form method="post" action="requestssl">-->
<!--			<table>-->
<!--				<tr>-->
<!--					<td>Name</td>-->
<!--					<td><input type="text" name="fname" required class="tbox" autofocus placeholder="Name" value="Prabal Mallick"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Email</td>-->
<!--					<td><input type="email" name="email" required class="tbox" placeholder="Email" value="prabalsslw@gmail.com"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Phone</td>-->
<!--					<td><input type="text" name="phone" required class="tbox" placeholder="Phone" value="01680032580"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Amount</td>-->
<!--					<td><input type="text" name="amount" required value="200" class="tbox" placeholder="Amount"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Country</td>-->
<!--					<td><input type="text" name="country" required class="tbox" placeholder="Country" value="Bangladesh"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Address</td>-->
<!--					<td><input type="text" name="address" required class="tbox" placeholder="Address" value="Gazipur"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Street Address</td>-->
<!--					<td><input type="text" name="street" required class="tbox" placeholder="Street Address" value="Joydebpur"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>State</td>-->
<!--					<td><input type="text" name="state" required class="tbox" placeholder="State" value="Gazipur"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>City</td>-->
<!--					<td><input type="text" name="city" required class="tbox" placeholder="City" value="Gazipur"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Post Code</td>-->
<!--					<td><input type="text" name="postcode" required class="tbox" placeholder="Post Code" value="1700"></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td colspan="2"><input type="submit" name="submit" value="Place Order" class="btn"></td>-->
<!--				</tr>-->
<!--			</table>-->
<!--            <input type="hidden" name="csrfToken" value="--><?//= $this->security->get_csrf_hash() ?><!--" />-->
<!--		</form>-->
<!---->
<!--	</div>-->
<!--	<img src="img/ssl2.png" style="display: block; margin: 0 auto; height:120px; width:600px;">-->
<!--	<span>2017 &copy; SSL Wireless</span>-->
</body>
</html>
