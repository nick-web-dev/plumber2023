

	<!-- Menu css E -->


				<!-- /*-----------------all_banner section s------------------*/ -->


	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1>VERIFICATION</h1>
			</div>
		</div>
	</section>

				<!-- /*-----------------all_banner section e------------------*/ -->

	<!-- /*-----------------log in section s------------------*/ -->

	<section>
		<div class="container">
		  <div class="text-center pt-5">
		  	<h2><b>VERIFICATION</b></h2>
		  </div>
		  <div class="vs_login_form ">
		  	<div class="text-center">
		  		<p>Verification code sent to your mobile</p>
		  		<!--<h4>+123456789</h4>-->
		  		</div>
			  <form class="mt-5" id="check_code_form" method="post">
			  	
			    <div class="form-group text-center">
			    	<label>Enter your Verification code here</label><br>
			     	<div class="otp-input-wrapper">
					  <input type="text" maxlength="4" pattern="[0-9]*" name="code" autocomplete="off">
					  <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
					  <svg viewBox="0 0 240 1" xmlns="http://www.w3.org/2000/svg">
					    <line x1="0" y1="0" x2="240" y2="0" stroke="#3e3e3e" stroke-width="2" stroke-dasharray="44,22" />
					  </svg>
					</div>
			    </div>
			    
			    <div class="vs_login_form_btn text-center mt-5">
			     <button type="button" class="btn btn-yellow check_code_form">verify</button>
			     <br>
			    	<!--<h6 class="pt-4">Didn't receive the code? <span onclick="resend_otp('<?php echo $user_id;?>')" class="text-dark" style="margin-left: 0px;cursor: pointer;"><u>Resend code</u></span> </h6>-->
			    </div>
			    
			  </form>
			</div>
		</div>
	</section>
		 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
		 <script> 

  $("#check_code_form").validate({           
            rules: {
                   "code"     : "required",
                   },
          messages:{
                "code"              : "Please enter your verification code",
          },
   });
   $('.check_code_form').click(function(){ 
        var validator = $("#check_code_form").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);    
                  var data = new FormData($('#check_code_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_code_form_v",
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
        window.location.href="<?php echo base_url();?>website/editplumberprofile/"+obj.user_id;           
                }, 3000);
                            } else if(obj.status == "payment_done"){
                              window.location.href="<?php echo base_url();?>website/payment/"+obj.user_id;
                             toastr["success"](obj.message);
                        } else{
                             toastr["success"](obj.message);
                        }

                    }
                });
            }
        });
   
   </script>
  <!--<script src="http://demomaplebrains.net/calltheplumber_dev/assets/website/js/jquery.min.js"></script>-->
  <script>
function resend_otp(val){
	var user_id=val;
// 	alert(user_id);
	 $.ajax({                
		url: "<?php echo base_url('website/resend_otp');?>",
		 type: "POST",
		 data: {"user_id":user_id},
		 async: false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                     success: function(result)
                    {
                        var obj = jQuery.parseJSON(result);
                        // alert(obj.status);
                        if(obj.status == "success")
                        {
						      toastr["success"]("Otp send successfully");
                        } else{
							
					     toastr["success"]("Please try again");
						}
                    }
                });
}


</script>

				<!-- /*-----------------log in section e------------------*/ -->