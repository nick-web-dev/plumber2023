<style>
    #insert_banners label.error {
        color:red; 
    }
    #insert_banners input.error,textarea.error,select.error {
        border:1px solid red;
        color:red; 
    }
    .popover {
    z-index: 2000;
    position:relative;
    }  
    .rating{
            width: 25px;
    margin-right: 5px;
    object-fit: contain;
    }
</style>

<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Testimonials details</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners"> 
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Name</label>
                    <div class="col-sm-9" style="top: 9px !important;">
                         <span><?=$value->name?></span>
                    </div>
                </div>
               
                  <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Subject</label>
                    <div class="col-sm-9" style="top: 9px !important;">
                         <span><?=$value->title;?></span>
                    </div>
                </div>
                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Email</label>
                    <div class="col-sm-9" style="top: 9px !important;">
                       <span><?=$value->email;?></span>
                    </div>
                </div>
                
                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Zip code</label>
                    <div class="col-sm-9" style="top: 9px !important;">
                         <span><?=$value->zip_code;?></span>
                    </div>
                </div>
                 
                <!-- <div class="form-group row">-->
                <!--  <label class="col-sm-3 col-form-label form-control-label">Plumber Name</label>-->
                <!--    <div class="col-sm-9" style="top: 9px !important;">-->
                <!--         <span><?=$value->plumbers_name;?></span>-->
                <!--    </div>-->
                <!--</div>-->
                
       <!--          <div class="form-group row">-->
       <!--           <label class="col-sm-3 col-form-label form-control-label">Rating</label>-->
       <!--             <div class="col-sm-9" style="top: 9px !important;">-->
       <!--                 <?php if($value->rating==1){?>-->
       <!--                 <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
       <!--                 <?php } else if($value->rating==2){?>-->
							<!--		<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!--		<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!-- <?php } else if($value->rating==3){?>		-->
							<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--  <?php } else if($value->rating==4){?>	-->
							<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--   <?php } else{?>-->
						 <!--  	<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--  	<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!--<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
						 <!--   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png" class="rating">-->
							<!--		<?php }?>-->
       <!--             </div>-->
       <!--         </div>-->
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Tell us</label>
                    <div class="col-sm-9" style="top: 9px !important;">
                         <span><?=$value->tell_us;?></span>
                    </div>
                </div>
                
            </form>
        </div>
       
    </div>
</div>
