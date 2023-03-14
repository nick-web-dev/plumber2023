<!DOCTYPE html>
<html lang="en">
<style>
/*.btn-primary, .btn-primary:focus, .btn-primary:hover {*/
/*    background-color: #9D1D20 !important;*/
/*    border-color: #9D1D20 !important;*/
/*}*/
.sign-text {
    color: black !important;
}
.bg-primary {
    background-color: transparent !important;
}
.forgot-button{
	
        background-color: #0275d8!important;
    border-color: #0275d8!important;
    color: white;
    text-transform: capitalize !important;
   margin-left: 72%;
}


.forgot-button:hover{
	 background-color: #0275d8!important;
    border-color: #0275d8!important;
}
.forgot-button i{
 color: #fbfbfb !important;
}
.common-img-bg {
 background-color: #ffd600 !important;
}

</style>
<head>
	<title>Call the Plumber</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/website/images/favicon.png"  type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>assets/website/images/favicon.png" type="image/x-icon">

	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icofont.css" >

	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" >

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/waves/css/waves.min.css" >

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css" >

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css" >	

</head>
<body>

<section class="login p-fixed d-flex text-center common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">

					<form class="md-float-material" id="loginform" method="POST" action="<?php echo base_url();?>home/forgot_password">
						
						<div class="text-center">
							<img src="<?php echo base_url();?>assets/website/img/logo.png" style="width:50%;margin-left:-85px;height: 114px;">
						</div>
						<h3 class="text-center sign-text" >
							Forgot Password
						</h3>
						<span ><?php  
                       
                        if(isset($msg))
                        {
                            echo "<div>
                            <p style='color:green; text-align: center;'>  ".$msg."   </p>
                            </div>" ;
                        }
                        else if(isset($error))
                        {
                            echo "<div>
                            <p style='color:red; text-align: center;'>  ".$error."   </p>
                            </div>" ;
                        }
                        ?></span>
						<div>
							<input type="email" class="md-form-control" name="email" placeholder="Email"/>
							
						</div><br>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Send Reset Link">
							</div>
						</div>

						<!---
						<a href="<?= base_url()?>admin/login">Login</a>
						--->
						

						
					</form>
					<div>
							<a href="<?= base_url()?>admin/login"><button class="btn forgot-button"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;LogIn</button></a>
						</div>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>


<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.js" ></script>
<!-- tether.js -->
<script src="<?php echo base_url();?>assets/js/tether.min.js" ></script>
<!-- waves effects.js -->
<script src="<?php echo base_url();?>assets/plugins/waves/js/waves.min.js" ></script>
<!-- Required Framework -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/pages/elements.js" ></script>
</body>
</html>
<script>
	$("#loginform").validate({       
            rules: {               
                "email"              : "required",               
         
            },
            messages : {
               "email"              : "Enter registered email id"
            },      
    });
 
    </script>
    