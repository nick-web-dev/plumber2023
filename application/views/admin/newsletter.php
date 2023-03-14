

<Style>
.md-input-wrapper {
    padding-top: 0% !important;
}
.md-input-wrapper {
    margin-bottom: 0px !important;
}
.md-input-wrapper .md-form-control {
    padding: 5px !important;
}
#advanced-table_filter label {
    top: 85px !important;
}
</style>
<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <!--<h4>Contact Requests</h4>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">News Letter</h5><span></div>
		 
		    <!--<span><button type="button" class="btn btn-success fa fa-plus add_ads" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add Social Media Links </button></span>-->
			
              
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                  <th>S.No</th>
                  <th>Email</th>
				  <th>Action</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                  <th>S.No</th>
                  <th>Email</th>
				  <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($newsletter as $key) {   
                          ?>
                      <tr id="hide<?php echo $key["id"];?>">
                          <td><?php echo $counter;?></td>
						   
							<td><?php echo $key["email"];?></td>
							
                         <td style="white-space: nowrap;width: 2%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key['id']?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>                       
                           
                            </div> 
                            
                             <a href="<?= base_url()?>admin/reply_to/<?php echo base64_encode($key['id']);?>"><button type="button" class="btn2 btn-primary waves-effect" title = "reply" style="float: none;margin:5px;top: 4px;">
                          <span class="fa fa-envelope-o"></span></button></a>
                          </div>
                          
                        </td>
                      </tr>                          
                  <?php  $counter++;
                      }
                  ?>                            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- Container-fluid ends -->
        
     </div>
 <!-- CONTENT-WRAPPER-->
  <section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_ads" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
      <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
	 <script>   

	   //delete 
       $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="newsletter";
			var param="id";
              alertify.confirm("Do you want to delete this email?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_record",
                    type: "POST",
                    data: {id:id,table:table,param:param},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){                        
                                                 
                            $("#hide"+id).hide();
                            location.reload();                         
                      }
                 });
               },
          function(){
           // alertify.error('Cancel');
          }); 
             }); 
	 
    </script>
   