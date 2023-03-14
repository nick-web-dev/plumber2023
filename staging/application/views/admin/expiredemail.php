<!doctype html>

<html>

<head>

<meta charset='utf-8'>

<title></title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<style>

@media screen and (min-width: 240px) and (max-width: 480px) {

 body {

 font-family: 'Open Sans', sans-serif;

 margin:0px auto;

 font-size:20px !important;

 width:100%;

}

.main-div 

{

 width: 100% !important;

}

.reset-head 

{

 margin-bottom: 0px !important;

 font-size: 18px !important;

 color: #fff;

font-weight: 100 !important;

 line-height: 16x !important;

 margin-top: 34px !important;

 text-transform: capitalize !important;

 text-align: center !important;

}

.header-content 

{

 float:left !important;

}

#use-keys 

{

 padding: 15px 10px !important;

}

#pwd-option 

{

 font-size:12px !important;

 white-space: wrap !important;

}

}



@media screen and (min-width: 481px) and (max-width:666px) 

{

.main-div 

{

  width: 100% !important;

}

.reset-head 

{

  margin-bottom: 0px !important;

  font-size: 18px !important;

  color: #fff;

  font-weight: 100 !important;

  line-height: 16px !important;

  margin-top: 34px !important;

  text-transform: capitalize !important;

  text-align: center !important;

}

.header-content 

{

  float: left !important;

}

#use-keys 

{

  padding: 15px 10px !important;

}

#pwd-option 

{

  font-size: 12px !important;

  white-space: wrap !important;

}

}

 </style>

</head>

<body style='font-family: 'Open Sans,sans-serif; margin:0px auto; font-size:15px; width:100%;>

<div class='main-div'  style='margin:20px auto; height:auto;border: 1px solid #ccc;width: 177%;'>

  <div class='content' style='width:100%; margin:0px auto;'>

    <div class='top-header' style='width: 100%;padding-bottom: 100px;padding-top: 10px;background: #ffd600;border-bottom: 1px solid #EEEAD1 ;'>

      <div class='logo' style=' float:left; width:10%'> 

        <a href='<?=base_url()?>'>

       <img src='<?php echo base_url();?>assets/website/img/logo.png' alt='logo' style="width: 183px;height: 96px;margin-left:10px;"></a> </div>

      <div class='header-content' style=' float:left; width:80%'>

        <p style='margin-bottom: 0px;font-size: 18px;color: #fff;font-weight: 600;line-height: 18px;margin-top: 34px;  text-transform: uppercase;text-align: center;'><?=@$heading?> </p>

      </div>

    </div>

    <div class='content' style='width:100%;padding: 15px 20px;'>

      <p style='width:90%;font-size: 18px;'><strong>Hello  <?=@$name ?>,</strong></p>

     

        <p style='width:90%;margin-bottom: 0px;font-size: 18px;'><?= $msg ?></p>

     
     <p style="margin-left: 2px;"><a href="<?php echo base_url()?>website/payment/<?php echo $enc_id?>" style="background: #428bca;color: #fff;padding: 7px 26px;border-radius: 4px;text-decoration: none;font-size: 22px;">Pay Now</a></p>
      

      <p style='font-size:19px;'>Thank You.</p>

      </p>

    </div>



  <div style='background-color: #ffd600 !important;text-align: center;'>  <div style='padding: 10px 20px;'>  <a href="javascript:"  style='font-size:18px;font-weight:bold;width:90%;margin-bottom: 10px;color: white;'> Copyright <span>&copy;<span>2021 Call the plumber all All Rights Reserved</div>
					</div>

    </div>

  </div>

  </body>

  </html>

