  <style>
/* Start charts */
.charts {
  margin-top: 25px;
  color: #BBB
}
.charts .chart-container {
  background-color: #313348;
  padding: 15px;
}
.charts .chart-container h3 {
  margin: 0 0 10px;
  font-size: 17px;
}  

.bg-facebook-1{
    background-color: #131413 !important;
} 

.bg-dark-facebook-1{
   background-color: #523740; 
} 
    </style> 
    
          <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Call the plumber</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row m-b-30 dashboard-header">
                 <?php if(@auth_level==9){?>               
                <!--<div class="col-lg-6 col-sm-3">-->
                <!--    <div class="bg-facebook dashboard-facebook">-->
                <!--        <div class="sales-facebook">-->
                           <!-- <img src="<?php echo base_url(); ?>assets/images/user.png">-->
                <!--           <a href="<?php echo base_url()?>admin/category"><i  class="fa fa-tachometer" aria-hidden="true" style="color: aliceblue"></i></a>-->
                <!--            <div class="f-right">-->
                <!--            <h2 class="counter">-->
                <!--                <?=$categories_count[0]['category_count']?></h2>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="bg-dark-facebook">-->
                <!--            <p class="week-sales">Wealth protection partners</p>-->
							
                <!--          </div>-->
						  
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-6 col-sm-3">
                    <div class="bg-success dashboard-success">
                        <div class="sales-facebook">
                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png">-->
                           <a href="<?php echo base_url();?>admin/plumber"><i class="fa fa-users" aria-hidden="true" style="color: aliceblue"></i></a>
                            <div class="f-right">
                            <h2 class="counter">
                               <?=$user_count[0]['total_ussers']?>
                                 </h2></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook bg-dark-facebook-1">
                            <p class="week-sales">No. of registered plumbers</p>
                          </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-sm-3">
                    <div class="bg-facebook dashboard-facebook">
                        <div class="sales-facebook">
                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png">-->
                           <a href="<?php echo base_url()?>admin/listed_plumber"><i  class="fa fa-users" aria-hidden="true" style="color: aliceblue"></i></a>
                            <div class="f-right">
                            <h2 class="counter">
                                <?=$user_admin_count[0]['total_ussers']?></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook">
                            <p class="week-sales">No. of listed plumbers</p>
							
                          </div>
						  
                    </div>
                </div>
				<div class="col-lg-6 col-sm-3">
                    <div class="bg-success dashboard-success" style="background-color: #8BC34A !important;">
                        <div class="sales-facebook">
                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png">-->
                          <a href="<?php echo base_url();?>admin/contact_requests"><i class="fa fa-envelope" aria-hidden="true" style="color: aliceblue"></i></a>
                            <div class="f-right">
                            <h2 class="counter">
                                <?=$contact[0]['contact_req']?></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook bg-dark-facebook-1">
                            <p class="week-sales">Contact Requests</p>
                          </div>
                    </div>
                </div>
				<div class="col-lg-6 col-sm-3">
                    <div class="dashboard-success" style="background-color: #1b8bf9 !important;">
                        <div class="sales-facebook">
                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png">-->
                           <a href="<?php echo base_url();?>admin/newsletter"><i class="fa fa-user" aria-hidden="true" style="color: aliceblue"></i></a>
                            <div class="f-right">
                            <h2 class="counter">
                                 <?=$newsletter[0]['news_letter']?></h2></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook bg-dark-facebook-1">
                            <p class="week-sales">Subscribe Email's</p>
                          </div>
                    </div>
                </div>
                <?php } ?>   
                   <!-- <div class="col-lg-6 col-sm-3">
                    <div class="bg-facebook dashboard-facebook">
                        <div class="sales-facebook">
                            <img src="<?php echo base_url(); ?>assets/images/user.png">
                           <a href="#"><i  class="fa fa-tachometer" aria-hidden="true" style="color: aliceblue"></i></a>
                            <div class="f-right">
                            <h2 class="counter">
                                <?=$appointed_count[0]['appointed_req']?></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook">
                            <p class="week-sales">Call the plumber </p>
							
                          </div>
						  
                    </div>
                </div>-->
            </div>             
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.copy_right').hide();
    });
</script>