<style>
    .error {
    color: red;
}
</style>
	<!-- ===============Footer section S================= -->

	<div class="vs_footer_main">
	   <div class="vs_ftr_top">
	      <div class="container">
	         <div class="row">
	            <div class="col-lg-4 col-md-6  wow fadeIn">
	               <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/website/img/plumberlogo3.png" alt="" style="width: 72%;"></a>
	               <p>
	                 <?php echo $footer_content['text'];?>
	               </p>
	            </div>
	            <div class="col-lg-2 col-md-6  wow fadeIn">
	               <h2>Navigation</h2>
	               <div class="menu-menu-1-container">
	                  <ul>
	                     <li ><a href="<?php echo base_url(); ?>">Home</a></li>
	                     <li><a href="<?php echo base_url(); ?>plumbers">Plumbers</a></li>
	                     <li ><a href="<?php echo base_url(); ?>testimonial">Testimonials</a></li>
	                     <li ><a href="<?php echo base_url(); ?>contact-us">Contact</a></li>
	                  </ul>
	               </div>
	            </div>
	            <div class="col-lg-3 col-md-6  wow fadeIn">
	               <h2>Contact Us</h2>
	               <ul class="vs_cntct">
	                  <li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $footer_content['email'];?>"><?php echo $footer_content['email'];?></a></li>
	                  <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $footer_content['phone_number'];?>"><?php echo $footer_content['phone_number'];?></a> – For Plumbers</li>
	                  <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $footer_content['phone_number1'];?>"><?php echo $footer_content['phone_number1'];?></a> – For Licensing</li>
	               </ul>
	               <ul class="vs_socl">
	                  <li>Follow Us:</li>
	                  <li><a href="<?php echo $footer_content['facebook_link'];?>" class="vs_fb" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                  <li><a href="<?php echo $footer_content['twitter_link'];?>" class="vs_twtr"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                  <li><a href="<?php echo $footer_content['instagram_link'];?>" class="vs_isnta"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	               </ul>
	            </div>
	            <div class="col-lg-3 col-md-6  wow fadeIn">
	               <h2>Newsletter</h2>
	               <form method="post" class="vs_newsltr" id="newsletter_form">
	                  <input type="hidden" name="nlang" value="">
	                  <input type="hidden" name="nr" value="widget">
	                  <input type="hidden" name="nl[]" value="0">
	                  <input class="vs_tnp-email" type="email" name="email" placeholder="Your Email">
	                  <input class="vs_tnp-submit newsletter_form loadingGif" type="button" value="Subscribe">
	               </form>
	            </div>
	         </div>
	      </div>
	   </div>
	   <div class="vs_ftr_btm">
	      <div class="container">
	         <div class="row">
	            <div class="col-md-12 vs_cpyrit text-center wow fadeIn">
	               <p class="mb-0">@<?php echo date('Y'); ?> Call the Plumber- All rights reserved</p>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>

	<!-- ===============Footer section E================= -->

</body>
 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
<script> 

  $("#newsletter_form").validate({           
            rules: {
                   "email"    : { required:true,email:true },
                   },
          messages:{
                "email"           : { required:'Please enter your email address',email:'Please enter a valid email address' },
          },
   });
   $('.newsletter_form').click(function(){ 
        var validator = $("#newsletter_form").validate();
            validator.form();
            if(validator.form() == true){
              
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#newsletter_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/save_newsletter_form",
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
                                toastr["success"]("Thank you for subscribing with us, we will be in touch with you.");
                        } else{
                             toastr["success"]("This email already subscribe");
                        }
                            setTimeout(function () {
              location.reload();       
                }, 3000);
                    }
                });
            }
        });
   
   </script>

<!-- Slider Code S -->

<script type="text/javascript">
	$('.vs_testimonial_sldr').owlCarousel({
    	loop:true,
    	margin:10,
    	nav:false,
    	dots:false,
    	responsive:{
        	0:{
            items:1
        },
        	600:{
            items:1
        },
        	1000:{
            items:2
        }
    	}
	})
	</script>

	

<!-- Slider Code E -->
</html>