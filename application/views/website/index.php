

	<!-- Menu css E -->

	<!-- /*-----------------home_banner section s------------------*/ -->
	<style>
	.home-input::-webkit-input-placeholder{
	    font-size:46px;
	}
	.vs_home_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$banner_content['image']; ?>);
	}
	    .vs_nwsletr_bg {
    background-image: url(<?php echo base_url().$home_content['image']; ?>);
}
.vs_testimonial_bg {row align-items-center
    background-image: url(<?php echo base_url().$home_content['image_t']; ?>);
}
.vs_testimonial_bg:before {
    background-image: url(<?php echo base_url().$home_content['image_logo']; ?>);
}

	</style>

    <section class="vs_home_banner">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="vs_banner_head_main">
	    				<div class="vs_banner_head">
	    					<!-- <h1> -->
			    				<span class="vs_banner_head_span1"><?php echo $banner_content['title'];?></span>
			    				<span class="vs_banner_head_span2"><?php echo $banner_content['title2'];?> </span>
			    			<!-- </h1> -->
			    			<div class="vs_find_plmbr_cnt">
			    				<p><?php echo $banner_content['description'];?> </p>
			    				<form class="common_form" method="post" enctype='multipart/form-data' action="<?php echo base_url()?>website/search_plumber#vs_plumber_data" accept-charset="utf-8">
			    				<div class="vs_find_plumber">
			    					<input type="text" name="city_or_zip_code" placeholder="City or Zip Code" required style="font-size: 46px" class="home-input">
			    					<button>
			    						<h5>Find the plumber</h5>
			    						<p class="pb-0">Click here to find plumber</p>
			    					</button>
			    				</div>
			    					</form>
			    			</div>
	    				</div>

	    		
	    		
    				</div>
    				
    			</div>
    			

    		</div>
    	</div>
    </section>

    		<!--home_banner section E- -->

	<!-- ================Srvc_sec_1 section S================ -->
	<section class="vs_srvc_sec_1 pt-5">
		<div class="container">
			<div class="row align-items-center ">
			     <?php if(!empty($four_types)){
        foreach($four_types as $key=> $four){?>
				<div class="col-lg-3 col-md-6 mb-4 ">
					<div class="d-flex vs_gap_10 align-items-center">
						<img src="<?php echo base_url().$four['image']; ?>" width="72px" height="68px">
						<div class="vs_srvc_sec_1_cnt">
							<h2><?php echo $four['title'];?></h2>
							<h3><?php echo $four['text'];?></h3>
							
						</div>
					</div>
				</div>
				<?php } }?>
			
				
			</div>
			
		</div>
	</section>

	<!-- ================Srvc_sec_1 section E================ -->

	<!-- ================About  section S================ -->
	<section class="vs_sctn_space">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-7 col-md-7 vs_abt_cnt pl-5 pb-4">
					<h3 class="vs_h3_head">
						<?php echo $about_us['title'];?>
					</h3>
					<?php echo $about_us['description'];?>
				</div>
				<div class="col-lg-5 col-md-5 pb-4 text-lg-left text-md-left text-center">
					<img src="<?php echo base_url().$about_us['image']; ?>" class="img-fluid">
				</div>
			</div>
		</div>
	</section>

	<!-- ================About  section S================ -->

	<!-- ================Service section S================ -->

	<section class="vs_srvces_bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="vs_heading_title text-center">
						<h3>Call the Plumber</h3>
						<h1>Services</h1>
						<p class="mb-0">Check to see what services are available in your zip code , Ask the plumber when you speak to him.</p>
					</div>
				</div>
			</div>
			<div class="row mt-5">
			       <?php if(!empty($services)){
        foreach($services as $key=> $service){?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="position-relative text-center">
						<img src="<?php echo base_url().$service['image']; ?>" width="100%" class="img-fluid">
						<div class="vs_img_ovrly_txt">
							<h2><?php echo $service['title']?></h2>
						<?php custom_echo($service['description'],238);
						$string = strip_tags($service['description']); 
						if (strlen($string) > 238) {
						
						?>
						
						     <a type="button" class="add_banners1" data-id="<?php echo $service['id']; ?>" style="color:red">
                                       Read More
                                       </a>
                                       <?php }?>
                                
						</div>
					</div>
				</div>
				<?php } }?>
				
			</div>
			
		</div>
	</section>

	<!-- ================Service section E================ -->
  <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
	<!-- ================Newsletter section S================ -->

	<section class="vs_nwsletr_bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 vs_nwsletr_cnt text-center text-white">
					<h3><?php echo $home_content['title'];?></h3>
					<h2><?php echo $home_content['title1'];?></h2>
					<p><?php echo $home_content['description'];?></p>
					<button class="vs_new_ltr_btn">
						<a  href="<?php echo base_url(); ?>website/contact_us">Contact Us</a>
					</button>
					
				</div>
				
			</div>
			
		</div>
	</section>

	<!-- ================Newsletter section E================ -->

	<!-- ================Testimonial section S================ -->

	<section class="vs_testimonial_bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="vs_heading_title text-center pb-5">
						<h3>What Client Says</h3>
						<h1><?php echo $home_content['title_t']?></h1>
					
							<?php echo $testimonial_single['description']?>
					
					</div>
				</div>
			</div>

		</div>
		
	</section>
	<section class="pt-3 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="vs_testimonial_sldr owl-theme">
					     <?php if(!empty($testimonials)){
        foreach($testimonials as $key=> $test){?>
					   <div class="item">
					   	<div class="vs_testi_div">
					   		<div>
					   			<img src="<?php echo base_url().$test['image']; ?>" width="28%" class="img-fluid">
					   			<div class="vs_icon-testi d-flex mt-4">
					   			    <?php if($test['rating']==1){?>
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<?php } elseif($test['rating']==2){?>
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<?php } elseif($test['rating']==3){?>
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<?php } elseif($test['rating']==4){?>
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<?php } else {?>
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
										<?php }?>
									</div>
					   		</div>

					   		<div class="vs_testi_cnt">
					   		   <?php echo $test['description']; ?>
					   			<h3><?php echo $test['name']; ?></h3>
					   			<p><?php echo $test['designation']; ?></p>
					   		</div>
					   		
					   	</div>
					   </div>
					   	<?php } }?>
					 
					   
					</div>
				</div>
				
			</div>
			
		</div>
		
	</section>
	     <?php
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '';
    echo $y;
  }
}
?>
 <script>     

	     $(document).ready(function(){ 
      var $modal = $('#add_banners1');
  $("body").on("click", ".add_banners1", function(event){ 
  var id = $(this).data('id');
    event.stopPropagation();
      $modal.load('<?php echo site_url('website/view_services_details');?>', {id: id},
      function(){
      $modal.modal('show');
  });
  });
  });
	  
	 
    </script>
    
	

	<!-- ================Testimonial section E================ -->

