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
          <!--<h4>Footer Content</h4>          -->
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Footer Content</h5>
          </div>
        <div class="card-block">
          <form id="edit_term">
               <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Address<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="data[address]" value="<?php echo @$terms[0]['address']; ?>" placeholder="address">
                  </div>
              </div>
             <div class="form-group row">
            <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Image </label>
                    <div class="col-sm-10  validate-file1">
                        <input class="form-control" type="file"  name="image" onchange="validateLogo()" id="customFile1" accept='image/*'>
                        <!--<span><b>Note :</b>Image Dimensions must be 470*470.</span>-->
                         
                    </div>
                </div>
                <?php if((@$terms[0]['image'] != '')){ ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label form-control-label"></label>
                    <div class="col-sm-10">
                        <img src="<?php echo base_url().@$terms[0]['image']?>" width="100px" height="100px" style="background-color:gray;" >
                        
                    </div>
                </div>
                <?php } ?>
              
               <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Email<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="email" name="data[email]" value="<?php echo @$terms[0]['email']; ?>" placeholder="Email">
                  </div>
              </div>
               <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Phone number Plumbers<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="data[phone_number]" value="<?php echo @$terms[0]['phone_number']; ?>" placeholder="Phone number Plumbers">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Phone number  Licensing<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="data[phone_number1]" value="<?php echo @$terms[0]['phone_number1']; ?>" placeholder="Phone number Licensing">
                  </div>
              </div>
                <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Facebook Link<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                  <input class="form-control" type="text" name="data[facebook_link]" value="<?php echo @$terms[0]['facebook_link']; ?>" placeholder="Facebook Link">
                  </div>
              </div> 
                 <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Twitter Link<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                  <input class="form-control" type="text" name="data[twitter_link]" value="<?php echo @$terms[0]['twitter_link']; ?>" placeholder="Twitter Link">
                  </div>
              </div> 
               
             <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Instagram Link<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="data[instagram_link]" value="<?php echo @$terms[0]['instagram_link']; ?>" placeholder="Instagram Link">
                  </div>
              </div>
             
               <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">Text<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <textarea class="form-control ckeditor" id="editor1"  name="data[text]" cols="5" rows="8" id=""><?php echo @$terms[0]['text'];?></textarea>
                  </div>
                </div> 
                 <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label">All rights<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="data[all_right]" value="<?php echo @$terms[0]['all_right']; ?>" placeholder="All rights">
                  </div>
              </div>
       <input type="hidden" name="data[id]" value="<?php echo @$terms[0]['id']; ?>">
        <div class="clearfix"></div>  
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary waves-effect waves-light loadingGif edit_term" style="left:440px;">Save Changes</button>
            </div>
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
   CKEDITOR.replace( 'editor1', {
  height: 300,
  filebrowserBrowseUrl : '<?= base_url()?>assets/ckeditor/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb',
  filebrowserUploadUrl: "<?php echo base_url();?>admin/ckeditor_image",
  filebrowserUploadMethod: 'form'
 });
</script>

<script>
    $("#edit_term").validate({
      ignore: [], 
        rules: {
          "data[all_right]" :  "required",
        "data[email]" :  "required",
        "data[phone_number]" :  "required",
        "data[phone_number1]" :  "required",
        "data[facebook_link]" : {
                  required: true,
                //   url: true
              },
              "data[instagram_link]" : {
              required: true,
            //   url: true
          },
              "data[twitter_link]" : {
              required: true,
            //   url: true
          },
        //      "data[google_link]" : {
        //       required: true,
        //       url: true
        //   },
         "data[text]": {
                              required: function(textarea) 
                              {
                                CKEDITOR.instances[textarea.id].updateElement();
                                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                  return editorcontent.length === 0;
                              },
                            },
      },
      
       messages : {
                                           
            }, 
      });
        $('.edit_term').click(function(){ 
        var validator = $("#edit_term").validate();
            validator.form();
            if(validator.form() == true){
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#edit_term')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_privacy_policy",
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
                            location.reload();
						 
                        } 
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
   function validateLogo(){
       var img = document.getElementById('customFile1');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "jpg" || ext == "JPEG" || ext == "PNG" || ext == "png" || ext == "jpg" || ext == "jpeg")
       {
         $('.edit_term').removeAttr("disabled");
         $('.validate-file1').css("border-color","#D2D6DE");        
       }
       else
       {
           $('.edit_term').attr("disabled","disabled");
        //   $('.validate-file1').css("border","2px solid red");
           alertify.error('Only png or jpg or jpeg files are allowed');           
       }
     }
  </script>


