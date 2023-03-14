<style>
    .vs_all_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$contant_banner['image']; ?>);
    }
    .image{
    width: 271px;
    margin-left: 105px;
    }
    .btn-primary  {
    color: #fff !important;
    background-color: #ffd600 ! important;
    border-color: #0062cc !important;
}
label.error {
    color: red;
    position: absolute;
    bottom: -35px;
    font-size: 16px;
}
.input-group-append {
    margin-left: -1px;
    position: absolute;
    right: 12px;
    top: 20px;
}
.modal-header {
    border-bottom: none !important;
}
.vs_login_form form{
    width: 100%;
}
label#email1-error {
    bottom: 57px !important;
}
.add-space{
    margin-top:35px;
}
.add-space img{
    margin-bottom: 30px;
}
</style>
	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1><?php echo $contant_banner['title']?></h1>
			</div>
		</div>
	</section>

				<!-- /*-----------------all_banner section e------------------*/ -->

	<!-- /*-----------------log in section s------------------*/ -->

	<section>
		<div class="container">
		  <div class="pt-5">
		  	<h2><b>LOG IN</b></h2>
		  </div>
		  <div class="login_main">
		      <div class="row">
		          <div class="col-sm-6">
		              <div class="login-left vs_login_form">
		                  <form id="login_form_m" class="login_form" method="POST">
			    <div class="input-group">
			      <input type="email" class="form-control" id="email" placeholder="E-mail" name="data[email]">
			      <div class="input-group-append">
			         <!--<a href="" data-toggle="modal" data-target="#forgotModal">FORGOT ? </a>-->
			      </div>
			    </div>

			    <div class="input-group">
			      <input type="password" class="form-control" id="password" placeholder="Password" name="data[password]">
			      <div class="input-group-append">
			        <a href="" data-toggle="modal" data-target="#forgotModal">FORGOT PASSWORD? </a>
			      </div>
			    </div>
			    <!--<div class="form-group form-check">-->
			      
			     <!--   <input class="form-check-input" type="checkbox" name="remember"> -->
			     <!--<label class="form-check-label"> <span>Keep me signed in</span></label>-->
			    <!--</div>-->
			    <div class="vs_login_form_btn text-center">
			    	<button type="button" class="btn login_form_m">LOG IN</button>
			    	<h6 class="pt-4">Don't Have an Account <a href="<?php echo base_url()?>plumber-signup" class="text-dark"><u>Sign Up</u></a> </h6>
			    </div>
			    
			  </form>
		              </div>
		          </div>
		          <div class="col-sm-6">
		              <div class="add-space text-center" style="margin-bottom:15px;padding:15px;">
		                    <?php if(!empty($advertisements)){
        foreach($advertisements as $key=> $advertisement){?>
		                  <img src="<?php echo base_url().$advertisement['image']?>" class="img-fluid">
		                  <!--<img src="<?php echo base_url()?>assets/website/img/cooming-soon-banner.jpg" class="img-fluid">-->
		                   <?php } } ?>
		                 
		                 
		              </div>
		          </div>
		      </div>
			  
			</div>
		</div>
	</section>
	<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog login-dialog" role="document">
    <div class="modal-content login-model">
      <div class="modal-header ">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resolved_myfunction();" style="margin-top: -51px;margin-right: -31px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="login-logo">
         <img src="<?php echo base_url(); ?>assets/website/img/plumberlogo3.png" class="image">
      </div><br>

      <div class="login-form-content">
         <h4 style="text-align: center;">Forgot Password</h4><br>
                

                <form id="forget_form" method="POST">
                   <div class="form-group">
						    	<label><h6>  E-mail Address  </h6></label>
						      <input type="email" class="form-control emailnew" id="email1" placeholder="" name="data[email]"  onchange="check_email(this.value)">
                      <!--<span id="error_message" style="color:red"></span> -->
						    </div><br>
               
                <div class="log-btn" style="text-align: center;">
                   <button type="button" class="btn btn-primary forget_form loadingGif">Submit</button>
                </div>

        </form>
      </div>


      </div>
      
    </div>
  </div>
</div>
	<script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>

<script>

    $("#login_form_m").validate({           	

            rules: {

                  "data[password]"     : "required",

                  "data[email]"    : "required",

                   

                  },

          messages:{

              "data[password]"   :  "Please enter your password", 

              "data[email]"   :  "Please enter your email",   

          },

  });

  $('.login_form_m').click(function(){ 

        var validator = $("#login_form_m").validate();

            validator.form();

            if(validator.form() == true){

              

            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		

                  var data = new FormData($('#login_form_m')[0]);   

               

                $.ajax({                

                    url: "<?php echo base_url();?>website/check_login",

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
                                    toastr["success"](obj.message);
                                    setTimeout(function () {
                                    window.location.replace("<?php echo base_url();?>");     
                                 }, 3000);
                                 
                                 
                                 } else if(obj.status == "payment_done"){
                                   toastr["success"](obj.message);
                                   setTimeout(function () {
                                   window.location.href="<?php echo base_url();?>website/payment/"+obj.user_id;       
                                 }, 3000);
                                 } else if(obj.status == "varification"){
                                   toastr["success"](obj.message);
                                   setTimeout(function () {
                                    window.location.href="<?php echo base_url();?>website/varification/"+obj.user_id;  
                                 }, 3000);
                                 
                           }else{
                            toastr["success"](obj.message);
                        }
                    }

                });

            }

        });

   

  </script>

 <script> 
  $("#forget_form").validate({           	
            rules: {
                  "data[email]"    : "required",
                   
                  },
          messages:{
               "data[email]"   :  { required:'Please enter your email address'},
          },
  });
  $('.forget_form').click(function(){ 
        var validator = $("#forget_form").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#forget_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/forget_form",
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
                                toastr["success"](obj.message);
                                 setTimeout(function () {
               location.reload();     
                }, 3000);
                                
                        } else{
                             toastr["success"](obj.message);
                        }
                           
                    }
                });
            }
        });
   
//   </script>
