<style>
    .vs_all_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$contant_banner['image']; ?>);
    }
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
.vs_testimonial_page .vs_icon-testi img:nth-child(4), .vs_testimonial_page .vs_icon-testi img:nth-child(5) {
    filter: revert !important;
}

/** new **/
.rating-box {
  display: inline-block;
}
.rating-box .rating-container {
  direction: rtl !important;
}
.rating-box .rating-container label {
  display: inline-block;
  margin: 0px 10px;
  color: #d4d4d4;
  cursor: pointer;
  font-size: 50px;
  /*transition: color 0.2s;*/
  position: relative;
}
.rating-box .rating-container input {
  display: none;
}
.rating-box .rating-container label:hover:after, .rating-box .rating-container label:hover ~ label:after, .rating-box .rating-container input:checked ~ label:after {
    content: "";
    width: 53px;
    height: 50px;
    background-image: url(assets/website/img/Rating_1.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    position: absolute;
    left: -4px;
    top: 16px;
}

</style>
	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1><?php echo $contant_banner['title']?></h1>
			</div>
		</div>
	</section>

	<section class="vs_testimonial_form py-5">
		<div class="container">
			<div class="vs_test_head py-4">
				<h1><b>Leave us a Testimonial below, Please <img src="<?php echo base_url(); ?>assets/website/img/1f642.svg"></b></h1>
			</div>
			<div class="vs_contanct_form text-center" >
				<button type="button" class="btn " data-toggle="modal" data-target="#myModal">
				    ADD A TESTIMONIAL
				 </button>
			</div>
		  <!-- The Modal -->
		  <div class="modal fade" id="myModal">
		    <div class="modal-dialog modal-xl">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="">
		       		<button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h2 class="text-center pt-5"> <b>ADD A TESTIMONIAL</b></h2> 
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		          	 <div class="vs_contanct_form">
						<form id="add_testimonaial" method="post" class="pb-5 pt-3">
							<div class="form-group">
							  <label><h5>Your Name</h5></label>
						      <input type="text" class="form-control" id="name" name="data[name]">
						    </div>
						    <div class="form-group">
						    	<label><h5>Your Email</h5></label>
						      <input type="email" class="form-control" id="email" name="data[email]">
						    </div>
						     <div class="form-group">
						    	<label><h5>Subject</h5></label>
						      <input type="text" class="form-control" id="title" name="data[title]">
						    </div>
						    <div class="form-group">
						    	<label><h5>  Your Zip Code</h5></label>
						      <input type="text" class="form-control" id="zip_code" name="data[zip_code]">
						    </div>
						    <div class="form-group">
						    	<label><h5>  Plumbers Name  </h5></label>
						           <select class="form-control form-control-sm"  name="data[plumbers_name]">
                            <option value="">Select  plumbers Name</option>
                            <?php  foreach ($plumber_names as  $plumber){ ?>
                            <option  value ="<?php echo $plumber['user_id']; ?>"><?php echo $plumber['username']; ?></option>
                                    <?php }?>
                        </select>  
						    </div>
						    <div class="vs_testimonial_page">
						    	<label><h5>  Rating 1-5 thumbs up (5 is great)  </h5></label>
						    	
						    	<div class="custom-rating">
						    	    <div class="rating-box">
                                      <div class="rating-container">
                                      <input type="radio" name="data[rating]" value="5" id="star-5"> <label for="star-5"><img src="<?php echo base_url(); ?>assets/website/img/Rating_2.png"></label>
                                      
                                      <input type="radio" name="data[rating]" value="4" id="star-4"> <label for="star-4"><img src="<?php echo base_url(); ?>assets/website/img/Rating_2.png"></label>
                                      
                                      <input type="radio" name="data[rating]" value="3" id="star-3"> <label for="star-3"><img src="<?php echo base_url(); ?>assets/website/img/Rating_2.png"></label>
                                      
                                      <input type="radio" name="data[rating]" value="2" id="star-2"> <label for="star-2"><img src="<?php echo base_url(); ?>assets/website/img/Rating_2.png"></label>
                                      
                                      <input type="radio" name="data[rating]" value="1" id="star-1"> <label for="star-1"><img src="<?php echo base_url(); ?>assets/website/img/Rating_2.png"></label>
                                    </div>
                                    </div>
						    	</div>
						  <!--  	<div class="vs_icon-testi d-flex mt-4 mb-2 rating">-->
									<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
									<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
									<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
									<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
									<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
                              
        <!--                        <input type="radio" name="data[rating]" value="5" id="5"><label for="5">☆</label> -->
        <!--                        <input type="radio" name="data[rating]" value="4" id="4"><label for="4">☆</label> -->
        <!--                        <input type="radio" name="data[rating]" value="3" id="3"><label for="3">☆</label> -->
        <!--                        <input type="radio" name="data[rating]" value="2" id="2"><label for="2">☆</label> -->
        <!--                        <input type="radio" name="data[rating]" value="1" id="1"><label for="1">☆</label>-->
                            
								<!--</div>-->
								<label class="py-3">Letting us know how well they did or didn’t do</label>
						    </div>
						    <div class="form-group">
						    	<label><h5>Tell Us Everything</h5></label>
						      	<textarea type="text" class="form-control pt-2" rows="8" name="data[tell_us]" placeholder="Time & date if you remember, any special circumstances"></textarea>
						      	<label class="py-2">What do you think about us?</label>
						    </div>

						    <div class="">
							    <button type="button" class="btn my-3 add_testimonaial loadingGif">Add Testimonial</button>
							</div>
						</form>
					</div>
		        </div>
		      </div>
		    </div>
		  </div>

  		</div>
	</section>

				<!-- /*================ testimonial_form section E================*/ -->



				<!-- /*================ testimonial_page section S================*/ -->

	<section class="vs_testimonial_page">
		<div class="container">
			<div>
			     <?php if(!empty($testimonial)){
        foreach($testimonial as $key=> $test){?>
			    
				<div class="vs_test_section mb-5">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-12">
							<div class="vs_test_quote_right">
								<img src="<?php echo base_url(); ?>assets/website/img/quote-left-solid.svg" class="vs_test_quote_img">
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12">
							<div>
								<h3 class="pt-2 pt-md-5"><b><?php echo $test['title']?></b></h3>
								<p><?php echo $test['tell_us']?></p>
								<div class="vs_icon-testi d-flex mt-4 mb-2">
								 <?php if($test['rating']==1){?>
                        <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
                        <?php } else if($test['rating']==2){?>
									<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
									<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
							 <?php } else if($test['rating']==3){?>		
							<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
							<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						   <?php } else if($test['rating']==4){?>	
							<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
							<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						    <?php } else if($test['rating']==5){?>
						   	<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						   	<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
							<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
						    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">
									<?php } else{?>
									
									<?php }?>
								</div>
								<h6><b><?php echo $test['name']?></b></h6>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12">
							<div class="vs_test_quote_left">
								<img src="<?php echo base_url(); ?>assets/website/img/quote-right-solid.svg">
							</div>
						</div>
					</div>
				</div>
              <?php } }?>
			
			</div>
		</div>
	</section>

	 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
 <script> 

  $("#add_testimonaial").validate({           
            rules: {
                   "data[name]"     : "required",
                   "data[title]"     : "required",
                   "data[email]"    : { required:true,email:true },
				    "data[tell_us]"  : "required",
                   "data[zip_code]":{ required:true},
                    "data[plumbers_name]":{ required:true},
                   },
          messages:{
                   
                "data[name]"              : "Please enter your name",
                  "data[title]"              : "Please enter your Subject",
                "data[tell_us]"              : "Please tell us everything",
                "data[zip_code]"              : "Please enter your zip code",
                "data[email]"           : { required:'Please enter your email address',email:'Please enter a valid email address' },
                "data[plumbers_name]"           : { required:'Please enter your plumber name'},
          },
   });
   $('.add_testimonaial').click(function(){ 
        var validator = $("#add_testimonaial").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#add_testimonaial')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/add_testimonaial",
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
                                toastr["success"]("Thanks for adding testimonial");
                                      setTimeout(function () {
              location.reload();       
                }, 3000);
                        } else{
                             toastr["success"]("Please select rating atleast one ");
                        }
                      
                    }
                });
            }
        });
   
   </script>
			