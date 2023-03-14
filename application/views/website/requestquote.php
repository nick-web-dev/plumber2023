<style>
    .vs_all_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$contant_banner['image']; ?>);
    }
      .cont-detail{
        margin:30px 20px;
    }
    .vs_contact_call {
    background-color: #ffd600 !important;
    height: 90%;
}
</style>
	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1><?php echo $contant_banner['title']?></h1>
			</div>
		</div>
	</section>

	<section class=" p-5 row m-0 con-main">
	    <div class="col-sm-6 con-main-sm">
		<div class="vs_contact_call p-5">
			<div class="row  p-5 con-main ">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="d-flex  justify-content-center text-center  cont-detail">
						<div>
							<div><i class="fa fa-volume-control-phone pb-2" aria-hidden="true"></i></div>
							<h6 class="py-2"><b>Phone Number</b></h6>
							<p><a href="tel:<?php echo $footer_content['phone_number'];?>"><?php echo $footer_content['phone_number'];?></a> – For Plumbers</p>
							<p><a href="tel:<?php echo $footer_content['phone_number1'];?>"><?php echo $footer_content['phone_number1'];?></a>  – For Licensing</p>
						</div>
					</div>
					
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="d-flex justify-content-center text-center  cont-detail">
						<div>
							<div><i class="fa fa-envelope-o pb-2" aria-hidden="true"></i></div>
							<h6 class="py-2"><b>Email Address</b></h6>
							<p><a href="mailto:<?php echo $footer_content['email'];?>"><?php echo $footer_content['email'];?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		 <div class="col-sm-6">
		     	<section class="vs_contanct_form py-4 py-md-5">
		<div class="container">
			<div class=" text-center">
				<h1> <b>Request A Quote from the Plumber</b></h1>
			</div>
			<form  id="reqestquote" method="post" class="py-5">
				<div class="form-group">
				    <label><h6> Your Full Name</h6></label>
			      <input type="text" class="form-control" id="name" placeholder="Your Full Name" name="data[name]">
			    </div>
			    <div class="form-group">
			           <label><h6>Your Email Address</h6></label>
			      <input type="email" class="form-control" id="email" placeholder="Your email" name="data[email]">
			      <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>">
			    </div>
			    <div class="form-group">
			           <label><h6>Your Phone Number</h6></label>
			      <input type="text" class="form-control" id="phone_pumber" placeholder="Your Phone Number" name="data[phone_pumber]" maxlength="10">
			    </div>
			    <div class="form-group">
			           <label><h6>Your Address</h6></label>
			      <input type="text" class="form-control" id="address" placeholder="Your Address" name="data[address]">
			    </div>
			    <div class="form-group">
			           <label><h6>Your Zipcode</h6></label>
			      <input type="text" class="form-control" id="zip_code" placeholder="Your Zipcode" name="data[zip_code]">
			    </div>
			    <div class="form-group">
			           <label><h6>Your Request</h6></label>
			      <input type="text" class="form-control" id="your_request" placeholder="Your Request" name="data[your_request]">
			    </div>

			    <div class="form-group">
			         <label><h6>Your Project Details</h6></label>
			      <textarea type="text" class="form-control pt-2" rows="5"  name="data[message]" placeholder="Your project details"></textarea>
			    </div>
			    <div class="text-center">
				    <button type="button" class="btn my-3 reqestquote loadingGif">Submit</button>
				</div>
			  </form>
		</div>
	</section>
		 </div>
	</section>

				<!-- /*-----------------contact_us section s------------------*/ -->

	<!--<section class="vs_contanct_form py-4 py-md-5">-->
	<!--	<div class="container">-->
	<!--		<div class=" text-center">-->
	<!--			<h1> <b>Request A Quote from the Plumber</b></h1>-->
	<!--		</div>-->
	<!--		<form  id="reqestquote" method="post" class="py-5">-->
	<!--			<div class="form-group">-->
	<!--			    <label><h6> Your Full Name</h6></label>-->
	<!--		      <input type="text" class="form-control" id="name" placeholder="Your Full Name" name="data[name]">-->
	<!--		    </div>-->
	<!--		    <div class="form-group">-->
	<!--		           <label><h6>Your Email Address</h6></label>-->
	<!--		      <input type="email" class="form-control" id="email" placeholder="Your email" name="data[email]">-->
	<!--		      <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>">-->
	<!--		    </div>-->
	<!--		    <div class="form-group">-->
	<!--		           <label><h6>Your Phone Number</h6></label>-->
	<!--		      <input type="text" class="form-control" id="phone_pumber" placeholder="Your Phone Number" name="data[phone_pumber]" maxlength="10">-->
	<!--		    </div>-->
	<!--		    <div class="form-group">-->
	<!--		           <label><h6>Your Address</h6></label>-->
	<!--		      <input type="text" class="form-control" id="address" placeholder="Your Address" name="data[address]">-->
	<!--		    </div>-->
	<!--		    <div class="form-group">-->
	<!--		           <label><h6>Your Zipcode</h6></label>-->
	<!--		      <input type="text" class="form-control" id="zip_code" placeholder="Your Zipcode" name="data[zip_code]">-->
	<!--		    </div>-->
	<!--		    <div class="form-group">-->
	<!--		           <label><h6>Your Request</h6></label>-->
	<!--		      <input type="text" class="form-control" id="your_request" placeholder="Your Request" name="data[your_request]">-->
	<!--		    </div>-->

	<!--		    <div class="form-group">-->
	<!--		         <label><h6>Your Project Details</h6></label>-->
	<!--		      <textarea type="text" class="form-control pt-2" rows="5"  name="data[message]" placeholder="Your project details"></textarea>-->
	<!--		    </div>-->
	<!--		    <div class="text-center">-->
	<!--			    <button type="button" class="btn my-3 reqestquote loadingGif">Submit</button>-->
	<!--			</div>-->
	<!--		  </form>-->
	<!--	</div>-->
	<!--</section>-->
	 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
 <script> 

  $("#reqestquote").validate({           
            rules: {
                   "data[name]"     : "required",
                   "data[zip_code]"     : "required",
                    "data[address]"     : "required",
                    "data[your_request]"     : "required",
                   "data[email]"    : { required:true,email:true },
				    "data[message]"  : "required",
				    "data[phone_pumber]"  : { required:true,number:true },
				   
                   },
          messages:{
                   
                "data[name]"           : "Please enter your full name",
                "data[message]"        : "Please enter your project details",
                "data[your_request]"   : "Please enter your request",
                "data[email]"          : { required:'Please enter your email address',email:'Please enter a valid email address' },
                "data[phone_pumber]"   : { required:'Please enter your phone number',number:'Please enter a valid phone number' },
                 "data[zip_code]"              : "Please enter your zip code",
                   "data[address]"              : "Please enter your address",
          },
   });
   $('.reqestquote').click(function(){ 
        var validator = $("#reqestquote").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#reqestquote')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/send_reqestquote",
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
                                toastr["success"]("Message sent Successfully");
                                setTimeout(function () {
                        window.location.href="<?php echo base_url();?>plumbers";      
                         }, 3000);
                        } else{
                             toastr["success"]("Message not sended");
                        }
            //                 setTimeout(function () {
            //   location.reload();       
            //     }, 3000);
                    }
                });
            }
        });
   
   </script>