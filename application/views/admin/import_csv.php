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
<style type="text/css">
  .images-promocodes {
    float: left;
    margin-right: 10px;
}
.images-promocodes img {
    width: 100px;
    height: 100px;
}
.datepicker-dropdown td.today.day {
    background: #555;
    color: #fff;
}
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
        <!-- Header Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <!--<h4>Add / Edit Event</h4>          -->
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text" style="text-transform: inherit;">Csv Import</h5>
         <!--<a href="<?php echo base_url()."assets/uploads/events.csv"; ?>" class="btn btn-primary waves-effect waves-light pull-right add_product_category1" download style="margin-left: 62%;"> Sample Csv</a>-->
          </div>
           
        <div class="card-block">
               <!--<span><b>Note</b></span><br>-->
               <!-- <span><b>title :</b> Eg : testing </span><br>-->
               <!-- <span><b>date :</b> Eg : (dd-m-yyyy)-28-10-2021 </span><br>-->
               <!-- <span><b>start_time :</b> Eg : (24 hours format)->24:21</span><br>-->
               <!-- <span><b>end_time :</b> Eg : (24 hours format) ->24:26</span><br>-->
               <!-- <span><b>description :</b> Eg : testing description</span><br>-->
               <!-- <span><b>address :</b> Eg : Hyderabad, Telangana, India</span><br>-->
               <!-- <span><b>city :</b> Eg : Hyderabad</span><br>-->
               <!-- <span><b>latitude :</b> Eg : 17.385044</span><br>-->
               <!--  <span><b>longitude :</b> Eg : 17.385044</span><br>-->
               <!--  <span><b>street :</b> Eg :</span><br>-->
               <!--  <span><b>status :</b> Eg :  1(1-active,0-Inactive)</span><br>-->
               <!--  <span><b>type :</b> Eg :  1(0-Public,1-Private)</span><br><br>-->
               
                  
          <form id="insert_category">                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Csv</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="csv_file" onchange="validateLogo()" id="customFile" >
                    </div>
                </div>
            </form> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_category loadingGif">Submit</button>
            </div>                 
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>

<script>
$("#insert_category").validate({
            ignore: [],       
            rules: {  
"csv_file"      : "required",   				
            },
            messages : {
            },      
        });

    $('.insert_category').click(function(){ 
        var validator = $("#insert_category").validate();
            validator.form();
            if(validator.form() == true){
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/upload_events",
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
                         if(result) 
                        {
						   window.location.replace("<?php echo base_url();?>admin/import_csv");
                        } 
                    }
                });
            }
        });
   
</script>
<script type="text/javascript">
   function validateLogo(){
       var img = document.getElementById('customFile');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "Csv" || ext == "csv")
       {
         $('.insert_category').removeAttr("disabled");
         $('.validate-file1').css("border-color","#D2D6DE");        
       }
       else
       {
           $('.insert_category').attr("disabled","disabled");
        //   $('.validate-file1').css("border","2px solid red");
           alertify.error('Only Csv are allowed');           
       }
     }
</script>