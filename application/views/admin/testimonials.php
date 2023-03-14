<style>
    .show-read-more .more-text{
        display: none;
    }
    #advanced-table_filter label {
    top: 86px !important;
}
/*.md-input-wrapper {*/
/*    padding-top: 0% !important;*/
/*}*/
</style>

<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <!--<h4>Customer Testimonials</h4>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">        
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Testimonials</h5><span>
           <!-- <a href="<?php echo base_url()?>admin/add_service"><button class="btn btn-primary waves-effect waves-light pull-right add_product_category1" style="margin-left:65%">Add Service</button></a></span></div>-->
           <span><a href="<?php echo base_url()?>admin/add_testimonials"><button class="btn btn-success fa fa-plus" style="margin-left:82%;margin-top: -25px;">Add Testimonial</button></a></span>
              </div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
				 <th>Image</th> 
                 <th>Name</th>
				 <th>Designation</th> 
                 <th>Status</th>
                 <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                <th>S NO</th>
				 <th>Image</th> 
                 <th>Name</th>
				 <th>Designation</th> 
                 <th>Status</th>
                 <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($sub_category as $key)
                      {   
                          if ($key["status"] == "1")
                          {
                              $status = "tag tag-success" ;
                              $status1='Active';
                          }
                          else
                          {
                               $status = "tag tag-default" ;
                               $status1='InActive';
                          }  
                          ?>
                          <tr id="hide<?php echo $key["id"];?>">
                          <td><?php echo $counter;?></td>
						 
						   <td style="width:17%;" >
                           <img src="<?php echo base_url().$key['image'];?>" style="height: 104px !important;width: 82% !important;background-color:gray;"></td> 
						 
                            <td><?php echo $key["name"];?></td> 
                              <td style="white-space: break-spaces;"><?php echo $key["designation"];?></td> 							
                             <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                          <td style="white-space: nowrap; width: 1%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                               <a href="<?= base_url()?>admin/add_testimonials/<?php echo base64_encode($key['id']);?>"><button type="button" class="btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"> 
                                <span class="icofont icofont-ui-edit"></span>
                              </button></a> 
                              <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key['id']?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>                       
                            </div>       
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
      <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>     
  $(document).ready(function () 
  {
    var $modal = $('#add_banners');
   // var $modal2 = $('#edit_banners');
    $('.add_banners').on('click',function(event){
      var id = $(this).data('id'); 
//alert(id);	  
      event.stopPropagation();
      $modal.load('<?php echo site_url('admin/add_category');?>', {id: id},
      function(){
      $modal.modal('show');
      });
    }); 
	 });
	   //delete 
        $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="testimonials";
			//alert(id);
              alertify.confirm("Do you want to delete this testimonial?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_image_record",
                    type: "POST",
                    data: {id:id,table:table},
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

 