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
          <h4>Reply</h4>          
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Reply</h5>
          </div>
        <div class="card-block">
          <form id="insert_category">                
               
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[email]" value="<?php echo @$value['email']?>" placeholder="email" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Reply</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" col="30"  rows="10" name="data[description]" placeholder="Write your reply here..." required="required"><?php echo @$value['description']?></textarea>
                    </div>
                </div>
                <input type="hidden" name="data[id]" value="<?php echo @$id; ?>">      
            </form> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_category loadingGif">Send</button>
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
<?php if(@$value['id']=='') { ?>
               // "image"               : "required",
                <?php } ?> 				
                "data[email]"   : "required",
                 "data[description]"   : "required",                       
                         
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
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/send_reply",
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
						   window.location.replace("<?php echo base_url();?>admin/newsletter");
                        } 
                    }
                });
            }
        });
   
</script>