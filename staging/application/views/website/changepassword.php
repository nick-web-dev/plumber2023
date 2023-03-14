 <script src="<?php echo base_url(); ?>assets/website/js/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/js/jquery.validate.min.js"></script>
<style>
    .close_btn{
position: absolute;
    right: -16px;
    top: -7px;
    opacity: 1;
    background-color: #f9a63e;
    width: 20px;
    height: 20px;
    line-height: 25px;
    font-size: 15px;
    border-radius: 0px;
}
.error {
     color: red;
}
label#username-error {
    margin-left: -206px;
}
label#mobile_no-error {
    margin-left: -206px;
}
label#email-error {
    margin-left: -206px;
}
label#password-error {
    margin-left: -206px;
}
label#confirm_password-error {
    margin-left: -206px;
}
.login-form .form-control {
    margin-bottom: 4px;
}
</style>
<body>
   
<div class="bodydiv">
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="headerHome d-flex align-items-center">
	<div class="col-lg-4 col-md-4 col-sm-4">
	<div class="logoDiv d-flex align-items-center justify-content-left">
		<div class="logo_headerDiv"><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/website/images/logo-header.png" class="img-fluid" alt=""></a></div>
	</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
	<div class="headerCenterDiv d-flex align-items-center justify-content-center">
		<div class="headerCenterImgDiv"><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/website/images/logo-header-center.png" class="img-fluid logo-footer" alt=""></a></div>
	</div>

	</div>
	<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="headerLanguageDiv d-flex align-items-end justify-content-end">
		<ul class="headerNav  text-right">
		     <?php if($this->session->userdata['lang']=='en'){?>
		     <li><a onclick="set_session('ar')">Ar</a></li>
			<?php } else {?>
			 <li><a onclick="set_session('en')">En</a></li>
			<?php } ?>
		</ul>
		          
	</div>
	</div>
	</div>
	</header>
<script>
        function set_session(lang)
        {
           $.ajax({                
                    url: "<?php echo base_url();?>website/set_session/"+lang,
                    type: "POST",
                    data: '',
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){
                        if(result) {
                          location.reload();  
                          console.log();
                        } 

                    }

                });
        }
    </script>




<div class="registration-main">
    <div class="loginpop">
                     <img src="http://demomaplebrains.net/davita_dev/assets/website/images/logodavita.png" class="img-fluid">
                     <form class="login-form login_form" id="sign_form" method="POST">
                         <div class="form-group">
                           <i class="fa fa-key" aria-hidden="true"></i>
                             <input type="password" name="data[password]" id="password" placeholder="<?php echo  ($this->data['lang']=='en')?@$static_content['password']:@$static_content['password_ar']; ?>" class="form-control" required>
                         </div><br>
                         <div class="form-group">
                          <i class="fa fa-key" aria-hidden="true"></i>
                           <input type="password" name="confirm_password" id="confirm_password" placeholder="<?php echo  ($this->data['lang']=='en')?@$static_content['confirm']:@$static_content['confirm_ar']; ?>" class="form-control" required>
                          
                       </div><br>
                      
                 <div class="text-center ">
                             <button type="button" class="btn btn-default br-5 mt-2 loadingGif sign_form"><?php echo  ($this->data['lang']=='en')?@$static_content['submit']:@$static_content['submit_ar']; ?></button>
                         </div>
                        
                             </form>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/toastr.css">
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/website/js/toastr.js"></script>
<script> 



  jQuery("#sign_form").validate({           	

            rules: {

                  "data[password]"    : { required:true,minlength:6 },

                  "confirm_password" : {required:true,equalTo:'#password'},

                  },

          messages:{

               "data[password]"         :  { required:"Please choose your password" },

                "confirm_password" : {

                      required:"Please Enter Confirm Password",

                      equalTo :"Password and Confirm Password Must and Should be Same",

                    },


           

          },

  });

  jQuery ('.sign_form').click(function(){ 

        var validator = $("#sign_form").validate();

            validator.form();

            if(validator.form() == true){

                  var data = new FormData($('#sign_form')[0]);   

                $.ajax({                

                    url: "<?php echo base_url();?>website/save_registration_form55",

                    type: "POST",

                    data: data,

                    mimeType: "multipart/form-data",

                    contentType: false,

                    cache: false,

                    processData:false,

                    error:function(request,response){

                        console.log(request);

                    },                  

                    success: function(result){

                        var obj = jQuery.parseJSON(result);

                            if (obj.status == "success") {
                                $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);	
                                <?php if($this->session->userdata['lang']=='en'){?>
                                 toastr["success"]("Your Registration Successfully Completed");
                                <?php } else{?>
                                 toastr["success"]("تم تسجيلك بنجاح");
                                 <?php }?>
                              

                                  setTimeout(function () {

             window.location.href="<?php echo base_url();?>website/login";      

                }, 3000);

            

                        } else{

                             toastr["success"](obj.message);

                        }

                         

                    }

                });

            }

        });

        

        

   </script>
   <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-top">
      <div class="footer-topmain">
        <div class="row">

          <div class="col-lg-3 col-md-3 footer-contact">
            <div class="logo_footerDiv"><img src="<?php echo base_url(); ?>assets/website/images/logo-white.png" class="img-fluid logo-footer" alt=""></div>
          </div>

          <div class="col-lg-6 col-md-6 footer-links">
            <p><?php echo  ($this->data['lang']=='en')?@$static_content['please_ask_title']:@$static_content['please_ask_title_ar']; ?>  <a  href="<?php echo $mylinks[0]['link']; ?>" target="_blank" class="color-orange"><?php echo  ($this->data['lang']=='en')?@$static_content['click_here']:@$static_content['click_here_ar']; ?></a></p>
          </div>
		  
		  <div class="col-lg-3 col-md-3 footer-links social-div3">
            <h4><?php echo  ($this->data['lang']=='en')?@$static_content['socail_media']:@$static_content['socail_media_ar']; ?> </h4>
            <ul>
              <li><a href="<?php echo $static_content['twitter_link']; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/website/images/social-icon1.png" class="img-fluid" alt=""></a></li>
              <li><a href="<?php echo $static_content['instagram_link']; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/website/images/social-icon2.png" class="img-fluid" alt=""></a></li>
              <li><a href="<?php echo $static_content['linked_link']; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/website/images/social-icon3.png" class="img-fluid" alt=""></a></li>
			  <li><a href="<?php echo $static_content['web_link']; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/website/images/social-icon4.png" class="img-fluid" alt=""></a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="footer-bottm">
      <div class="d-flex w-100  text-center text-lg-center">
        <div class="copyright w-100 text-center">
           <h5><?php echo  ($this->data['lang']=='en')?@$static_content['all_rights']:@$static_content['all_rights_ar']; ?></h5>
		   <p><?php echo  ($this->data['lang']=='en')?@$static_content['test']:@$static_content['test_ar']; ?>
</p>
        </div>
      </div>
      
    </div>
  </footer><!-- End Footer -->
  
  </div>