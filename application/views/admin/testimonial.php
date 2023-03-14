<style>
    .show-read-more .more-text{
        display: none;
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
          <!--<h4>Member Corner</h4>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">        
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Testimonials</h5><span>
          </div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                  <th>Name</th>
                  <th>Subject</th> 
                 <th>Email</th>
                 <th>Status</th>
                 <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                <th>S NO</th>
                <th>Name</th>
                <th>Subject</th> 
                 <th>Email</th>
                 <th>Status</th>
                 <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($member_corner as $key)
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
                          <td  style="white-space: break-spaces;"><?php echo $key['name'];?></td> 
						  <td  style="white-space: break-spaces;"><?php echo $key["title"];?></td> 
						   <td  style="white-space: break-spaces;"><?php echo $key["email"];?></td> 
						   <td> <?php  echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;padding: 1.25em 2.4em ! important;" data-id="'.$key['id'].'" data-status="'.$key["status"].'">'. ucfirst($status1).'</span>'; ?>                
                              </td>
                          <td style="white-space: nowrap; width: 1%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <button type="button" class="view_user btn btn-primary waves-effect waves-light add_banners1" data-id="<?php echo $key['id']?>" style="float: none;margin: 5px;"><span class="icofont icofont-eye"></span></button>
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
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
     </section>
   <script>     
   	 $(document).ready(function(){ 
        var $modal = $('#add_banners1');
        $("body").on("click", ".add_banners1", function(event){ 
        var id = $(this).data('id');
        event.stopPropagation();
          $modal.load('<?php echo site_url('admin/view_testimonial');?>', {id: id},
          function(){
          $modal.modal('show');
        });
        });
  });
	   //delete 
        $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="testimonial";
			//alert(id);
              alertify.confirm("Do you want to delete this testimonial?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_image_record_t",
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
	 
	       $('.changes_ustatus').on('click',function(event){ 
            var id =$(this).data('id') ;
            var status =$(this).data('status') ;
              alertify.confirm("Do you want to change  this testimonial status?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/update_sp_status_m",
                    type: "POST",
                    data: {id:id,status:status},
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

 