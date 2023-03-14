

	<section class="pb-5 pt-2">
		<div class="container">
			<div class="text-center">
				<h1 class="pt-5"><b>PAYMENT</b></h1>
				<h5 class="py-3"><?php echo $payment['title'];?></h5>
				<h1><b>$ <?php echo $payment['amount'];?>.00</b></h1>
			</div>
			<div class="vs_payment_form py-3">
				<form id="payment_form" method="post" class="pb-5 pt-3">
					<div class="form-group">
					  	<label><h5>  </h5></label>
				      	<input type="text" class="form-control" id="name_on_card" placeholder="Name on Card" name="name_on_card">
				      	<input type="hidden" id="amount" placeholder="amount" name="amount" value="<?php echo $payment['amount'];?>">
				    </div>
				    	<div class="form-group">
					  	<label><h5>  </h5></label>
				      	<input type="email" class="form-control" id="email" placeholder="Email" name="email">
				    </div>
				    <div class="form-group">
				    	<label><h6>    </h6></label>
				      	<input type="text" class="form-control" placeholder="Card Number" id="card_no"  name="card_no"  maxlength="16" onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')">
				    </div>
				     <div class="form-group">
				    	<label><h6>    </h6></label>
				      	<input type="text" class="form-control" placeholder="Cvv" id="cvv"  name="cvv"  maxlength="3"onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')" >
				    </div>
				    <div class="row">
				      	<div class=" col-lg-6 col-md-12">
				      		<label><h6>    </h6></label>
				        	<input type="text" class="form-control"  placeholder="Month" id="month"  name="month"  maxlength="2" onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')">
				      	</div>
				      	<div class="col-lg-6 col-md-12">
					      	<label><h6>  </h6></label>
					        <input type="text" class="form-control" placeholder="Year" id="year" name="year"  maxlength="4" onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')">
					         <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>">
				      	</div>
				    </div>
				    <div class="vs_payment_form_button text-center py-5">
					    <button  type="button" class="btn  w-75 payment_form  payment_form1 loadingGif">PAY NOW</button>
					</div>
				</form>
			</div>
		</div>
	</section>
		<script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
	 <script> 

  $("#payment_form").validate({           
            rules: {
                  "name_on_card"     : "required",
                   "email"    : { required:true,email:true },
                  "card_no":{ required:true,number:true },
                  "cvv":{ required:true,number:true },
                  "month":{ required:true,number:true },
                  "year":{ required:true,number:true },
                   },
          messages:{
               "name_on_card"           : "Please enter your name",
                "card_no"           : { required:'Please enter your card number.',number:'Please enter a valid card number' },
                 "cvv"           : { required:'Please enter your cvv.',number:'Please enter a valid cvv' },   
                "email"           : { required:'Please enter your email address',email:'Please enter a valid email address' },
                 "month"           : { required:'Please enter your month',number:'Please enter a valid month' }, 
                 "year"           : { required:'Please enter your year',number:'Please enter a valid year' }, 
          },
   });
   $('.payment_form').click(function(){ 
        var validator = $("#payment_form").validate();
            validator.form();
            if(validator.form() == true){
              
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#payment_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/authorize_net",
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
                                 setTimeout(function () {
               window.location.href="<?php echo base_url();?>website/editplumberprofile/"+obj.user_id;    
                }, 3000);
                        } else{
                             toastr["success"](obj.message);
                        }
                           
                    }
                });
            }
        });
   
   
   function Accept_OnlyNumbers(element,length_validation=false,error_class=false){
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
				<!-- ===============vs_payment section E================= -->
