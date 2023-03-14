<?php

/******************************************************************************

#                      PHP Authorize.net Payment Terminal v2.4.0

#******************************************************************************

#      Author:     CriticalGears

#      Email:      info@criticalgears.io

#      Website:    http://www.criticalgears.io

#

#

#      Version:    2.4.0

#      Copyright:  (c) 2012 - CriticalGears.io

#

#*******************************************************************************/



use net\authorize\api\contract\v1 as AnetAPI;

use net\authorize\api\controller as AnetController;



$province = str_replace("-AU-", "", $state);



	# PLEASE DO NOT EDIT FOLLOWING LINES IF YOU'RE NOT SURE ------->

        if ($show_services) {

            if($payment_mode=="RECUR"){

                $amount = number_format($recur_services[$service][1], 2, ".","");

            } else {

                $amount = number_format($services[$service][1], 2, ".","");

            }

            $item_description = $services[$service][0];

        } else { $amount = number_format($amount, 2, ".",""); }





		$continue = false;

		if(!empty($amount) && is_numeric($amount)){ 	

			$cctype = ! empty( $_POST["cctype"] ) ? esc_str( $_POST["cctype"] ) : '';

			$ccname = ! empty( $_POST["ccname"] ) ? esc_str( $_POST["ccname"] ) : '';

			$ccn    = ! empty( $_POST["ccn"] ) ? esc_str( $_POST["ccn"] ) : '';

			$exp1   = ! empty( $_POST["exp1"] ) ? esc_str( $_POST["exp1"] ) : '';

			$exp2   = ! empty( $_POST["exp2"] ) ? esc_str( $_POST["exp2"] ) : '';

			$cvv    = ! empty( $_POST["cvv"] ) ? esc_str( $_POST["cvv"] ) : '';

			

            if($cctype!="PP"){

                //CREDIT CARD PHP VALIDATION



                if(!is_numeric($cvv)){

                    $continue = false;

                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> CVV number can contain numbers only.</p></div></div><br />';

                } else {

                    $continue = true;

                }



                if(!is_numeric($ccn)){

                    $continue = false;

                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Credit Card number can contain numbers only.</p></div></div><br />';

                } else {

                    $continue = true;

                }



                if(date("Y-m-d", strtotime($exp2."-".$exp1."-01")) < date("Y-m-d")){

                    $continue = false;

                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Your credit card is expired.</p></div></div><br />';

                } else {

                    $continue = true;

                }



                if($continue){

                    //echo "1";

                    if(validateCC($ccn,$cctype)){

                        $continue = true;

                    } else {

                        $continue = false;

                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> The number you\'ve entered does not match the card type selected.</p></div></div><br />';

                    }

                }



                if($continue){

                    if(luhn_check($ccn)){

                        $continue = true;

                    } else {

                        $continue = false;

                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Invalid credit card number.</p></div></div><br />';

                    }

                }



                if(empty($ccn) || empty($cctype) || empty($exp1) || empty($exp2) || empty($ccname) || empty($cvv) || empty($address) || empty($state) || empty($city)){

                    $continue = false;

                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Not all required fields were filled out.</p></div></div><br />';

                } else { $continue = true; }



            } else {

                $continue = true;

            }

			

			switch($cctype){

				case "V":

					$cctype = "VISA";

				break;

				case "M":

					$cctype = "MASTERCARD";

				break;

                case "DI":

                    $cctype = "DINERS CLUB";

                break;

				case "D":

					$cctype = "DISCOVER";

				break;

				case "A":

					$cctype = "AMEX";

				break;

                case "PP":

                    $cctype = "PAYPAL";

                break;

			}



            $transactID = time()."-".rand(1,999);



            if($continue && $cctype!="PAYPAL"){

				###########################################################################

				###	Authorize.net PROCESSING

				###########################################################################

				//PROCESS PAYMENT BY WEBSITE PAYMENTS PRO



                require 'sdk/autoload.php';



                define("AUTHORIZENET_LOG_FILE", "");



                /* Create a merchantAuthenticationType object with authentication details

					   retrieved from the constants file */

                $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

                $merchantAuthentication->setName(MERCHANT_LOGIN);

                $merchantAuthentication->setTransactionKey(MERCHANT_TRAN_KEY);



                // Set the transaction's refId

                $refId = 'ref' . time();



                switch($payment_mode){

                case "ONETIME":





                    // Create the payment data for a credit card

                    $creditCard = new AnetAPI\CreditCardType();

                    $creditCard->setCardNumber($ccn);

                    $creditCard->setExpirationDate("{$exp2}-{$exp1}");//"2038-12"

                    $creditCard->setCardCode($cvv);



                    // Add the payment data to a paymentType object

                    $paymentOne = new AnetAPI\PaymentType();

                    $paymentOne->setCreditCard($creditCard);



                    // Create order information

                    $order = new AnetAPI\OrderType();

                    $order->setInvoiceNumber("INV:".$transactID);

                    $order->setDescription($item_description);



                    // Set the customer's Bill To address

                    $customerAddress = new AnetAPI\CustomerAddressType();

                    $customerAddress->setFirstName($fname);

                    $customerAddress->setLastName($lname);

                    $customerAddress->setAddress($address);

                    $customerAddress->setCity($city);

                    $customerAddress->setState($state);

                    $customerAddress->setZip($zip);

                    $customerAddress->setCountry($country);



                    // Set the customer's identifying information

                    $customerData = new AnetAPI\CustomerDataType();

                    $customerData->setType("individual");

                    $customerData->setEmail($email);

                    if($enableCustomerID)

                        $customerData->setId($customer_number);



                    // Create a TransactionRequestType object and add the previous objects to it

                    $transactionRequestType = new AnetAPI\TransactionRequestType();

                    $transactionRequestType->setTransactionType("authCaptureTransaction");

                    $transactionRequestType->setAmount(number_format($amount,2, ".",""));

                    $transactionRequestType->setOrder($order);

                    $transactionRequestType->setPayment($paymentOne);

                    $transactionRequestType->setBillTo($customerAddress);

                    $transactionRequestType->setCustomer($customerData);

                    $transactionRequestType->setCustomerIP($_SERVER['REMOTE_ADDR']);



                    // Assemble the complete transaction request

                    $request = new AnetAPI\CreateTransactionRequest();

                    $request->setMerchantAuthentication($merchantAuthentication);

                    $request->setRefId($refId);

                    $request->setTransactionRequest($transactionRequestType);



                    // Create the controller and get the response

                    $controller = new AnetController\CreateTransactionController($request);

                    if($liveMode) {

                        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION );

                    }else{

                        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX );

                    }



                    if ($response != null) {

                        // Check to see if the API request was successfully received and acted upon

                        if ($response->getMessages()->getResultCode() == "Ok") {

                            // Since the API request was successful, look for a transaction response

                            // and parse it to display the results of authorizing the card

                            $tresponse = $response->getTransactionResponse();



                            if ($tresponse != null && $tresponse->getMessages() != null) {



                                $sMessageResponse= "<br /><div>Your payment was <b>APPROVED</b>!<br>";

                                $sMessageResponse .= "<div>Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "</div>";

                                $sMessageResponse .= "<div>Description: " . $tresponse->getMessages()[0]->getDescription() . "</div>";
                                $user_id = base64_encode($customer_number);

                                $sMessageResponse .= "<br/><a href='/website/editplumberprofile/". $user_id."'>Return to payment page</a><br /><br/></div>";

                                $mess = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';



                                #**********************************************************************************************#

                                #		THIS IS THE PLACE WHERE YOU WOULD INSERT ORDER TO DATABASE OR UPDATE ORDER STATUS.

                                #**********************************************************************************************#



                                #**********************************************************************************************#

                                /******************************************************************

                                ADMIN EMAIL NOTIFICATION

                                 ******************************************************************/

                                $headers  = "MIME-Version: 1.0\n";

                                $headers .= "Content-type: text/html; charset=utf-8\n";

                                $headers .= "From: 'Authorize.net Payment Terminal' <noreply@".$_SERVER['HTTP_HOST']."> \n";

                                $subject = "New Payment Received";

                                $message =  "New payment was successfully received through authorize.net <br />";

                                $message .= "from ".$fname." ".$lname."  on ".date('m/d/Y')." at ".date('g:i A').".<br /> Payment total is: $".number_format($amount,2);

                                if($show_services){

                                    $message .= "<br />Payment was made for \"".$services[$service][0]."\"";

                                } else {

                                    $message .= "<br />Payment description: \"".$item_description."\"";

                                }

                                $message .= "<br />Payment amount: $" . number_format($amount, 2);

                                $message .= "<br />Transaction ID: " . $tresponse->getTransId();

                                $message .= "<br /><br />Billing Information:<br />";

                                if($enableCustomerID)

                                    $message .= "Customer ID: ".$customer_number."<br />";

                                $message .= "Full Name: ".$fname." ".$lname."<br />";

                                $message .= "Email: ".$email."<br />";

                                $message .= "Address: ".$address."<br />";

                                $message .= "City: ".$city."<br />";

                                $message .= "Country: ".$country."<br />";

                                $message .= "State/Province: ".$state."<br />";

                                $message .= "ZIP/Postal Code: ".$zip."<br />";

                                mail($admin_email,$subject,$message,$headers);





                                /******************************************************************

                                CUSTOMER EMAIL NOTIFICATION

                                 ******************************************************************/

                                $subject = "Payment Received!";

                                $message =  "Dear ".$fname.",<br />";

                                $message .= "<br /> Thank you for your payment.";

                                $message .= "<br /><br />";

                                if ($show_services) {

                                    $message .= "<br />Payment was made for \"" . $services[$service][0] . "\"";

                                } else {

                                    $message .= "<br />Payment was made for: \"" . $item_description . "\"";

                                }

                                $message .= "<br />Payment amount: $" . number_format($amount, 2);

                                $message .= "<br />Transaction ID: " . $tresponse->getTransId();

                                $message .= "<br /><br />Billing Information:<br />";

                                if($enableCustomerID)

                                    $message .= "Customer ID: ".$customer_number."<br />";

                                $message .= "Full Name: " . $fname . " " . $lname . "<br />";

                                $message .= "Email: " . $email . "<br />";

                                $message .= "Address: " . $address . "<br />";

                                $message .= "City: " . $city . "<br />";

                                $message .= "Country: " . $country . "<br />";

                                $message .= "State/Province: " . $state . "<br />";

                                $message .= "ZIP/Postal Code: " . $zip . "<br />";



                                $message .= "<br /><br />Kind Regards,<br />" . $_SERVER['HTTP_HOST'];

                                mail($email,$subject,$message,$headers);



                                if($redirectAfterSuccessPayment && !empty($redirectURL)){

                                    header("Location: {$redirectURL}");

                                    exit();

                                }

                                //-----> send notification end

                                $show_form=0;

                            } else {

                            // "Transaction Failed \n";



                                $sMessageResponse= "<br /><div>Your payment was <b>FAILED</b>!<br>";

                                if ($tresponse->getErrors() != null) {

                                    $sMessageResponse .= "<div>Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "</div>";

                                    $sMessageResponse .= "<div>Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "</div><br>";

                                }

                                $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                            }

                            // Or, print errors if the API request wasn't successful

                        } else {

                            // "Transaction Failed \n";

                            $tresponse = $response->getTransactionResponse();



                            $sMessageResponse= "<br /><div>Your payment was <b>FAILED</b>!<br>";

                            if ($tresponse != null && $tresponse->getErrors() != null) {



                                $sMessageResponse .= "<div>Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "</div>";

                                $sMessageResponse .= "<div>Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "</div><br>";

                            } else {



                                $sMessageResponse .= "<div>Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "</div>";

                                $sMessageResponse .= "<div>Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "</div><br>";

                            }

                            $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                        }

                    } else {

                        //echo  "No response returned \n";

                        $sMessageResponse= "<br /><div>Payment processing returned <b>ERROR</b>!";

                        $sMessageResponse .= "<div>No Response</div>";

                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                    }





                break;

                case "RECUR":

                    require 'includes/authorizenet.class.php';

                /*******************************************************************************************************

                RECURRING PROCESSING

                *******************************************************************************************************/



                    $arb_interval = get_arb_interval($recur_services[$service][2],$recur_services[$service][3]);

                    // Subscription Type Info

                    $subscription = new AnetAPI\ARBSubscriptionType();

                    $subscription->setName("Sample Subscription");



                    $interval = new AnetAPI\PaymentScheduleType\IntervalAType();

                    $interval->setLength($arb_interval[1]);

                    $interval->setUnit($arb_interval[0]);



                    $paymentSchedule = new AnetAPI\PaymentScheduleType();

                    $paymentSchedule->setInterval($interval);

                    $paymentSchedule->setStartDate(new DateTime(date("Y-m-d")));

                    $paymentSchedule->setTotalOccurrences(9999);

                    if($recur_services[$service][4]!="0") {

                        $paymentSchedule->setTrialOccurrences( $recur_services[$service][4] );

                    }



                    $subscription->setPaymentSchedule($paymentSchedule);

                    $subscription->setAmount($amount);

                    if($recur_services[$service][4]!="0") {

                        $subscription->setTrialAmount( $recur_services[$service][5] );

                    }else{

                        $subscription->setTrialAmount( "0.00" );

                    }



                    $creditCard = new AnetAPI\CreditCardType();

                    $creditCard->setCardNumber($ccn);

                    $creditCard->setExpirationDate("{$exp2}-{$exp1}");//"2038-12"

                    $creditCard->setCardCode($cvv);



                    $payment = new AnetAPI\PaymentType();

                    $payment->setCreditCard($creditCard);

                    $subscription->setPayment($payment);



                    $order = new AnetAPI\OrderType();

                    $order->setInvoiceNumber("INV:".$transactID);

                    $order->setDescription($item_description);

                    $subscription->setOrder($order);



                    $billTo = new AnetAPI\NameAndAddressType();

                    $billTo->setFirstName($fname);

                    $billTo->setLastName($lname);



                    $subscription->setBillTo($billTo);



                    $request = new AnetAPI\ARBCreateSubscriptionRequest();

                    $request->setmerchantAuthentication($merchantAuthentication);

                    $request->setRefId($refId);

                    $request->setSubscription($subscription);

                    $controller = new AnetController\ARBCreateSubscriptionController($request);



                    if($liveMode) {

                        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION );

                    }else{

                        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX );

                    }



                    if ($response != null) {

                        // Check to see if the API request was successfully received and acted upon

                        if ($response->getMessages()->getResultCode() == "Ok") {



                                $sMessageResponse= "<br /><div>Subscription was <b>APPROVED</b>!<br>";

                                $sMessageResponse .= "<div>Successfully created with Transaction ID: " . $response->getSubscriptionId() . "</div>";
                                $user_id = base64_encode($customer_number);
                                $sMessageResponse .= "<br/><a href='/website/editplumberprofile/". $user_id."'>Return to payment page</a><br /><br/></div>";

                                $mess = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';



                                #**********************************************************************************************#

                                #		THIS IS THE PLACE WHERE YOU WOULD INSERT ORDER TO DATABASE OR UPDATE ORDER STATUS.

                                #**********************************************************************************************#
                       

                                $servername = "localhost";
                                $username = "newplumber";
                                $password = "newplumber@2021";
                                $dbname = "latest_plumbers";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                               // die("Connection failed: " . $conn->connect_error);
                                }

                                $transactID = $response->getSubscriptionId();
                                $current_date = date('Y-m-d H:i:s');
                               
                                $sql = "INSERT INTO transactions (`user_id`,trans_id, `status`, crated_at) VALUES ( '$customer_number','$transactID', 'paid', '$current_date')";
                                    if ($conn->query($sql) === TRUE) {
                                    // echo "New record created successfully";
                                  } else {
                                    // echo "Error: " . $sql . "<br>" . $conn->error;
                                  }

                             $conn->close();



                                #**********************************************************************************************#

                                /******************************************************************

                                ADMIN EMAIL NOTIFICATION

                                 ******************************************************************/

                                $headers  = "MIME-Version: 1.0\n";

                                $headers .= "Content-type: text/html; charset=utf-8\n";

                                $headers .= "From: 'Authorize.net Payment Terminal' <noreply@".$_SERVER['HTTP_HOST']."> \n";

                                $subject = "New Recurring Payment Received";

                                $message = "New recurring payment was successfully received through authorize.net <br />";

                                $message .= "from ".$fname." ".$lname."  on ".date('m/d/Y')." at ".date('g:i A').".<br /> Payment total is: $".number_format($amount,2);

                                if($show_services){

                                    $message .= "<br />Payment was made for \"".$recur_services[$service][0]."\"";

                                } else {

                                    $message .= "<br />Payment description: \"".$item_description."\"";

                                }

                                $message .= "<br/>Start Date: ".date("Y-m-d")."<br />";

                                $message .= "Billing Frequency: ".$recur_services[$service][3]. " ". $recur_services[$service][2]."<br />";

                                $message .= "Subscription ID: ".$response->getSubscriptionId()."<br />";

                                $message .= "Reference ID: ".$refId."<br /><br />";

                                $message .= "<br /><br />Billing Information:<br />";

                                if($enableCustomerID)

                                    $message .= "Customer ID: ".$customer_number."<br />";

                                $message .= "Full Name: ".$fname." ".$lname."<br />";

                                $message .= "Email: ".$email."<br />";

                                $message .= "Address: ".$address."<br />";

                                $message .= "City: ".$city."<br />";

                                $message .= "Country: ".$country."<br />";

                                $message .= "State/Province: ".$state."<br />";

                                $message .= "ZIP/Postal Code: ".$zip."<br /><br />";



                                $message .= "If for any reason you need to cancel this subscription you can follow <a href='http://".$_SERVER["SERVER_NAME"].(stristr($_SERVER["REQUEST_URI"],"index.php")? str_replace("index.php","cancel.php",$_SERVER["REQUEST_URI"]) : "/cancel.php").(stristr($_SERVER["REQUEST_URI"],"?")?"&subid=":"?subid=").$response->getSubscriptionId()."'>this link</a><br />";

                                mail($admin_email,$subject,$message,$headers);





                                /******************************************************************

                                CUSTOMER EMAIL NOTIFICATION

                                 ******************************************************************/

                                $subject = "Payment Received!";

                                $message =  "Dear ".$fname.",<br />";

                                $message .= "<br /> Thank you for your payment.";

                                $message .= "<br /><br />";

                                if($show_services){

                                    $message .= "<br />Payment was made for \"".$recur_services[$service][0]."\"";

                                } else {

                                    $message .= "<br />Payment description: \"".$item_description."\"";

                                }

                                $message .= "<br/>Start Date: ".date("Y-m-d")."<br />";

                                $message .= "Billing Frequency: ".$recur_services[$service][3]. " ". $recur_services[$service][2]."<br />";

                                $message .= "Subscription ID: ".$response->getSubscriptionId()."<br />";

                                $message .= "Reference ID: ".$refId;

                                $message .= "<br />Payment amount: $" . number_format($amount, 2);

                                $message .= "<br /><br />Billing Information:<br />";

                                if($enableCustomerID)

                                    $message .= "Customer ID: ".$customer_number."<br />";

                                $message .= "Full Name: " . $fname . " " . $lname . "<br />";

                                $message .= "Email: " . $email . "<br />";

                                $message .= "Address: " . $address . "<br />";

                                $message .= "City: " . $city . "<br />";

                                $message .= "Country: " . $country . "<br />";

                                $message .= "State/Province: " . $state . "<br />";

                                $message .= "ZIP/Postal Code: " . $zip . "<br /><br />";

                                $message .= "If for any reason you need to cancel this subscription you can follow <a href='http://".$_SERVER["SERVER_NAME"].(stristr($_SERVER["REQUEST_URI"],"index.php")? str_replace("index.php","cancel.php",$_SERVER["REQUEST_URI"]) : "/cancel.php").(stristr($_SERVER["REQUEST_URI"],"?")?"&subid=":"?subid=").$response->getSubscriptionId()."'>this link</a><br />";

                                $message .= "<br /><br />Kind Regards,<br />" . $_SERVER['HTTP_HOST'];

                                mail($email,$subject,$message,$headers);

                                //-----> send notification end

                                $show_form=0;



                                if($redirectAfterSuccessPayment && !empty($redirectURL)){

                                    header("Location: {$redirectURL}");

                                    exit();

                                }



                        } else {

                            // "Transaction Failed \n";

                            $tresponse = $response->getMessages()->getMessage();



                            $sMessageResponse= "<br /><div>Your subscription was <b>FAILED</b>!<br>";

                            if ($tresponse != null && $tresponse[0]->getCode() != null) {



                                $sMessageResponse .= "<div>Error Code  : " . $tresponse[0]->getCode() . "</div>";

                                $sMessageResponse .= "<div>Error Message : " . $tresponse[0]->getText() . "</div><br>";

                            } else {



                                $sMessageResponse .= "<div>Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "</div>";

                                $sMessageResponse .= "<div>Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "</div><br>";

                            }

                            $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                        }

                    } else {

                        //echo  "No response returned \n";

                        $sMessageResponse= "<br /><div>Payment processing returned <b>ERROR</b>!";

                        $sMessageResponse .= "<div>No Response</div>";

                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                    }





                break;

            }

			

			// The following two functions are for debugging and learning the behavior

			// of authorize.net's response codes.  They output nice tables containing

			// the data passed to and recieved from the gateway.

			//$a->dump_fields();      // outputs all the fields that we set

			//$a->dump_response();    // outputs the response from the payment gateway 



			} else if($continue && $cctype=="PAYPAL"){

                require('includes/paypal.class.php');

                $paypal = new paypal_class;



                $paypal->add_field('business', $paypal_merchant_email);

                $paypal->add_field('return', $paypal_success_url);

                $paypal->add_field('cancel_return', $paypal_cancel_url);

                $paypal->add_field('notify_url', $paypal_ipn_listener_url);



                    if($payment_mode=="ONETIME"){

                        if($show_services){

                            $paypal->add_field('item_name_1', strip_tags(str_replace("'","",$services[$service][0])));

                        } else {

                            $paypal->add_field('item_name_1', strip_tags(str_replace("'","",$item_description)));

                        }

                        $paypal->add_field('amount_1', $amount);

                        $paypal->add_field('item_number_1', $transactID);

                        $paypal->add_field('quantity_1', '1');

                        $paypal->add_field('custom', $paypal_custom_variable);

                        $paypal->add_field('upload', 1);

                        $paypal->add_field('cmd', '_cart');

                        $paypal->add_field('txn_type', 'cart');

                        $paypal->add_field('num_cart_items', 1);

                        $paypal->add_field('payment_gross', $amount);

                        $paypal->add_field('currency_code',$paypal_currency);



                    } else if($payment_mode=="RECUR"){

                        if($show_services){

                            $paypal->add_field('item_name', strip_tags(str_replace("'","",$recur_services[$service][0])));

                        } else {

                            $paypal->add_field('item_name', strip_tags(str_replace("'","",$item_description)));

                        }

                        $paypal->add_field('item_number', $transactID);



                        //TRIAL PERIOD

                        if($recur_services[$service][4]!="0"){

                            $paypal->add_field('a1', $recur_services[$service][5]);

                            $paypal->add_field('p1', $recur_services[$service][4]);

                            $paypal->add_field('t1', "D");

                        }

                        $paypal->add_field('a3', $amount);

                        $paypal_duration = getDurationPaypal($recur_services[$service][2]); //get duration based on recurring_services array

                        $paypal->add_field('p3', $recur_services[$service][3]);

                        $paypal->add_field('t3', (is_array($paypal_duration)?$paypal_duration[0]:$paypal_duration));

                        $paypal->add_field('src', '1');

                        $paypal->add_field('no_note', '1');

                        $paypal->add_field('no_shipping', '1');

                        $paypal->add_field('custom', $paypal_custom_variable);

                        $paypal->add_field('currency_code',$paypal_currency);

                    }

                    $show_form=0;

                    $mess = $paypal->submit_paypal_post(); // submit the fields to paypal





            }





				

		} elseif(!is_numeric($amount) || empty($amount)) { 

			if($show_services){

				$mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Please select service you\'re paying for.</p></div></div><br />';

			} else { 

				$mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Please type amount to pay for services!</p></div></div><br />';

			}

			$show_form=1; 

		} 

	# END OF PLEASE DO NOT EDIT IF YOU'RE NOT SURE

?>

