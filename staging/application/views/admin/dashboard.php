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
                    <h4>Wealth protection partners</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row m-b-30 dashboard-header">
                 <?php if(@auth_level==9){?>               
                <div class="col-lg-6 col-sm-6">
                    <div class="bg-facebook dashboard-facebook">
                        <div class="sales-facebook">
                           <!-- <img src="<?php echo base_url(); ?>assets/images/user.png">-->
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <div class="f-right">
                            <h2 class="counter">
                                Wealth protection partners</h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook">
                            <p class="week-sales">Wealth protection partners</p>
                          </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="bg-success dashboard-success">
                        <div class="sales-facebook">
                            <!--<img src="<?php echo base_url(); ?>assets/images/user.png">-->
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <div class="f-right">
                            <h2 class="counter">
                                <?= @$tools?></h2></h2>
                            </div>
                        </div>
                        <div class="bg-dark-facebook bg-dark-facebook-1">
                            <p class="week-sales">Wealth protection partners</p>
                          </div>
                    </div>
                </div>
                <?php } ?>                        
            </div>             
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.copy_right').hide();
    });
</script>