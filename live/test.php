<?php
 function Common_Curl($url){
    //  echo "hi";exit;
      $curl = curl_init($url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       $curl_response = curl_exec($curl);
       curl_close($curl);
       $response= json_decode($curl_response);
    //   print_r( $response);exit;
       return $response;
   }
   function Common_Auth_Curl($url){
      $username='MOBILEAPP';
      $password='1qazxsw2';
// $URL='<URL>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
$response=curl_exec ($ch);
curl_close ($ch);
 $response= json_decode($response);
  return $response;
// print_r($result);
// $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
// curl_close ($ch);
   }
function Flight_Details()
   {
    //   echo "jitendra";exit;
       // $key="F5msULpnn8dAXGDF7KyuRyDQNKtRyPIyjQPu0MJCkfdnw28nGBk8j8LEkmOUfRG3A1cvDpZVOoX2Pr0SW5hTwoSipDeOwXvBXQoFf9QWVCQ8FZHibe0%C6%92%C2%A5Ybu%C2%A5JWsR1lVoMM3q3wRdoO2ITSykgVKgEpgTEAoC60Bc1QQ14buWY%C6%92%C2%A55OAxhG5qk9VigTca075S9noD8NjLM9bRQip3cpbfSf4wet3mxmODRYz7jSFx7fM=";
       // $key1=json_decode($key);
       // echo $key1;exit;

    //   $key=urlencode($this->input->post('key'));
       $key="F5msULpnn8dAXGDF7KyuRyDQNKtRyPIyjQPu0MJCkfdnw28nGBk8j8LEkmOUfRG3A1cvDpZVOoX2Pr0SW5hTwoSipDeOwXvBXQoFf9QWVCQ8FZHibe0ƒ¥Ybu¥JWsR1lVoMM3q3wRdoO2ITSykgVKgMHqKk4SDBXb1yb0SRzsSruaE1zRV¥0w3uBd3BeQZfO4nKW08W10SShu2WS0qryTvƒXlmEWrDXbNQISa3ZQ1XMI=";
       // echo $key;exit;
       // echo $key;
       $service_url ="https://perimeter-api.intelisystraining.ca/RESTv1/travelOptions/".$key;
       // $service_url="https://perimeter-api.intelisystraining.ca/RESTv1/travelOptions/https://perimeter-api.intelisystraining.ca/RESTv1/travelOptions/F5msULpnn8dAXGDF7KyuRyDQNKtRyPIyjQPu0MJCkfdnw28nGBk8j8LEkmOUfRG3A1cvDpZVOoX2Pr0SW5hTwoSipDeOwXvBXQoFf9QWVCQ8FZHibe0%C6%92%C2%A5Ybu%C2%A5JWsR1lVoMM3q3wRdoO2ITSykgVKgEpgTEAoC60Bc1QQ14buWY%C6%92%C2%A55OAxhG5qk9VigTca075S9noD8NjLM9bRQip3cpbfSf4wet3mxmODRYz7jSFx7fM="
       $row=Common_Curl($service_url);
     
        print_r($row);exit;
       if($row){
        $row->identifier=$row->cityPair->identifier;
        $row->flight_href=$row->flights[0]->href;
        $row->flight_key=$row->flights[0]->key;
        $row->flight_number=$row->flights[0]->flightNumber;
        $row->departure_scheduled_time= $row->flights[0]->departure->scheduledTime;
         $row->departure_airport_code= $row->flights[0]->departure->airport->code;
        $row->departure_airport_name= $row->flights[0]->departure->airport->name;
        $row->arrival_scheduled_time= $row->flights[0]->arrival->scheduledTime;
        $row->arrival_airport_code= $row->flights[0]->arrival->airport->code;
        $row->arrival_airport_name= $row->flights[0]->arrival->airport->name;
        
        // $row->booking_key= $row->fareOptions[0]->bookingKey;
        // $row->fairClass_href=$row->fareOptions[0]->fareClass->href;
        // $row->fairClass_key=$row->fareOptions[0]->fareClass->key;
        // $row->fairClass_code=$row->fareOptions[0]->fareClass->code;
        // $row->fairClass_description=$row->fareOptions[0]->fareClass->description;


        if($row)
       {
               if($row->fareOptions)
               {
                   $amount=0;
                   $fare=array();
                   foreach($row->fareOptions as $k=>$v)
                   {
                       if($v->fareCharges)
                       {
                           foreach($v->fareCharges as $ke=>$val)
                           {
                               $amount+= $val->currencyAmounts[0]->totalAmount;
                           }
                       }
                       $href_res=Common_Auth_Curl($v->fareClass->href);
                       if($href_res){
                         $href_res1=Common_Auth_Curl($href_res->fareRules->fareRuleType->href);
                         $href_last_res=array('href'=>$href_res1->href,'key'=>$href_res1->key,'fareTerms_href'=>$href_res1->fareTerms[0]->href,'fareTerms_href'=>$href_res1->fareTerms[0]->key,'terms_html'=>$href_res1->fareTerms[0]->termsHtml,'terms_text'=>$href_res1->fareTerms[0]->termsText);
                       }
                       	$row->fare[]=array('booking_key'=>$v->bookingKey,'href'=>$v->fareClass->href,'code'=>$v->fareClass->code,'description'=>$v->fareClass->description,'total_amount'=>number_format((float)$amount, 2, '.', ''),'href_response'=>$href_last_res);
                   }
                   // $row->total_amount =  number_format((float)$amount, 2, '.', '');
               }
               
       }
        // $row->total_amount="2000";

       }
        // print_r($row);exit;
      echo json_encode($row);
    //   $this->response($row,REST_Controller::HTTP_OK);
    // 
       // echo json_encode($json_objekat);
   }
  
   
    Flight_Details();
   ?>