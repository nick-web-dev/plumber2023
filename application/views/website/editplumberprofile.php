<style>

    .profile-verification {

    padding: 0px;

}

  .field-icon {

    float: right;

    margin-left: -25px;

    margin-top: -25px;

    position: relative;

    z-index: 2;

}

.cover-overlay {

     margin-top: 0px; 

    height: 325px;

}

.profile-cover {

    height: 325px;

    

    

}

.profile-header {

    margin-top: 40px;

}

.vs_plumber_profile_banner_img1 {

     border: none; 

    border-radius: 15px;

    height: 100%;

    width: 100%;

}

</style>



      <?php 

      // $value['hide_show']  =1;
      if((empty($this->session->userdata('check_user'))) || $value['hide_show']==0){?>

      <div class="profile-wrapper">

   <div class="container">

      <div class="profile-header">

         <div class="profile-cover">

            <div class="cover-area">

               <div class="cover-overlay">

                  <!--<h3>If you are this plumber</h3>-->

                   <?php if($value['banner_image'] !=""){?>

                  <img src="<?php echo base_url().$value['banner_image']; ?>" class="img-fluid vs_plumber_profile_banner_img1">

				

                  <?php } else {?>

                  <h3>If you are this plumber</h3>

                  <h3>

                     <a href="#" class="verify-profile">

                     Click here to upload the Cover Photo of Your Company

                     </a>

                     <?php }?>

                  </h3>

               </div>

            </div>

         </div>

         <div class="profile-box">

            <div class="profile-info">

               <div class="profile-photo">

                  <img src="<?php echo base_url().$value['user_image']; ?>">

               </div>

               <!--<h5 class="verify-profile">Ace Plumbing</h5>-->

            </div>

            <!--<div class="profile-btns">

               <form method="POST" action="#">

                  <input type="hidden" name="email_plumber" value="alkek@msn.com">

                  <button type="submit" class="actv rqst_btn_2">

                  Send Message

                  </button>

               </form>

               <a href="#">Call the Plumber</a>

               <form method="POST" action="#">

                  <input type="hidden" name="email_plumber" value="alkek@msn.com">

                  <button type="submit" class="rqst_btn">

                  Request a Quote

                  </button>

               </form>

            </div>-->

         </div>

      </div>

      <div class="profile-content">

         <form method="POST">

            <div class="content-row">

               <div class="content-info verify-profile">

                  <label>Street Address</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>City</label>

                  <p><?php echo $value['city']; ?></p>

               </div>

               <div class="content-info verify-profile">

                  <label>State</label>

                  <p><?php echo $value['state']; ?></p>

               </div>

               <div class="content-info verify-profile">

                  <label>Zip</label>

                  <p><?php echo $value['zip_code']; ?></p>

               </div>

            </div>

            <div class="content-row">

               <div class="content-info verify-profile">

                  <label>Phone</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Hours Open</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Emergency Service</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Type of Plumbing</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

            </div>

            <div class="content-row">

               <div class="content-info verify-profile">

                  <label>Years in Business</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Number Of Trucks</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Zip Codes Covered</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

            </div>

            <div class="content-row">

               <div class="content-info verify-profile">

                  <label>Email</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Website URL</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

               <div class="content-info verify-profile">

                  <label>Response Time</label>

                  <input type="text" class="form-control empty-field" readonly>

               </div>

            </div>

            <div class="company-info verify-profile">

               <h2>Company Description</h2>

               <p></p>

            </div>

         </form>

      </div>

      <?php } else {?>

         <?php 
         $session_data=$this->session->userdata('check_user');

         $user_data=$this->db->select('*')->from('users')->where("user_id",$session_data['user_id'])->get()->row_array();

         $subscription_daa= $this->db->select('*')->from('transactions')->where("user_id",$session_data['user_id'])->where("status",'paid')->get()->row_array();


         ?>


      <div class="profile-wrapper">

   <div class="container">

      <div class="profile-header">

         <div class="profile-cover">

            <div class="cover-area">

               <div class="cover-overlay">

                  <!--<h3>If you are this plumber</h3>-->

                  <?php if($value['banner_image'] !=""){?>

                  <img src="<?php echo base_url().$value['banner_image']; ?>" class="img-fluid vs_plumber_profile_banner_img1">

				

                  <?php } else {?>

               

                  <h3>

                       

                     <!--<a href="#" class="verify-profile">-->

                     <!--Click here to upload the Cover Photo of Your Company-->

                     <!--</a>-->

                     <!--<input type="file" id="banner_image" name="banner_image"> -->
 <?php if(isset($subscription_daa['trans_id'])){?>
                     <div class="subscription">If you are this plumber<br>
Click here to upload the Cover Photo of Your Company</div>

</input>
<?php } else{?>

<div class="subscription" data-toggle="modal" data-target="#myModal">If you are this plumber<br>
Click here to upload the Cover Photo of Your Company</div>

</input>
<?php }?>

                    <input type="hidden" name="banner_image" value="<?php echo @$value['banner_image'] ?>"  />  

                  </h3>

                  <?php }?>

               </div>

            </div>

         </div>

         <div class="profile-box">

            <div class="profile-info">

               <div class="profile-photo">

                  <img src="<?php echo base_url().$value['user_image']; ?>">

               </div>

               <h5 class="verify-profile"><?php echo $value['company_name']?></h5>

            </div>

            <!--<div class="profile-btns">

               <form method="POST" action="#">

                  <input type="hidden" name="email_plumber" value="alkek@msn.com">

                  <button type="submit" class="actv rqst_btn_2">

                  Send Message

                  </button>

               </form>

               <a href="#">Call the Plumber</a>

              <form method="POST" action="#">

                  <input type="hidden" name="email_plumber" value="alkek@msn.com">

                  <button type="submit" class="rqst_btn">

                  Request a Quote

                  </button>

               </form>

            </div>-->

         </div>

      </div>
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
       
      </div>
      <div class="modal-body">
      <button> 
      Thanks, you are doing great, the cost for this would be $99 a month. Also your company listing would be moved to the Top 4 listing!
      <a href="/authorize-terminal/?customer_number=<?php echo $value['user_id'];?>" target="_blank">Continue</a></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>   
         

       <div class="profile-content">

            <form method="POST" id="edit_company_form" enctype="multipart/form-data">

               <div class="content-row">
               
               <div class="paid_subscription" >
               <div class="content-info ">

                  <label>Banner Picture</label>
                  <?php if(isset($subscription_daa['trans_id'])){?>
                     <input type="file" class="form-control" name="banner_image" accept='image/*'>
                     <?php } else{?>
                  <input type="file" class="form-control" name="banner_image" accept='image/*' >
                  <?php }?>

               </div> 

                 <div class="content-info ">

                  <label>Profile Picture </label>
                  <?php if(isset($subscription_daa['trans_id'])){?>
                     <input type="file" class="form-control" name="user_image" accept='image/*'>
                     <?php } else{
                       
                       
                        ?>
                  <input type="file" class="form-control" name="user_image" accept='image/*' >
                  <?php }?>
               </div> 

               <?php  
                        $created_date = $value['created_date'];
                        
                        $last_6month_date =  date("Y-m-d H:i:s",strtotime("-5 month"));
                        if($last_6month_date >= $created_date){ 
                         

                           ?>
               <button> <a href="/authorize-terminal/?customer_number=<?php echo $value['user_id'];?>" target="_blank">Subscribe now</a></button>
               <?php }?>
            </div>

                   <div class="content-info ">

                       <label>Street Address</label>

                       <input type="text" class="form-control" name="data[street_address]" value="<?php echo $value['street_address']; ?>">

                   </div>

               <div class="content-info ">

                  <label>Map Location</label>

                  <input type="text" class="form-control" name="data[address]" value="<?php echo $value['address']; ?>">

               </div>

               <div class="content-info ">

                  <label>City</label>

                  <input type="text" class="form-control" name="data[city]" value="<?php echo $value['city']; ?>"></p>

               </div>

              

            </div>

            </div>

               <div class="content-row">

              

               <div class="content-info">

                  <label>State</label>

                 <input type="text" class="form-control" name="data[state]" value="<?php echo $value['state']; ?>">

               </div>

               <div class="content-info">

                  <label>Zip</label>

                 <input type="text" class="form-control" name="data[zip_code]" value="<?php echo $value['zip_code']; ?>"> 

               </div>

               <div class="content-info">

                  <label>Company name</label>

                 <input type="text" class="form-control" name="data[company_name]" value="<?php echo $value['company_name']; ?>">

               </div>

                   <div class="content-info">

                       <label>Telephone</label>

                       <input type="text" class="form-control" name="data[telephone]" value="<?php echo $value['telephone']; ?>">

                   </div>

            <!--</div>-->

            

            </div>

            <div class="content-row">

               <div class="content-info">

                  <label>Phone</label>

                  <input type="text" class="form-control" name="data[mobile_no]" value="<?php echo $value['mobile_no'];?>"  onchange="check_mobile_no(this.value)" maxlength="10" onkeyup="Accept_OnlyNumbers(this,false)">

               <span id="error_message1" style="color:red"></span>

               </div>

               <div class="content-info">

                  <label>Hours Open</label>

                  <input type="text" class="form-control" name="data[open_hours]" value="<?php echo $value['open_hours'];?>" >

               </div>

               <div class="content-info">

                  <label>Emergency Service</label>

                  <input type="text" class="form-control" name="data[emergency_service]" value="<?php echo $value['emergency_service'];?>">

               </div>

               <div class="content-info">

                  <label>Type of Plumbing</label>

                    <?php if(!empty($type_of_plumbing)){

                                         foreach($type_of_plumbing as $key=> $typeofplumbing){

                                           $permissions = explode(',',$value['type_of_plumbling']);

                                         ?>

									    <div class="form-check">

										  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="data[type_of_plumbling][]" value="<?php echo $typeofplumbing['id']?>" <?php if(in_array($typeofplumbing['id'],$permissions)){ echo 'checked="checked"';}?>>

										  	<label class="form-check-label" for="inlineCheckbox1"><?php echo $typeofplumbing['name']?></label>

										</div>

										<?php } }?>

               </div>

            </div>

            <div class="content-row">

               <div class="content-info">

                  <label>Years in Business</label>

                  <input type="text" class="form-control" name="data[years_of_business]" value="<?php echo $value['years_of_business'];?>" >

               </div>

               <div class="content-info">

                  <label>Number Of Trucks</label>

                  <input type="text" class="form-control" name="data[number_of_tracks]" value="<?php echo $value['number_of_tracks'];?>" onkeyup="Accept_OnlyNumbers(this,false)">

               </div>

               <div class="content-info">

                  <label>Zip Codes Covered</label>

                  <?php if($value['zip_code_covered'] !=0){?>

                  <input type="text" class="form-control" name="data[zip_code_covered]" value="<?php echo $value['zip_code_covered'];?>">

					<?php } else{?>

					<input type="text" class="form-control" name="data[zip_code_covered]">

							<?php }?>

                  

               </div>

            </div>

            <div class="content-row">

               <div class="content-info">

                  <label>Email</label>

                  <input type="email" class="form-control" name="data[email]" value="<?php echo $value['email'];?>" onchange="check_email(this.value)">

                   <span id="error_message" style="color:red"></span> 

               </div>

               <div class="content-info">

                  <label>Website URL</label>

                  <input type="text" class="form-control" name="data[website_url]" value="<?php echo $value['website_url'];?>">

               </div>

               <div class="content-info">

                  <label>Response Time</label>

                  <input type="text" class="form-control"  name="data[response_time]" value="<?php echo $value['response_time'];?>">

               </div>

            </div>

            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" class="form-control">

            <div class="content-info ">

               <label>Company Description</label>

            <textarea class="form-control" name="data[company_description]" placeholder="Enter Description" required="required"><?php echo $value['company_description'];?></textarea>

            </div><br>

             <div class="content-info">

                  <label>user Name</label>

                  <input type="text" class="form-control"  name="data[username]" value="<?php echo $value['username'];?>">

               </div><br>

             <div class="content-info">

                  <label>Password</label>



                  <input id="password-field" type="password" class="form-control" name="data[password]" placeholder="Password" value="<?php echo base64_decode($value['password'])?>">

                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

               </div><br>

            <div class="vs_plumber_create_from_button text-center">

			   <button type="button" class="btn  w-50 edit_company_form loadingGif sign_form  sign_form1 banner_submit banner_submit1">Update</button>

			</div>

         </form>

      </div>

      <?php }?>

      

      <div class="profile-verification" id="get_hide_code">

         <form method="POST" action="#" class="process-verify">

            <div class="msg-box"></div>

            <input type="hidden" name="plumber_id" value="1">

            <input type="hidden" name="get_code" value="0">

            <div class="verify-btn">

               <div class="form-group">

               </div>

               <h4>Let Us Verify You</h4>

               <button type="button" class="btn btn-yellow" onclick="get_hide_show()">

                  <span>Get Code</span>

                  <div class="btn-load">

                     <div class="lds-ellipsis">

                        <div></div>

                        <div></div>

                        <div></div>

                        <div></div>

                     </div>

                  </div>

               </button>

            </div>

         </form>

      </div>

   </div>



</div>

<div><br>

 <div class="profile-verification" style="display:none" id="show_dev">

          

         <form method="POST" id="check_code_form" class="process-verify">

            <div class="msg-box"></div>

            <input type="hidden" name="plumber_id" value="1">

            <input type="hidden" name="get_code" value="0">

            <div class="verify-btn">

               <div class="form-group"><label>Please enter code below sent on your code</label>

               <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" class="form-control">

                  <input type="text" name="code" id="code" class="form-control">

               </div>

               <button type="button" class="btn btn-yellow check_code_form" style="margin-left: 41%;">

                  <span>Submit</span>

                  <div class="btn-load">

                     <div class="lds-ellipsis">

                        <div></div>

                        <div></div>

                        <div></div>

                        <div></div>

                     </div>

                  </div>

               </button>

            </div>

         </form>

      </div><br>

      

      <div class="profile-verification" id="hide_dev" style="display:none">

          

         <form method="POST" id="verification_form" class="process-verify">

            <div class="msg-box"></div>

            <!--<input type="hidden" name="plumber_id" value="1">-->

            <!--<input type="hidden" name="get_code" value="0">-->

            <div class="verify-btn">

               <div class="form-group"><label>Please enter listed phone number.</label>

                  <input type="text" name="phone_number_or_email" id="phone_number_or_email" class="form-control" onkeyup="Accept_OnlyNumbers(this,false)">

                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" class="form-control">

               </div>

               <h4>Let Us Verify You</h4>

               <button type="button"  class="btn btn-yellow verification_form">

                  <span>Get Code</span>

                  <div class="btn-load">

                     <div class="lds-ellipsis">

                        <div></div>

                        <div></div>

                        <div></div>

                        <div></div>

                     </div>

                  </div>

               </button>

            </div>

         </form>

      </div>

   </div>

</div><br>

 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>

 <script> 

$('#OpenImgUpload').click(function(){ $('#banner_image').trigger('click'); });

  $("#verification_form").validate({           

            rules: {

                   "phone_number_or_email"     : "required",

                   },

          messages:{

                "phone_number_or_email"              : "Please enter your registred phone number or email",

          },

   });

   $('.verification_form').click(function(){ 

        var validator = $("#verification_form").validate();

            validator.form();

            if(validator.form() == true){

              

            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);    

                  var data = new FormData($('#verification_form')[0]);   

               

                $.ajax({                

                    url: "<?php echo base_url();?>website/save_verification_code",

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

                                toastr["success"](obj.message);

                        $("#show_dev").attr("style", "display:block");

                         $("#hide_dev").attr("style", "display:none");

                            } else if(obj.status == "payment_done"){

                             toastr["success"](obj.message);

                                   setTimeout(function () {

              $("#show_dev").attr("style", "display:block");

                         $("#hide_dev").attr("style", "display:none");     

                }, 3000);

                        } else{

                             toastr["success"](obj.message);

                        }



                    }

                });

            }

        });

   

   </script>

   <script> 



  $("#check_code_form").validate({           

            rules: {

                   "code"     : "required",

                   },

          messages:{

                "code"              : "Please enter your verification code",

          },

   });

   $('.check_code_form').click(function(){ 

        var validator = $("#check_code_form").validate();

            validator.form();

            if(validator.form() == true){

              

            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);    

                  var data = new FormData($('#check_code_form')[0]);   

               

                $.ajax({                

                    url: "<?php echo base_url();?>website/check_code_form",

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

                                toastr["success"](obj.message);

                        $("#show_dev").attr("style", "display:none");

                         $("#hide_dev").attr("style", "display:none");

                           setTimeout(function () {

              location.reload();       

                }, 3000);

                         } else if(obj.status == "payment_done"){

                              window.location.href="<?php echo base_url();?>website/payment/"+obj.user_id;

                             toastr["success"](obj.message);

                        }else{

                             toastr["success"](obj.message);

                        }



                    }

                });

            }

        });

   

   </script>

   <!--<div class="lets_verify">-->

			<!--		<h4 style="text-align: center;">Let Us Verify You</h4><br>-->

			<!--		<button type="submit" class="btn btn-yellow" style="margin-left: 45%;">-->

			<!--			<span>Get Code</span>-->

			<!--		</button>-->

   <!--</div><br><br> <br> <br> <br> <br>-->

   <!--</div>-->

<script>

function get_hide_show(){

      $("#get_hide_code").attr("style", "display:none");

       $("#hide_dev").attr("style", "display:block");

    

}

   $(document).on('click', '.verify-profile', function(e) {

    e.preventDefault();

   

    $('html, body').animate({

        scrollTop: $(".profile-verification").offset().top

    }, 2000);

   

    setTimeout(function() {

        $('.process-verify').fadeIn();

    }, 1000);

   });

   

   $(document).on('submit', '.process-verify', function() {

    $('.verify-btn button span').hide();

    $('.btn-load').fadeIn();

   

    var formData = new FormData(this);

   

    $.ajax({

        url: $(this).attr('action'),

        type : 'POST',

        data : formData,

        dataType: 'json',

        processData: false,

        contentType: false,

        success: function( response ) {

            $('.btn-load').hide();

            $('.verify-btn button span').fadeIn();

   

            $('input[name=get_code]').val( response.get_code );

         

            if( response.status == 1 ) {

                $('.verify-btn').html( response.dataform );                 

            } 

   

            if( response.status == 0 ) {

                $('.msg-box').html( response.message ); 

   

                setTimeout(function() {

                    $('.msg-box').fadeOut();

                }, 5000);                

            } 

   

            if( response.status == 2 ) {

                location.reload();             

            } 

        },

        error : function(request, status, error) {

            $('.btn-load').hide();

            $('.verify-btn button span').fadeIn();

            console.log(request.responseText);

        }

    });

   });

   

   $(document).on('click', '.resend-code', function(e) {

    e.preventDefault();

   

    var html = '<button type="submit" class="btn btn-yellow">';

    html += '<span>Get Code</span>';

   

    html += '<div class="btn-load">';

    html += '<div class="lds-ellipsis">';

    html += '<div></div>';

    html += '<div></div>';

    html += '<div></div>';

    html += '<div></div>';

    html += '</div>';

    html += '</div>';

    html += '</button>';

   

    $('.msg-box').fadeOut();

    $('.verify-btn').html(html);

   });

</script>

<script> 



  $("#edit_company_form").validate({           

            rules: {

                   "data[company_name]"     : "required",

                   "data[user_image]"     : "required",

                  /* "data[website_url]"     : "required",*/

                   "data[email]"    : { required:true,email:true },

				    "data[mobile_no]"  : { required:true,number:true },

                   "data[open_hours]":{ required:true},

                   "data[emergency_service]":{ required:true},

                    "data[company_description]":{ required:true},



                    "data[number_of_tracks]"  : { required:true,number:true },

                    "data[response_time]":{ required:true},

                    "data[years_of_business]":{ required:true},

                     "data[address]":{ required:true},

                     "data[zip_code]":{ required:true},

                      "data[password]"    : { required:true,minlength:6 },

                      

                   },

          messages:{

                   

                "data[company_name]"              : "Please enter your company name",

                "data[website_url]"              : "Please enter your website url",

                "data[mobile_no]"              :{ required:'Please enter your phone number',number:'Please enter a valid phone number' },

                "data[open_hours]"              : "Please enter your open hours",

                "data[email]"           : { required:'Please enter your email address',email:'Please enter a valid email address' },

                "data[emergency_service]"           : { required:'Please enter your emergency service'},

                "data[company_description]"           : { required:'Please enter your company description'},

                "data[response_time]"           : { required:'Please enter your response time'},

                "data[years_of_business]"           : { required:'Please enter your years of business'},

                "data[number_of_tracks]"              :{ required:'Please enter your number of tracks',number:'Please enter a valid number of tracks' },

                "data[address]"              : "Please enter your address",

                "data[zip_code]"              : "Please enter your zip code",

                 "data[password]"         :  { required:"Please choose your password",minlength:"Please choose your password with atleast 6 characters" },

               



          },

   });

   $('.edit_company_form').click(function(){ 

        var validator = $("#edit_company_form").validate();

            validator.form();

            if(validator.form() == true){

              

            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		

                  var data = new FormData($('#edit_company_form')[0]);   

               

                $.ajax({                

                    url: "<?php echo base_url();?>website/edit_company_form",

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

                                toastr["success"]("You are now registered in the Ultimate Plumbers directory.");

                                  setTimeout(function () {

                        window.location.href="<?php echo base_url();?>website/plumbers";      

                         }, 3000);

                        } else{

                             toastr["success"]("Please select type of plumbing atleast one");

                        }

                      

                    }

                });

            }

        });

   function check_mobile_no(val){

	var mobile_no=val;

	 var user_id = "<?php echo @$value['user_id'];?>";

	 $.ajax({                

		url: "<?php echo base_url('website/check_mobile_no');?>",

		 type: "POST",

		 data: {"mobile_no": mobile_no,"user_id":user_id},

		 async: false,

                    error:function(request,response){

                        console.log(request);

                    },                  

                     success: function(result)

                    {

                        var obj = jQuery.parseJSON(result);

                        // alert(obj.status);

                        if(obj.status == "success")

                        {

						   $('#error_message1').html("This phone number is already registered");

						   $(".sign_form1").prop('disabled', true); 

                        } else{

							

						  $(".sign_form1").prop('disabled', false);

						   $('#error_message1').html("");

						}

                    }

                });

}

function check_email(val){

	var email=val;

	 var user_id = "<?php echo @$value['user_id'];?>";

	 $.ajax({                

		url: "<?php echo base_url('website/check_email');?>",

		 type: "POST",

		 data: {"email": email,"user_id":user_id},

		 async: false,

                    error:function(request,response){

                        console.log(request);

                    },                  

                     success: function(result)

                    {

                        var obj = jQuery.parseJSON(result);

                        // alert(obj.status);

                        if(obj.status == "success")

                        {

						   $('#error_message').html("This email is already registered");

						   $(".sign_form").prop('disabled', true); 

                        } else{

							

						  $(".sign_form").prop('disabled', false);

						   $('#error_message').html("");

						}

                    }

                });

}

function Accept_OnlyNumbers(element,length_validation=false,error_class=false)



{



    var val = element.value;







    if(!(/^[0-9]*\.?[0-9]*$/.test(val)))



    {



        val = val.slice(0,-1) ;



        element.value = val ;







        if(error_class)



        {



            $("#"+error_class).show();



        }



        return;



    }







    $("#"+error_class).hide();



}

   </script>

       <script type="text/javascript">

                    $(".toggle-password").click(function() {



                    $(this).toggleClass("fa-eye fa-eye-slash");

                    var input = $($(this).attr("toggle"));

                    if (input.attr("type") == "password") {

                      input.attr("type", "text");

                    } else {

                      input.attr("type", "password");

                    }

                  });

                  </script>