

<Style>
.md-input-wrapper {
    padding-top: 0% !important;
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
          <div class="card-header"><h5 class="card-header-text">Contact Requests</h5><span></div>
		 
		    <!--<span><button type="button" class="btn btn-success fa fa-plus add_ads" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add Social Media Links </button></span>-->
			
              
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                  <th>S.No</th>
				  <th>Name</th>
                  <th>Email</th>
                   <th>Subject</th>
				  <th>Message</th> 
				   <th>Action</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                  <th>S.No</th>
				  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
				  <th>Message</th> 
				   <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($contact_requests as $key) {   
                          ?>
                      <tr id="hide<?php echo $key["id"];?>">
                          <td><?php echo $counter;?></td>
						  
                            <td><?php echo ucwords($key["name"]);?></td>   
							<td><?php echo $key["email"];?></td>
							<td><?php echo $key["subject"];?></td>
                            <td style="white-space: break-spaces;"><?= $key["message"];?></td> 							
                         <td style="white-space: nowrap; width: 1%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <div class="btn-group btn-group-sm" style="float: none;">                            
                              <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key['id']?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>                       
                            </div> 
                            
                             <a href="<?= base_url()?>admin/reply_to_contact/<?php echo base64_encode($key['id']);?>"><button type="button" class="btn2 btn-primary" title = "reply" style="float: none;margin:5px;">
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
    </section>
	 <script>     
 
	   //delete 
       $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="contact_us";
			var param="id";
              alertify.confirm("Do you want to delete this contact request?",
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
   