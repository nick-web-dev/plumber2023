<style>
    #insert_banners label.error {
        color:red; 
    }
    #insert_banners input.error,textarea.error,select.error {
        border:1px solid red;
        color:red; 
    }
    .popover {
    z-index: 2000;
    position:relative;
    }    
</style>

<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Banner</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners">
               <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title</label>
                    <div class="col-sm-9">
                        <textarea name="data[title]" id="title" rows="4" cols="3" class="form-control" placeholder="Title" ><?=$value->title?></textarea>
                    </div>
                </div>
                
               
				  <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file"   name="image" onchange="validateLogo()" id="customFile1">
                        <!--<span><b>Note :</b>Image Dimensions must be 1230*530.</span>-->
                    </div>
                </div>
                <?php if((@$value->image != '')){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value->image?>" width="150px" height="100px" style="background-color:gray;"  accept='image/*'>
                    </div>
                </div>
                <?php } ?>
                <!--<div class="form-group row">-->
                <!--  <label class="col-sm-3 col-form-label form-control-label">Status</label>-->
                <!--    <div class="col-sm-9">-->
                <!--        <select class="form-control" name="data[status]">-->
                <!--            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>-->
                <!--            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->
                 
                <input type="hidden" name="data[id]" value="<?php echo @$value->id; ?>">
				
                <input type="hidden" name="table" value="banners">
                <input type="hidden" name="image" value="<?php echo @$value->image; ?>"  />
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners loadingGif">Save changes</button>
        </div>
    </div>
</div>
<script>
$("#insert_banners").validate({       
            rules: {               
                <?php if(@$value->id=='') { ?>
                "image"               : "required",
                <?php } ?> 
                 "data[title]"      : "required",
            },
            messages : {
                        
            },      
    });
    $('.insert_banners').click(function(){     
        var validator = $("#insert_banners").validate();       
            validator.form();
            if(validator.form() == true){     
                     $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true); 
                var data = new FormData($('#insert_banners')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_banners",
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
         $('.insert_banners').removeAttr("disabled");
         $('.validate-file1').css("border-color","#D2D6DE");        
       }
       else
       {
           $('.insert_banners').attr("disabled","disabled");
        //   $('.validate-file1').css("border","2px solid red");
           alertify.error('Only png or jpg or jpeg files are allowed');           
       }
     }
</script>
