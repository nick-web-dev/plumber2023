
	<!-- Menu css E -->

				<!-- /*================ all_banner section  S================*/ -->


	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1>PRICING PLAN</h1>
			</div>
		</div>
	</section>

				<!-- /*================ all_banner section E================*/ -->

				<!-- ===============vs_pricing_plans S================= -->

	<section class="vs_pricing_plans py-5">
		<div class="container-fluid">
			<div class="text-center vs_pricing_plans_head">
				<h1><b><?php echo $subscription_plan_text['title'];?></b></h1>
			<?php echo $subscription_plan_text['description'];?>
			</div>
			<div class="px-sm-5 mx-sm-3 px-0 mx-0">
				
			
			<div class="row py-2">
			     <?php if(!empty($subscription_plan)){
        foreach($subscription_plan as $key=> $subscriptionplantext){?>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
					<div class="vs_pricing_plans_section">
						<div>
						<!--    <?php if($subscriptionplantext['months']=="1"){?>-->
						<!--<h6><?php echo $subscriptionplantext['months']?> MONTH</h6>-->
						<!--<?php } else {?>-->
						<!--<h6><?php echo $subscriptionplantext['months']?> MONTHS</h6>-->
						<!--<?php }?>-->
						<h6><?php echo $subscriptionplantext['months']?></h6>
							<h1 class="pt-1 "><?php echo $subscriptionplantext['plan_name']?></h1>
							<h1 class="py-3"> <sup></sup><span><?php echo $subscriptionplantext['amount']?></span></h1>
						</div>
						<div>
							<div class="d-flex align-items-center py-2">
								 <div class="checked_imgDiv"><img src="<?php echo base_url();?>assets/website/img/check2.svg"></div>
								 <!-- <img src="img/check-lg.svg"> -->
								 <p class="mb-0"><?php echo $subscriptionplantext['text1']?></p>
							</div>
							<div class="d-flex align-items-center py-2">
								 <div class="checked_imgDiv"><img src="<?php echo base_url();?>assets/website/img/check2.svg"></div>
								 <!-- <img src="img/check-lg.svg"> -->
								 <p class="mb-0"><?php echo $subscriptionplantext['text2']?></p>
							</div>
							<div class="d-flex align-items-center py-2">
								 <div class="checked_imgDiv"><img src="<?php echo base_url();?>assets/website/img/check2.svg"></div>
								 <!-- <img src="img/check-lg.svg"> -->
								 <p class="mb-0"><?php echo $subscriptionplantext['text3']?></p>
							</div>
							<div class="d-flex align-items-center py-2">
								 <div class="checked_imgDiv"><img src="<?php echo base_url();?>assets/website/img/check2.svg"></div>
								 <!-- <img src="img/check-lg.svg"> -->
								 <p class="mb-0"><?php echo $subscriptionplantext['text4']?></p>
							</div>
						</div>
						<!-- <div class="text-center pt-5 pb-3">
							<button class="btn"><a href="#" class="text-dark">PURCHASE</a></button>
						</div> -->
						
					</div>
				</div>
				 <?php } } else{?>
       <h4 style="color:red;margin-left: 41%;">No data founf</h4>
      <?php }?>
			
			</div>
			</div>
		</div>
	</section>
				<!-- ===============vs_pricing_plans E================= -->

				<!-- ===============Footer section S================= -->



				<!-- ===============Footer section E================= -->

</body>
</html>