<style>
  input.error {
    border: 1px solid red !important;
    color : red !important;
  }  
  textarea.error {
    border: 1px solid red !important;
    color : red !important
  }
  select.error {
    border: 1px solid red !important;
    color : red !important;
  }
  label.error {
    color: red !important;
  }
  .mb10 {
    margin-bottom: 10px;
  }
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
        <!-- Header Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <!--<h4>About Us</h4>          -->
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Send mail</h5>
          </div>
        <div class="card-block">
             <form name="myform" id="insert_category" method="post" enctype="multipart/form-data">
        <div class="form-group row">
                    <!--<label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Select Category :</label>
                    <div class="col-sm-2"> All Stylist
                      <input type="checkbox" class="chb" name="data[type]" style="margin-left: 5px;" value="1" > 
                    </div>-->
                     <label for="inputStandard" class="col-lg-3 control-label"></label>
					<div class="col-lg-3">
						<select class="form-control" name="data[type]" style="margin-left: -2px;"  onclick="users(this.value)">
							
							<option value="1">Send email to all plumbers</option>
							<option value="2">Send to particular plumber</option>                   
						</select>
                    </div>
                                       
                   
					
					 <div class="col-lg-3 bury" style="display:none">
                       <select class="form-control" name="data[user_id]" style="margin-left: -2px;">
                        <option value="">Select plumber</option>
                        <?php foreach($all_users as $user){
                        if($user['username'] !=""){
                        ?>
                          <option value="<?php echo $user['user_id']?>"><?php echo $user['username']?></option>
                        <?php } }?>                         
                       </select>
                    </div>
                </div>
    
      <div class="form-group row">
        <label for="inputStandard" class="col-lg-3 control-label form-control-label"> Sublect :</label>
         <div class="col-sm-9">
            <input type="text" name="data[subject]"  class="form-control">
        
          </div>
        </div>
 

     <div class="form-group row">
                <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Message</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="data[text]" rows="10" placeholder="Enter Description" required="required"></textarea>
                </div>
         </div>

      
     <div class="modal-footer" style="text-align: center;">
              <button type="button" class="btn btn-primary waves-effect waves-light insert_category loadingGif">Submit</button>
            </div>    
    
    </form>
                   
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>
 <script>     
function users(id)
    {
	
        if(id=="1")
        {
            
            $('.bury').css('display','none');
            
        }
        else
        {
            
           $('.bury').css('display','block');

        } 

    }

    </script>
    <script>
$("#insert_category").validate({
            ignore: [],       
            rules: {  
 
                 "data[subject]"      : "required",
                "data[text]":"required",
                
            },
            messages : {
              "data[service_name_en]"   :  "Enter Service Name in English",
              "data[service_name_fr]"   :  "Enter Service Name in French", 
              "data[description_en]"    :  "Enter Description in English",
              "data[description_fr]"    :  "Enter Description in French",                              
            },      
        });

    $('.insert_category').click(function(){ 
        var validator = $("#insert_category").validate();
            validator.form();
            if(validator.form() == true){
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/sendemail_to_plumbers",
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
                           // location.reload();
						   window.location.replace("<?php echo base_url();?>admin/sendemail");
                        } 
                    }
                });
            }
        });
  
</script>
