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
                    .error {
    color: red !important;
}
</style>

      <div class="profile-wrapper">
   <div class="container">
      <div class="profile-header">
    
         <!--<div class="profile-box">-->
         <!--   <div class="profile-info">-->
         <!--      <div class="profile-photo">-->
         <!--         <img src="<?php echo base_url().$value['user_image']; ?>">-->
         <!--      </div>-->
         <!--      <h5 class="verify-profile"><?php echo $value['company_name']?></h5>-->
         <!--   </div>-->
         <!--</div>-->
      </div>
       <div class="profile-content">
            <form method="POST" id="edit_company_form" enctype="multipart/form-data">
               <div class="content-row">
               <div class="content-info ">
                  <label>Banner Picture</label>
                  <input type="file" class="form-control" name="banner_image" accept='image/*'>
                   <?php if((@$value['banner_image'] != '')){ ?>
                <div class="form-group row">
                
                  <img src="<?php echo base_url().$value['banner_image']?>" width="100px" height="100px" style="background-color:gray;background-color: gray;margin-left: 29px;margin-top: 5px;"  accept='image/*'>
                    </div>
                <?php } ?>
               </div> 
                 <div class="content-info ">
                  <label>Profile Picture </label>
                  <input type="file" class="form-control" name="user_image" accept='image/*'>
                    <?php if((@$value['user_image'] != '')){ ?>
                <div class="form-group row">
                  <img src="<?php echo base_url().$value['user_image']?>" width="100px" height="100px" style="background-color:gray;background-color: gray;margin-left: 29px;margin-top: 5px;"  accept='image/*'>
                    </div>
                <?php } ?>
               </div> 
               <div class="content-info ">
                  <label>Street Address</label>
                  <input type="text" class="form-control" name="data[street]" value="<?php echo $value['street_address']; ?>">
               </div>
               <div class="content-info ">
                  <label>City</label>
                  <input type="text" class="form-control" name="data[city]" value="<?php echo $value['city']; ?>"></p>
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
                 <!--<input type="password" class="form-control" name="data[password]" value="<?php echo base64_decode($value['password'])?>" >-->
                 <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>-->
                  <input id="password-field" type="password" class="form-control" name="data[password]" placeholder="Password" value="<?php echo base64_decode($value['password'])?>">
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
               </div><br>
            <div class="vs_plumber_create_from_button text-center">
			   <button type="button" class="btn  w-50 edit_company_form loadingGif sign_form  sign_form1 banner_submit banner_submit1">Update</button>
			</div>
         </form>
      </div>
  
      
   
   </div>

</div>
<div><br>
 
 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>


   <script> 

  
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
                //   "data[user_image]"     : "required",
                   "data[website_url]"     : "required",
                   "data[email]"    : { required:true,email:true },
				    "data[mobile_no]"  : { required:true,number:true },
                   "data[open_hours]":{ required:true},
                   "data[emergency_service]":{ required:true},
                    "data[company_description]":{ required:true},
                    "data[years_of_business]":{ required:true},
                    "data[number_of_tracks]"  : { required:true,number:true },
                    "data[response_time]":{ required:true},
                    // "data[years_of_business]":{ required:true},
                     "data[address]":{ required:true},
                     "data[zip_code]":{ required:true},
                     "data[password]"    : { required:true,minlength:6 },
                      "data[username]"  :{ required:true},
                      
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
                "data[username]"              : "Please enter your username",
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
                    url: "<?php echo base_url();?>website/updateplumberprofile",
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
                                toastr["success"]("You are now registered in North Americas Ultimate plumbing directory.");
                                  setTimeout(function () {
                        window.location.href="<?php echo base_url();?>";      
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