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
            <h4 class="modal-title" align="center">Add / Edit Subscription plan</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners">
               <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Plan name</label>
                    <div class="col-sm-9">
                        <input name="data[plan_name]" id="plan_name" class="form-control" placeholder="Plan name" value="<?=$value->plan_name?>">
                    </div>
                </div>
                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Amount</label>
                    <div class="col-sm-9">
                        <input name="data[amount]" id="amount" class="form-control" placeholder="amount" value="<?=$value->amount?>">
                    </div>
                </div>
                   <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Months</label>
                    <div class="col-sm-9">
                         <input name="data[months]" id="months" class="form-control" placeholder="months" value="<?=$value->months?>">
                        <!--<select class="form-control" name="data[months]">-->
                        <!--    <option value="1" <?php  if(@$value->months == "1"){ echo "selected";} ?>>1</option>-->
                        <!--    <option value="2" <?php  if(@$value->months == "2"){ echo "selected";} ?>>2</option>-->
                        <!--    <option value="3" <?php  if(@$value->months == "3"){ echo "selected";} ?>>3</option>-->
                        <!--    <option value="4" <?php  if(@$value->months == "4"){ echo "selected";} ?>>4</option>-->
                        <!--    <option value="5" <?php  if(@$value->months == "5"){ echo "selected";} ?>>5</option>-->
                        <!--    <option value="6" <?php  if(@$value->months == "6"){ echo "selected";} ?>>6</option>-->
                        <!--    <option value="7" <?php  if(@$value->months == "7"){ echo "selected";} ?>>7</option>-->
                        <!--    <option value="8" <?php  if(@$value->months == "8"){ echo "selected";} ?>>8</option>-->
                        <!--    <option value="9" <?php  if(@$value->months == "9"){ echo "selected";} ?>>9</option>-->
                        <!--    <option value="10" <?php  if(@$value->months == "10"){ echo "selected";} ?>>10</option>-->
                        <!--    <option value="11" <?php  if(@$value->months == "11"){ echo "selected";} ?>>11</option>-->
                        <!--    <option value="12" <?php  if(@$value->months == "12"){ echo "selected";} ?>>12</option>-->
                        <!--</select>-->
                    </div>
                </div>   
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Text 1</label>
                    <div class="col-sm-9">
                        <textarea name="data[text1]" id="text1" rows="4" cols="3" class="form-control" placeholder="Text1" ><?=$value->text1?></textarea>
                    </div>
                </div>
                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Text 2</label>
                    <div class="col-sm-9">
                        <textarea name="data[text2]" id="text2" rows="4" cols="3" class="form-control" placeholder="Text2" ><?=$value->text2?></textarea>
                    </div>
                </div>
                  <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Text 3</label>
                    <div class="col-sm-9">
                        <textarea name="data[text3]" id="text3" rows="4" cols="3" class="form-control" placeholder="Text3" ><?=$value->text3?></textarea>
                    </div>
                </div>
                  <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Text 4</label>
                    <div class="col-sm-9">
                        <textarea name="data[text4]" id="text4" rows="4" cols="3" class="form-control" placeholder="text4" ><?=$value->text4?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[status]">
                            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>
                            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                 
                <input type="hidden" name="data[id]" value="<?php echo @$value->id; ?>">
				
                <input type="hidden" name="table" value="banners">
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
                 "data[plan_name]"      : "required",
                 "data[text1]"      : "required",
                 "data[text2]"      : "required",
                 "data[text3]"      : "required",
                 "data[text4]"      : "required",
                 "data[text5]"      : "required",
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
                    url: "<?php echo base_url();?>admin/save_subscription_plan",
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

