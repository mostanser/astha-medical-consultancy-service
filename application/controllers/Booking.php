<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \EA\Engine\Types\Text;
use \EA\Engine\Types\Email;
use \EA\Engine\Types\Url;

class Booking extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        // Set user's selected language.
        if ($this->session->userdata('language'))
        {
            $this->config->set_item('language', $this->session->userdata('language'));
            $this->lang->load('translations', $this->session->userdata('language'));
        }
        else
        {
            $this->lang->load('translations', $this->config->item('language')); // default
        }

        // Common helpers
        $this->load->helper('google_analytics');

    }

    /**
     * Default Method
     *
     * The default method will redirect the browser to the user/login URL.
     */
    public function index()
    {
        //header('Location: ' . site_url('user/login'));
        $view = [];
        $this->load->view('appointments/request_booking', $view);

    }

    public function requestssl($appointment_id)
    {
        if ( ! $appointment_id)
        {
            redirect('appointments');
        }

        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('services_model');
        $this->load->model('settings_model');
        $this->load->model('customers_model');

        //retrieve the data needed in the view
        $appointment = $this->appointments_model->get_row($appointment_id);
        $customer_id = $appointment['id_users_customer'];
        $customer = $this->customers_model->get_row($customer_id);
        $provider = $this->providers_model->get_row($appointment['id_users_provider']);
        $service = $this->services_model->get_row($appointment['id_services']);
        $company_name = $this->settings_model->get_setting('company_name');

        //get the exceptions
        //echo '<pre>';
        //print_r($customer);
        //print_r($service);

        if(!is_null($customer))
        {
            $full_name = $customer['full_name'];
            $email = $customer['email'];
            $phone = $customer['phone_number'];
            $amount = $service['price'];
            //$country = $this->input->post('country');
            //$address = $this->input->post('address');
            //$street = $this->input->post('street');
            //$state = $this->input->post('state');
            //$city = $this->input->post('city');
            //$postcode =	$this->input->post('postcode');
            //$password =	$this->input->post('password');

            $post_data = array();
            $post_data['store_id'] = SSLCZ_STORE_ID;
            $post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
            $post_data['total_amount'] = $amount;
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = uniqid()."_sslc";
            $post_data['success_url'] = base_url(). "validate";
            $post_data['fail_url'] = base_url(). "fail";
            $post_data['cancel_url'] = base_url(). "cancel";
            # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

            # EMI INFO
            # $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
            # $post_data['emi_max_inst_option'] = "9";
            # $post_data['emi_selected_inst'] = "9";

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = $full_name;
            $post_data['customer_id'] = $customer_id;
            $post_data['appointment_id'] = $appointment_id;
            $post_data['cus_email'] = $email;
            //$post_data['cus_add1'] = 'address';
            //$post_data['cus_add2'] = "";
            //$post_data['cus_city'] = $city;
            //$post_data['cus_state'] = $state;
            //$post_data['cus_postcode'] = "1000";
            //$post_data['cus_country'] = $country;
            $post_data['cus_phone'] = $phone;
            //$post_data['cus_password'] = $password;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            //$post_data['ship_name'] = "Store Test";
            //$post_data['ship_add1 '] = "Dhaka";
            //$post_data['ship_add2'] = "Dhaka";
            //$post_data['ship_city'] = "Dhaka";
            //$post_data['ship_state'] = "Dhaka";
            //$post_data['ship_postcode'] = "1000";
            //$post_data['ship_country'] = "Bangladesh";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = rand(100,999999);
            //$post_data['value_b '] = "ref002";
            //$post_data['value_c'] = "ref003";
            //$post_data['value_d'] = "ref004";

            # CART PARAMETERS
            $post_data['cart'] = json_encode(array(
                array("product"=>$service['name'],"amount"=>$service['price'])
            ));
            $post_data['product_amount'] = $service['price'];
            $post_data['vat'] = "0";
            $post_data['discount_amount'] = "0";
            $post_data['convenience_fee'] = "0";
            $post_data['csrfToken'] = $this->security->get_csrf_hash();

            $this->load->library('session');

            $session = array(
                'tran_id' => $post_data['tran_id'],
                'amount' => $post_data['total_amount'],
                'currency' => $post_data['currency']
            );
            $this->session->set_userdata('tarndata', $session);
            $this->session->set_userdata('custdata', $post_data);
            $this->session->set_userdata('appointment', $appointment);


            // $this->load->library('sslcommerz');
            //echo "<pre>";
            //print_r($post_data);
            $this->load->helper('sslc_helper');
            $saveSQL = saveTransactionQuery($post_data);
            $this->db->query($saveSQL);

            if($this->sslcommerz->RequestToSSLC($post_data, false))
            {
                //echo "Pending";
                /***************************************
                # Change your database status to Pending.
                 ****************************************/
            }
        }
    }

    public function validateresponse()
    {
        // $this->load->library('sslcommerz');
        $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
        $sesdata = $this->session->userdata('tarndata');
        $tran_id = $_POST['tran_id'];

        if(($sesdata['tran_id'] == $_POST['tran_id']) && ($sesdata['amount'] == $_POST['amount']) && ($sesdata['currency'] == $_POST['currency']))
        {
            $this->load->helper('sslc_helper');
            $custdata = $this->session->userdata('custdata');
            $appointmentdata = $this->session->userdata('appointment');
            $appointment_id = $appointmentdata['id'];

            if($this->sslcommerz->ValidateResponse($_POST['amount'], $_POST['currency'], $_POST))
            {
                $orderDataSQL = getRecordQuery($tran_id);
                $orderData = $this->db->query($orderDataSQL);
                $database_order_status = $orderData->result()[0]->status;
                if($database_order_status == 'Pending' || $database_order_status == 'Processing')
                {
                    /*****************************************************************************
                    # Change your database status to Processing & You can redirect to success page from here
                     ******************************************************************************/
                    //echo "Processing, please do not close the browser...";
                    //echo '<pre>';
                    //print_r($_POST);
                    if($database_order_status == 'Pending'){
                        $updateSQL = updateTransactionQuery($tran_id, 'Processing');
                        $this->db->query($updateSQL);
                    }

                    try
                    {
                        $this->load->model('appointments_model');
                        //=== Update appointment payment status
                        if($_POST['status'] == 'VALID' && $_POST['tran_id'] != ''){
                            $aData = array('id'=>$appointment_id,'payment_status'=>$_POST['status'],'order_id'=>'');
                            //$this->appointments_model->add();
                        }
                        $this->load->model('providers_model');
                        $this->load->model('services_model');
                        $this->load->model('settings_model');
                        $this->load->model('customers_model');
                        //retrieve the data needed in the view
                        $appointment = $this->appointments_model->get_row($appointment_id);
                        $customer = $this->customers_model->get_row($appointment['id_users_customer']);
                        $provider = $this->providers_model->get_row($appointment['id_users_provider']);
                        $service = $this->services_model->get_row($appointment['id_services']);
                        $company_name = $this->settings_model->get_setting('company_name');

                        //echo "<pre>";
                        //print_r($customer);
                        //print_r($appointment);


                        $this->config->load('email');
                        //$this->email->set_newline("\r\n");
                        $email = new \EA\Engine\Notifications\Email($this, $this->config->config);

                        $customer_title = new Text($this->lang->line('appointment_payment_confirmed'));
                        $customer_message = new Text($this->lang->line('thank_you_for_appointment_payment_confirmation'));
                        $provider_title = new Text($this->lang->line('appointment_payment_confirmed'));
                        $provider_message = new Text($this->lang->line('customer_appointment_confirmed'));

                        $send_customer = filter_var($this->settings_model->get_setting('customer_notifications'),
                            FILTER_VALIDATE_BOOLEAN);

                        $this->load->library('ics_file');
                        $ics_stream = $this->ics_file->get_stream($appointment, $service, $provider, $customer);

                        $company_settings = [
                            'company_name' => $this->settings_model->get_setting('company_name'),
                            'company_link' => $this->settings_model->get_setting('company_link'),
                            'company_email' => $this->settings_model->get_setting('company_email'),
                            'date_format' => $this->settings_model->get_setting('date_format'),
                            'time_format' => $this->settings_model->get_setting('time_format')
                        ];

                        $customer_link = new Url(site_url('appointments/index/' . $appointment['hash']));
                        $provider_link = new Url(site_url('backend/index/' . $appointment['hash']));

                        if ($send_customer === TRUE)
                        {
                            $email->sendAppointmentDetails($appointment, $provider,
                                $service, $customer, $company_settings, $customer_title,
                                $customer_message, $customer_link, new Email($customer['email']), new Text($ics_stream));
                        }

                        $send_provider = filter_var($this->providers_model->get_setting('notifications', $provider['id']),
                            FILTER_VALIDATE_BOOLEAN);

                        if ($send_provider === TRUE)
                        {
                            $email->sendAppointmentDetails($appointment, $provider,
                                $service, $customer, $company_settings, $provider_title,
                                $provider_message, $provider_link, new Email($provider['email']), new Text($ics_stream));
                        }
                        /******************************************************************
                        # Just redirect to your success page status already changed by IPN.
                         ******************************************************************/
                        //echo "Just redirect to your success page";
                        //appointments/book_success/' + response.appointment_id
                        redirect("appointments/book_success/$appointment_id");

                    }
                    catch (Exception $exc)
                    {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['exceptions' => [exceptionToJavaScript($exc)]]));
                    }
                }
                else
                {
//                    echo '<pre>';
//                    print_r($_POST);
//                    die;

                    /******************************************************************
                    # Just redirect to your success page status already changed by IPN.
                     ******************************************************************/
                    //echo "Just redirect to your success page";
                    redirect("appointments/book_success/$appointment_id");
                }
            }
        }
    }
    public function fail()
    {
        $database_order_status = 'FAILED'; // Check this from your database here Pending is dummy data,
        if($database_order_status == 'FAILED')
        {
            /*****************************************************************************
            # Change your database status to FAILED & You can redirect to failed page from here
             ******************************************************************************/
            //echo "<pre>";
            //print_r($_POST);
            echo "Transaction Faild";
            redirect("appointments");

        }
        else
        {
            /******************************************************************
            # Just redirect to your success page status already changed by IPN.
             ******************************************************************/
            echo "Just redirect to your failed page";
        }
    }
    public function cancel()
    {
        $database_order_status = 'CANCELLED'; // Check this from your database here Pending is dummy data,
        if($database_order_status == 'CANCELLED')
        {
            /*****************************************************************************
            # Change your database status to CANCELLED & You can redirect to cancelled page from here
             ******************************************************************************/
            //echo "<pre>";
            //print_r($_POST);
            echo "Transaction Canceled";
            redirect("appointments");

        }
        else
        {
            /******************************************************************
            # Just redirect to your cancelled page status already changed by IPN.
             ******************************************************************/
            echo "Just redirect to your failed page";
            redirect("appointments");

        }
    }

    public function ipn()
    {
        // $this->load->library('sslcommerz');
        $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
        $store_passwd = SSLCZ_STORE_PASSWD;
        if($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST))
        {
            $this->load->helper('sslc_helper');
            $tran_id = $_POST['tran_id'];

            if(($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
            {
                if($database_order_status == 'Pending')
                {
                    echo $ipn['gateway_return']['status']."<br>";
                    echo $ipn['ipn_result']['hash_validation_status']."<br>";
                    /*****************************************************************************
                    # Check your database order status, if status = 'Pending' then chang status to 'Processing'.
                     ******************************************************************************/
                    $updateSQL = updateTransactionQuery($tran_id, 'Processing');
                    $this->db->query($updateSQL);
                }
            }
            elseif($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
            {
                if($database_order_status == 'Pending')
                {
                    echo $ipn['gateway_return']['status']."<br>";
                    echo $ipn['ipn_result']['hash_validation_status']."<br>";
                    /*****************************************************************************
                    # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
                     ******************************************************************************/
                    $updateSQL = updateTransactionQuery($tran_id, 'Failed');
                    $this->db->query($updateSQL);

                }
            }
            elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
            {
                if($database_order_status == 'Pending')
                {
                    echo $ipn['gateway_return']['status']."<br>";
                    echo $ipn['ipn_result']['hash_validation_status']."<br>";
                    /*****************************************************************************
                    # Check your database order status, if status = 'Pending' then chang status to 'CANCELLED'.
                     ******************************************************************************/
                    $updateSQL = updateTransactionQuery($tran_id, 'Cancelled');
                    $this->db->query($updateSQL);

                }
            }
            else
            {
                if($database_order_status == 'Pending')
                {
                    echo "Order status not ".$ipn['gateway_return']['status'];
                    /*****************************************************************************
                    # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
                     ******************************************************************************/
                }
            }
            echo "<pre>";
            print_r($ipn);
        }
    }

    public function patientform()
    {
        $view = [];
        $this->load->view('appointments/patient_form', $view);

    }



}
