<!DOCTYPE html>
<html lang="en">
<style>
.btn-primary, .btn-primary:focus, .btn-primary:hover {
    background-color: #d12b2f !important;
    border-color: #d12b2f !important;
}
.sign-text {
    color: #d12b2f !important;
}
.zmdi {
    display: inline-block;
    font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
    font-size: 18px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.common-img-bg {
 background-color: #ffd600 !important;
}
.error {
    text-transform: inherit !important;
}
</style>
<head>
	<title>Call the plumber</title>
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
	<link rel="icon" href="<?php echo base_url();?>assets/website/images/favicon.png"  type="image/x-icon">
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">	
</head>
<body>
<section class="login p-fixed d-flex text-center common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" id="loginform" method="POST" action="<?php echo base_url();?>home/change_password_web">
						<div class="text-center">
						<img src="<?php echo base_url();?>assets/website/img/logo.png" style="width:84%;margin-left:-85px;height:  119px;">
						</div>
						<h3 class="text-center sign-text" >
							
						</h3>
						 <div class="content">
                        <span >
                        <?php  
                        if(isset($error))
                        {
                            echo "<div>
                            <p style='color:red; text-align: center;'>".$error."</p>
                            </div>" ;?>
                            <style>
                               .hide_class{
                                     display: none; !impotant;
                                   
                               }
                        <?php }
                        else if(isset($msg))
                        {?>
                           <?php  echo "<div>
                            <p style='color:green; text-align: center;'>".$msg."</p>
                            </div>" ;?>
                           <style>
                               .hide_class{
                                     display: none; !impotant;
                                   
                               }
                           </style>
                           <?php  header("refresh:1;url=".base_url()."website");
                        }
                        ?>	
                        </span>
                        <div class="hide_class">
                       <div class="">                        
                           <input type="password" class="md-form-control" id="password" name="password" placeholder="New Password" >
                           
                        </div>
                        <div class="">
                            <input type="password" class="md-form-control" name="cpassword" placeholder="Confirm password" >
                        
                    </div><br>
                        <input type="hidden" name="email" value="<?=@$encode_email?>">                       
                        <div class="row">
							<div class="col-xs-10 offset-xs-1">	
								<input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Submit">
							</div>
						</div>
                    </div>						
					<!-- </div> -->
					</form>
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
               
                // "password"              : "required",
               "password"   : { required:true,minlength:6 },
                "cpassword"             :{
                	required:true,
                	equalTo: "#password"
                },
            },
            messages : {
            },      
    	}); 
    </script>
    <?php 
    	if(isset($error)){ ?>
    	<script>
    		$("#login_error_tab").css("display", "block");
			$('#login_error_tab').show().delay(2500).fadeOut('slow');
			//$("#login_error_msg").html('<?php //echo $error;?>');
    	</script>

	<?php   $error=""; }
    ?>