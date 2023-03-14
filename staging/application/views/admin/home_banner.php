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
  .card-block .form-group.row img {
    max-width: 100% !important;
    width: auto !important;
    height: auto !important;
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
        <div class="card-header"><h5 class="card-header-text">Home banner</h5>
          </div>
        <div class="card-block">
          <form id="edit_term" method="post">
                <div class="form-group row">
            <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Image</label>
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
                <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Title </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="data[title]" value="<?php echo @$terms[0]['title']; ?>" placeholder="Title">
                </div>
                </div>
                
                <div class="form-group row">
                <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Title 2</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="data[title2]" value="<?php echo @$terms[0]['title2']; ?>" placeholder="Title 2">
                </div>
                </div>
                   <div class="form-group row">
                  <label class="col-sm-2 col-form-label form-control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="data[description]" id="description" rows="7" cols="3" class="form-control" placeholder="Description" ><?= @$terms[0]['description']?></textarea>
                    </div>
                </div>
          
                
               
     
         <input type="hidden" name="data[id]" value="<?php echo @$terms[0]['id']; ?>">
		 <input type="hidden" name="image" value="<?php echo @$terms[0]['image']; ?>">
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
    $("#edit_term").validate({
      ignore: [], 
        rules: {
          "data[title]"       :  "required",
        "data[title2]"       :  "required",
		"data[description]"       :  "required",
		 <?php if(@$terms[0]['id']=='') { ?>
        "image"       :  "required",
		 <?php }?>
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
                    url: "<?php echo base_url();?>admin/save_home_banner",
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

<script type="text/javascript">
  	 function validateLogo2(){
       var img = document.getElementById('customFile2');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")
       {
         $('.insert_banners').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.insert_banners').attr("disabled","disabled");
           $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }

</script>