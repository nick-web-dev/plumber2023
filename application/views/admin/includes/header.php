<!DOCTYPE html>
<html lang="en">
<head>
    <title>Call the Plumber</title>
    <meta charset="utf-8">
	<link rel="icon" href="<?php echo base_url();?>assets/website/images/favicon.png" tppabs="<?php echo base_url();?>assets/website/images/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/icon/icofont/css/icofont.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/icon/simple-line-icons/css/simple-line-icons.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/charts/chartlist/css/chartlist.css"  type="text/css" media="all">
    <script src="<?php echo base_url();?>assets/admin/plugins/charts/echarts/js/echarts-all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/dataTables.bootstrap4.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/buttons.dataTables.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/responsive.bootstrap4.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/main.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/bootstrap-datetimepicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/alertify.css"/>
    <style type="text/css">        
    .sidebar-menu>li>a .inactive-arrow {
    float: right;
    position: relative;
    top: 5px;
}
.active-arrow{
display: none !important;
    float: right;
    position: relative;
    top: 5px;
}
li.dropdown.active .active-arrow  {
    display: block !important;
    transition: all ease-in-out .5s;
      -webkit-transition: display 2s; 
    transition: display 2s;
}
li.dropdown.active .inactive-arrow{
    display: none !important;
}
.sidebar-menu>li>a:hover{ background: #ad891b; color: #f9f3f3;}
.f-left-image1{
    font-size: 30px;
    color: #ffffff;
}

.slimScrollBar {
  width: 6px !important;
  border-radius: 5px !important;
}
.slimScrollDiv {
    width: auto !important;
}

    </style>
</head>

<body class="sidebar-mini fixed">   
<div class="wrapper">    
    <header class="main-header-top hidden-print">
        <a href="<?php echo base_url();?>admin/dashboard"  class="logo">      
          <img class="img-fluid able-logo" src="<?php echo base_url();?>assets/website/img/logo.png" alt="Theme-logo">   
        </a>
        <nav class="navbar navbar-static-top">
            <a href="javascript:" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <div class="navbar-custom-menu">
                <ul class="top-nav">                   
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="<?php echo base_url((empty($user_info->user_image)) ? "assets/uploads/user_profiles/profile.png": $user_info->user_image);?>" style="width:40px;" alt="User Image"></span>
                            <span><?php echo ucwords(@$user_info->first_name); ?> <i class=" icofont icofont-simple-down"></i></span>
                        </a>
                        <ul class="dropdown-menu settings-menu">                           
                            <li><a href="<?php echo base_url();?>admin/profile"><i class="icon-user"></i>Profile</a></li>
                            <li class="p-0">
                                <div class="dropdown-divider m-0"></div>
                            </li>                            
                            <li><a href="<?php echo base_url();?>home/logout"><i class="icon-logout"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>          
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
	
    <aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
            <div class="user-panel">
                <div class="f-left image"><!-- <i class="fa fa-user-circle-o f-left-image1" aria-hidden="true"></i> --><img src="<?php echo base_url((empty(@$user_info->user_image)) ? "assets/uploads/user_profiles/profile.png": @$user_info->user_image); ?>" alt="User Image" class="img-circle">
                </div>
                <div class="f-left info">
                    <p><?php echo ucwords(@$user_info->username); ?></p>
                    <p class="designation"><?php echo ucwords(@$user_info->email);?>
                    <i class="icofont icofont-caret m-l-5"></i></p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <?php if(@auth_level==9){ ?>
            <ul class="sidebar-menu">
                <li class="<?php echo (@$page_name=="dashboard")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/dashboard" >
                       <i class="icon-graph" aria-hidden="true"></i><span> Dashboard</span></a>
                </li>
                
                 <li class=" treeview <?php echo (@$page_name=='home_banner'  || @$page_name=="testimonials_content"||@$page_name=="four_types" || @$page_name=="testimonials"|| @$page_name=="about" || @$page_name=="services" || @$page_name=="like_your_home")?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-home" aria-hidden="true"></i><span>Home  Management</span><i class="icon-arrow-down"></i>
                  
                  </a>
                  <ul class="treeview-menu">
                    
                 <li class="<?php echo (@$page_name=="home_banner")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/home_banner" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Home Banner</span></a>
                </li>
                  <li class="<?php echo (@$page_name=="four_types")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/four_types" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Four Types</span></a>
                </li>
                <li class="<?php echo (@$page_name=="about")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/about" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>About Us</span></a>
                </li>
                 <li class="<?php echo (@$page_name=="services")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/services" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Services</span></a>
                </li>
                 <li class="<?php echo (@$page_name=="like_your_home")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/like_your_home" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Like your Home</span></a>
                </li>
                <!-- <li class="<?php echo (@$page_name=="testimonials_content")?'active':'';?>">-->
                <!--    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials_content" >-->
                <!--       <i class="icon-arrow-right" aria-hidden="true"></i><span>Testimonials content</span></a>-->
                <!--</li>-->
                   <li class="<?php echo (@$page_name=="testimonials")?'active':'';?>">
                     <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials" >
                     <i class="icon-arrow-right" aria-hidden="true"></i><span>Home Testimonials</span></a>
                 </li>
                   </ul>
               </li>
                <li class="<?php echo (@$page_name=="footer_content")?'active':'';?>">
                     <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/footer_content" >
                     <i class="icon-shield" aria-hidden="true"></i><span>Footer Management</span></a>
                 </li>
                  <li class="<?php echo ($page_name=='newsletter')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/newsletter">
                  <i class="fa fa-envelope"></i><span>News Letter Management</span>
                  </a></li>
                    <li class="<?php echo ($page_name=='Contact_Requests')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contact_requests">
                  <i class="fa fa-building-o"></i><span>Contact Requests</span>
                  </a></li>
                     <li class="<?php echo (@$page_name=="plumber")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/plumber">
                    <i class="fa fa-users" aria-hidden="true"></i><span>Registered Plumber Management</span></a>
                 </li>
                   <li class="<?php echo (@$page_name=="listed_plumber")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/listed_plumber">
                    <i class="fa fa-users" aria-hidden="true"></i><span>Listed Plumber Management</span></a>
                 </li>
                   <li class="<?php echo (@$page_name=="expiredplumber")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/expiredplumber">
                    <i class="fa fa-users" aria-hidden="true"></i><span>Need to renewal plumbers</span></a>
                 </li>
                    <li class="<?php echo (@$page_name=="type_of_plumbing")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/type_of_plumbing">
                    <i class="icon-shield" aria-hidden="true"></i><span>Type of Plumbing</span></a>
                 </li>
                   <li class="<?php echo (@$page_name=="testimonial")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonial">
                    <i class="icon-people" aria-hidden="true"></i><span>Testimonials</span></a>
                 </li>
                 
                  <li class="<?php echo (@$page_name=="Banners")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners" >
                       <i class="fa fa-globe" aria-hidden="true"></i><span> Banners</span></a>
                </li>
                  <li class="<?php echo (@$page_name=="payment")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payment" >
                       <i class="fa fa-globe" aria-hidden="true"></i><span> Payment</span></a>
                </li>
       <li class="<?php echo (@$page_name=="exportcsv")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/exportcsv" >
                       <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Export Csv</span></a>
                </li>
                   <li class="<?php echo (@$page_name=="sendemail")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sendemail" >
                       <i class="fa fa-bell" aria-hidden="true"></i><span>Send Mail</span></a>
                </li>
                   <li class="<?php echo (@$page_name=="renewal")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/renewalplumbers" >
                       <i class="icon-shield" aria-hidden="true"></i><span>Renewal Plumbers</span></a>
                </li>
                <!-- <li class="<?php echo (@$page_name=="import_csv")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/import_csv" >
                       <i class="fa fa-home" aria-hidden="true"></i><span>Csv Import</span></a>
                </li> -->
				<li class="<?php echo (@$page_name=="import_csv")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/plumber_import_csv" >
                       <i class="fa fa-home" aria-hidden="true"></i><span>Plumber Import</span></a>
                </li>
                  <li class="<?php echo (@$page_name=="advertisements")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/advertisements" >
                       <i class="fa fa-home" aria-hidden="true"></i><span>Advertisements</span></a>
                </li>
               
                
                      <li class=" treeview <?php echo (@$page_name=='subscription_plan' || @$page_name=='subscription_plan_text' )?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-info-circle" aria-hidden="true"></i><span>Subscription Management</span><i class="icon-arrow-down"></i>
                  
                  </a>
                  <ul class="treeview-menu">
                       <li class="<?php echo (@$page_name=="subscription_plan_text")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscription_plan_text" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Subscription plan text</span></a>
                </li>
                    
                   <li class="<?php echo (@$page_name=="subscription_plan")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscription_plan" >
                       <i class="icon-arrow-right" aria-hidden="true"></i><span>Subscription plans</span></a>
                </li>
                  
                  
                   </ul>
               </li>
               
               
                <li class="<?php echo (@$page_name=="welcome_mail_content")?'active':'';?>">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/welcome_mail_content" >
                       <i class="fa fa-bell" aria-hidden="true"></i><span>Welcome mail content</span></a>
                </li>
                </ul>  
                
              
                   
			<?php  
}?>
			
				
			                                      
          
          
        </section>
    </aside>
    <!-- Side-Nav-end-->
    