<!-- CONTENT-WRAPPER-->
<Style>
    .col-md-12 {
    width: 214% !important;
}
.card-header-text {
    text-transform: capitalize;
}
.fixed .content-wrapper {
    margin-top: 0px !important;
}

</Style>
<div class="content-wrapper">
<!-- Container-fluid starts -->
<div class="container-fluid">
<div class="row">
   <div class="col-sm-12">
      <div class="main-header">
      </div>
   </div>
</div>
`
<section class="large-12 medium-12 small-12 inline bg">
   <div class="row">
      <!--  <h1>View Broker Details</h1> -->
      <div class="tabs_wrapper">
         <div class="tabs_container">
            <div class="tab_content active" data-tab="info" style="font-size: 18px;">
               <div class="col-md-12">
                   <div class="card">
        <div class="card-header"><h5 class="card-header-text">Plumber Details</h5>
          </div>
        <div class="card-block">
           
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Compamy Name</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['company_name'];?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">E-mail Address</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['email'];?></span>
                    </div>
                </div>
                    <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Phone Number</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['mobile_no'];?></span>
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Website URL</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['website_url'];?></span>
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Open Hours</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['open_hours'];?></span>
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Emergency Service</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['emergency_service'];?></span>
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Company Description</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['company_description'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Response Time</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['response_time'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Number Of Trucks</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['number_of_tracks'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">First Name</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['first_name'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Last Name</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['last_name'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Address</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['address'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Street Address</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                         <?php if($value['street_address'] !=""){?>
                      <span></span><?=$value['street_address'];?></span>
                      <?php } else {?>
                      <span>N/A</span>
                      <?php }?>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">City</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['city'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">State</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['state'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Zip Code</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['zip_code'];?></span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Zip Codes Covered</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                         <?php if($value['zip_code_covered'] !="0"){?>
                      <span></span><?=$value['zip_code_covered'];?></span>
                      <?php } else {?>
                      <span>N/A</span>
                      <?php }?>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Type of Plumbling</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                <?php    $permissions = explode(',',$value['type_of_plumbling']);
                foreach($permissions as $key=>$val){
                    $name=$this->db->select('*')->from('type_of_plumbing')->where("id",$val)->get()->row_array();?>
                      <span></span><?=$name['name'];?>, </span>
                    <?php }?>
                     </div>
                </div>
                
                  <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Username</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                      <span></span><?=$value['username'];?></span>
                    </div>
                </div>
                
                
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label">Profile Picture</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                        <img src="<?php echo base_url().$value['user_image']?>" width="100px" height="100px" style="background-color:gray;margin-left: -105px;" >
                    </div>
                </div>
                <?php if($value['banner_image'] !=""){?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label">Banner image</label>
                    <div class="col-sm-9" style="margin-top: 12px;">
                        <img src="<?php echo base_url().$value['banner_image']?>" width="100px" height="100px" style="background-color:gray;margin-left: -105px;" >
                    </div>
                </div>
                <?php }?>
      </div>
     </div>
    </div>
  </div> 
                 
                  
         
                  
                  
               </div>
            </div>
            
         </div>
      </div>
   </div>
</section>
<style type="text/css">
   .panel-heading {
   background-color: #e3e5e7;
   width: 642px;
   }
   div#pics {
   display: flex;
   }
   a {
   color: black;
   font-size: 15px;
   font-weight: 400;
   cursor: pointer;
   }
   section.large-12.medium-12.small-12.inline.bg {
   margin-left: 3%;
   margin-top: -3%;
   }
   .footer_section {
   position: absolute;
   bottom: 0;
   left: 45%;
   overflow: hidden;
   clear: both;
   display: none;
   }
 
   h1{
   font-family: Merriweather,serif;
   }
   .tabs_wrapper{
   margin-top: 50px;
   }
   ul.tabs{
   background:none!important;
   border:none!important;
   display: inline-block;
   width:100%;
   padding-left:0;
   -webkit-margin-before: 0;
   -webkit-padding-start: 0;
   }
   ul.tabs li {
   list-style:none;
   cursor:pointer;
   margin-right:15px;
   display: inline-block;
   float:left;
   border: 2px solid rgba(0,0,0,0.1);
   padding: 0 9px;
   border-radius:5px;
   /*background-color: #0cc9e7;*/
   /* background-color: #101111;*/
   background-color: #feffff;
   /*color:white;*/
   color: #1f2122;
   line-height: 35px;
   font-family: sans-serif;
   }
   ul.tabs li.active{
   /*background-color: #20d998;*/
   background-color: #209dd9;
   }
   .tabs_container{
   padding-top:20px;
   /*border-top: 1px solid rgba(0,0,0,0.5);*/
   display: inline-block;
   width:51%;
   }
   .tabs_container .tab_content{
   display: none;
   }

   .tabs_container .tab_content.active {
    display: flex;
   width: 193%;
}

</style>

<script type="text/javascript">
   $('ul.tabs li').click(function(){
     var $this = $(this);
     var $theTab = $(this).attr('id');
     console.log($theTab);
     if($this.hasClass('active')){
       // do nothing
     } else{
       $this.closest('.tabs_wrapper').find('ul.tabs li, .tabs_container .tab_content').removeClass('active');
       $('.tabs_container .tab_content[data-tab="'+$theTab+'"], ul.tabs li[id="'+$theTab+'"]').addClass('active');
     }
     
   });
   
</script>