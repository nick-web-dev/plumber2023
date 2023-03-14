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
               
                  <span id="message"></span>
          <form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Csv</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="file" id="file" >
                    </div>
                </div>				<div class="form-group" align="center">  							<input type="hidden" name="hidden_field" value="1" />  				</div>				<div class="modal-footer">					<input type="submit" name="import" id="import" class="btn btn-info" value="Import" />				</div> 
            </form> 
            			<div class="form-group" id="process" style="display:none;">  						<div class="progress">  							<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">  								<span id="process_data">0</span> - <span id="total_data">0</span>  							</div>  						</div>  					</div>
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>

<script>		
var clear_timer;		
$('#sample_form').on('submit', function(event){			
    $('#message').html('');			
    event.preventDefault();		
  	$.ajax({				
      url:"<?php echo base_url();?>admin/upload_plumber_events",				
      method:"POST",				
      data: new FormData(this),				
      dataType:"json",				
      contentType:false,				
      cache:false,				
      processData:false,				
      beforeSend:function(){
        					$('#import').attr('disabled','disabled');					
                  $('#import').val('Importing');				
                },				
      success:function(data)				{					
        if(data.success)					{
          						$('#total_data').text(data.total_line);		
                      
                      $('#message').html('<div class="alert alert-success">The import is in progress, the system will send an email once the import is completed.</div>');						
                      $('#import').attr('disabled',false);						
                      $('#import').val('Import');			

                      // start_import();					
                    }					
                      if(data.error)					{						
                        $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');						
                        $('#import').attr('disabled',false);						
                        $('#import').val('Import');					
                      }				
    }			
  })		
});		
  
  function start_import()		{
    			$.ajax({				
            url:"<?php echo base_url();?>admin/import_plumber",				
            success:function(data)				{					
              var total_data = $('#total_data').text();					
              console.log(total_data);$('#file').val('');						
              $('#message').html('<div class="alert alert-success">'+total_data+' plumbers imported successfully</div>');						
              $('#import').attr('disabled',false);						
              $('#import').val('Import');				
            }			
          })		
        }	

  function get_import_data()		{			
    $.ajax({				url:"<?php echo base_url();?>admin/process_plumber",				
      success:function(data)				{					
        var total_data = $('#total_data').text();					
        var width = Math.round((data/total_data)*100);					
        $('#process_data').text(data);					
        $('.progress-bar').css('width', width + '%');					
        if(width >= 100)					{						
          clearInterval(clear_timer);						
          $('#process').css('display', 'none');						
          $('#file').val('');						
          $('#message').html('<div class="alert alert-success">Data Successfully Imported</div>');						
          $('#import').attr('disabled',false);						$('#import').val('Import');					
        }				
      }			
    })		
  }

</script>
