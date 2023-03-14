<style>
    .vs_all_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$contant_banner['image']; ?>);
    }
</style>
	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1><?php echo $contant_banner['title']?></h1>
			</div>
		</div>
	</section>

	<section class=" p-5 con-main">
		<div class="vs_contact_call p-5">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="d-flex justify-content-md-end justify-content-center text-center pr-md-5 respon-text">
						<div>
							<div><i class="fa fa-volume-control-phone pb-2" aria-hidden="true"></i></div>
							<h6 class="py-2"><b>Phone Number</b></h6>
							<p><a href="tel:<?php echo $footer_content['phone_number'];?>"><?php echo $footer_content['phone_number'];?></a> – For Plumbers</p>
							<p><a href="tel:<?php echo $footer_content['phone_number1'];?>"><?php echo $footer_content['phone_number1'];?></a>  – For Licensing</p>
						</div>
					</div>
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="d-flex justify-content-md-start justify-content-center text-center pl-md-5 ">
						<div>
							<div><i class="fa fa-envelope-o pb-2" aria-hidden="true"></i></div>
							<h6 class="py-2"><b>Email Address</b></h6>
							<p><a href="mailto:<?php echo $footer_content['email'];?>"><?php echo $footer_content['email'];?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

				<!-- /*-----------------contact_us section s------------------*/ -->

	<section class="vs_contanct_form py-4 py-md-5">
		<div class="container">
			<div class=" text-center">
				<h1> <b>SEND US A MESSAGE </b></h1>
			</div>
			<form  id="contant_form" method="post" class="py-5">
				<div class="form-group">
			      <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
			    </div>
			    <div class="form-group">
			      <input type="email" class="form-control" id="email" placeholder="Your email" name="email">
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="subject"  placeholder="Your Subject" name="subject">
			    </div>
			    <div class="form-group">
			      <textarea type="text" class="form-control pt-2" rows="5"  name="message" placeholder="Your Message"></textarea>
			    </div>
			    <div class="text-center">
				    <button type="button" class="btn my-3 contant_form loadingGif1">Submit</button>
				</div>
			  </form>
		</div>
	</section>
	 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
 <script> 

  $("#contant_form").validate({           
            rules: {
                   "name"     : "required",
                   "email"    : { required:true,email:true },
				    "message"  : "required",
                   "subject":{ required:true},
                   },
          messages:{
                   
                "name"              : "Please enter your name",
                "message"              : "Please enter your message",
                "email"           : { required:'Please enter your email address',email:'Please enter a valid email address' },
                "subject"           : { required:'Please enter your subject'},
          },
   });
   $('.contant_form').click(function(){ 
        var validator = $("#contant_form").validate();
            validator.form();
            if(validator.form() == true){
              
              $('.loadingGif1').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#contant_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/save_contact_form",
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
                                toastr["success"]("Thanks for contacting us we will be in touch with you shortly");
                        } else{
                             toastr["success"]("Data updated Successfully");
                        }
                            setTimeout(function () {
              location.reload();       
                }, 3000);
                    }
                });
            }
        });
   
   </script>