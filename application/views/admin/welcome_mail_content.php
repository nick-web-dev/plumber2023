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
        <div class="card-header"><h5 class="card-header-text">Welcome mail content</h5>
          </div>
        <div class="card-block">
          <form id="edit_term" method="post">
                <div class="form-group row">
                  <label class="col-xs-2 col-form-label form-control-label"> Content<span class="required">&nbsp;</span></label>
                    <div class="col-md-10">
                    <textarea class="form-control ckeditor" id="editor1" name="data[content]" cols="5" rows="8" id=""><?php echo @$terms[0]['content'];?></textarea>
                  </div>
                </div> 
        
         <input type="hidden" name="data[id]" value="<?php echo @$terms[0]['id']; ?>">
        <div class="clearfix"></div>  
            <div class="form-group">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary waves-effect waves-light edit_term  insert_banners loadingGif" style="left:440px;">Save Changes</button>
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
		 "data[content]": {
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
                    url: "<?php echo base_url();?>admin/save_welcome_mail_content",
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

