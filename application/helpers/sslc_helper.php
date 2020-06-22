<?php
	/**
	* SSLCOMMERZ PAYMENT GATEWAY FOR CodeIgniter
	*
	* Module: Pay Via API (CodeIgniter 3.1.6)
	* Developed By: Prabal Mallick
	* Email: prabal.mallick@sslwireless.com
	* Author: Software Shop Limited (SSLWireless)
	*
	**/

	defined('BASEPATH') OR exit('No direct script access allowed');

	define("SSLCZ_STORE_ID", "choru5d667935dbc4b");
	define("SSLCZ_STORE_PASSWD", "choru5d667935dbc4b@ssl");

	# IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	define("SSLCZ_IS_SANDBOX", true);

	# IF BROWSE FROM LOCAL HOST, KEEP true
	define("SSLCZ_IS_LOCAL_HOST", true);


 function getRecordQuery($tran_id){
    $sql = "select * from ea_orders WHERE transaction_id='" . $tran_id . "'";
    return $sql;
 }
 function saveTransactionQuery($post_data){
    $name = $post_data['cus_name'];
    $email = $post_data['cus_email'];
    $customer_id = $post_data['customer_id'];
    $appointment_id = $post_data['appointment_id'];

    $phone = $post_data['cus_phone'];
    $transaction_amount = $post_data['total_amount'];
    $address = '';
    $transaction_id = (isset($post_data['tran_id'])) ? $post_data['tran_id'] : '0';
    $currency = $post_data['currency'];
    $sql = "INSERT INTO ea_orders (name, email, phone, amount, address, status, transaction_id,currency, customer_id, appointment_id)
                                    VALUES ('$name', '$email', '$phone','$transaction_amount','$address','Pending', '$transaction_id','$currency','$customer_id','$appointment_id')";

    return $sql;
 }

 function updateTransactionQuery($tran_id, $type = 'Success'){
    $sql = "UPDATE ea_orders SET status='$type' WHERE transaction_id='$tran_id'";

    return $sql;
}
