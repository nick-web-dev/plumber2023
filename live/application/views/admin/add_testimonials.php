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
  .card-header-text {
    text-transform: inherit !important;
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
          <!--<h4>Add / Edit Customer testimonial</h4>          -->
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Add / Edit  Testimonial</h5>
          </div>
        <div class="card-block">
          <form id="insert_category">                
               
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[name]" value="<?php echo @$value['name']?>" placeholder="Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Designation</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[designation]" value="<?php echo @$value['designation']?>" placeholder="Designation" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control ckeditor" id="editor1" name="data[description]" placeholder="Enter Description" required="required"><?php echo @$value['description']?></textarea>
                    </div>
                </div>
			
				
				 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="image" onchange="validateLogo()"  id="customFile1" accept='image/*'>
                    </div>
                </div>
			
				
				<?php if((@$value['image'] != '')){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
					
                        <img src="<?php echo base_url().$value['image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
                	 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Rating</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[rating]">
                            <option value="1" <?php  if(@$value['rating'] == "1"){ echo "selected";} ?>>1</option>
                            <option value="2" <?php  if(@$value['rating'] == "2"){ echo "selected";} ?>>2</option>
                            <option value="3" <?php  if(@$value['rating'] == "3"){ echo "selected";} ?>>3</option>
                            <option value="4" <?php  if(@$value['rating'] == "4"){ echo "selected";} ?>>4</option>
                            <option value="5" <?php  if(@$value['rating'] == "5"){ echo "selected";} ?>>5</option>
                        </select>
                    </div>
                </div>
				 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[status]">
                            <option value="1" <?php  if(@$value['status'] == "1"){ echo "selected";} ?>>Active</option>
                            <option value="0" <?php  if(@$value['status'] == "0"){ echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                
                  <input type="hidden" name="image" value="<?php echo @$value['image'] ?>"  />    			  
                <input type="hidden" name="data[id]" value="<?php echo @$id; ?>">      
            </form> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_category loadingGif">Save changes</button>
            </div>                 
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>
<script> 
   CKEDITOR.replace( 'editor1', {
  height: 300,
  filebrowserBrowseUrl : '<?= base_url()?>assets/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb',
  filebrowserUploadUrl: "<?php echo base_url();?>admin/ckeditor_image",
  filebrowserUploadMethod: 'form'
 });
</script>
<script>
$("#insert_category").validate({
            ignore: [],       
            rules: {  
<?php if(@$value['id']=='') { ?>
                "image"               : "required",
                <?php } ?> 				
                "data[name]"   : "required",
                "data[designation]"   : "required",
                "data[description]": {
                                          required: function(textarea) 
                                          {
                                            CKEDITOR.instances[textarea.id].updateElement();
                                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                              return editorcontent.length === 0;
                                          }
                                        },
                
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
                    url: "<?php echo base_url();?>admin/save_testimonials",
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
						   window.location.replace("<?php echo base_url();?>admin/testimonials");
                        } 
                    }
                });
            }
        });
   
   function validateLogo(){
       var img = document.getElementById('customFile1');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "jpg" || ext == "JPEG" || ext == "PNG" || ext == "png" || ext == "jpg" || ext == "jpeg")
       {
         $('.insert_category').removeAttr("disabled");
         $('.validate-file1').css("border-color","#D2D6DE");        
       }
       else
       {
           $('.insert_category').attr("disabled","disabled");
        //   $('.validate-file1').css("border","2px solid red");
           alertify.error('Only png or jpg or jpeg files are allowed');           
       }
     }
</script>